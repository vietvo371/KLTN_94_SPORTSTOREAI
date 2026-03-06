<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'tieu_de' => 'Banner Giày bóng đá Wika 1',
                'hinh_anh'=> 'https://wikasports.com/wp-content/uploads/2021/06/banner-giay-da-bong-1-2048x823.jpg',
                'duong_dan'=> '/danh-muc/giay-bong-da',
                'thu_tu'  => 1
            ],
            [
                'tieu_de' => 'Banner Giày bóng đá Wika 2',
                'hinh_anh'=> 'https://wikasports.com/wp-content/uploads/2021/06/banner-giay-da-bong-2-scaled.jpg',
                'duong_dan'=> '/danh-muc/giay-bong-da',
                'thu_tu'  => 2
            ],
            [
                'tieu_de' => 'Nguyễn Hoàng Đức x Wika',
                'hinh_anh'=> 'https://wikasports.com/wp-content/uploads/2023/02/nguyen-hoang-duc-banner.jpg',
                'duong_dan'=> '/danh-muc/ao-bong-da',
                'thu_tu'  => 3
            ],
            [
                'tieu_de' => 'Wika Hunter',
                'hinh_anh'=> 'https://wikasports.com/wp-content/uploads/2022/02/banner-wika-hunter-1536x568.jpg',
                'duong_dan'=> '/danh-muc/giay-bong-da',
                'thu_tu'  => 4
            ]
        ];

        foreach ($banners as $banner) {
            DB::table('banners')->insert(array_merge($banner, [
                'trang_thai' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('✅ BannerSeeder: Đã tạo 4 Slide Banners');
    }
}
