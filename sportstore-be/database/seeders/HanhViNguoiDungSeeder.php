<?php

namespace Database\Seeders;

use App\Models\HanhViNguoiDung;
use App\Models\NguoiDung;
use App\Models\SanPham;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HanhViNguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        $users = NguoiDung::where('vai_tro', 'khach_hang')->get();
        $products = SanPham::all();

        if ($products->isEmpty()) {
            return;
        }

        $this->command->info('Bắt đầu sinh dữ liệu hành vi người dùng (Lượt xem sản phẩm)...');

        $totalViews = 0;
        $now = now();

        foreach ($products as $product) {
            // Mỗi sản phẩm có từ 20 đến 100 lượt xem trong 90 ngày qua
            $numViews = rand(20, 100);
            
            for ($i = 0; $i < $numViews; $i++) {
                $user = rand(0, 1) ? $users->random() : null; // 50% là khách vãng lai
                $createdAt = $now->copy()->subDays(rand(0, 90))->subHours(rand(0, 23));

                HanhViNguoiDung::create([
                    'nguoi_dung_id' => $user?->id,
                    'ma_phien' => (string) Str::uuid(),
                    'san_pham_id' => $product->id,
                    'hanh_vi' => 'xem',
                    'thoi_gian_xem_s' => rand(10, 300),
                    'created_at' => $createdAt,
                ]);
            }

            // Cập nhật tổng lượt xem vào bảng san_pham
            $product->update(['luot_xem' => $numViews]);
            $totalViews += $numViews;
        }

        $this->command->info("✅ HanhViNguoiDungSeeder: Đã tạo {$totalViews} lượt xem sản phẩm.");
    }
}
