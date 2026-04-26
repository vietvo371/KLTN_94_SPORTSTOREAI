<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SanPhamSeeder extends Seeder
{
    public function run(): void
    {
        $files = [
            'nike'   => 'nike_full_dataset.json',
            'wika'   => 'wika_full_dataset.json',
            'kaiwin' => 'kaiwin_full_dataset.json',
            'kamito' => 'kamito_full_dataset.json'
        ];

        // Lấy Map thương hiệu (lowercase để so trùng)
        $brands = DB::table('thuong_hieu')->pluck('id', 'ten')->toArray();
        $brandMap = [];
        foreach ($brands as $k => $v) {
            $brandMap[strtolower($k)] = $v;
        }

        // Lấy Map Danh mục dựa vào duong_dan (Kết hợp Slug Danh mục Cha + Con) để chống ghi đè các nhánh trùng tên như "Áo Polo"
        $cats = DB::table('danh_muc')->get()->keyBy('duong_dan')->toArray();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('san_pham')->truncate();
        DB::table('bien_the_san_pham')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $count = 0;

        foreach ($files as $sysBrand => $file) {
            $jsonPath = database_path("seeders/{$file}");
            if (!file_exists($jsonPath)) continue;

            $data = json_decode(file_get_contents($jsonPath), true);
            if (!isset($data['products'])) continue;

            // Tracking danh sách tên đã nạp để bỏ qua nếu JSON bị trùng lặp tên sản phẩm gỡ lỗi Unique Constraint
            $insertedNames = [];

            foreach ($data['products'] as $p) {
                // Tên sản phẩm phải là High Unique
                $tenSanPham = trim($p['name']);
                if (isset($insertedNames[$tenSanPham])) {
                    // Nếu trùng tên rồi thì bỏ qua nạp để tránh Crash DB
                    continue;
                }
                $insertedNames[$tenSanPham] = true;

                // 1. Xác định Brand ID
                $brandName = isset($p['categories'][0]) ? trim($p['categories'][0]) : $sysBrand;
                $brandId = null;
                foreach ($brandMap as $bk => $bv) {
                    if (Str::contains(strtolower($brandName), $bk)) {
                        $brandId = $bv; break;
                    }
                }
                if (!$brandId) {
                    $brandId = array_values($brandMap)[0] ?? 1; // Fallback
                }

                // 2. Xác định Category ID
                // Ưu tiên keyword trong tên sản phẩm, fallback vào categories JSON rồi map slug
                $catId = null;
                $nameStr = strtolower($tenSanPham . ' ' . ($p['slug'] ?? '') . ' ' . $brandName);

                // ── Xác định parent nhánh theo brand ──
                $isNike   = (bool) preg_match('/\b(nike|jordan)\b/i', $nameStr);
                $isWika   = (bool) preg_match('/\b(wika)\b/i', $nameStr);
                $isKaiwin = (bool) preg_match('/\b(kaiwin)\b/i', $nameStr);
                $isKamito = (bool) preg_match('/\b(kamito)\b/i', $nameStr);

                // ── Mapping theo keyword trong tên sp (độ chính xác cao hơn categories JSON) ──
                if (preg_match('/\b(giay|giầy|shoe|air max|vaporfly|vomero|zoom fly|pegasus|wincflo|winflo|free metcon|dunk|air force)\b/i', $nameStr)) {
                    if ($isNike) {
                        if (preg_match('/\b(vaporfly|vomero|zoom fly|pegasus|wincflo|winflo|free metcon)\b/i', $nameStr)) {
                            $catId = $cats['chay-bo-giay-chay-bo']->id ?? null;
                        } else {
                            $catId = $cats['thoi-trang-giay-the-thao']->id ?? null;
                        }
                    } elseif ($isKamito) {
                        if (preg_match('/\b(giay bong da|giày bóng đá|soccer|artista|velocidad)\b/i', $nameStr)) {
                            $catId = $cats['bong-da-giay-bong-da']->id ?? null;
                        } elseif (preg_match('/\b(pickleball)\b/i', $nameStr)) {
                            $catId = $cats['pickleball-giay-pickleball']->id ?? null;
                        } else {
                            $catId = $cats['thoi-trang-giay-the-thao']->id ?? null;
                        }
                    } elseif ($isKaiwin) {
                        if (preg_match('/\b(ao bong da|áo bóng đá)\b/i', $nameStr)) {
                            $catId = $cats['bong-da-ao-bong-da']->id ?? null;
                        } elseif (preg_match('/\b(giay bong da|giày bóng đá)\b/i', $nameStr)) {
                            $catId = $cats['bong-da-giay-bong-da']->id ?? null;
                        } elseif (preg_match('/\b(pickleball)\b/i', $nameStr)) {
                            $catId = $cats['pickleball-giay-pickleball']->id ?? null;
                        } else {
                            $catId = $cats['pickleball-giay-pickleball']->id ?? null;
                        }
                    } else {
                        $catId = $cats['pickleball-giay-pickleball']->id ?? null;
                    }
                } elseif (preg_match('/\b(ao polo)\b/i', $nameStr)) {
                    if ($isNike || $isKamito) {
                        $catId = $cats['thoi-trang-ao-polo']->id ?? null;
                    } else {
                        $catId = $cats['bong-da-ao-polo']->id ?? null;
                    }
                } elseif (preg_match('/\b(ao bong da|áo bóng đá)\b/i', $nameStr)) {
                    $catId = $cats['bong-da-ao-bong-da']->id ?? null;
                } elseif (preg_match('/\b(quan ao bong da|bộ bóng đá|bo bong da)\b/i', $nameStr)) {
                    $catId = $cats['bong-da-quan-ao-bong-da']->id ?? null;
                } elseif (preg_match('/\b(vot|vợt).*\b(pickleball)\b/i', $nameStr)) {
                    $catId = $cats['pickleball-vot-pickleball']->id ?? null;
                } elseif (preg_match('/\b(quan pickleball|short pickleball)\b/i', $nameStr)) {
                    $catId = $cats['pickleball-quan-pickleball']->id ?? null;
                } elseif (preg_match('/\b(balo|balo.*pickleball|tui dui|túi)\b/i', $nameStr)) {
                    if (preg_match('/\b(pickleball)\b/i', $nameStr)) {
                        $catId = $cats['pickleball-balo-pickleball']->id ?? null;
                    } else {
                        $catId = $cats['bong-da-balo-tui-the-thao']->id ?? null;
                    }
                } elseif (preg_match('/\b(bong pickleball|ball pickle)\b/i', $nameStr)) {
                    $catId = $cats['pickleball-bong-pickleball']->id ?? null;
                } elseif (preg_match('/\b(ao the thao|áo thể thao|áo thun|áo t-shirt)\b/i', $nameStr)) {
                    if (preg_match('/\b(pickleball)\b/i', $nameStr)) {
                        $catId = $cats['pickleball-ao-thun-the-thao']->id ?? null;
                    } else {
                        $catId = $cats['the-thao-ao-the-thao']->id ?? null;
                    }
                } elseif (preg_match('/\b(ga tay thu mon|găng tay thủ môn)\b/i', $nameStr)) {
                    $catId = $cats['bong-da-phu-kien-bong-da']->id ?? null;
                } elseif (preg_match('/\b(bong da|bóng đá)\b/i', $nameStr) && preg_match('/\b(qua|quả)\b/i', $nameStr)) {
                    $catId = $cats['bong-da-qua-bong-da']->id ?? null;
                }

                // ── Fallback: dùng categories JSON ──
                if (!$catId && isset($p['categories']) && count($p['categories']) >= 3) {
                    $parentName = trim($p['categories'][1]);
                    $childName  = trim($p['categories'][2]);
                    $slug       = Str::slug($parentName . ' ' . $childName);
                    if (isset($cats[$slug])) {
                        $catId = $cats[$slug]->id;
                    } else {
                        $parentSlug = Str::slug($parentName);
                        if (isset($cats[$parentSlug])) {
                            $catId = $cats[$parentSlug]->id;
                        }
                    }
                }

                if (!$catId) {
                    $catId = $cats['thoi-trang-giay-the-thao']->id ?? array_values($cats)[0]->id ?? null;
                }

                // 3. Chuẩn hóa giá
                $giaKhuyenMai = !empty($p['price']) ? (float) $p['price'] : 0;
                $giaGoc = !empty($p['regular_price']) ? (float) $p['regular_price'] : $giaKhuyenMai;
                if ($giaGoc == 0 && $giaKhuyenMai > 0) $giaGoc = $giaKhuyenMai;
                if ($giaKhuyenMai == $giaGoc) $giaKhuyenMai = null;

                $moTaNgan = strip_tags($p['short_description'] ?? '');
                if (mb_strlen($moTaNgan) > 490) $moTaNgan = mb_substr($moTaNgan, 0, 490) . '...';

                $createdAt = now()->subDays(rand(1, 90));

                // Prefix mã SKU tự động
                $skuBase = strtoupper(substr($sysBrand, 0, 3)) . '-' . Str::random(6) . '-' . ($p['id'] ?? Str::random(4));

                try {
                    $sanPhamId = DB::table('san_pham')->insertGetId([
                        'ten_san_pham'   => $tenSanPham,
                        // Slug có thêm random string chuẩn để 100% tránh SQL Integrity Constraint unique
                        'duong_dan'      => ($p['slug'] ?? Str::slug($tenSanPham)) . '-' . Str::random(8),
                        'ma_sku'         => $skuBase,
                        'gia_goc'        => $giaGoc,
                        'gia_khuyen_mai' => $giaKhuyenMai,
                        'mo_ta_ngan'     => $moTaNgan,
                        'mo_ta_day_du'   => $p['description'] ?? '',
                        'danh_muc_id'    => $catId,
                        'thuong_hieu_id' => $brandId,
                        'so_luong_ton_kho'=> 1000,
                        'noi_bat'        => $count % 10 == 0 ? true : false,
                        'trang_thai'     => true,
                        'luot_xem'       => rand(20, 1000),
                        'da_ban'         => rand(0, 100),
                        'created_at'     => $createdAt,
                        'updated_at'     => $createdAt,
                    ]);

                    // 4. Các biến thể (Size/Đồng giá)
                    $isGiay = preg_match('/\b(giay|giầy|shoe)\b/i', $nameStr);
                    $isAo = preg_match('/\b(ao|áo|shirt|bo thi dau|bộ)\b/i', $nameStr);

                    if ($isGiay) {
                        $sizes = ['39', '40', '41', '42', '43'];
                        foreach ($sizes as $size) {
                            DB::table('bien_the_san_pham')->insert([
                                'san_pham_id' => $sanPhamId,
                                'ma_sku'      => $skuBase . '-' . $size,
                                'kich_co'     => $size,
                                'mau_sac'     => 'Mặc định',
                                'gia_rieng'   => null,
                                'ton_kho'     => rand(20, 100),
                                'created_at'  => $createdAt,
                                'updated_at'  => $createdAt,
                            ]);
                        }
                    } elseif ($isAo) {
                        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                        foreach ($sizes as $size) {
                            DB::table('bien_the_san_pham')->insert([
                                'san_pham_id' => $sanPhamId,
                                'ma_sku'      => $skuBase . '-' . $size,
                                'kich_co'     => $size,
                                'mau_sac'     => 'Mặc định',
                                'gia_rieng'   => ($size == 'XXL') ? 20000 : null, 
                                'ton_kho'     => rand(30, 200),
                                'created_at'  => $createdAt,
                                'updated_at'  => $createdAt,
                            ]);
                        }
                    } else {
                        DB::table('bien_the_san_pham')->insert([
                            'san_pham_id' => $sanPhamId,
                            'ma_sku'      => $skuBase . '-FREE',
                            'kich_co'     => 'Freesize',
                            'mau_sac'     => 'Mặc định',
                            'gia_rieng'   => null,
                            'ton_kho'     => rand(50, 500),
                            'created_at'  => $createdAt,
                            'updated_at'  => $createdAt,
                        ]);
                    }
                    $count++;
                } catch (\Exception $e) {
                    // Cứ việc bỏ qua nếu bị trùng Unique hoặc văng Exception, Dataset có quá nhiều sản phẩm không cần xót
                    continue;
                }
            }
        }

        $this->command->info("✅ SanPhamSeeder: Đã nạp thành công {$count} sản phẩm ĐA DẠNG từ 4 Dataset (Nike, Wika, Kaiwin, Kamito).");
    }
}
