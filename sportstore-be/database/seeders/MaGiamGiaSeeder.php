<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaGiamGiaSeeder extends Seeder
{
    public function run(): void
    {
        $coupons = [
            [
                'ma_code'              => 'SPORTSTORE10',
                'loai_giam'            => 'phan_tram',
                'gia_tri'              => 10,
                'gia_tri_don_hang_min' => 300000,
                'giam_toi_da'          => 100000,
                'gioi_han_su_dung'     => 500,
                'da_su_dung'           => 0,
                'bat_dau_luc'          => now(),
                'het_han_luc'          => now()->addMonths(3),
                'trang_thai'           => true,
            ],
            [
                'ma_code'              => 'SEAGAMES2025',
                'loai_giam'            => 'phan_tram',
                'gia_tri'              => 15,
                'gia_tri_don_hang_min' => 500000,
                'giam_toi_da'          => 200000,
                'gioi_han_su_dung'     => 200,
                'da_su_dung'           => 0,
                'bat_dau_luc'          => now(),
                'het_han_luc'          => now()->addMonths(2),
                'trang_thai'           => true,
            ],
            [
                'ma_code'              => 'FREESHIP50',
                'loai_giam'            => 'so_tien_co_dinh',
                'gia_tri'              => 50000,
                'gia_tri_don_hang_min' => 200000,
                'giam_toi_da'          => null,
                'gioi_han_su_dung'     => 1000,
                'da_su_dung'           => 0,
                'bat_dau_luc'          => now(),
                'het_han_luc'          => now()->addMonth(),
                'trang_thai'           => true,
            ],
            [
                'ma_code'              => 'PICKLEBALL20',
                'loai_giam'            => 'phan_tram',
                'gia_tri'              => 20,
                'gia_tri_don_hang_min' => 1000000,
                'giam_toi_da'          => 300000,
                'gioi_han_su_dung'     => 100,
                'da_su_dung'           => 0,
                'bat_dau_luc'          => now(),
                'het_han_luc'          => now()->addMonths(1),
                'trang_thai'           => true,
            ],
            [
                'ma_code'              => 'NEWUSER100',
                'loai_giam'            => 'so_tien_co_dinh',
                'gia_tri'              => 100000,
                'gia_tri_don_hang_min' => 400000,
                'giam_toi_da'          => null,
                'gioi_han_su_dung'     => 300,
                'da_su_dung'           => 0,
                'bat_dau_luc'          => now(),
                'het_han_luc'          => now()->addMonths(6),
                'trang_thai'           => true,
            ],
        ];

        DB::table('ma_giam_gia')->insert(array_map(function ($c) {
            return array_merge($c, ['created_at' => now(), 'updated_at' => now()]);
        }, $coupons));

        $this->command->info('✅ MaGiamGiaSeeder: 5 mã giảm giá đã tạo');
        $this->command->table(['Mã', 'Loại', 'Giá trị', 'Đơn tối thiểu'], array_map(fn($c) => [
            $c['ma_code'],
            $c['loai_giam'] === 'phan_tram' ? "{$c['gia_tri']}%" : number_format($c['gia_tri']) . 'đ',
            $c['giam_toi_da'] ? 'Tối đa ' . number_format($c['giam_toi_da']) . 'đ' : 'Không giới hạn',
            number_format($c['gia_tri_don_hang_min']) . 'đ',
        ], $coupons));
    }
}
