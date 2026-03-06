<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Bóng Đá' => [
                'Giày Bóng Đá',
                'Áo Bóng Đá',
                'Găng Tay Thủ Môn',
                'Quả Bóng Đá'
            ],
            'Pickleball' => [
                'Vợt Pickleball',
                'Giày Pickleball',
                'Phụ Kiện Pickleball'
            ],
            'Chạy Bộ' => [
                'Giày Chạy Bộ',
                'Quần Áo Chạy Bộ'
            ],
            'Bóng Chuyền' => [
                'Giày Bóng Chuyền',
                'Trang Phục Bóng Chuyền'
            ],
            'Bóng Rổ' => [
                'Quả Bóng Rổ',
                'Trang Phục Bóng Rổ'
            ],
            'Phụ Kiện Thể Thao' => [
                'Balo & Túi Trống',
                'Tất Thể Thao',
                'Băng Đội Đầu'
            ]
        ];

        $now = now();
        $countParent = 0;
        $countChild = 0;

        foreach ($categories as $parent => $children) {
            $parentId = DB::table('danh_muc')->insertGetId([
                'ten'          => $parent,
                'duong_dan'    => \Illuminate\Support\Str::slug($parent),
                'danh_muc_cha_id' => null,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]);
            $countParent++;

            foreach ($children as $child) {
                DB::table('danh_muc')->insert([
                    'ten'          => $child,
                    'duong_dan'    => \Illuminate\Support\Str::slug($child),
                    'danh_muc_cha_id' => $parentId,
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ]);
                $countChild++;
            }
        }

        $this->command->info("✅ DanhMucSeeder: {$countParent} danh mục cha + {$countChild} danh mục con đã tạo");
    }
}
