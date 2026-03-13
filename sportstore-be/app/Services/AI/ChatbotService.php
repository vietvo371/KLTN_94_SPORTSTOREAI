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
Bạn là trợ lý tư vấn mua sắm đồ thể thao của SportStore.
Nhiệm vụ của bạn là:
- Tư vấn sản phẩm thể thao phù hợp với nhu cầu khách hàng
- Trả lời bằng tiếng Việt, thân thiện và ngắn gọn
- Không nói về các chủ đề không liên quan đến thể thao và mua sắm
- Nếu khách hỏi về sản phẩm cụ thể, giới thiệu các sản phẩm liên quan từ catalog
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
        // Tối ưu search: tìm theo tên, mô tả hoặc danh mục
        $products = SanPham::where(function($q) use ($query) {
                $q->where('ten_san_pham', 'like', "%{$query}%")
                  ->orWhere('mo_ta_ngan', 'like', "%{$query}%")
                  ->orWhereHas('danhMuc', function($dq) use ($query) {
                      $dq->where('ten', 'like', "%{$query}%");
                  });
            })
            ->where('trang_thai', true)
            ->take(5) // Lấy tối đa 5 sản phẩm để context phong phú hơn
            ->get(['ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'duong_dan']);

        if ($products->isEmpty()) {
            return '';
        }

        $list = $products->map(function ($p) {
            $price = number_format($p->gia_khuyen_mai ?? $p->gia_goc, 0, ',', '.') . 'đ';
            return "- [{$p->ten_san_pham}]({$p->duong_dan}): {$price}";
        })->join("\n");

        return "Dưới đây là một số sản phẩm liên quan từ SportStore mà bạn có thể quan tâm:\n{$list}";
    }
}
