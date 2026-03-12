<?php

namespace Database\Seeders;

use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Models\NguoiDung;
use App\Models\SanPham;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DonHangSeeder extends Seeder
{
    public function run(): void
    {
        $users = NguoiDung::where('vai_tro', 'khach_hang')->get();
        $products = SanPham::all();

        if ($users->isEmpty() || $products->isEmpty()) {
            return;
        }

        $this->command->info('Bắt đầu sinh 150 đơn hàng giả lập đa dạng...');

        $statuses = [
            'cho_xac_nhan' => 5,
            'da_xac_nhan' => 10,
            'dang_xu_ly' => 5,
            'dang_giao' => 10,
            'da_giao' => 60,
            'da_huy' => 10
        ];

        $paymentMethods = ['cod', 'vnpay', 'momo'];

        for ($i = 0; $i < 150; $i++) {
            $user = $users->random();
            $createdAt = now()->subDays(rand(0, 365))->subHours(rand(0, 23));
            
            // Chọn trạng thái theo trọng số
            $rand = rand(1, 100);
            $currentStatus = 'da_giao';
            $sum = 0;
            foreach ($statuses as $status => $weight) {
                $sum += $weight;
                if ($rand <= $sum) {
                    $currentStatus = $status;
                    break;
                }
            }

            $paymentMethod = $paymentMethods[array_rand($paymentMethods)];
            $isPaid = ($paymentMethod !== 'cod' || $currentStatus === 'da_giao');

            $order = DonHang::create([
                'nguoi_dung_id' => $user->id,
                'ma_don_hang' => 'DH' . strtoupper(Str::random(10)),
                'trang_thai' => $currentStatus,
                'phuong_thuc_tt' => $paymentMethod,
                'trang_thai_tt' => $isPaid ? 'da_thanh_toan' : 'chua_thanh_toan',
                'tam_tinh' => 0,
                'phi_van_chuyen' => 30000,
                'tong_tien' => 0,
                'ten_nguoi_nhan' => $user->ho_va_ten,
                'sdt_nguoi_nhan' => $user->so_dien_thoai,
                'dia_chi_giao_hang' => 'Địa chỉ giả lập ' . rand(1, 100) . ', ' . $user->ho_va_ten,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);

            // Mỗi đơn hàng có 1-4 sản phẩm
            $numItems = rand(1, 4);
            $randomProducts = $products->random($numItems);
            $totalTamTinh = 0;

            foreach ($randomProducts as $product) {
                $qty = rand(1, 3);
                $price = $product->gia_khuyen_mai ?? $product->gia_goc;
                
                ChiTietDonHang::create([
                    'don_hang_id' => $order->id,
                    'san_pham_id' => $product->id,
                    'ten_san_pham' => $product->ten_san_pham,
                    'so_luong' => $qty, 
                    'don_gia' => $price,
                    'thanh_tien' => $price * $qty,
                ]);
                $totalTamTinh += $price * $qty;
            }

            $order->update([
                'tam_tinh' => $totalTamTinh,
                'tong_tien' => $totalTamTinh + 30000,
            ]);
        }

        $this->command->info('✅ DonHangSeeder: Đã tạo 150 đơn hàng đa dạng trạng thái và thời gian.');
    }
}
