<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\ThuongHieu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @group 6. Quản trị viên (Admin)
 * @subgroup Quản lý Thương hiệu
 * @authenticated
 */
class ThuongHieuAdminController extends Controller
{
    /**
     * Danh sách thương hiệu (Admin)
     */
    public function index(): JsonResponse
    {
        return ApiResponse::paginate(ThuongHieu::paginate(20), '[Admin] Thương hiệu');
    }

    /**
     * Tạo thương hiệu mới
     *
     * @bodyParam ten string required Tên thương hiệu. Example: Nike
     * @bodyParam mo_ta string Mô tả chi tiết. Example: Thương hiệu toàn cầu.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate(['ten' => 'required|string|max:100', 'mo_ta' => 'nullable|string']);
        $data['duong_dan'] = Str::slug($data['ten']);
        return ApiResponse::created(ThuongHieu::create($data), '[Admin] Đã tạo thương hiệu');
    }
    public function show(int $id): JsonResponse { return ApiResponse::success(ThuongHieu::findOrFail($id), '[Admin] Chi tiết thương hiệu'); }
    public function update(Request $request, int $id): JsonResponse
    {
        $b = ThuongHieu::findOrFail($id);
        $b->update($request->validate(['ten' => 'sometimes|string', 'trang_thai' => 'boolean']));
        return ApiResponse::success($b, '[Admin] Cập nhật thương hiệu');
    }
    public function destroy(int $id): JsonResponse
    {
        ThuongHieu::findOrFail($id)->delete();
        return ApiResponse::deleted('[Admin] Đã xóa thương hiệu');
    }
}
