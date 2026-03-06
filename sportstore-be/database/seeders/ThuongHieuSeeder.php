<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThuongHieuSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            [
                'ten'       => 'Wika Sports',
                'duong_dan' => 'wika-sports',
                'logo'      => 'https://wikasports.com/wp-content/uploads/2022/10/wika-1.png',
                'mo_ta'     => 'Thương hiệu thể thao hàng đầu Việt Nam, đồng hành cùng Quang Hải, Hoàng Đức, Công Phượng.',
                'trang_thai'=> true,
            ],
            [
                'ten'       => 'MaxxSport',
                'duong_dan' => 'maxxsport',
                'logo'      => null,
                'mo_ta'     => 'Hệ thống siêu thị thể thao chính hãng.',
                'trang_thai'=> true,
            ],
            [
                'ten'       => 'Zocker',
                'duong_dan' => 'zocker',
                'logo'      => 'https://shop.webthethao.vn/assets/logo/zocker.png',
                'mo_ta'     => 'Thương hiệu chuyên về dụng cụ thể thao cao cấp và thiết bị thể dục.',
                'trang_thai'=> true,
            ]
        ];

        foreach ($brands as $brand) {
            DB::table('thuong_hieu')->insert([
                'ten'             => $brand['ten'],
                'duong_dan'       => $brand['duong_dan'],
                'logo'            => $brand['logo'],
                'mo_ta'           => $brand['mo_ta'],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
        
        $this->command->info('✅ ThuongHieuSeeder: Đã tạo 3 thương hiệu');
    }
}
