---
description: triển khai Google OAuth login và Guest Cart merge API cho sportstore-be
---

# Auth Enhancement – Backend

## Phase 1: Google OAuth

### Package

```bash
composer require laravel/socialite
```

### Files đã tạo

- `app/Http/Controllers/Api/Auth/GoogleAuthController.php`
  - `GET /api/auth/google/redirect` – trả về Google Auth URL
  - `POST /api/auth/google/callback` – nhận `code`, exchange, trả token
- `app/Services/GoogleAuthService.php`
  - `loginOrCreate()`: tìm theo `google_id` → `email` → tạo mới

### Migration (sửa trực tiếp, không tạo migration mới)

`database/migrations/2025_03_01_000001_create_nguoi_dung_table.php`:
```php
$table->string('mat_khau')->nullable();   // Google users không có password
$table->string('google_id')->nullable()->unique();
```

### Model `NguoiDung` fillable

```php
'google_id', 'xac_thuc_email_luc'   // đã thêm vào $fillable
```

### .env

```
GOOGLE_CLIENT_ID=<từ Google Cloud Console>
GOOGLE_CLIENT_SECRET=<từ Google Cloud Console>
GOOGLE_REDIRECT_URI=http://localhost:3000/auth/callback  ← Frontend, KHÔNG phải Backend
```

### config/services.php

```php
'google' => [
    'client_id'     => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect'      => env('GOOGLE_REDIRECT_URI'),
],
```

### Routes (`routes/api.php`)

```php
Route::prefix('auth')->group(function () {
    Route::get('google/redirect',  [GoogleAuthController::class, 'redirectUrl']);
    Route::post('google/callback', [GoogleAuthController::class, 'handleCallback']);
});
```

### Google Cloud Console

- **Authorized redirect URIs**: `http://localhost:3000/auth/callback`
- ⚠️ KHÔNG dùng `localhost:8000/api/auth/google/callback` — phải trỏ về Frontend

---

## Phase 2: Guest Cart Merge API

### Route

```php
Route::post('cart/merge', [GioHangController::class, 'mergeGuestCart']);
```

### Controller – `mergeGuestCart()`

- Validate `items[].san_pham_id`, `items[].bien_the_id`, `items[].so_luong`
- Gọi `GioHangService::addItem()` cho từng item (tự tăng nếu trùng)
- Trả về giỏ mới sau merge

---

## Phase 3: Email Verification (TODO)

### Việc cần làm

```php
// 1. NguoiDung model implement MustVerifyEmail
class NguoiDung extends Authenticatable implements MustVerifyEmail {}

// 2. AuthService::register() gửi email
$user->sendEmailVerificationNotification();

// 3. Controller xử lý verify link
Route::get('auth/email/verify/{id}/{hash}', ...)
    ->middleware('signed');
```

### Mail config (.env hiện tại)

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME="vietvo371@gmail.com"
MAIL_PASSWORD="<16-char app password>"
MAIL_ENCRYPTION=tls
```

---

## Sau khi sửa migration

```bash
php artisan migrate:fresh --seed
```
