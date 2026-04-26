<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Services\SanPhamService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 2. Sản phẩm & Danh mục (Khách hàng)
 * @subgroup Cửa hàng
 *
 * Nhóm API hiển thị thông tin sản phẩm dành cho khách hàng tham quan ứng dụng.
 */
class SanPhamController extends Controller
{
    public function __construct(private SanPhamService $service) {}

    /**
     * Lấy danh sách sản phẩm
     *
     * Phục vụ trang danh sách sản phẩm với các filter. Tự động trả về dữ liệu phân trang.
     * 
     * @queryParam tu_khoa string Tìm kiếm theo tên sản phẩm. Example: áo
     * @queryParam danh_muc string Slug danh mục. Example: bong-da
     * @queryParam thuong_hieu string Slug thương hiệu. Example: nike
     * @queryParam sap_xep string Tiêu chí sắp xếp: `moi_nhat`, `ban_chay`, `gia_tang`, `gia_giam`. Example: moi_nhat
     * @queryParam gia_min int Giá tối thiểu. Example: 100000
     * @queryParam gia_max int Giá tối đa. Example: 2000000
     * @queryParam chi_giam_gia int Chỉ hiện sản phẩm giảm giá (1=bật). Example: 1
     * @queryParam co_hang int Chỉ hiện sản phẩm còn hàng (1=bật). Example: 1
     * @queryParam per_page int Số lượng sản phẩm mỗi trang (Mặc định: 12). Example: 12
     */
    public function index(Request $request): JsonResponse
    {
        $products = $this->service->index($request->all());

        // Ghi nhận hành vi xem danh sách (nếu có search)
        if ($request->filled('tu_khoa') && $request->user()) {
            // Không ghi ở đây, chỉ ghi ở show()
        }

        return ApiResponse::paginate($products, 'Danh sách sản phẩm');
    }

    /**
     * Xem chi tiết sản phẩm
     *
     * Trả về thông tin chi tiết một sản phẩm, bao gồm biến thể và hình ảnh.
     * Cập nhật thêm luồng Tracking hành vi xem chi tiết phục vụ cho Suggestion ML.
     * 
     * @urlParam slug string required Slug duy nhất của sản phẩm. Example: ao-thun-the-thao-nam
     */
    public function show(Request $request, string $slug): JsonResponse
    {
        $product = $this->service->findBySlug($slug, $request->user());

        if (!$product) {
            return ApiResponse::notFound('Sản phẩm không tồn tại hoặc đã ngừng bán');
        }

        // Tăng lượt xem + ghi hành vi
        $this->service->tangLuotXem($product);
        $this->service->ghiHanhVi(
            $product->id,
            'xem',
            $request->user()?->id,
            $request->header('X-Session-ID')
        );

        return ApiResponse::success($product, 'Chi tiết sản phẩm');
    }
}
