<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\MaGiamGia;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 3. Giỏ hàng & Thanh toán
 * @subgroup Mã giảm giá
 */
class MaGiamGiaController extends Controller
{
    /**
     * Kiểm tra mã giảm giá
     *
     * Xác thực mã giảm giá do người dùng nhập trước khi áp dụng vào đơn hàng.
     * Trả về số tiền được giảm nếu mã hợp lệ.
     * 
     * @bodyParam ma_code string required Mã giảm giá người dùng nhập. Example: SALE2025
     * @bodyParam tam_tinh numeric required Tổng tiền tạm tính của giỏ hàng. Example: 500000
     */
    public function validate(Request $request): JsonResponse
    {
        $data = $request->validate([
            'ma_code'   => 'required|string|max:50',
            'tam_tinh'  => 'required|numeric|min:0',
        ]);

        $coupon = MaGiamGia::where('ma_code', $data['ma_code'])
            ->where('trang_thai', true)
            ->first();

        if (!$coupon) {
            return ApiResponse::error('Mã giảm giá không tồn tại hoặc đã hết hạn', 422);
        }

        if ($coupon->het_han_luc && $coupon->het_han_luc->isPast()) {
            return ApiResponse::error('Mã giảm giá đã hết hạn', 422);
        }

        if ($coupon->gioi_han_su_dung && $coupon->da_su_dung >= $coupon->gioi_han_su_dung) {
            return ApiResponse::error('Mã giảm giá đã hết lượt sử dụng', 422);
        }

        if ($data['tam_tinh'] < $coupon->gia_tri_don_hang_min) {
            return ApiResponse::error(
                'Đơn hàng chưa đạt giá trị tối thiểu ' . number_format($coupon->gia_tri_don_hang_min, 0, ',', '.') . 'đ', 422
            );
        }

        $soTienGiam = $coupon->tinhSoTienGiam($data['tam_tinh']);

        return ApiResponse::success([
            'ma_code'    => $coupon->ma_code,
            'loai_giam'  => $coupon->loai_giam,
            'gia_tri'    => $coupon->gia_tri,
            'so_tien_giam' => $soTienGiam,
        ], 'Mã giảm giá hợp lệ');
    }
}
