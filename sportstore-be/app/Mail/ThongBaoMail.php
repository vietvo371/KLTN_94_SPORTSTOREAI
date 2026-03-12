<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Master Mailable tái sử dụng cho mọi loại thông báo.
 * 
 * Dùng chung cho: đặt hàng, xác nhận đơn, cập nhật trạng thái, khuyến mãi, hệ thống...
 */
class ThongBaoMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $tieuDe,
        public readonly string $noiDung,
        public readonly string $loai = 'he_thong',       // don_hang | khuyen_mai | he_thong
        public readonly ?string $hanhDongUrl = null,      // URL nút CTA (nếu có)
        public readonly ?string $hanhDongText = null,     // Text nút CTA
        public readonly array $duLieuThem = [],           // Dữ liệu bổ sung hiển thị trong mail
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: '[SportStore] ' . $this->tieuDe);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.thong-bao');
    }

    public function attachments(): array
    {
        return [];
    }
}
