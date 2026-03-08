<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\DanhMuc;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 2. Sản phẩm & Danh mục (Khách hàng)
 * @subgroup Danh mục nền tảng
 *
 * Cho phép khách hàng xem danh sách các danh mục thể thao hiện có.
 */
class DanhMucController extends Controller
{
    /**
     * Danh sách danh mục
     *
     * Lấy toàn bộ cây danh mục sản phẩm (bao gồm danh mục con) đang hoạt động.
     */
    public function index(): JsonResponse
    {
        $categories = DanhMuc::with('danhMucCon')
            ->whereNull('danh_muc_cha_id')
            ->where('trang_thai', true)
            ->orderBy('thu_tu')
            ->get();

        return ApiResponse::success($categories, 'Danh sách danh mục');
    }

    /**
     * Chi tiết danh mục
     *
     * Trả về thông tin chi tiết của danh mục cùng với danh mục con và các sản phẩm nổi bật.
     * 
     * @urlParam slug string required Đường dẫn thân thiện của danh mục. Example: giay-chay-bo
     */
    public function show(string $slug): JsonResponse
    {
        $category = DanhMuc::with(['danhMucCon', 'sanPham' => fn ($q) => $q->where('trang_thai', true)->limit(12)])
            ->where('duong_dan', $slug)
            ->where('trang_thai', true)
            ->first();

        if (!$category) {
            return ApiResponse::notFound('Danh mục không tồn tại');
        }

        return ApiResponse::success($category, 'Chi tiết danh mục');
    }
}
