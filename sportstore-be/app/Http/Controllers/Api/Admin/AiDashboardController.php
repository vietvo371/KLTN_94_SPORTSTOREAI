<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\HanhViNguoiDung;
use App\Models\NguoiDung;
use App\Models\SanPham;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AiDashboardController extends Controller
{
    private string $aiUrl;

    public function __construct()
    {
        $this->aiUrl = config('services.ai_service.url');
    }

    /**
     * Tổng quan hệ thống AI: thống kê hành vi, danh sách user có hành vi.
     */
    public function overview(): JsonResponse
    {
        // 1. Thống kê hành vi
        $behaviorStats = HanhViNguoiDung::selectRaw('hanh_vi, count(*) as cnt')
            ->groupBy('hanh_vi')
            ->pluck('cnt', 'hanh_vi');

        $totalRecords       = HanhViNguoiDung::count();
        $usersWithBehavior  = HanhViNguoiDung::whereNotNull('nguoi_dung_id')->distinct('nguoi_dung_id')->count();
        $guestRecords       = HanhViNguoiDung::whereNull('nguoi_dung_id')->count();
        $totalCustomers     = NguoiDung::where('vai_tro', 'khach_hang')->count();

        // 2. Trọng số theo loại hành vi (từ ml_engine.py)
        $weights = [
            'mua_hang'      => 5.0,
            'them_gio_hang' => 4.0,
            'yeu_thich'     => 3.0,
            'click'         => 2.0,
            'xem'           => 1.0,
        ];

        // 3. Top 10 user tương tác nhiều nhất (có đăng nhập)
        $topUsers = HanhViNguoiDung::whereNotNull('nguoi_dung_id')
            ->selectRaw('nguoi_dung_id, count(*) as tong_hv,
                sum(case when hanh_vi="mua_hang" then 1 else 0 end) as mua,
                sum(case when hanh_vi="yeu_thich" then 1 else 0 end) as yeu_thich,
                sum(case when hanh_vi="them_gio_hang" then 1 else 0 end) as them_gio,
                sum(case when hanh_vi="xem" then 1 else 0 end) as xem')
            ->groupBy('nguoi_dung_id')
            ->orderByDesc('tong_hv')
            ->take(10)
            ->get()
            ->map(function ($row) {
                $user = NguoiDung::find($row->nguoi_dung_id, ['id', 'ho_va_ten', 'email', 'anh_dai_dien']);
                return [
                    'user'      => $user,
                    'tong_hv'   => $row->tong_hv,
                    'mua'       => $row->mua,
                    'yeu_thich' => $row->yeu_thich,
                    'them_gio'  => $row->them_gio,
                    'xem'       => $row->xem,
                ];
            });

        // 4. Matrix size từ AI service
        $matrixSize = null;
        try {
            $res = Http::timeout(2)->get("{$this->aiUrl}/api/v1/recommend/debug/1");
            if ($res->successful()) {
                $matrixSize = $res->json('matrix_size');
            }
        } catch (\Throwable) {}

        return ApiResponse::success([
            'stats' => [
                'tong_hanh_vi'        => $totalRecords,
                'users_co_hanh_vi'    => $usersWithBehavior,
                'tong_khach_hang'     => $totalCustomers,
                'hanh_vi_guest'       => $guestRecords,
                'matrix_size'         => $matrixSize,
                'theo_loai'           => $behaviorStats,
            ],
            'trong_so'  => $weights,
            'top_users' => $topUsers,
        ], 'Tổng quan AI');
    }

    /**
     * Chi tiết AI profile của 1 user: lịch sử + gợi ý + điểm dự báo.
     */
    public function userProfile(int $userId): JsonResponse
    {
        $user = NguoiDung::findOrFail($userId, ['id', 'ho_va_ten', 'email', 'anh_dai_dien']);

        // Gọi AI debug endpoint
        try {
            $res = Http::timeout(5)->get("{$this->aiUrl}/api/v1/recommend/debug/{$userId}");
        } catch (\Throwable $e) {
            return ApiResponse::error('AI service không phản hồi: ' . $e->getMessage(), 503);
        }

        if (!$res->successful()) {
            return ApiResponse::error('AI service lỗi', 500);
        }

        $aiData = $res->json();

        // Enrich history với tên sản phẩm
        $historyRaw  = $aiData['user_history'] ?? [];
        $historyIds  = array_map('intval', array_keys($historyRaw));
        $historyProds = SanPham::with('anhChinh')
            ->whereIn('id', $historyIds)
            ->get(['id', 'ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'danh_muc_id'])
            ->keyBy('id');

        $history = collect($historyIds)->map(function ($id) use ($historyRaw, $historyProds) {
            $info = $historyRaw[(string) $id] ?? $historyRaw[$id] ?? [];
            $prod = $historyProds[$id] ?? null;
            return [
                'san_pham_id'    => $id,
                'ten_san_pham'   => $prod?->ten_san_pham ?? 'SP #' . $id,
                'hinh_anh'       => $prod?->anhChinh?->duong_dan_anh,
                'diem_tuong_tac' => $info['diem_tuong_tac'] ?? 0,
                'hanh_vi_label'  => $info['hanh_vi'] ?? '',
            ];
        })->sortByDesc('diem_tuong_tac')->values();

        // Enrich top10 scores với tên sản phẩm
        $scoresRaw   = $aiData['top10_predicted_scores'] ?? [];
        $scoreIds    = array_column($scoresRaw, 'san_pham_id');
        $scoreProds  = SanPham::with('anhChinh')
            ->whereIn('id', $scoreIds)
            ->get(['id', 'ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'danh_muc_id'])
            ->keyBy('id');

        $scores = collect($scoresRaw)->map(function ($s) use ($scoreProds) {
            $prod = $scoreProds[$s['san_pham_id']] ?? null;
            return [
                'san_pham_id'   => $s['san_pham_id'],
                'ten_san_pham'  => $prod?->ten_san_pham ?? 'SP #' . $s['san_pham_id'],
                'hinh_anh'      => $prod?->anhChinh?->duong_dan_anh,
                'diem_du_bao'   => $s['diem_du_bao'],
            ];
        });

        // Enrich recommended IDs
        $recIds   = $aiData['recommended_ids'] ?? [];
        $recProds = SanPham::with(['anhChinh', 'danhMuc'])
            ->whereIn('id', $recIds)
            ->where('trang_thai', true)
            ->get(['id', 'duong_dan', 'ten_san_pham', 'gia_goc', 'gia_khuyen_mai', 'danh_muc_id'])
            ->keyBy('id');

        $recommendations = collect($recIds)->map(fn($id) => $recProds[$id] ?? null)->filter()->values();

        return ApiResponse::success([
            'user'             => $user,
            'mode'             => $aiData['mode'] ?? 'UNKNOWN',
            'matrix_size'      => $aiData['matrix_size'] ?? null,
            'hanh_vi_history'  => $history,
            'top10_scores'     => $scores,
            'goi_y'            => $recommendations,
        ], 'AI Profile');
    }

    /**
     * Danh sách user có hành vi để hiện dropdown.
     */
    public function userList(): JsonResponse
    {
        $ids = HanhViNguoiDung::whereNotNull('nguoi_dung_id')
            ->distinct('nguoi_dung_id')
            ->pluck('nguoi_dung_id');

        $users = NguoiDung::whereIn('id', $ids)
            ->get(['id', 'ho_va_ten', 'email'])
            ->map(fn($u) => [
                'id'        => $u->id,
                'ho_va_ten' => $u->ho_va_ten,
                'email'     => $u->email,
            ]);

        return ApiResponse::success($users, 'Danh sách user có hành vi');
    }
}
