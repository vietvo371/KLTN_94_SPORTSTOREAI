<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\DonHang;
use App\Services\DonHangService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 6. Quản trị viên (Admin)
 * @subgroup Quản lý Đơn hàng
 * @authenticated
 */
class DonHangAdminController extends Controller
{
    public function __construct(private DonHangService $service) {}

    /**
     * Danh sách đơn hàng (Admin)
     *
     * @queryParam trang_thai string Lọc theo trạng thái (cho_xac_nhan, da_giao...). Example: cho_xac_nhan
     * @queryParam phuong_thuc_tt string Lọc theo phương thức thanh toán (cod, vnpay, momo). Example: cod
     * @queryParam tu_khoa string Tìm theo mã đơn hoặc tên khách hàng. Example: DH123
     * @queryParam tu_ngay string Từ ngày (Y-m-d). Example: 2025-01-01
     * @queryParam den_ngay string Đến ngày (Y-m-d). Example: 2025-12-31
     */
    public function index(Request $request): JsonResponse
    {
        if (!$request->user()->hasPermission('xem_don')) {
            return ApiResponse::error('Bạn không có quyền xem danh sách đơn hàng.', 403);
        }

        $query = DonHang::with('nguoiDung');

        // Lọc theo trạng thái đơn
        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }

        // Lọc theo phương thức thanh toán
        if ($request->filled('phuong_thuc_tt')) {
            $query->where('phuong_thuc_tt', $request->phuong_thuc_tt);
        }

        // Tìm kiếm theo mã đơn hoặc tên/SĐT người nhận
        if ($request->filled('tu_khoa')) {
            $kw = $request->tu_khoa;
            $query->where(function ($q) use ($kw) {
                $q->where('ma_don_hang', 'like', "%$kw%")
                  ->orWhere('ten_nguoi_nhan', 'like', "%$kw%")
                  ->orWhere('sdt_nguoi_nhan', 'like', "%$kw%");
            });
        }

        // Lọc theo khoảng ngày (chuyển về UTC để khớp với DB)
        if ($request->filled('tu_ngay')) {
            $tuNgay = Carbon::createFromFormat('Y-m-d', $request->tu_ngay, 'Asia/Ho_Chi_Minh')
                ->startOfDay()->utc();
            $query->where('created_at', '>=', $tuNgay);
        }
        if ($request->filled('den_ngay')) {
            $denNgay = Carbon::createFromFormat('Y-m-d', $request->den_ngay, 'Asia/Ho_Chi_Minh')
                ->endOfDay()->utc();
            $query->where('created_at', '<=', $denNgay);
        }

        $orders = $query->latest()->paginate(20);
        return ApiResponse::paginate($orders, '[Admin] Danh sách đơn hàng');
    }

    /**
     * Chi tiết đơn hàng (Admin)
     *
     * @urlParam id int required ID đơn hàng. Example: 1
     */
    public function show(int $id): JsonResponse
    {
        if (!auth()->user()->hasPermission('xem_don')) {
            return ApiResponse::error('Bạn không có quyền xem chi tiết đơn hàng.', 403);
        }
        $order = DonHang::with(['items.sanPham', 'nguoiDung', 'lichSuTrangThai', 'thanhToan'])->findOrFail($id);
        return ApiResponse::success($order, '[Admin] Chi tiết đơn hàng');
    }

    /**
     * Cập nhật trạng thái đơn
     *
     * @urlParam id int required ID đơn hàng. Example: 1
     * @bodyParam trang_thai string required Trạng thái mới (cho_xac_nhan, da_xac_nhan, dang_xu_ly, dang_giao, da_giao, da_huy, hoan_tra). Example: da_xac_nhan
     * @bodyParam ghi_chu string Ghi chú cập nhật (VD: Đã gọi xác nhận). Example: Khách hàng đồng ý giao chiều nay.
     */
    public function updateStatus(Request $request, int $id): JsonResponse
    {
        if (!$request->user()->hasPermission('cap_nhat_don')) {
            return ApiResponse::error('Bạn không có quyền cập nhật trạng thái đơn hàng.', 403);
        }
        $data = $request->validate([
            'trang_thai' => 'required|in:cho_xac_nhan,da_xac_nhan,dang_xu_ly,dang_giao,da_giao,da_huy,hoan_tra',
            'ghi_chu'    => 'nullable|string|max:500',
        ]);
        $order = DonHang::findOrFail($id);
        $updated = $this->service->updateStatus($order, $data['trang_thai'], $data['ghi_chu'] ?? '', $request->user());
        return ApiResponse::success($updated, '[Admin] Đã cập nhật trạng thái đơn hàng');
    }
}
