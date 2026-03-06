<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class HinhAnhSanPhamSeeder extends Seeder
{
    public function run(): void
    {
        $products = DB::table('san_pham')->pluck('id', 'duong_dan');
        $now = now();
        $count = 0;

        // Tạo thư mục nếu chưa có
        Storage::disk('public')->makeDirectory('products');

        // Danh sách URL thật ảnh sản phẩm. Dùng kết hợp WikaSports Uploads và Local Assets cũ.
        $images = [
            // --- WIKA SPORTS (Sẽ tự tải về máy) ---
            'giay-bong-da-wika-qh19-z-vol-quang-hai' => [
                'https://wikasports.com/wp-content/uploads/2024/09/giay-wika-qh19-z-vol-quang-hai_optimized.jpg'
            ],
            'ao-bong-da-wika-lica-hoang-duc' => [
                'https://wikasports.com/wp-content/uploads/2023/09/ao-bong-da-wika-lica-hoang-duc_optimized.jpg'
            ],
            'vot-pickleball-wika-quang-duong-fire-tim' => [
                'https://wikasports.com/wp-content/uploads/2026/02/vot-pickleball-wika-quang-duong-fire-tim-1_optimized.jpg',
                'https://wikasports.com/wp-content/uploads/2026/02/vot-pickleball-wika-quang-duong-fire-tim-6_optimized.jpg'
            ],
            'giay-pickleball-wika-ruta-quang-duong' => [
                'https://wikasports.com/wp-content/uploads/2025/06/giay-pickleball-wika-ruta-quang-duong-scaled.jpg'
            ],

            // --- JOGARBOLA / ZOCKER / MAXSPORT (Dùng sẵn File Local đã cào hôm qua, ko cần tải lại) ---
            'bo-thi-dau-doi-tuyen-bong-da-2025-fan-do' => [
                'local:/storage/products/bo-thi-dau-doi-tuyen-bong-da-2025-fan-do-1.jpg',
                'local:/storage/products/bo-thi-dau-doi-tuyen-bong-da-2025-fan-do-2.jpg'
            ],
            'bo-luyen-tap-doi-tuyen-bong-da-2025-blue' => [
                'local:/storage/products/bo-luyen-tap-doi-tuyen-bong-da-2025-blue-1.jpg',
                'local:/storage/products/bo-luyen-tap-doi-tuyen-bong-da-2025-blue-2.jpg'
            ],
            'bo-thi-dau-bong-chuyen-nu-viet-nam-do' => [
                'local:/storage/products/bo-thi-dau-bong-chuyen-nu-viet-nam-do-1.jpg',
                'local:/storage/products/bo-thi-dau-bong-chuyen-nu-viet-nam-do-2.jpg'
            ],
            'vot-pickleball-zocker-hp06-pro-series-power-yellow' => [
                'local:/storage/products/vot-pickleball-zocker-hp06-pro-series-power-yellow-1.jpg',
                'local:/storage/products/vot-pickleball-zocker-hp06-pro-series-power-yellow-2.jpg'
            ],
            'giay-pickleball-zocker-aspire-speed-den-cam' => [
                'local:/storage/products/giay-pickleball-zocker-aspire-speed-den-cam-1.jpg',
                'local:/storage/products/giay-pickleball-zocker-aspire-speed-den-cam-2.jpg'
            ],
            'gay-danh-bi-a-universal-natura-series-na-08' => [
                'local:/storage/products/gay-danh-bi-a-universal-natura-series-na-08-1.jpg',
                'local:/storage/products/gay-danh-bi-a-universal-natura-series-na-08-2.jpg'
            ],
        ];

        foreach ($products as $slug => $productId) {
            $urls = $images[$slug] ?? null;

            if ($urls) {
                foreach ($urls as $idx => $url) {
                    $finalUrl = "";

                    // Nếu là ảnh local đã cào sẵn từ bài trước
                    if (str_starts_with($url, 'local:')) {
                        $finalUrl = str_replace('local:', '', $url);
                        $this->command->info("Sử dụng ảnh Local: {$finalUrl}");
                    } else {
                        // Tải ảnh mới từ WikaSports về Local Asset để backup trọn đời
                        try {
                            $contents = Http::withHeaders([
                                'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
                                'Accept' => 'image/avif,image/webp,*/*',
                            ])->get($url)->body();
                            
                            $filename = "{$slug}-" . ($idx + 1) . ".jpg";
                            $path = "products/{$filename}";
                            
                            if (strlen($contents) > 1000) {
                                Storage::disk('public')->put($path, $contents);
                                $finalUrl = "/storage/{$path}";
                                $this->command->info("Đã tải ảnh Wika thành công: {$filename}");
                            } else {
                                $this->command->error("Tải ảnh Wika thất bại (0 byte): {$url}");
                                $finalUrl = $url; // Fallback dùng luôn link sống của Wika nếu tải lỗi
                            }
                        } catch (\Exception $e) {
                             $this->command->error("Lỗi HTTP khi tải {$url}");
                             $finalUrl = $url;
                        }
                    }

                    DB::table('hinh_anh_san_pham')->insert([
                        'san_pham_id'   => $productId,
                        'duong_dan_anh' => $finalUrl,
                        'chu_thich'     => null,
                        'thu_tu'        => $idx,
                        'la_anh_chinh'  => $idx === 0,
                        'created_at'    => $now,
                    ]);
                    $count++;
                }
            }
        }

        $this->command->info("✅ HinhAnhSanPhamSeeder: Đã tạo {$count} bản ghi ảnh sản phẩm chuẩn.");
    }
}
