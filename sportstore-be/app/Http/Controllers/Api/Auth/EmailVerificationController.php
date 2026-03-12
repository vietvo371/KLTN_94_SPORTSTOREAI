<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/**
 * @group 1. Xác thực & Tài khoản
 * @subgroup Quản lý Xác thực Email
 */
class EmailVerificationController extends Controller
{
    /**
     * Gửi lại email xác thực
     * 
     * Dành cho người dùng đã đăng nhập nhưng chưa xác thực email.
     * @authenticated
     */
    public function resend(Request $request): JsonResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return ApiResponse::error('Email đã được xác thực trước đó.', 400);
        }

        $request->user()->sendEmailVerificationNotification();

        return ApiResponse::success(null, 'Đã gửi lại link xác thực vào email của bạn.');
    }

    /**
     * Xử lý click vào link xác thực từ email.
     * 
     * Link này được Laravel tự động sinh ra kèm mã hash và chữ ký bảo mật.
     * @urlParam id int required ID người dùng.
     * @urlParam hash string required Mã hash xác thực.
     */
    public function verify(EmailVerificationRequest $request): JsonResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return ApiResponse::success(null, 'Email đã được xác thực thành công.');
        }

        if ($request->user()->markEmailAsVerified()) {
            // Có thể bắn event UserVerified tại đây nếu cần
        }

        return ApiResponse::success(null, 'Xác thực email thành công! Chào mừng bạn.');
    }
}
