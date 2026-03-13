<?php

namespace App\Services\AI;

use App\Models\PhienChatbot;
use App\Models\SanPham;
use App\Models\TinNhanChatbot;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/**
 * ChatbotService — Proxy giữa Laravel và Gemini API.
 *
 * ⚠️ Toàn bộ giao tiếp với Gemini phải qua class này.
 * Controller TUYỆT ĐỐI KHÔNG gọi Gemini trực tiếp.
 */
class ChatbotService
{
    private string $apiKey;
    private string $model;
    private string $apiUrl = 'https://api.groq.com/openai/v1/chat/completions';

    public function __construct()
    {
        $this->apiKey = config('services.groq.key', '');
        $this->model = config('services.groq.model', 'llama-3.3-70b-versatile');
    }

    /**
     * Gửi tin nhắn và nhận reply từ Gemini.
     *
     * @param string   $maPhien    ID phiên chat (tạo mới nếu chưa có)
     * @param string   $noiDung    Nội dung tin nhắn từ user
     * @param int|null $nguoiDungId
     * @return array{ phien: PhienChatbot, reply: string }
     */
    public function sendMessage(string $maPhien, string $noiDung, ?int $nguoiDungId = null): array
    {
        // Lấy hoặc tạo phiên
        $phien = PhienChatbot::where('ma_phien', $maPhien)->first();

        if ($phien) {
            // Nếu phiên đã tồn tại nhưng chưa có nguoi_dung_id mà hiện tại đã có -> Cập nhật
            if (!$phien->nguoi_dung_id && $nguoiDungId) {
                $phien->update(['nguoi_dung_id' => $nguoiDungId]);
            }
        } else {
            $phien = PhienChatbot::create([
                'ma_phien' => $maPhien,
                'nguoi_dung_id' => $nguoiDungId,
                'bat_dau_luc' => now(),
            ]);
        }

        // Lưu tin nhắn người dùng
        TinNhanChatbot::create([
            'phien_id' => $phien->id,
            'vai_tro'  => 'nguoi_dung',
            'noi_dung' => $noiDung,
        ]);

        // Lấy lịch sử để context (tối đa 15 tin nhắn gần nhất để giữ ngữ cảnh tốt hơn)
        $lichSu = $phien->tinNhan()->latest()->take(15)->get()->reverse()->values();

        // Build Groq request (OpenAI-compatible)
        $systemPrompt = $this->buildSystemPrompt($noiDung);
        $sanPhamContext = $this->searchRelevantProducts($noiDung);
        
        $messages = $this->buildMessages($lichSu, $systemPrompt, $sanPhamContext);

        $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$this->apiKey}",
            ])
            ->post($this->apiUrl, [
                'model'    => $this->model,
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens'  => 2048,
            ]);

        if ($response->failed()) {
            $errorReply = 'Xin lỗi, tôi đang gặp sự cố kỹ thuật (Quota/Connection). Vui lòng thử lại sau ít phút.';
            \Log::error('Gemini API Error: ' . $response->body());
            
            // Lưu tin nhắn lỗi để hội thoại nhất quán khi F5
            TinNhanChatbot::create([
                'phien_id' => $phien->id,
                'vai_tro'  => 'tro_ly',
                'noi_dung' => $errorReply,
                'so_token' => 0,
            ]);

            return ['phien' => $phien, 'reply' => $errorReply];
        }

        $reply = $response->json('choices.0.message.content')
            ?? 'Xin lỗi, tôi không thể trả lời lúc này. Vui lòng thử lại.';

        $soToken = $response->json('usage.total_tokens') ?? 0;

        // Lưu reply
        TinNhanChatbot::create([
            'phien_id' => $phien->id,
            'vai_tro'  => 'tro_ly',
            'noi_dung' => $reply,
            'so_token' => $soToken,
        ]);

        return ['phien' => $phien, 'reply' => $reply];
    }

    /**
     * Lịch sử phiên chat.
     */
    public function getHistory(string $maPhien): ?PhienChatbot
    {
        return PhienChatbot::with('tinNhan')->where('ma_phien', $maPhien)->first();
    }

    private function buildSystemPrompt(string $query): string
    {
        return <<<PROMPT
Bạn là trợ lý ảo chuyên nghiệp của **SportStore**. 
Nhiệm vụ: Tư vấn sản phẩm thể thao THỰC TẾ đang có tại cửa hàng.

**NGUYÊN TẮC QUAN TRỌNG:**
1. **CHỈ TƯ VẤN SẢN PHẨM TRONG DANH SÁCH GỢI Ý (CONTEXT):** Tuyệt đối không tự bịa ra bất kỳ sản phẩm nào (ví dụ: Đồng hồ, thiết bị điện tử, v.v.) nếu chúng không xuất hiện trong phần "Sản phẩm gợi ý" bên dưới.
2. **NẾU KHÔNG CÓ SẢN PHẨM PHÙ HỢP:** Hãy nói: *"Hiện tại em chưa thấy mẫu cụ thể đó trong kho, nhưng anh/chị tham khảo thử các mẫu [Tên SP trong list] này xem có ưng ý không nhé?"*.
3. **PHẠM VI:** Chỉ hỗ trợ mua sắm, tư vấn đồ thể thao (giày, áo, vợt...). Với các chủ đề khác, hãy từ chối khéo léo và hỏi khách có muốn xem mẫu giày/vợt mới nhất không.
4. **HỘI THOẠI TỰ NHIÊN:** Nếu khách hàng nói "có", "vâng", "ok" sau khi bạn gợi ý, hãy tiếp tục tư vấn sâu hơn về các sản phẩm đã liệt kê hoặc hỏi họ về size/màu sắc. Không được lặp lại câu chào máy móc.
5. **ĐỊNH DẠNG:** Sử dụng Markdown. Tên sản phẩm phải **In đậm** và có link đi kèm.
PROMPT;
    }

    private function buildMessages(iterable $lichSu, string $systemPrompt, string $context): array
    {
        $messages = [];

        // 1. System instruction
        $messages[] = [
            'role' => 'system',
            'content' => $systemPrompt . "\n\n" . $context
        ];

        // 2. Chat history
        foreach ($lichSu as $msg) {
            $messages[] = [
                'role' => $msg->vai_tro === 'nguoi_dung' ? 'user' : 'assistant',
                'content' => $msg->noi_dung
            ];
        }

        return $messages;
    }

    private function searchRelevantProducts(string $query): string
    {
        $query = mb_strtolower($query);
        $confirmationKeywords = ['có', 'vâng', 'ừ', 'ok', 'được', 'yes', 'tư vấn', 'xem'];
        
        // Nếu user chỉ chat các từ khẳng định hoặc hỏi chung chung, lấy sản phẩm nổi bật
        $isGeneralQuery = false;
        if (strlen($query) < 5 || in_array($query, $confirmationKeywords)) {
            $isGeneralQuery = true;
        }

        $queryBuilder = SanPham::where('trang_thai', true);

        if ($isGeneralQuery) {
            $products = $queryBuilder->where('noi_bat', true)->latest()->take(5)->get(['ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'duong_dan']);
            // Nếu không có sp nổi bật, lấy ngẫu nhiên
            if ($products->isEmpty()) {
                $products = SanPham::where('trang_thai', true)->inRandomOrder()->take(5)->get(['ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'duong_dan']);
            }
        } else {
            // Tối ưu search: tìm theo tên, mô tả hoặc danh mục
            $products = $queryBuilder->where(function($q) use ($query) {
                    $q->where('ten_san_pham', 'like', "%{$query}%")
                      ->orWhere('mo_ta_ngan', 'like', "%{$query}%")
                      ->orWhereHas('danhMuc', function($dq) use ($query) {
                          $dq->where('ten', 'like', "%{$query}%");
                      });
                })
                ->take(5)
                ->get(['ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'duong_dan']);
        }

        if ($products->isEmpty()) {
            return '';
        }

        $frontendUrl = rtrim(env('FRONTEND_URL', 'http://localhost:3000'), '/');

        $list = $products->map(function ($p) use ($frontendUrl) {
            $price = number_format($p->gia_khuyen_mai ?? $p->gia_goc, 0, ',', '.') . 'đ';
            $fullUrl = "{$frontendUrl}/products/{$p->duong_dan}";
            return "- **[{$p->ten_san_pham}]({$fullUrl})** \n  *Giá: {$price}*";
        })->join("\n");

        return "### 🎁 Sản phẩm gợi ý cho bạn:\n{$list}\n\n*Bạn có thể nhấn vào tên sản phẩm để xem chi tiết!*";
    }
}
