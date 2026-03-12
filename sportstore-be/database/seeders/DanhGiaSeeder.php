<?php

namespace Database\Seeders;

use App\Models\DanhGia;
use App\Models\NguoiDung;
use App\Models\SanPham;
use Illuminate\Database\Seeder;

class DanhGiaSeeder extends Seeder
{
    public function run(): void
    {
        $users = NguoiDung::where('vai_tro', 'khach_hang')->get();
        $products = SanPham::all();

        if ($users->isEmpty() || $products->isEmpty()) {
            return;
        }

        DanhGia::query()->delete();

        $this->command->info('Bắt đầu sinh đánh giá ảo đa dạng...');

        $sampleReviews = [
            5 => [
                ['tieu_de' => 'Tuyệt vời!', 'noi_dung' => 'Sản phẩm quá đẹp, chất liệu rất tốt. Form chuẩn y hình.'],
                ['tieu_de' => 'Rất hài lòng', 'noi_dung' => 'Shop hỗ trợ nhiệt tình, tư vấn size siêu chuẩn.'],
            ],
            4 => [
                ['tieu_de' => 'Khá tốt', 'noi_dung' => 'Giao hàng nhanh, đóng gói cẩn thận. Hình mẫu lên đẹp.'],
                ['tieu_de' => 'Thiết kế đẹp', 'noi_dung' => 'Màu sắc y chang hình, form thể thao khỏe khoắn.'],
            ],
            3 => [
                ['tieu_de' => 'Tạm ổn', 'noi_dung' => 'Mua sale nên giá khá rẻ. Nhưng đường chỉ may đôi chỗ bị lỗi.'],
            ],
            2 => [
                ['tieu_de' => 'Hơi thất vọng', 'noi_dung' => 'Chất vải không như mong đợi, mặc hơi nóng.'],
            ],
            1 => [
                ['tieu_de' => 'Không hài lòng', 'noi_dung' => 'Giao sai mẫu, shop làm việc thiếu chuyên nghiệp.'],
            ],
        ];

        foreach ($products as $product) {
            $numReviews = rand(1, 5);
            $reviewers = $users->random($numReviews);
            
            $totalStars = 0;
            $count = 0;

            foreach ($reviewers as $user) {
                // Random số sao theo tỷ lệ
                $rand = rand(1, 100);
                $stars = 5;
                if ($rand <= 60) $stars = 5;
                elseif ($rand <= 85) $stars = 4;
                elseif ($rand <= 95) $stars = 3;
                elseif ($rand <= 98) $stars = 2;
                else $stars = 1;

                $mock = $sampleReviews[$stars][array_rand($sampleReviews[$stars])];
                $createdAt = now()->subDays(rand(1, 90));

                DanhGia::create([
                    'san_pham_id' => $product->id,
                    'nguoi_dung_id' => $user->id,
                    'so_sao' => $stars,
                    'tieu_de' => $mock['tieu_de'],
                    'noi_dung' => $mock['noi_dung'],
                    'da_duyet' => true,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);

                $totalStars += $stars;
                $count++;
            }

            $product->update([
                'diem_danh_gia' => round($totalStars / $count, 2),
                'so_luot_danh_gia' => $count
            ]);
        }

        $this->command->info('✅ DanhGiaSeeder: Đã tạo đánh giá đa dạng cho tất cả sản phẩm.');
    }
}
