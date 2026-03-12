<?php

namespace Database\Seeders;

use App\Models\PhienChatbot;
use App\Models\TinNhanChatbot;
use App\Models\NguoiDung;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ChatbotSeeder extends Seeder
{
    public function run(): void
    {
        $users = NguoiDung::where('vai_tro', 'khach_hang')->get();
        if ($users->isEmpty()) {
            return;
        }

        $this->command->info('Bắt đầu sinh dữ liệu Chatbot...');

        $now = Carbon::now();

        for ($i = 0; $i < 60; $i++) {
            $user = $users->random();
            // Random ngày trong 90 ngày qua
            $createdAt = $now->copy()->subDays(rand(0, 90))->subHours(rand(0, 23))->subMinutes(rand(0, 59));
            
            $session = PhienChatbot::create([
                'nguoi_dung_id' => $user->id,
                'ma_phien' => (string) Str::uuid(),
                'bat_dau_luc' => $createdAt,
                'ket_thuc_luc' => $createdAt->copy()->addMinutes(rand(5, 30)),
            ]);

            // Mỗi phiên có 2-6 tin nhắn
            $numMessages = rand(2, 6);
            for ($j = 0; $j < $numMessages; $j++) {
                $isUser = $j % 2 == 0;
                TinNhanChatbot::create([
                    'phien_id' => $session->id,
                    'vai_tro' => $isUser ? 'nguoi_dung' : 'tro_ly',
                    'noi_dung' => $isUser ? 'Câu hỏi của khách hàng ' . rand(1, 100) : 'Câu trả lời của chatbot AI hỗ trợ khách hàng về sản phẩm thể thao.',
                    'so_token' => rand(50, 200),
                    'created_at' => $createdAt->copy()->addSeconds($j * 30),
                ]);
            }
        }

        $this->command->info('✅ ChatbotSeeder: Đã tạo 60 phiên chat ảo.');
    }
}
