<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Services\DonHangService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 3. Giỏ hàng & Thanh toán
 * @subgroup Thanh toán & Lịch sử đơn hàng
 *
 * Cho phép khách hàng xem lịch sử mua hàng, chi tiết đơn và thực hiện đặt hàng (Checkout).
 */
class DonHangController extends Controller
{
    public function __construct(private DonHangService $service) {}

    /**
     * Danh sách Đơn hàng
     *
     * Lấy danh sách lịch sử đơn hàng của người dùng đang đăng nhập. Có phân trang.
     * @authenticated
     */
    public function index(Request $request): JsonResponse
    {
        $orders = $this->service->getUserOrders($request->user());
        return ApiResponse::paginate($orders, 'Lịch sử đơn hàng');
    }

    /**
     * Đặt hàng (Checkout)
     *
     * Tạo đơn hàng mới từ các mặt hàng đang có trong Giỏ. Sau khi thanh toán thành công, giỏ hàng sẽ bị xóa.
     * 
     * @authenticated
     * @bodyParam dia_chi_id int required ID địa chỉ giao hàng của người dùng. Example: 2
     * @bodyParam phuong_thuc_tt string required Phương thức thanh toán (cod, chuyen_khoan, vnpay, momo). Example: cod
     * @bodyParam ma_coupon string Mã giảm giá (nếu có áp dụng). Example: SALE2025
     * @bodyParam ghi_chu string Ghi chú thêm cho đơn hàng. Example: Giao vào giờ hành chính
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'dia_chi_id'   => 'required|integer|exists:dia_chi,id',
            'phuong_thuc_tt' => 'required|in:cod,chuyen_khoan,vnpay,momo',
            'ma_coupon'    => 'nullable|string|max:50',
            'ghi_chu'      => 'nullable|string|max:500',
        ], [
            'dia_chi_id.required'     => 'Vui lòng chọn địa chỉ giao hàng.',
            'dia_chi_id.exists'       => 'Địa chỉ không tồn tại.',
            'phuong_thuc_tt.required' => 'Vui lòng chọn phương thức thanh toán.',
            'phuong_thuc_tt.in'       => 'Phương thức thanh toán không hợp lệ.',
        ]);

        $donHang = $this->service->checkout($request->user(), $data);
        return ApiResponse::created($donHang, 'Đặt hàng thành công');
    }

    /**
     * Chi tiết đơn hàng
     *
     * Xem chi tiết một đơn hàng thông qua Mã đơn hàng.
     * 
     * @authenticated
     * @urlParam code string required Mã đơn hàng (VD: DH202503...). Example: DH202503050001
     */
    public function show(Request $request, string $code): JsonResponse
    {
        $donHang = $this->service->getByCode($code, $request->user());

        if (!$donHang) {
            return ApiResponse::notFound('Không tìm thấy đơn hàng');
        }

        return ApiResponse::success($donHang, 'Chi tiết đơn hàng');
    }
}
