<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\Banner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 2. Sản phẩm & Danh mục (Khách hàng)
 * @subgroup Banner Trang chủ
 *
 * Quản lý hiển thị Banner động trên giao diện Cửa hàng.
 */
class BannerController extends Controller
{
    /**
     * Danh sách Banner
     *
     * Lấy các Banner đang hoạt động để hiển thị Slideshow trên Trang chủ.
     */
    public function index(Request $request): JsonResponse
    {
        $banners = Banner::where('trang_thai', true)
                        ->orderBy('thu_tu', 'asc')
                        ->get();
                        
        return ApiResponse::success($banners, 'Danh sách Banner');
    }
}
