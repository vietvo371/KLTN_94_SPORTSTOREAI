<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SanPhamSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Lấy map IDs
        $brands = DB::table('thuong_hieu')->pluck('id', 'ten');
        $cats = DB::table('danh_muc')->pluck('id', 'ten');

        $now = now();

        // 2. Định nghĩa danh sách sản phẩm chuẩn theo Wika & MaxxSport (Jogarbola, Zocker)
        $products = [
            // --- WIKA SPORTS ---
            [
                'ten_san_pham' => 'Giày bóng đá Wika QH19 Z-Vol Quang Hải',
                'duong_dan'    => 'giay-bong-da-wika-qh19-z-vol-quang-hai',
                'gia_goc'      => 650000,
                'gia_ban'      => 590000,
                'so_luong_ton' => 100,
                'thuong_hieu_id' => $brands['Wika Sports'] ?? null,
                'danh_muc_id'  => $cats['Giày Bóng Đá'] ?? null,
                'mo_ta_ngan'   => 'Giày bóng đá đinh dăm (TF) thiết kế riêng mang dấu ấn Quang Hải.',
            ],
            [
                'ten_san_pham' => 'Áo bóng đá Wika Lica Hoàng Đức',
                'duong_dan'    => 'ao-bong-da-wika-lica-hoang-duc',
                'gia_goc'      => 250000,
                'gia_ban'      => 199000,
                'so_luong_ton' => 200,
                'thuong_hieu_id' => $brands['Wika Sports'] ?? null,
                'danh_muc_id'  => $cats['Áo Bóng Đá'] ?? null,
                'mo_ta_ngan'   => 'Áo đấu cao cấp thấm hút mồ hôi, co giãn 4 chiều.',
            ],
            [
                'ten_san_pham' => 'Vợt Pickleball Wika Quang Duong Fire Tím',
                'duong_dan'    => 'vot-pickleball-wika-quang-duong-fire-tim',
                'gia_goc'      => 1200000,
                'gia_ban'      => 999000,
                'so_luong_ton' => 50,
                'thuong_hieu_id' => $brands['Wika Sports'] ?? null,
                'danh_muc_id'  => $cats['Vợt Pickleball'] ?? null,
                'mo_ta_ngan'   => 'Vợt Pickleball sợi carbon T700 cao cấp, dòng Fire thiết kế cùng Quang Duong.',
            ],
            [
                'ten_san_pham' => 'Giày Pickleball Wika Ruta Quang Duong',
                'duong_dan'    => 'giay-pickleball-wika-ruta-quang-duong',
                'gia_goc'      => 850000,
                'gia_ban'      => 750000,
                'so_luong_ton' => 150,
                'thuong_hieu_id' => $brands['Wika Sports'] ?? null,
                'danh_muc_id'  => $cats['Giày Pickleball'] ?? null,
                'mo_ta_ngan'   => 'Giày chuyên dụng sân cứng Pickleball êm ái, bám sân cực tốt.',
            ],

            // --- JOGARBOLA (Từ nội dung tải trước đó) ---
            [
                'ten_san_pham' => 'Bộ thi đấu đội tuyển Bóng đá Việt Nam 2025 Fan Đỏ',
                'duong_dan'    => 'bo-thi-dau-doi-tuyen-bong-da-2025-fan-do',
                'gia_goc'      => 500000,
                'gia_ban'      => 399000,
                'so_luong_ton' => 300,
                'thuong_hieu_id' => $brands['Jogarbola'] ?? null,
                'danh_muc_id'  => $cats['Áo Bóng Đá'] ?? null,
                'mo_ta_ngan'   => 'Áo cổ vũ chính hãng ĐTQG Việt Nam 2025 từ Jogarbola.',
            ],
            [
                'ten_san_pham' => 'Bộ luyện tập đội tuyển Bóng đá Việt Nam 2025 Blue',
                'duong_dan'    => 'bo-luyen-tap-doi-tuyen-bong-da-2025-blue',
                'gia_goc'      => 450000,
                'gia_ban'      => 350000,
                'so_luong_ton' => 200,
                'thuong_hieu_id' => $brands['Jogarbola'] ?? null,
                'danh_muc_id'  => $cats['Áo Bóng Đá'] ?? null,
                'mo_ta_ngan'   => 'Áo tập ĐTQG Việt Nam xanh dương thoáng mát.',
            ],
            [
                'ten_san_pham' => 'Bộ thi đấu bóng chuyền nữ Việt Nam Đỏ',
                'duong_dan'    => 'bo-thi-dau-bong-chuyen-nu-viet-nam-do',
                'gia_goc'      => 400000,
                'gia_ban'      => 300000,
                'so_luong_ton' => 150,
                'thuong_hieu_id' => $brands['Jogarbola'] ?? null,
                'danh_muc_id'  => $cats['Trang Phục Bóng Chuyền'] ?? null,
                'mo_ta_ngan'   => 'Áo thi đấu chính thức Đội tuyển Bóng chuyền nữ VN.',
            ],

            // --- ZOCKER / KHÁC ---
            [
                'ten_san_pham' => 'Vợt Pickleball Zocker HP06 Pro Series Power Yellow',
                'duong_dan'    => 'vot-pickleball-zocker-hp06-pro-series-power-yellow',
                'gia_goc'      => 1500000,
                'gia_ban'      => 1200000,
                'so_luong_ton' => 80,
                'thuong_hieu_id' => $brands['Zocker'] ?? null,
                'danh_muc_id'  => $cats['Vợt Pickleball'] ?? null,
                'mo_ta_ngan'   => 'Vợt Pickleball Zocker sợi thủy tinh dập nổi, điểm ngọt lớn.',
            ],
            [
                'ten_san_pham' => 'Giày Pickleball Zocker Aspire Speed Đen Cam',
                'duong_dan'    => 'giay-pickleball-zocker-aspire-speed-den-cam',
                'gia_goc'      => 950000,
                'gia_ban'      => 800000,
                'so_luong_ton' => 120,
                'thuong_hieu_id' => $brands['Zocker'] ?? null,
                'danh_muc_id'  => $cats['Giày Pickleball'] ?? null,
                'mo_ta_ngan'   => 'Giày tốc độ Zocker Aspire siêu nhẹ bám thảm tuyệt đối.',
            ],
            [
                'ten_san_pham' => 'Gậy đánh Bi-a Universal Natura Series NA-08',
                'duong_dan'    => 'gay-danh-bi-a-universal-natura-series-na-08',
                'gia_goc'      => 5500000,
                'gia_ban'      => 4900000,
                'so_luong_ton' => 20,
                'thuong_hieu_id' => $brands['Zocker'] ?? null, // Gán tạm Zocker
                'danh_muc_id'  => $cats['Phụ Kiện Thể Thao'] ?? null,
                'mo_ta_ngan'   => 'Gậy lỗ bida carbon composite siêu thẳng.',
            ],
        ];

        // 3. Insert Sản phẩm
        $count = 0;
        foreach ($products as $p) {
            DB::table('san_pham')->insert([
                'ten_san_pham'   => $p['ten_san_pham'],
                'duong_dan'      => $p['duong_dan'],
                'gia_goc'        => $p['gia_goc'],
                'gia_khuyen_mai' => $p['gia_ban'],
                'mo_ta_ngan'     => $p['mo_ta_ngan'],
                'mo_ta_day_du'   => "<p>{$p['mo_ta_ngan']}</p><p>Sản phẩm chính hãng chất lượng cao. Bảo hành 3 tháng do lỗi NSX.</p>",
                'danh_muc_id'    => $p['danh_muc_id'],
                'thuong_hieu_id' => $p['thuong_hieu_id'],
                'so_luong_ton_kho'=> $p['so_luong_ton'],
                'trang_thai'     => true,
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);
            $count++;
        }

        $this->command->info("✅ SanPhamSeeder: Đã tạo {$count} sản phẩm chuẩn xác");

        // Ghi luôn biến thể size/màu (tùy chọn) để làm data mock
        $this->seedBienThe();
    }

    private function seedBienThe()
    {
        $products = DB::table('san_pham')->get();
        $now = now();
        $countBienThe = 0;

        foreach ($products as $p) {
            $isGiay = Str::contains($p->duong_dan, 'giay');
            $isAo = Str::contains($p->duong_dan, ['ao', 'bo-thi-dau', 'bo-luyen-tap', 'bo-suvec']);

            if ($isGiay) {
                // Size giày
                $sizes = ['39', '40', '41', '42', '43'];
                foreach ($sizes as $size) {
                    DB::table('bien_the_san_pham')->insert([
                        'san_pham_id' => $p->id,
                        'kich_co'     => $size,
                        'mau_sac'     => 'Mặc định',
                        'gia_rieng'   => 0,
                        'ton_kho'     => rand(10, 50),
                        'created_at'  => $now,
                    ]);
                    $countBienThe++;
                }
            } elseif ($isAo) {
                // Size áo
                $sizes = ['M', 'L', 'XL', 'XXL'];
                foreach ($sizes as $size) {
                    DB::table('bien_the_san_pham')->insert([
                        'san_pham_id' => $p->id,
                        'kich_co'     => $size,
                        'mau_sac'     => 'Mặc định',
                        'gia_rieng'   => ($size == 'XXL') ? 20000 : 0, 
                        'ton_kho'     => rand(20, 100),
                        'created_at'  => $now,
                    ]);
                    $countBienThe++;
                }
            } else {
                // Đồ cơ bản không size (Vợt, Bóng, Gậy Bi-a...)
                DB::table('bien_the_san_pham')->insert([
                    'san_pham_id' => $p->id,
                    'kich_co'     => 'Freesize',
                    'mau_sac'     => 'Mặc định',
                    'gia_rieng'   => 0,
                    'ton_kho'     => $p->so_luong_ton_kho,
                    'created_at'  => $now,
                ]);
                $countBienThe++;
            }
        }
        $this->command->info("✅ BienTheSanPhamSeeder: Đã tạo {$countBienThe} phân loại hàng (Size/Màu)");
    }
}
