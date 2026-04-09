<?php

namespace App\Services;

use App\Models\DanhMuc;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PromotionTargetingService
{
    /**
     * Mở rộng danh sách danh mục: nếu chọn danh mục cha thì include cả con.
     */
    public function expandCategoryIds(array $danhMucIds): array
    {
        $childIds = DanhMuc::whereIn('danh_muc_cha_id', $danhMucIds)->pluck('id')->toArray();
        return array_values(array_unique(array_merge($danhMucIds, $childIds)));
    }

    /**
     * Tìm users mục tiêu dựa trên danh mục sản phẩm.
     * Kết hợp 3 nguồn: lịch sử mua hàng, hành vi duyệt web, yêu thích.
     */
    public function findTargetUsers(array $danhMucIds): Collection
    {
        $allCategoryIds = $this->expandCategoryIds($danhMucIds);

        // Nguồn 1: Users đã MUA sản phẩm thuộc các danh mục (đơn không bị hủy/hoàn)
        $fromOrders = DB::table('don_hang as dh')
            ->join('chi_tiet_don_hang as ct', 'ct.don_hang_id', '=', 'dh.id')
            ->join('san_pham as sp', 'sp.id', '=', 'ct.san_pham_id')
            ->whereIn('sp.danh_muc_id', $allCategoryIds)
            ->whereNotIn('dh.trang_thai', ['da_huy', 'hoan_tra'])
            ->whereNotNull('dh.nguoi_dung_id')
            ->distinct()
            ->pluck('dh.nguoi_dung_id');

        // Nguồn 2: Users có HÀNH VI với sản phẩm thuộc danh mục
        $fromBehaviors = DB::table('hanh_vi_nguoi_dung as hv')
            ->join('san_pham as sp', 'sp.id', '=', 'hv.san_pham_id')
            ->whereIn('sp.danh_muc_id', $allCategoryIds)
            ->whereNotNull('hv.nguoi_dung_id')
            ->distinct()
            ->pluck('hv.nguoi_dung_id');

        // Nguồn 3: Users đã YÊU THÍCH sản phẩm thuộc danh mục
        $fromWishlist = DB::table('yeu_thich as yt')
            ->join('san_pham as sp', 'sp.id', '=', 'yt.san_pham_id')
            ->whereIn('sp.danh_muc_id', $allCategoryIds)
            ->distinct()
            ->pluck('yt.nguoi_dung_id');

        // Union tất cả, lọc chỉ khách hàng active
        $allUserIds = $fromOrders
            ->merge($fromBehaviors)
            ->merge($fromWishlist)
            ->unique()
            ->values();

        $activeUserIds = DB::table('nguoi_dung')
            ->whereIn('id', $allUserIds)
            ->where('trang_thai', true)
            ->where('vai_tro', 'khach_hang')
            ->pluck('id');

        return $activeUserIds;
    }

    /**
     * Trả về thống kê chi tiết số lượng user theo từng nguồn.
     */
    public function previewTargetCount(array $danhMucIds): array
    {
        $allCategoryIds = $this->expandCategoryIds($danhMucIds);

        $fromOrders = DB::table('don_hang as dh')
            ->join('chi_tiet_don_hang as ct', 'ct.don_hang_id', '=', 'dh.id')
            ->join('san_pham as sp', 'sp.id', '=', 'ct.san_pham_id')
            ->whereIn('sp.danh_muc_id', $allCategoryIds)
            ->whereNotIn('dh.trang_thai', ['da_huy', 'hoan_tra'])
            ->whereNotNull('dh.nguoi_dung_id')
            ->distinct()
            ->pluck('dh.nguoi_dung_id');

        $fromBehaviors = DB::table('hanh_vi_nguoi_dung as hv')
            ->join('san_pham as sp', 'sp.id', '=', 'hv.san_pham_id')
            ->whereIn('sp.danh_muc_id', $allCategoryIds)
            ->whereNotNull('hv.nguoi_dung_id')
            ->distinct()
            ->pluck('hv.nguoi_dung_id');

        $fromWishlist = DB::table('yeu_thich as yt')
            ->join('san_pham as sp', 'sp.id', '=', 'yt.san_pham_id')
            ->whereIn('sp.danh_muc_id', $allCategoryIds)
            ->distinct()
            ->pluck('yt.nguoi_dung_id');

        $allUserIds = $fromOrders
            ->merge($fromBehaviors)
            ->merge($fromWishlist)
            ->unique()
            ->values();

        $activeCount = DB::table('nguoi_dung')
            ->whereIn('id', $allUserIds)
            ->where('trang_thai', true)
            ->where('vai_tro', 'khach_hang')
            ->count();

        $totalAll = DB::table('nguoi_dung')
            ->where('trang_thai', true)
            ->where('vai_tro', 'khach_hang')
            ->count();

        return [
            'tong_muc_tieu'   => $activeCount,
            'tong_tat_ca'     => $totalAll,
            'tu_mua_hang'     => $fromOrders->count(),
            'tu_hanh_vi'      => $fromBehaviors->count(),
            'tu_yeu_thich'    => $fromWishlist->count(),
            'danh_muc_ids'    => $danhMucIds,
            'danh_muc_mo_rong' => $allCategoryIds,
        ];
    }
}
