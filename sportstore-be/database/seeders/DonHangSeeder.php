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
        $products = SanPham::with('bienThe')->get();
        $coupons = \App\Models\MaGiamGia::where('trang_thai', true)->get();

        if ($users->isEmpty() || $products->isEmpty()) {
            return;
        }

        $this->command->info('Bắt đầu sinh 150 đơn hàng giả lập với logic Kho & Coupon (90 ngày)...');

        $statuses = [
            'cho_xac_nhan' => 5,
            'da_xac_nhan' => 10,
            'dang_xu_ly' => 5,
            'dang_giao' => 10,
            'da_giao' => 60,
            'da_huy' => 10
        ];

        $paymentMethods = ['cod', 'vnpay', 'momo'];
        $usedCoupons = []; // Theo dõi: [userId => [couponId1, couponId2, ...]]

        for ($i = 0; $i < 150; $i++) {
            $user = $users->random();
            $createdAt = now()->subDays(rand(0, 90))->subHours(rand(0, 23));
            
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

            $numItems = rand(1, 4);
            $randomProducts = $products->random($numItems);
            $totalTamTinh = 0;

            foreach ($randomProducts as $product) {
                $qty = rand(1, 3);
                $variant = $product->bienThe->isNotEmpty() ? $product->bienThe->random() : null;
                $price = $product->gia_khuyen_mai ?? $product->gia_goc;
                $variantInfo = 'Mặc định';
                $variantId = null;

                if ($variant) {
                    $variantId = $variant->id;
                    $variantInfo = "{$variant->kich_co} / {$variant->mau_sac}";
                    if ($variant->gia_rieng > 0) $price = $variant->gia_rieng;
                }
                
                ChiTietDonHang::create([
                    'don_hang_id' => $order->id,
                    'san_pham_id' => $product->id,
                    'bien_the_id' => $variantId,
                    'ten_san_pham' => $product->ten_san_pham,
                    'thong_tin_bien_the' => $variantInfo,
                    'so_luong' => $qty, 
                    'don_gia' => $price,
                    'thanh_tien' => $price * $qty,
                ]);

                if ($currentStatus !== 'da_huy') {
                    if ($variant) $variant->decrement('ton_kho', $qty);
                    $product->decrement('so_luong_ton_kho', $qty);
                    $product->increment('da_ban', $qty);
                }

                $totalTamTinh += $price * $qty;
            }

            // LOGIC MÃ GIẢM GIÁ
            $soTienGiam = 0;
            $maGiamGiaId = null;
            if (rand(1, 100) <= 30 && $coupons->isNotEmpty()) {
                // Lọc bỏ những mã mà user này đã dùng
                $userId = $user->id;
                $userUsedIds = $usedCoupons[$userId] ?? [];
                $availableCoupons = $coupons->reject(fn($c) => in_array($c->id, $userUsedIds));

                if ($availableCoupons->isNotEmpty()) {
                    $coupon = $availableCoupons->random();
                    if ($totalTamTinh >= $coupon->gia_tri_don_hang_min) {
                        $soTienGiam = $coupon->tinhSoTienGiam($totalTamTinh);
                        $maGiamGiaId = $coupon->id;
                        $coupon->increment('da_su_dung');
                        
                        \App\Models\LichSuDungMa::create([
                            'ma_giam_gia_id' => $maGiamGiaId,
                            'nguoi_dung_id' => $userId,
                            'don_hang_id' => $order->id,
                            'su_dung_luc' => $createdAt
                        ]);
                        
                        // Đánh dấu user đã dùng mã này
                        $usedCoupons[$userId][] = $maGiamGiaId;
                    }
                }
            }

            $order->update([
                'ma_giam_gia_id' => $maGiamGiaId,
                'tam_tinh' => $totalTamTinh,
                'so_tien_giam' => $soTienGiam,
                'tong_tien' => max(0, $totalTamTinh - $soTienGiam + 30000),
            ]);

            $historyTimeline = [
                'cho_xac_nhan' => 'Đơn hàng đã được đặt thành công.',
                'da_xac_nhan' => 'Đơn hàng đã được hệ thống xác nhận.',
                'dang_xu_ly' => 'Kho đang chuẩn bị hàng.',
                'dang_giao' => 'Đơn hàng đang được vận chuyển đến bạn.',
                'da_giao' => 'Giao hàng thành công. Cảm ơn bạn đã mua sắm!',
                'da_huy' => 'Đơn hàng đã bị hủy.',
                'hoan_tra' => 'Yêu cầu hoàn trả đã được xử lý.'
            ];

            $orderStatusOrder = ['cho_xac_nhan', 'da_xac_nhan', 'dang_xu_ly', 'dang_giao', 'da_giao'];
            
            if ($currentStatus === 'da_huy') {
                $this->createHistory($order->id, 'cho_xac_nhan', $historyTimeline['cho_xac_nhan'], $createdAt);
                $this->createHistory($order->id, 'da_huy', 'Đơn hàng bị hủy theo yêu cầu.', $createdAt->copy()->addMinutes(rand(10, 60)));
            } else {
                $stepTime = $createdAt->copy();
                foreach ($orderStatusOrder as $status) {
                    $this->createHistory($order->id, $status, $historyTimeline[$status], $stepTime);
                    if ($status === $currentStatus) break;
                    if ($status === 'cho_xac_nhan') $stepTime->addMinutes(rand(30, 120));
                    elseif ($status === 'da_xac_nhan') $stepTime->addHours(rand(1, 3));
                    elseif ($status === 'dang_xu_ly') $stepTime->addHours(rand(2, 6));
                    elseif ($status === 'dang_giao') $stepTime->addDays(rand(1, 2));
                }
            }
        }

        $this->command->info('✅ DonHangSeeder: 150 đơn hàng kèm logic Kho, Bán hàng và Coupon.');
    }

    private function createHistory($orderId, $status, $note, $time)
    {
        \App\Models\LichSuTrangThaiDon::create([
            'don_hang_id' => $orderId,
            'trang_thai' => $status,
            'ghi_chu' => $note,
            'created_at' => $time
        ]);
    }
}
