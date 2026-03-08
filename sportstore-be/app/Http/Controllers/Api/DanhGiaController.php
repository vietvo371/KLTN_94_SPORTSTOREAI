<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\DanhGia;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 2. Sản phẩm & Danh mục (Khách hàng)
 * @subgroup Đánh giá Sản phẩm
 * @authenticated
 */
class DanhGiaController extends Controller
{
    /**
     * Gửi đánh giá
     *
     * Khách hàng gửi đánh giá cho sản phẩm đã mua. Đánh giá sẽ cần Admin duyệt trước khi hiển thị.
     * 
     * @bodyParam san_pham_id int required ID sản phẩm được đánh giá. Example: 1
     * @bodyParam don_hang_id int ID đơn hàng. Giúp xác thực người dùng đã thực sự mua hàng. Example: 5
     * @bodyParam so_sao int required Số điểm đánh giá (1-5 sao). Example: 5
     * @bodyParam tieu_de string Tiêu đề đánh giá. Example: Sản phẩm rất tốt
     * @bodyParam noi_dung string Nội dung đánh giá chi tiết. Example: Giày đi êm chân, đúng size.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'san_pham_id' => 'required|integer|exists:san_pham,id',
            'don_hang_id' => 'nullable|integer|exists:don_hang,id',
            'so_sao'      => 'required|integer|min:1|max:5',
            'tieu_de'     => 'nullable|string|max:200',
            'noi_dung'    => 'nullable|string|max:1000',
        ]);

        $existing = DanhGia::where('san_pham_id', $data['san_pham_id'])
            ->where('nguoi_dung_id', $request->user()->id)
            ->exists();

        if ($existing) {
            return ApiResponse::error('Bạn đã đánh giá sản phẩm này rồi', 422);
        }

        $review = DanhGia::create([...$data, 'nguoi_dung_id' => $request->user()->id, 'da_duyet' => false]);
        return ApiResponse::created($review, 'Đánh giá đã gửi, đang chờ duyệt');
    }

    /**
     * Chi tiết đánh giá
     * 
     * @urlParam id int required ID của đánh giá. Example: 1
     */
    public function show(int $id): JsonResponse
    {
        $review = DanhGia::with('nguoiDung', 'hinhAnh')->findOrFail($id);
        return ApiResponse::success($review, 'Chi tiết đánh giá');
    }
}
