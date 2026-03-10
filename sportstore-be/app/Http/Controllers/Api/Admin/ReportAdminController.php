<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\DonHang;
use App\Models\NguoiDung;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * @group 6. Quản trị viên (Admin)
 * @subgroup Báo cáo & Thống kê
 * @authenticated
 */
class ReportAdminController extends Controller
{
    /**
     * Tổng quan thống kê (Overview)
     *
     * @queryParam period string Khoảng thời gian (today, week, month, year). Default: month
     */
    public function overview(Request $request): JsonResponse
    {
        $period = $request->query('period', 'month');
        $dateQuery = $this->getDateRange($period);
        $startDate = $dateQuery['start'];
        $endDate = $dateQuery['end'];

        // Lấy khoảng thời gian trước đó để tính % tăng trưởng (tham khảo)
        $previousStartDate = $dateQuery['prev_start'];
        $previousEndDate = $dateQuery['prev_end'];

        // 1. Tổng doanh thu (Chỉ tính đơn đã giao)
        $totalRevenue = DonHang::where('trang_thai', 'da_giao')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('tong_tien');

        $prevRevenue = DonHang::where('trang_thai', 'da_giao')
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->sum('tong_tien');

        // 2. Tổng số đơn hàng mới
        $totalOrders = DonHang::whereBetween('created_at', [$startDate, $endDate])->count();
        $prevOrders = DonHang::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        // 3. Khách hàng mới
        $newCustomers = NguoiDung::where('vai_tro', 'khach_hang')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
        $prevCustomers = NguoiDung::where('vai_tro', 'khach_hang')
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->count();
            
        // 4. Sản phẩm đã bán
        $productsSold = DB::table('chi_tiet_don_hang')
            ->join('don_hang', 'chi_tiet_don_hang.don_hang_id', '=', 'don_hang.id')
            ->where('don_hang.trang_thai', 'da_giao')
            ->whereBetween('don_hang.created_at', [$startDate, $endDate])
            ->sum('chi_tiet_don_hang.so_luong') ?? 0;

        $prevProductsSold = DB::table('chi_tiet_don_hang')
            ->join('don_hang', 'chi_tiet_don_hang.don_hang_id', '=', 'don_hang.id')
            ->where('don_hang.trang_thai', 'da_giao')
            ->whereBetween('don_hang.created_at', [$previousStartDate, $previousEndDate])
            ->sum('chi_tiet_don_hang.so_luong') ?? 0;

        return ApiResponse::success([
            'revenue' => [
                'value' => (float) $totalRevenue,
                'growth' => $this->calculateGrowth($totalRevenue, $prevRevenue)
            ],
            'orders' => [
                'value' => $totalOrders,
                'growth' => $this->calculateGrowth($totalOrders, $prevOrders)
            ],
            'customers' => [
                'value' => $newCustomers,
                'growth' => $this->calculateGrowth($newCustomers, $prevCustomers)
            ],
            'products_sold' => [
                'value' => (int) $productsSold,
                'growth' => $this->calculateGrowth($productsSold, $prevProductsSold)
            ],
        ], '[Admin] Dữ liệu tổng quan báo cáo');
    }

    /**
     * Dữ liệu biểu đồ doanh thu (Revenue Chart)
     *
     * @queryParam period string Khoảng thời gian (week, month, year). Default: month
     */
    public function revenueChart(Request $request): JsonResponse
    {
        $period = $request->query('period', 'month');
        $dateQuery = $this->getDateRange($period);
        $startDate = $dateQuery['start'];
        $endDate = $dateQuery['end'];

        // Tùy theo period mà ta group by ngày hoặc tháng
        $groupByFormat = '%Y-%m-%d'; // Mặc định group theo ngày
        if ($period === 'year') {
            $groupByFormat = '%Y-%m'; // Nếu là năm, group theo tháng
        }

        $chartData = DonHang::where('trang_thai', 'da_giao')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(
                DB::raw("DATE_FORMAT(created_at, '{$groupByFormat}') as date"),
                DB::raw('SUM(tong_tien) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return ApiResponse::success($chartData, '[Admin] Dữ liệu biểu đồ doanh thu');
    }

    /**
     * Top sản phẩm bán chạy (Top Products)
     */
    public function topProducts(Request $request): JsonResponse
    {
        $limit = $request->query('limit', 5);

        $topProducts = DB::table('chi_tiet_don_hang')
            ->join('don_hang', 'chi_tiet_don_hang.don_hang_id', '=', 'don_hang.id')
            ->join('san_pham', 'chi_tiet_don_hang.san_pham_id', '=', 'san_pham.id')
            ->leftJoin('hinh_anh_san_pham', function($join) {
                 $join->on('san_pham.id', '=', 'hinh_anh_san_pham.san_pham_id')
                      ->where('hinh_anh_san_pham.la_anh_chinh', 1);
            })
            ->where('don_hang.trang_thai', 'da_giao')
            ->select(
                'san_pham.id',
                'san_pham.ten_san_pham',
                'san_pham.gia_goc',
                'san_pham.gia_khuyen_mai',
                DB::raw('MAX(hinh_anh_san_pham.duong_dan_anh) as image'),
                DB::raw('SUM(chi_tiet_don_hang.so_luong) as total_sold'),
                DB::raw('SUM(chi_tiet_don_hang.thanh_tien) as total_revenue')
            )
            ->groupBy('san_pham.id', 'san_pham.ten_san_pham', 'san_pham.gia_goc', 'san_pham.gia_khuyen_mai')
            ->orderByDesc('total_sold')
            ->limit($limit)
            ->get();

        return ApiResponse::success($topProducts, '[Admin] Top sản phẩm bán chạy');
    }

    /* Helper functions */
    private function getDateRange($period)
    {
        $now = Carbon::now();
        $start = clone $now;
        
        $prevEnd = clone $now;
        $prevStart = clone $now;

        switch ($period) {
            case 'today':
                $start->startOfDay();
                $prevEnd->subDay()->endOfDay();
                $prevStart->subDay()->startOfDay();
                break;
            case 'week':
                $start->startOfWeek();
                $prevEnd->subWeek()->endOfWeek();
                $prevStart->subWeek()->startOfWeek();
                break;
            case 'year':
                $start->startOfYear();
                $prevEnd->subYear()->endOfYear();
                $prevStart->subYear()->startOfYear();
                break;
            case 'month':
            default:
                $start->startOfMonth();
                $prevEnd->subMonth()->endOfMonth();
                $prevStart->subMonth()->startOfMonth();
                break;
        }

        return [
            'start' => $start,
            'end' => clone $now,
            'prev_start' => $prevStart,
            'prev_end' => $prevEnd,
        ];
    }

    private function calculateGrowth($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        $growth = (($current - $previous) / $previous) * 100;
        return round($growth, 1);
    }
}
