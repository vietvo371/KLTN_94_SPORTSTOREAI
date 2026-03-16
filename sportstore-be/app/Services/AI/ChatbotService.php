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
Bạn là trợ lý ảo chuyên nghiệp và trung thực của cửa hàng đồ thể thao **SportStore**. 

**QUY TẮC ỨNG XỬ:**
1. **KHÔNG ĐƯỢC BỊA ĐẶT:** Chỉ được phép tư vấn các sản phẩm có tên chính xác trong danh sách "Sản phẩm thực tế tại kho" được cung cấp bên dưới. Tuyệt đối không tự nghĩ ra tên sản phẩm, thương hiệu hoặc tính năng không có trong danh sách.
2. **XỬ LÝ KHI KHÔNG TÌM THẤY:** Nếu khách hỏi mẫu cụ thể mà không có trong danh sách, hãy trả lời: *"Hiện tại bên em chưa có mẫu [Tên mẫu khách hỏi] đó, nhưng anh/chị tham khảo qua các mẫu [Tên SP trong danh sách gợi ý] đang rất hot này nhé!"*.
3. **TRUNG THỰC VỀ GIÁ:** Luôn trích dẫn đúng giá hiển thị trong danh sách.
4. **HỘI THOẠI:** Trả lời ngắn gọn, thân thiện, tập trung vào việc giúp khách chọn được đồ thể thao ưng ý. Sử dụng Markdown để trình bày đẹp mắt.
5. **LIÊN KẾT:** Luôn đính kèm Link sản phẩm (dạng Markdown) khi nhắc đến tên sản phẩm để khách bấm vào xem được ngay.
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
        
        // 1. Lọc bỏ từ dừng (Stop words) để lấy từ khóa thực tế
        $stopWords = [
            'có', 'gì', 'không', 'bán', 'mẫu', 'nào', 'em', 'ơi', 'cho', 'anh', 'chị', 'tôi', 
            'muốn', 'tìm', 'mua', 'đâu', 'giá', 'bao', 'nhiêu', 'thế', 'này', 'của', 'với', 'xem'
        ];
        
        $rawWords = preg_split('/\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);
        $keywords = array_filter($rawWords, fn($w) => !in_array($w, $stopWords) && mb_strlen($w) > 1);
        
        $queryBuilder = SanPham::where('trang_thai', true);

        // 2. Tìm kiếm theo từ khóa (Keywords search)
        if (!empty($keywords)) {
            $queryBuilder->where(function($q) use ($keywords) {
                foreach ($keywords as $word) {
                    $q->orWhere('ten_san_pham', 'like', "%{$word}%")
                      ->orWhere('mo_ta_ngan', 'like', "%{$word}%")
                      ->orWhereHas('danhMuc', function($dq) use ($word) {
                          $dq->where('ten', 'like', "%{$word}%");
                      });
                }
            });
            $products = $queryBuilder->latest()->take(6)->get(['ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'duong_dan']);
        } else {
            $products = collect();
        }

        // 3. Fallback: Nếu không tìm thấy gì theo từ khóa, lấy sản phẩm Nổi bật / Mới nhất
        if ($products->isEmpty()) {
            $products = SanPham::where('trang_thai', true)
                ->where('noi_bat', true)
                ->latest()
                ->take(5)
                ->get(['ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'duong_dan']);
            
            // Nếu vẫn rỗng (trường hợp DB chưa có sp nổi bật), lấy ngẫu nhiên sp bất kỳ
            if ($products->isEmpty()) {
                $products = SanPham::where('trang_thai', true)
                    ->inRandomOrder()
                    ->take(5)
                    ->get(['ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'duong_dan']);
            }
            
            $contextHeader = "### 🌟 Các sản phẩm HOT tại cửa hàng (do không tìm thấy mẫu chính xác):\n";
        } else {
            $contextHeader = "### 🎁 Sản phẩm thực tế tại kho phù hợp với tìm kiếm của bạn:\n";
        }

        if ($products->isEmpty()) {
            return "Hiện tại cửa hàng đang cập nhật sản phẩm, vui lòng quay lại sau.";
        }

        $frontendUrl = rtrim(env('FRONTEND_URL', 'http://localhost:3000'), '/');

        $list = $products->map(function ($p) use ($frontendUrl) {
            $price = number_format($p->gia_khuyen_mai ?? $p->gia_goc, 0, ',', '.') . 'đ';
            $fullUrl = "{$frontendUrl}/products/{$p->duong_dan}";
            return "- **[{$p->ten_san_pham}]({$fullUrl})** - Giá: {$price}";
        })->join("\n");

        return $contextHeader . $list . "\n\n*Lưu ý: Bạn chỉ được tư vấn dựa trên danh sách sản phẩm này. Tuyệt đối không bịa tên sản phẩm.*";
    }
}
