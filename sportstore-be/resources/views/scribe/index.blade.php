<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SportStore API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.8.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.8.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-1-dang-ky-dang-nhap" class="tocify-header">
                <li class="tocify-item level-1" data-unique="1-dang-ky-dang-nhap">
                    <a href="#1-dang-ky-dang-nhap">1. Đăng ký & Đăng nhập</a>
                </li>
                                    <ul id="tocify-subheader-1-dang-ky-dang-nhap" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="1-dang-ky-dang-nhap-xac-thuc-nguoi-dung-cac-api-lien-quan-den-dang-ky-dang-nhap-va-lay-thong-tin-phien-ban-nguoi-dung-hien-tai">
                                <a href="#1-dang-ky-dang-nhap-xac-thuc-nguoi-dung-cac-api-lien-quan-den-dang-ky-dang-nhap-va-lay-thong-tin-phien-ban-nguoi-dung-hien-tai">Xác thực người dùng

Các API liên quan đến đăng ký, đăng nhập và lấy thông tin phiên bản người dùng hiện tại</a>
                            </li>
                                                            <ul id="tocify-subheader-1-dang-ky-dang-nhap-xac-thuc-nguoi-dung-cac-api-lien-quan-den-dang-ky-dang-nhap-va-lay-thong-tin-phien-ban-nguoi-dung-hien-tai" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="1-dang-ky-dang-nhap-POSTapi-v1-auth-register">
                                            <a href="#1-dang-ky-dang-nhap-POSTapi-v1-auth-register">Đăng ký tài khoản</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="1-dang-ky-dang-nhap-POSTapi-v1-auth-login">
                                            <a href="#1-dang-ky-dang-nhap-POSTapi-v1-auth-login">Đăng nhập</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="1-dang-ky-dang-nhap-POSTapi-v1-auth-logout">
                                            <a href="#1-dang-ky-dang-nhap-POSTapi-v1-auth-logout">Đăng xuất</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="1-dang-ky-dang-nhap-GETapi-v1-auth-me">
                                            <a href="#1-dang-ky-dang-nhap-GETapi-v1-auth-me">Lấy thông tin cá nhân</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="1-dang-ky-dang-nhap-PUTapi-v1-auth-me">
                                            <a href="#1-dang-ky-dang-nhap-PUTapi-v1-auth-me">Cập nhật thông tin cá nhân</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-2-san-pham-danh-muc-khach-hang" class="tocify-header">
                <li class="tocify-item level-1" data-unique="2-san-pham-danh-muc-khach-hang">
                    <a href="#2-san-pham-danh-muc-khach-hang">2. Sản phẩm & Danh mục (Khách hàng)</a>
                </li>
                                    <ul id="tocify-subheader-2-san-pham-danh-muc-khach-hang" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="2-san-pham-danh-muc-khach-hang-danh-muc-nen-tang-cho-phep-khach-hang-xem-danh-sach-cac-danh-muc-the-thao-hien-co">
                                <a href="#2-san-pham-danh-muc-khach-hang-danh-muc-nen-tang-cho-phep-khach-hang-xem-danh-sach-cac-danh-muc-the-thao-hien-co">Danh mục nền tảng

Cho phép khách hàng xem danh sách các danh mục thể thao hiện có.</a>
                            </li>
                                                            <ul id="tocify-subheader-2-san-pham-danh-muc-khach-hang-danh-muc-nen-tang-cho-phep-khach-hang-xem-danh-sach-cac-danh-muc-the-thao-hien-co" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-GETapi-v1-categories">
                                            <a href="#2-san-pham-danh-muc-khach-hang-GETapi-v1-categories">Danh sách danh mục</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-GETapi-v1-categories--slug-">
                                            <a href="#2-san-pham-danh-muc-khach-hang-GETapi-v1-categories--slug-">Chi tiết danh mục</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="2-san-pham-danh-muc-khach-hang-thuong-hieu-lay-danh-sach-thuong-hieu-doi-tac-cua-he-thong">
                                <a href="#2-san-pham-danh-muc-khach-hang-thuong-hieu-lay-danh-sach-thuong-hieu-doi-tac-cua-he-thong">Thương hiệu

Lấy danh sách thương hiệu đối tác của hệ thống.</a>
                            </li>
                                                            <ul id="tocify-subheader-2-san-pham-danh-muc-khach-hang-thuong-hieu-lay-danh-sach-thuong-hieu-doi-tac-cua-he-thong" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-GETapi-v1-brands">
                                            <a href="#2-san-pham-danh-muc-khach-hang-GETapi-v1-brands">Danh sách thương hiệu</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="2-san-pham-danh-muc-khach-hang-cua-hang-nhom-api-hien-thi-thong-tin-san-pham-danh-cho-khach-hang-tham-quan-ung-dung">
                                <a href="#2-san-pham-danh-muc-khach-hang-cua-hang-nhom-api-hien-thi-thong-tin-san-pham-danh-cho-khach-hang-tham-quan-ung-dung">Cửa hàng

Nhóm API hiển thị thông tin sản phẩm dành cho khách hàng tham quan ứng dụng.</a>
                            </li>
                                                            <ul id="tocify-subheader-2-san-pham-danh-muc-khach-hang-cua-hang-nhom-api-hien-thi-thong-tin-san-pham-danh-cho-khach-hang-tham-quan-ung-dung" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-GETapi-v1-products">
                                            <a href="#2-san-pham-danh-muc-khach-hang-GETapi-v1-products">Lấy danh sách sản phẩm</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-GETapi-v1-products--slug-">
                                            <a href="#2-san-pham-danh-muc-khach-hang-GETapi-v1-products--slug-">Xem chi tiết sản phẩm</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="2-san-pham-danh-muc-khach-hang-banner-trang-chu-quan-ly-hien-thi-banner-dong-tren-giao-dien-cua-hang">
                                <a href="#2-san-pham-danh-muc-khach-hang-banner-trang-chu-quan-ly-hien-thi-banner-dong-tren-giao-dien-cua-hang">Banner Trang chủ

Quản lý hiển thị Banner động trên giao diện Cửa hàng.</a>
                            </li>
                                                            <ul id="tocify-subheader-2-san-pham-danh-muc-khach-hang-banner-trang-chu-quan-ly-hien-thi-banner-dong-tren-giao-dien-cua-hang" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-GETapi-v1-banners">
                                            <a href="#2-san-pham-danh-muc-khach-hang-GETapi-v1-banners">Danh sách Banner</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="2-san-pham-danh-muc-khach-hang-danh-gia-san-pham">
                                <a href="#2-san-pham-danh-muc-khach-hang-danh-gia-san-pham">Đánh giá Sản phẩm</a>
                            </li>
                                                            <ul id="tocify-subheader-2-san-pham-danh-muc-khach-hang-danh-gia-san-pham" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-POSTapi-v1-reviews">
                                            <a href="#2-san-pham-danh-muc-khach-hang-POSTapi-v1-reviews">Gửi đánh giá</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="2-san-pham-danh-muc-khach-hang-GETapi-v1-reviews--id-">
                                            <a href="#2-san-pham-danh-muc-khach-hang-GETapi-v1-reviews--id-">Chi tiết đánh giá</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-3-gio-hang-thanh-toan" class="tocify-header">
                <li class="tocify-item level-1" data-unique="3-gio-hang-thanh-toan">
                    <a href="#3-gio-hang-thanh-toan">3. Giỏ hàng & Thanh toán</a>
                </li>
                                    <ul id="tocify-subheader-3-gio-hang-thanh-toan" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="3-gio-hang-thanh-toan-quan-ly-gio-hang-cho-phep-khach-hang-them-sua-xoa-san-pham-trong-gio-hang-ho-tro-ca-khach-vang-lai-luu-qua-header-x-session-id-va-nguoi-dung-da-dang-nhap-luu-qua-user-id">
                                <a href="#3-gio-hang-thanh-toan-quan-ly-gio-hang-cho-phep-khach-hang-them-sua-xoa-san-pham-trong-gio-hang-ho-tro-ca-khach-vang-lai-luu-qua-header-x-session-id-va-nguoi-dung-da-dang-nhap-luu-qua-user-id">Quản lý Giỏ hàng

Cho phép khách hàng thêm, sửa, xóa sản phẩm trong giỏ hàng.
Hỗ trợ cả khách vãng lai (lưu qua Header `X-Session-ID`) và người dùng đã đăng nhập (lưu qua User ID).</a>
                            </li>
                                                            <ul id="tocify-subheader-3-gio-hang-thanh-toan-quan-ly-gio-hang-cho-phep-khach-hang-them-sua-xoa-san-pham-trong-gio-hang-ho-tro-ca-khach-vang-lai-luu-qua-header-x-session-id-va-nguoi-dung-da-dang-nhap-luu-qua-user-id" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-GETapi-v1-cart">
                                            <a href="#3-gio-hang-thanh-toan-GETapi-v1-cart">Lấy thông tin giỏ hàng</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-POSTapi-v1-cart-items">
                                            <a href="#3-gio-hang-thanh-toan-POSTapi-v1-cart-items">Thêm sản phẩm vào giỏ</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-PUTapi-v1-cart-items--id-">
                                            <a href="#3-gio-hang-thanh-toan-PUTapi-v1-cart-items--id-">Cập nhật số lượng sản phẩm</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-DELETEapi-v1-cart-items--id-">
                                            <a href="#3-gio-hang-thanh-toan-DELETEapi-v1-cart-items--id-">Xóa sản phẩm khỏi giỏ</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-DELETEapi-v1-cart">
                                            <a href="#3-gio-hang-thanh-toan-DELETEapi-v1-cart">Xóa toàn bộ giỏ hàng</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="3-gio-hang-thanh-toan-ma-giam-gia">
                                <a href="#3-gio-hang-thanh-toan-ma-giam-gia">Mã giảm giá</a>
                            </li>
                                                            <ul id="tocify-subheader-3-gio-hang-thanh-toan-ma-giam-gia" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-POSTapi-v1-coupons-validate">
                                            <a href="#3-gio-hang-thanh-toan-POSTapi-v1-coupons-validate">Kiểm tra mã giảm giá</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="3-gio-hang-thanh-toan-thanh-toan-lich-su-don-hang-cho-phep-khach-hang-xem-lich-su-mua-hang-chi-tiet-don-va-thuc-hien-dat-hang-checkout">
                                <a href="#3-gio-hang-thanh-toan-thanh-toan-lich-su-don-hang-cho-phep-khach-hang-xem-lich-su-mua-hang-chi-tiet-don-va-thuc-hien-dat-hang-checkout">Thanh toán & Lịch sử đơn hàng

Cho phép khách hàng xem lịch sử mua hàng, chi tiết đơn và thực hiện đặt hàng (Checkout).</a>
                            </li>
                                                            <ul id="tocify-subheader-3-gio-hang-thanh-toan-thanh-toan-lich-su-don-hang-cho-phep-khach-hang-xem-lich-su-mua-hang-chi-tiet-don-va-thuc-hien-dat-hang-checkout" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-GETapi-v1-orders">
                                            <a href="#3-gio-hang-thanh-toan-GETapi-v1-orders">Danh sách Đơn hàng</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-POSTapi-v1-orders">
                                            <a href="#3-gio-hang-thanh-toan-POSTapi-v1-orders">Đặt hàng (Checkout)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="3-gio-hang-thanh-toan-GETapi-v1-orders--code-">
                                            <a href="#3-gio-hang-thanh-toan-GETapi-v1-orders--code-">Chi tiết đơn hàng</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-4-thong-tin-ca-nhan-dia-chi" class="tocify-header">
                <li class="tocify-item level-1" data-unique="4-thong-tin-ca-nhan-dia-chi">
                    <a href="#4-thong-tin-ca-nhan-dia-chi">4. Thông tin cá nhân & Địa chỉ</a>
                </li>
                                    <ul id="tocify-subheader-4-thong-tin-ca-nhan-dia-chi" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="4-thong-tin-ca-nhan-dia-chi-so-dia-chi-quan-ly-so-dia-chi-giao-hang-cua-nguoi-dung">
                                <a href="#4-thong-tin-ca-nhan-dia-chi-so-dia-chi-quan-ly-so-dia-chi-giao-hang-cua-nguoi-dung">Sổ địa chỉ

Quản lý sổ địa chỉ giao hàng của người dùng.</a>
                            </li>
                                                            <ul id="tocify-subheader-4-thong-tin-ca-nhan-dia-chi-so-dia-chi-quan-ly-so-dia-chi-giao-hang-cua-nguoi-dung" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-addresses">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-GETapi-v1-addresses">Danh sách địa chỉ</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-POSTapi-v1-addresses">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-POSTapi-v1-addresses">Thêm địa chỉ mới</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-addresses--id-">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-GETapi-v1-addresses--id-">Lấy chi tiết một địa chỉ</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-addresses--id-">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-addresses--id-">Cập nhật địa chỉ</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-DELETEapi-v1-addresses--id-">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-DELETEapi-v1-addresses--id-">Xóa địa chỉ</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="4-thong-tin-ca-nhan-dia-chi-yeu-thich">
                                <a href="#4-thong-tin-ca-nhan-dia-chi-yeu-thich">Yêu thích</a>
                            </li>
                                                            <ul id="tocify-subheader-4-thong-tin-ca-nhan-dia-chi-yeu-thich" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-wishlist">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-GETapi-v1-wishlist">Danh sách sản phẩm yêu thích</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-POSTapi-v1-wishlist--productId-">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-POSTapi-v1-wishlist--productId-">Thêm/Xóa yêu thích</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="4-thong-tin-ca-nhan-dia-chi-quan-ly-thong-bao-kiem-tra-cac-thong-bao-don-hang-khuyen-mai-he-thong-danh-rieng-cho-nguoi-dung">
                                <a href="#4-thong-tin-ca-nhan-dia-chi-quan-ly-thong-bao-kiem-tra-cac-thong-bao-don-hang-khuyen-mai-he-thong-danh-rieng-cho-nguoi-dung">Quản lý Thông báo

Kiểm tra các thông báo (đơn hàng, khuyến mãi, hệ thống...) dành riêng cho người dùng.</a>
                            </li>
                                                            <ul id="tocify-subheader-4-thong-tin-ca-nhan-dia-chi-quan-ly-thong-bao-kiem-tra-cac-thong-bao-don-hang-khuyen-mai-he-thong-danh-rieng-cho-nguoi-dung" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-notifications">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-GETapi-v1-notifications">Lấy danh sách thông báo</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-notifications--id--read">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-notifications--id--read">Đánh dấu 1 thông báo là đã đọc</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-notifications-read-all">
                                            <a href="#4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-notifications-read-all">Đánh dấu toàn bộ là đã đọc</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-6-quan-tri-vien-admin" class="tocify-header">
                <li class="tocify-item level-1" data-unique="6-quan-tri-vien-admin">
                    <a href="#6-quan-tri-vien-admin">6. Quản trị viên (Admin)</a>
                </li>
                                    <ul id="tocify-subheader-6-quan-tri-vien-admin" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="6-quan-tri-vien-admin-quan-ly-san-pham">
                                <a href="#6-quan-tri-vien-admin-quan-ly-san-pham">Quản lý Sản phẩm</a>
                            </li>
                                                            <ul id="tocify-subheader-6-quan-tri-vien-admin-quan-ly-san-pham" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-products">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-products">Danh sách sản phẩm (Admin)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-POSTapi-v1-admin-products">
                                            <a href="#6-quan-tri-vien-admin-POSTapi-v1-admin-products">Tạo sản phẩm mới</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-products--id-">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-products--id-">GET api/v1/admin/products/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-PUTapi-v1-admin-products--id-">
                                            <a href="#6-quan-tri-vien-admin-PUTapi-v1-admin-products--id-">PUT api/v1/admin/products/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-DELETEapi-v1-admin-products--id-">
                                            <a href="#6-quan-tri-vien-admin-DELETEapi-v1-admin-products--id-">DELETE api/v1/admin/products/{id}</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="6-quan-tri-vien-admin-quan-ly-danh-muc">
                                <a href="#6-quan-tri-vien-admin-quan-ly-danh-muc">Quản lý Danh mục</a>
                            </li>
                                                            <ul id="tocify-subheader-6-quan-tri-vien-admin-quan-ly-danh-muc" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-categories">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-categories">Danh sách danh mục (Admin)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-POSTapi-v1-admin-categories">
                                            <a href="#6-quan-tri-vien-admin-POSTapi-v1-admin-categories">Tạo danh mục mới</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-categories--id-">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-categories--id-">GET api/v1/admin/categories/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-PUTapi-v1-admin-categories--id-">
                                            <a href="#6-quan-tri-vien-admin-PUTapi-v1-admin-categories--id-">PUT api/v1/admin/categories/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-DELETEapi-v1-admin-categories--id-">
                                            <a href="#6-quan-tri-vien-admin-DELETEapi-v1-admin-categories--id-">DELETE api/v1/admin/categories/{id}</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="6-quan-tri-vien-admin-quan-ly-thuong-hieu">
                                <a href="#6-quan-tri-vien-admin-quan-ly-thuong-hieu">Quản lý Thương hiệu</a>
                            </li>
                                                            <ul id="tocify-subheader-6-quan-tri-vien-admin-quan-ly-thuong-hieu" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-brands">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-brands">Danh sách thương hiệu (Admin)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-POSTapi-v1-admin-brands">
                                            <a href="#6-quan-tri-vien-admin-POSTapi-v1-admin-brands">Tạo thương hiệu mới</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-brands--id-">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-brands--id-">GET api/v1/admin/brands/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-PUTapi-v1-admin-brands--id-">
                                            <a href="#6-quan-tri-vien-admin-PUTapi-v1-admin-brands--id-">PUT api/v1/admin/brands/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-DELETEapi-v1-admin-brands--id-">
                                            <a href="#6-quan-tri-vien-admin-DELETEapi-v1-admin-brands--id-">DELETE api/v1/admin/brands/{id}</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="6-quan-tri-vien-admin-quan-ly-don-hang">
                                <a href="#6-quan-tri-vien-admin-quan-ly-don-hang">Quản lý Đơn hàng</a>
                            </li>
                                                            <ul id="tocify-subheader-6-quan-tri-vien-admin-quan-ly-don-hang" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-orders">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-orders">Danh sách đơn hàng (Admin)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-orders--id-">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-orders--id-">Chi tiết đơn hàng (Admin)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-PUTapi-v1-admin-orders--id--status">
                                            <a href="#6-quan-tri-vien-admin-PUTapi-v1-admin-orders--id--status">Cập nhật trạng thái đơn</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="6-quan-tri-vien-admin-quan-ly-ma-giam-gia">
                                <a href="#6-quan-tri-vien-admin-quan-ly-ma-giam-gia">Quản lý Mã giảm giá</a>
                            </li>
                                                            <ul id="tocify-subheader-6-quan-tri-vien-admin-quan-ly-ma-giam-gia" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-coupons">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-coupons">Danh sách mã giảm giá (Admin)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-POSTapi-v1-admin-coupons">
                                            <a href="#6-quan-tri-vien-admin-POSTapi-v1-admin-coupons">Cấp mã giảm giá mới</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-coupons--id-">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-coupons--id-">GET api/v1/admin/coupons/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-PUTapi-v1-admin-coupons--id-">
                                            <a href="#6-quan-tri-vien-admin-PUTapi-v1-admin-coupons--id-">PUT api/v1/admin/coupons/{id}</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-DELETEapi-v1-admin-coupons--id-">
                                            <a href="#6-quan-tri-vien-admin-DELETEapi-v1-admin-coupons--id-">DELETE api/v1/admin/coupons/{id}</a>
                                        </li>
                                                                    </ul>
                                                                                <li class="tocify-item level-2" data-unique="6-quan-tri-vien-admin-quan-ly-danh-gia">
                                <a href="#6-quan-tri-vien-admin-quan-ly-danh-gia">Quản lý Đánh giá</a>
                            </li>
                                                            <ul id="tocify-subheader-6-quan-tri-vien-admin-quan-ly-danh-gia" class="tocify-subheader">
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-GETapi-v1-admin-reviews">
                                            <a href="#6-quan-tri-vien-admin-GETapi-v1-admin-reviews">Danh sách đánh giá (Admin)</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-PUTapi-v1-admin-reviews--id--approve">
                                            <a href="#6-quan-tri-vien-admin-PUTapi-v1-admin-reviews--id--approve">Duyệt đánh giá</a>
                                        </li>
                                                                            <li class="tocify-item level-3" data-unique="6-quan-tri-vien-admin-DELETEapi-v1-admin-reviews--id-">
                                            <a href="#6-quan-tri-vien-admin-DELETEapi-v1-admin-reviews--id-">Xóa đánh giá</a>
                                        </li>
                                                                    </ul>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-chatbot-message">
                                <a href="#endpoints-POSTapi-v1-chatbot-message">POST api/v1/chatbot/message</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-chatbot-history">
                                <a href="#endpoints-GETapi-v1-chatbot-history">GET api/v1/chatbot/history</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-recommendations">
                                <a href="#endpoints-GETapi-v1-recommendations">Lấy gợi ý sản phẩm từ Python AI service hoặc trả fallback.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-behaviors">
                                <a href="#endpoints-POSTapi-v1-behaviors">Ghi nhận hành vi người dùng cho ML.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 8, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Tài liệu tích hợp API cho dự án SportStore - Hệ thống bán lẻ Thể thao.</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>Chào mừng bạn đến với tài liệu API của SportStore.

API này phục vụ cho Frontend Next.js (Khách hàng) và Trang quản trị Admin. 
Tất cả các response trả về đều tuân theo chuẩn định dạng JSON thống nhất chung qua `ApiResponse` format.

&lt;aside&gt;Các đoạn code ví dụ (bash, javascript...) nằm ở bên sáng bên phải để bạn có thể tham khảo nhanh.&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>Sử dụng Bearer Token lấy từ API login để xác thực.</p>

        <h1 id="1-dang-ky-dang-nhap">1. Đăng ký & Đăng nhập</h1>

    

                        <h2 id="1-dang-ky-dang-nhap-xac-thuc-nguoi-dung-cac-api-lien-quan-den-dang-ky-dang-nhap-va-lay-thong-tin-phien-ban-nguoi-dung-hien-tai">Xác thực người dùng

Các API liên quan đến đăng ký, đăng nhập và lấy thông tin phiên bản người dùng hiện tại</h2>
                                                    <h2 id="1-dang-ky-dang-nhap-POSTapi-v1-auth-register">Đăng ký tài khoản</h2>

<p>
</p>

<p>Đăng ký thành viên mới cho SportStore. Mật khẩu sẽ được băm (hash) tự động.</p>

<span id="example-requests-POSTapi-v1-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ho_va_ten\": \"Nguyễn Văn A\",
    \"email\": \"nguyenva@email.com\",
    \"mat_khau\": \"password123\",
    \"mat_khau_confirmation\": \"password123\",
    \"so_dien_thoai\": \"0987654321\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ho_va_ten": "Nguyễn Văn A",
    "email": "nguyenva@email.com",
    "mat_khau": "password123",
    "mat_khau_confirmation": "password123",
    "so_dien_thoai": "0987654321"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth-register">
</span>
<span id="execution-results-POSTapi-v1-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth-register" data-method="POST"
      data-path="api/v1/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth-register"
                    onclick="tryItOut('POSTapi-v1-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth-register"
                    onclick="cancelTryOut('POSTapi-v1-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ho_va_ten</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ho_va_ten"                data-endpoint="POSTapi-v1-auth-register"
               value="Nguyễn Văn A"
               data-component="body">
    <br>
<p>Họ và tên người dùng. Example: <code>Nguyễn Văn A</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-auth-register"
               value="nguyenva@email.com"
               data-component="body">
    <br>
<p>Địa chỉ email hợp lệ. Example: <code>nguyenva@email.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mat_khau</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mat_khau"                data-endpoint="POSTapi-v1-auth-register"
               value="password123"
               data-component="body">
    <br>
<p>Mật khẩu (ít nhất 8 ký tự). Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mat_khau_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mat_khau_confirmation"                data-endpoint="POSTapi-v1-auth-register"
               value="password123"
               data-component="body">
    <br>
<p>Nhập lại mật khẩu để xác nhận. Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>so_dien_thoai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="so_dien_thoai"                data-endpoint="POSTapi-v1-auth-register"
               value="0987654321"
               data-component="body">
    <br>
<p>Số điện thoại liên hệ. Example: <code>0987654321</code></p>
        </div>
        </form>

                    <h2 id="1-dang-ky-dang-nhap-POSTapi-v1-auth-login">Đăng nhập</h2>

<p>
</p>

<p>Xác thực người dùng bằng Email và Mật khẩu. Sẽ trả về Access Token sử dụng cho các request sau.</p>

<span id="example-requests-POSTapi-v1-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"nguyenva@email.com\",
    \"mat_khau\": \"password123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "nguyenva@email.com",
    "mat_khau": "password123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth-login">
</span>
<span id="execution-results-POSTapi-v1-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth-login" data-method="POST"
      data-path="api/v1/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth-login"
                    onclick="tryItOut('POSTapi-v1-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth-login"
                    onclick="cancelTryOut('POSTapi-v1-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-v1-auth-login"
               value="nguyenva@email.com"
               data-component="body">
    <br>
<p>Email đã đăng ký. Example: <code>nguyenva@email.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mat_khau</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mat_khau"                data-endpoint="POSTapi-v1-auth-login"
               value="password123"
               data-component="body">
    <br>
<p>Mật khẩu đăng nhập. Example: <code>password123</code></p>
        </div>
        </form>

                    <h2 id="1-dang-ky-dang-nhap-POSTapi-v1-auth-logout">Đăng xuất</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Xóa bỏ Access Token hiện tại (Revoke) của người dùng. Yêu cầu truyền Header Authorization.</p>

<span id="example-requests-POSTapi-v1-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/auth/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/auth/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth-logout">
</span>
<span id="execution-results-POSTapi-v1-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth-logout" data-method="POST"
      data-path="api/v1/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth-logout"
                    onclick="tryItOut('POSTapi-v1-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth-logout"
                    onclick="cancelTryOut('POSTapi-v1-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-auth-logout"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="1-dang-ky-dang-nhap-GETapi-v1-auth-me">Lấy thông tin cá nhân</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Trả về thông tin chi tiết tài khoản của người dùng đang đăng nhập, bao gồm cả địa chỉ mặc định.</p>

<span id="example-requests-GETapi-v1-auth-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/auth/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/auth/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-auth-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-auth-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-auth-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-auth-me" data-method="GET"
      data-path="api/v1/auth/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-auth-me"
                    onclick="tryItOut('GETapi-v1-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-auth-me"
                    onclick="cancelTryOut('GETapi-v1-auth-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-auth-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/auth/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-auth-me"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="1-dang-ky-dang-nhap-PUTapi-v1-auth-me">Cập nhật thông tin cá nhân</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cập nhật Profile. Nếu muốn đổi mật khẩu thì cung cấp thêm <code>mat_khau_cu</code> và <code>mat_khau_moi</code>.</p>

<span id="example-requests-PUTapi-v1-auth-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/auth/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ho_va_ten\": \"Nguyễn Văn B\",
    \"so_dien_thoai\": \"0912345678\",
    \"mat_khau_cu\": \"password123\",
    \"mat_khau_moi\": \"newpassword456\",
    \"mat_khau_moi_confirmation\": \"newpassword456\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/auth/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ho_va_ten": "Nguyễn Văn B",
    "so_dien_thoai": "0912345678",
    "mat_khau_cu": "password123",
    "mat_khau_moi": "newpassword456",
    "mat_khau_moi_confirmation": "newpassword456"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-auth-me">
</span>
<span id="execution-results-PUTapi-v1-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-auth-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-auth-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-auth-me" data-method="PUT"
      data-path="api/v1/auth/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-auth-me"
                    onclick="tryItOut('PUTapi-v1-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-auth-me"
                    onclick="cancelTryOut('PUTapi-v1-auth-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-auth-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/auth/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-auth-me"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-auth-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ho_va_ten</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ho_va_ten"                data-endpoint="PUTapi-v1-auth-me"
               value="Nguyễn Văn B"
               data-component="body">
    <br>
<p>Họ và tên mới. Example: <code>Nguyễn Văn B</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>so_dien_thoai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="so_dien_thoai"                data-endpoint="PUTapi-v1-auth-me"
               value="0912345678"
               data-component="body">
    <br>
<p>Số điện thoại mới. Example: <code>0912345678</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mat_khau_cu</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mat_khau_cu"                data-endpoint="PUTapi-v1-auth-me"
               value="password123"
               data-component="body">
    <br>
<p>Mật khẩu hiện tại (bắt buộc nếu muốn đổi mật khẩu). Example: <code>password123</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mat_khau_moi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mat_khau_moi"                data-endpoint="PUTapi-v1-auth-me"
               value="newpassword456"
               data-component="body">
    <br>
<p>Mật khẩu mới thiết lập (chỉ gửi khi muốn đổi). Example: <code>newpassword456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mat_khau_moi_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mat_khau_moi_confirmation"                data-endpoint="PUTapi-v1-auth-me"
               value="newpassword456"
               data-component="body">
    <br>
<p>Xác nhận mật khẩu mới. Example: <code>newpassword456</code></p>
        </div>
        </form>

                <h1 id="2-san-pham-danh-muc-khach-hang">2. Sản phẩm & Danh mục (Khách hàng)</h1>

    

                        <h2 id="2-san-pham-danh-muc-khach-hang-danh-muc-nen-tang-cho-phep-khach-hang-xem-danh-sach-cac-danh-muc-the-thao-hien-co">Danh mục nền tảng

Cho phép khách hàng xem danh sách các danh mục thể thao hiện có.</h2>
                                                    <h2 id="2-san-pham-danh-muc-khach-hang-GETapi-v1-categories">Danh sách danh mục</h2>

<p>
</p>

<p>Lấy toàn bộ cây danh mục sản phẩm (bao gồm danh mục con) đang hoạt động.</p>

<span id="example-requests-GETapi-v1-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Danh s&aacute;ch danh mục&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Balo Wika HELIX&quot;,
            &quot;duong_dan&quot;: &quot;balo-wika-helix&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 0,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 2,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Phụ Kiện B&oacute;ng Đ&aacute;&quot;,
            &quot;duong_dan&quot;: &quot;phu-kien-bong-da&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 1,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 3,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;T&uacute;i Thể Thao&quot;,
            &quot;duong_dan&quot;: &quot;tui-the-thao&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 2,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 4,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Pickleball&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 3,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 5,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Pickleball Wika Stark Quang Dương&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-stark-quang-duong&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 4,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 6,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Pickleball&quot;,
            &quot;duong_dan&quot;: &quot;pickleball&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 5,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 7,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 6,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 8,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Luska&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-luska&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 7,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 9,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Vợt Pickleball&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickleball&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 8,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 10,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Vợt Pickleball Wika QD Fire&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickleball-wika-qd-fire&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 9,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 11,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Vợt Pickleball Wika QD Air&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickleball-wika-qd-air&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 10,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 12,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Pickleball Wika Mato&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-mato&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 11,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 13,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Polo&quot;,
            &quot;duong_dan&quot;: &quot;ao-polo&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 12,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 14,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o polo Wika Leather&quot;,
            &quot;duong_dan&quot;: &quot;ao-polo-wika-leather&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 13,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 15,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Vợt Pickleball Wika BAO FIRE&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickleball-wika-bao-fire&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 14,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 16,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Pickleball Wika Lumix Quang Dương&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-lumix-quang-duong&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 15,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 17,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Bộ Suvec Wika Rectar&quot;,
            &quot;duong_dan&quot;: &quot;bo-suvec-wika-rectar&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 16,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 18,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Pickleball Wika Varus&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-varus&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 17,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 19,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Wind&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-wind&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 18,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 20,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Polo Wika Kairo&quot;,
            &quot;duong_dan&quot;: &quot;ao-polo-wika-kairo&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 19,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 21,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Wika Ruta Quang Dương&quot;,
            &quot;duong_dan&quot;: &quot;giay-wika-ruta-quang-duong&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 20,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 22,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Xvolt&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-xvolt&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 21,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 23,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Quần &amp;amp; &aacute;o thể thao&quot;,
            &quot;duong_dan&quot;: &quot;quan-amp-ao-the-thao&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 22,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 24,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Vợt Pickleball Wika Xvolt&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickleball-wika-xvolt&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 23,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 25,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Wika Vetex Quang Dương&quot;,
            &quot;duong_dan&quot;: &quot;giay-wika-vetex-quang-duong&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 24,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 26,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Găng Tay Thủ M&ocirc;n&quot;,
            &quot;duong_dan&quot;: &quot;gang-tay-thu-mon&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 25,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 27,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Găng tay Wika Zentor&quot;,
            &quot;duong_dan&quot;: &quot;gang-tay-wika-zentor&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 26,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 28,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Trial&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-trial&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 27,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 29,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Glimor&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-glimor&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 28,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 30,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Găng tay Wika Forus&quot;,
            &quot;duong_dan&quot;: &quot;gang-tay-wika-forus&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 29,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 31,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Thể Thao&quot;,
            &quot;duong_dan&quot;: &quot;giay-the-thao&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 30,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 32,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Wika Maru&quot;,
            &quot;duong_dan&quot;: &quot;giay-wika-maru&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 31,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 33,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Team&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-team&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 32,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 34,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Pickleball Wika Vanta&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-vanta&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 33,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 35,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Java&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-java&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 34,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 36,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;Gi&agrave;y Pickleball Wika Merik&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-merik&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 35,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 37,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Polo Wika Mata&quot;,
            &quot;duong_dan&quot;: &quot;ao-polo-wika-mata&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 36,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        },
        {
            &quot;id&quot;: 38,
            &quot;danh_muc_cha_id&quot;: null,
            &quot;ten&quot;: &quot;&Aacute;o Wika Silas&quot;,
            &quot;duong_dan&quot;: &quot;ao-wika-silas&quot;,
            &quot;hinh_anh&quot;: null,
            &quot;mo_ta&quot;: null,
            &quot;thu_tu&quot;: 37,
            &quot;trang_thai&quot;: true,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
            &quot;danh_muc_con&quot;: []
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories" data-method="GET"
      data-path="api/v1/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories"
                    onclick="tryItOut('GETapi-v1-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories"
                    onclick="cancelTryOut('GETapi-v1-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="2-san-pham-danh-muc-khach-hang-GETapi-v1-categories--slug-">Chi tiết danh mục</h2>

<p>
</p>

<p>Trả về thông tin chi tiết của danh mục cùng với danh mục con và các sản phẩm nổi bật.</p>

<span id="example-requests-GETapi-v1-categories--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/categories/giay-chay-bo" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/categories/giay-chay-bo"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-categories--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Danh mục kh&ocirc;ng tồn tại&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-categories--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-categories--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-categories--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-categories--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-categories--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-categories--slug-" data-method="GET"
      data-path="api/v1/categories/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-categories--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-categories--slug-"
                    onclick="tryItOut('GETapi-v1-categories--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-categories--slug-"
                    onclick="cancelTryOut('GETapi-v1-categories--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-categories--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/categories/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-categories--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-categories--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-v1-categories--slug-"
               value="giay-chay-bo"
               data-component="url">
    <br>
<p>Đường dẫn thân thiện của danh mục. Example: <code>giay-chay-bo</code></p>
            </div>
                    </form>

                                <h2 id="2-san-pham-danh-muc-khach-hang-thuong-hieu-lay-danh-sach-thuong-hieu-doi-tac-cua-he-thong">Thương hiệu

Lấy danh sách thương hiệu đối tác của hệ thống.</h2>
                                                    <h2 id="2-san-pham-danh-muc-khach-hang-GETapi-v1-brands">Danh sách thương hiệu</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/brands" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/brands"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-brands">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Danh s&aacute;ch thương hiệu&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;ten&quot;: &quot;MaxxSport&quot;,
            &quot;duong_dan&quot;: &quot;maxxsport&quot;,
            &quot;logo&quot;: null
        },
        {
            &quot;id&quot;: 1,
            &quot;ten&quot;: &quot;Wika Sports&quot;,
            &quot;duong_dan&quot;: &quot;wika-sports&quot;,
            &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;ten&quot;: &quot;Zocker&quot;,
            &quot;duong_dan&quot;: &quot;zocker&quot;,
            &quot;logo&quot;: &quot;https://shop.webthethao.vn/assets/logo/zocker.png&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-brands" data-method="GET"
      data-path="api/v1/brands"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-brands"
                    onclick="tryItOut('GETapi-v1-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-brands"
                    onclick="cancelTryOut('GETapi-v1-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="2-san-pham-danh-muc-khach-hang-cua-hang-nhom-api-hien-thi-thong-tin-san-pham-danh-cho-khach-hang-tham-quan-ung-dung">Cửa hàng

Nhóm API hiển thị thông tin sản phẩm dành cho khách hàng tham quan ứng dụng.</h2>
                                                    <h2 id="2-san-pham-danh-muc-khach-hang-GETapi-v1-products">Lấy danh sách sản phẩm</h2>

<p>
</p>

<p>Phục vụ trang danh sách sản phẩm với các filter. Tự động trả về dữ liệu phân trang.</p>

<span id="example-requests-GETapi-v1-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/products?tu_khoa=%C3%A1o&amp;danh_muc_id=3&amp;thuong_hieu_id=&amp;sap_xep=moi_nhat&amp;gioi_han=12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/products"
);

const params = {
    "tu_khoa": "áo",
    "danh_muc_id": "3",
    "thuong_hieu_id": "",
    "sap_xep": "moi_nhat",
    "gioi_han": "12",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Danh s&aacute;ch sản phẩm&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 7,
            &quot;danh_muc_id&quot;: 7,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Luska xanh&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da-wika-luska-xanh&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31383&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu Wikarotex co gi&atilde;n 4 chiều, mềm m&aacute;t \nC&ocirc;ng nghệ Witech-dry tho&aacute;t mồ h&ocirc;i si&ecirc;u tốc \nHoạ tiết in bền m&agrave;u \nForm Regular Fit dễ mặc, t&ocirc;n d&aacute;ng vận động vi&ecirc;n \nLogo PU phản quang\nĐặt &aacute;o đội li&ecirc;n hệ &amp;#8220;CHAT ZALO&amp;#8221; để được ưu đ&atilde;i!&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o b&oacute;ng đ&aacute; Wika Luska &ndash; Thiết kế mới b&ugrave;ng nổ cho m&ugrave;a giải&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Luska l&agrave; t&acirc;n binh mới nhất gia nhập bộ sưu tập &aacute;o b&oacute;ng đ&aacute; Wika, mang đến l&agrave;n gi&oacute; thiết kế hiện đại v&agrave; gi&agrave;u năng lượng cho m&ugrave;a giải mới. Sản phẩm g&acirc;y ấn tượng mạnh với họa tiết xếp tầng độc đ&aacute;o, tạo hiệu ứng chuyển động linh hoạt, tượng trưng cho sức mạnh tập thể v&agrave; tinh thần thi đấu lan tỏa từ s&acirc;n cỏ đến kh&aacute;n đ&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o được thiết kế ph&ugrave; hợp cho cả nam v&agrave; nữ, đ&aacute;p ứng tối đa nhu cầu tập luyện v&agrave; thi đấu với cảm gi&aacute;c nhẹ, tho&aacute;ng v&agrave; linh hoạt trong từng chuyển động. Chất liệu Wikarotex cao cấp co gi&atilde;n 4 chiều gi&uacute;p &aacute;o mềm m&aacute;t, dễ chịu khi mặc trong thời gian d&agrave;i. Kết hợp c&ugrave;ng c&ocirc;ng nghệ Witech-dry, sản phẩm hỗ trợ tho&aacute;t mồ h&ocirc;i nhanh, giữ cơ thể lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; thoải m&aacute;i ngay cả khi vận động cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Họa tiết in bền m&agrave;u, form Regular Fit dễ mặc v&agrave; t&ocirc;n d&aacute;ng vận động vi&ecirc;n, ph&ugrave; hợp cho nhiều d&aacute;ng người. Logo PU phản quang l&agrave; điểm nhấn tinh tế, tăng độ nhận diện v&agrave; t&iacute;nh thẩm mỹ. Wika Luska l&agrave; lựa chọn l&yacute; tưởng cho tập luyện, thi đấu v&agrave; c&aacute;c hoạt động thể thao thường ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3552 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-ao-wika-sports-1.jpg\&quot; alt=\&quot;bang-size-ao-wika-sports-1\&quot; width=\&quot;1024\&quot; height=\&quot;336\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;249000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;239000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 7,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
                &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 6,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 72,
                &quot;san_pham_id&quot;: 7,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-xanh-1_optimized.png&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-xanh-1_optimized.png&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;danh_muc_id&quot;: 7,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Luska kem&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da-wika-luska-kem&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31377&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu Wikarotex co gi&atilde;n 4 chiều, mềm m&aacute;t \nC&ocirc;ng nghệ Witech-dry tho&aacute;t mồ h&ocirc;i si&ecirc;u tốc \nHoạ tiết in bền m&agrave;u \nForm Regular Fit dễ mặc, t&ocirc;n d&aacute;ng vận động vi&ecirc;n \nLogo PU phản quang\nĐặt &aacute;o đội li&ecirc;n hệ &amp;#8220;CHAT ZALO&amp;#8221; để được ưu đ&atilde;i!&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o b&oacute;ng đ&aacute; Wika Luska &ndash; Thiết kế mới b&ugrave;ng nổ cho m&ugrave;a giải&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Luska l&agrave; t&acirc;n binh mới nhất gia nhập bộ sưu tập &aacute;o b&oacute;ng đ&aacute; Wika, mang đến l&agrave;n gi&oacute; thiết kế hiện đại v&agrave; gi&agrave;u năng lượng cho m&ugrave;a giải mới. Sản phẩm g&acirc;y ấn tượng mạnh với họa tiết xếp tầng độc đ&aacute;o, tạo hiệu ứng chuyển động linh hoạt, tượng trưng cho sức mạnh tập thể v&agrave; tinh thần thi đấu lan tỏa từ s&acirc;n cỏ đến kh&aacute;n đ&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o được thiết kế ph&ugrave; hợp cho cả nam v&agrave; nữ, đ&aacute;p ứng tối đa nhu cầu tập luyện v&agrave; thi đấu với cảm gi&aacute;c nhẹ, tho&aacute;ng v&agrave; linh hoạt trong từng chuyển động. Chất liệu Wikarotex cao cấp co gi&atilde;n 4 chiều gi&uacute;p &aacute;o mềm m&aacute;t, dễ chịu khi mặc trong thời gian d&agrave;i. Kết hợp c&ugrave;ng c&ocirc;ng nghệ Witech-dry, sản phẩm hỗ trợ tho&aacute;t mồ h&ocirc;i nhanh, giữ cơ thể lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; thoải m&aacute;i ngay cả khi vận động cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Họa tiết in bền m&agrave;u, form Regular Fit dễ mặc v&agrave; t&ocirc;n d&aacute;ng vận động vi&ecirc;n, ph&ugrave; hợp cho nhiều d&aacute;ng người. Logo PU phản quang l&agrave; điểm nhấn tinh tế, tăng độ nhận diện v&agrave; t&iacute;nh thẩm mỹ. Wika Luska l&agrave; lựa chọn l&yacute; tưởng cho tập luyện, thi đấu v&agrave; c&aacute;c hoạt động thể thao thường ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3552 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-ao-wika-sports-1.jpg\&quot; alt=\&quot;bang-size-ao-wika-sports-1\&quot; width=\&quot;1024\&quot; height=\&quot;336\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;249000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;239000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 7,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
                &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 6,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 82,
                &quot;san_pham_id&quot;: 8,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-kem-1_optimized.png&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-kem-1_optimized.png&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;danh_muc_id&quot;: 7,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Luska đỏ&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da-wika-luska-do&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31361&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu Wikarotex co gi&atilde;n 4 chiều, mềm m&aacute;t \nC&ocirc;ng nghệ Witech-dry tho&aacute;t mồ h&ocirc;i si&ecirc;u tốc \nHoạ tiết in bền m&agrave;u \nForm Regular Fit dễ mặc, t&ocirc;n d&aacute;ng vận động vi&ecirc;n \nLogo PU phản quang\nĐặt &aacute;o đội li&ecirc;n hệ &amp;#8220;CHAT ZALO&amp;#8221; để được ưu đ&atilde;i!&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o b&oacute;ng đ&aacute; Wika Luska &ndash; Thiết kế mới b&ugrave;ng nổ cho m&ugrave;a giải&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Luska l&agrave; t&acirc;n binh mới nhất gia nhập bộ sưu tập &aacute;o b&oacute;ng đ&aacute; Wika, mang đến l&agrave;n gi&oacute; thiết kế hiện đại v&agrave; gi&agrave;u năng lượng cho m&ugrave;a giải mới. Sản phẩm g&acirc;y ấn tượng mạnh với họa tiết xếp tầng độc đ&aacute;o, tạo hiệu ứng chuyển động linh hoạt, tượng trưng cho sức mạnh tập thể v&agrave; tinh thần thi đấu lan tỏa từ s&acirc;n cỏ đến kh&aacute;n đ&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o được thiết kế ph&ugrave; hợp cho cả nam v&agrave; nữ, đ&aacute;p ứng tối đa nhu cầu tập luyện v&agrave; thi đấu với cảm gi&aacute;c nhẹ, tho&aacute;ng v&agrave; linh hoạt trong từng chuyển động. Chất liệu Wikarotex cao cấp co gi&atilde;n 4 chiều gi&uacute;p &aacute;o mềm m&aacute;t, dễ chịu khi mặc trong thời gian d&agrave;i. Kết hợp c&ugrave;ng c&ocirc;ng nghệ Witech-dry, sản phẩm hỗ trợ tho&aacute;t mồ h&ocirc;i nhanh, giữ cơ thể lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; thoải m&aacute;i ngay cả khi vận động cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Họa tiết in bền m&agrave;u, form Regular Fit dễ mặc v&agrave; t&ocirc;n d&aacute;ng vận động vi&ecirc;n, ph&ugrave; hợp cho nhiều d&aacute;ng người. Logo PU phản quang l&agrave; điểm nhấn tinh tế, tăng độ nhận diện v&agrave; t&iacute;nh thẩm mỹ. Wika Luska l&agrave; lựa chọn l&yacute; tưởng cho tập luyện, thi đấu v&agrave; c&aacute;c hoạt động thể thao thường ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3552 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-ao-wika-sports-1.jpg\&quot; alt=\&quot;bang-size-ao-wika-sports-1\&quot; width=\&quot;1024\&quot; height=\&quot;336\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;249000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;239000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 7,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
                &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 6,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 92,
                &quot;san_pham_id&quot;: 9,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-do-1_optimized.png&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-do-1_optimized.png&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;danh_muc_id&quot;: 7,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Luska đen&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da-wika-luska-den&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31344&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu Wikarotex co gi&atilde;n 4 chiều, mềm m&aacute;t \nC&ocirc;ng nghệ Witech-dry tho&aacute;t mồ h&ocirc;i si&ecirc;u tốc \nHoạ tiết in bền m&agrave;u \nForm Regular Fit dễ mặc, t&ocirc;n d&aacute;ng vận động vi&ecirc;n \nLogo PU phản quang\nĐặt &aacute;o đội li&ecirc;n hệ &amp;#8220;CHAT ZALO&amp;#8221; để được ưu đ&atilde;i!&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o b&oacute;ng đ&aacute; Wika Luska &ndash; Thiết kế mới b&ugrave;ng nổ cho m&ugrave;a giải&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Luska l&agrave; t&acirc;n binh mới nhất gia nhập bộ sưu tập &aacute;o b&oacute;ng đ&aacute; Wika, mang đến l&agrave;n gi&oacute; thiết kế hiện đại v&agrave; gi&agrave;u năng lượng cho m&ugrave;a giải mới. Sản phẩm g&acirc;y ấn tượng mạnh với họa tiết xếp tầng độc đ&aacute;o, tạo hiệu ứng chuyển động linh hoạt, tượng trưng cho sức mạnh tập thể v&agrave; tinh thần thi đấu lan tỏa từ s&acirc;n cỏ đến kh&aacute;n đ&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o được thiết kế ph&ugrave; hợp cho cả nam v&agrave; nữ, đ&aacute;p ứng tối đa nhu cầu tập luyện v&agrave; thi đấu với cảm gi&aacute;c nhẹ, tho&aacute;ng v&agrave; linh hoạt trong từng chuyển động. Chất liệu Wikarotex cao cấp co gi&atilde;n 4 chiều gi&uacute;p &aacute;o mềm m&aacute;t, dễ chịu khi mặc trong thời gian d&agrave;i. Kết hợp c&ugrave;ng c&ocirc;ng nghệ Witech-dry, sản phẩm hỗ trợ tho&aacute;t mồ h&ocirc;i nhanh, giữ cơ thể lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; thoải m&aacute;i ngay cả khi vận động cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Họa tiết in bền m&agrave;u, form Regular Fit dễ mặc v&agrave; t&ocirc;n d&aacute;ng vận động vi&ecirc;n, ph&ugrave; hợp cho nhiều d&aacute;ng người. Logo PU phản quang l&agrave; điểm nhấn tinh tế, tăng độ nhận diện v&agrave; t&iacute;nh thẩm mỹ. Wika Luska l&agrave; lựa chọn l&yacute; tưởng cho tập luyện, thi đấu v&agrave; c&aacute;c hoạt động thể thao thường ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3552 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-ao-wika-sports-1.jpg\&quot; alt=\&quot;bang-size-ao-wika-sports-1\&quot; width=\&quot;1024\&quot; height=\&quot;336\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;249000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;239000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 7,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
                &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 6,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 102,
                &quot;san_pham_id&quot;: 10,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-den-1_optimized.png&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-den-1_optimized.png&quot;
            }
        },
        {
            &quot;id&quot;: 24,
            &quot;danh_muc_id&quot;: 13,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o polo Wika Leather m&agrave;u trắng x&aacute;m&quot;,
            &quot;duong_dan&quot;: &quot;ao-polo-wika-leather-trang-xam&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-30428&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất vải Polyester co gi&atilde;n, đ&agrave;n hồi tốt, giữ form\nSợi vải tho&aacute;ng kh&iacute;, mềm nhẹ tạ cảm gi&aacute;c dễ chịu khi tập\nSử dụng c&ocirc;ng nghệ Witech-dry thấm h&uacute;t mồ h&ocirc;i v&agrave; ngăn m&ugrave;i\nCổ &aacute;o được thiết kế cứng c&aacute;p, đứng form\nHoạ tiết mũi t&ecirc;n ph&aacute; c&aacute;ch 1 b&ecirc;n vai nổi bật c&ugrave;ng h&ocirc;ng &aacute;o\nForm &aacute;o chuẩn Việt cho cả nam &amp;amp; nữ&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Trở lại với những item polo thể thao, Wika ra mắt &aacute;o Wika Leather mang đến phong c&aacute;ch chuy&ecirc;n nghiệp c&ugrave;ng khả năng thấm h&uacute;t tối đa trong tập luyện.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Cảm hứng thiết kế&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Wika Lealther kh&ocirc;ng chỉ l&agrave; một chiếc &aacute;o polo thể thao, m&agrave; c&ograve;n l&agrave; tuy&ecirc;n ng&ocirc;n về sự bứt ph&aacute; mạnh mẽ v&agrave; tinh thần chinh phục. Lấy cảm hứng từ h&igrave;nh ảnh những chiến binh lu&ocirc;n hướng về ph&iacute;a trước, &aacute;o sở hữu họa tiết mũi t&ecirc;n sắc n&eacute;t chạy dọc một b&ecirc;n vai v&agrave; h&ocirc;ng &aacute;o, tạo n&ecirc;n một diện mạo đầy ph&aacute; c&aacute;ch v&agrave; nổi bật.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế v&agrave; c&ocirc;ng nghệ&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&Aacute;o polo Wika Leather kh&ocirc;ng chỉ nổi bật c&ugrave;ng họa tiết bất đối xứng với mũi t&ecirc;n đa hướng, m&agrave; c&ograve;n được thiết kế để mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch cho mọi người chơi thể thao. Đ&acirc;y l&agrave; chiếc &aacute;o ho&agrave;n hảo cho cả vận động vi&ecirc;n chuy&ecirc;n nghiệp lẫn người y&ecirc;u thể thao, với những điểm nhấn vượt trội:&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thoải m&aacute;i vượt trội &ndash; Vận động dễ chịu&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Chất liệu Polyester co gi&atilde;n 4 chiều gi&uacute;p &aacute;o linh hoạt theo từng cử động, mang lại cảm gi&aacute;c dễ chịu d&ugrave; bạn đang vận động mạnh hay luyện tập cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; C&ocirc;ng nghệ Wi-tech Dry gi&uacute;p thấm h&uacute;t mồ h&ocirc;i si&ecirc;u tốc, giữ cơ thể kh&ocirc; r&aacute;o v&agrave; tho&aacute;ng m&aacute;t suốt thời gian d&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế chuẩn Việt &ndash; T&ocirc;n d&aacute;ng cả nam &amp;amp; nữ&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Form &aacute;o được ph&aacute;t triển dựa tr&ecirc;n số đo trung b&igrave;nh của người Việt, mang lại sự vừa vặn.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; D&aacute;ng &aacute;o Regular Fit kh&ocirc;ng b&oacute; s&aacute;t, tạo cảm gi&aacute;c thoải m&aacute;i nhưng vẫn giữ được vẻ ngo&agrave;i gọn g&agrave;ng v&agrave; năng động.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Phong c&aacute;ch chuy&ecirc;n nghiệp &ndash; Tự tin thi đấu&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Cổ &aacute;o cứng c&aacute;p, đứng form v&agrave; chuy&ecirc;n nghiệp.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Phối m&agrave;u h&agrave;i h&ograve;a ở cổ v&agrave; viền tay &aacute;o, tạo điểm nhấn tinh tế, ph&ugrave; hợp với mọi tone da.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Dễ d&agrave;ng kết hợp với nhiều kiểu quần shorts hay quần d&agrave;i, linh hoạt phong c&aacute;ch.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Size v&agrave; m&agrave;u sắc&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Size: S &amp;#8211; M &amp;#8211; L &amp;#8211; XL &amp;#8211; XXL&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; 3 phối m&agrave;u nổi bật: Trắng &amp;#8211; Xanh Dương &amp;#8211; Đỏ&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;250000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;219000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 13,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o Polo&quot;,
                &quot;duong_dan&quot;: &quot;ao-polo&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 12,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 242,
                &quot;san_pham_id&quot;: 24,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/ao-polo-wika-leather-trang-xam_optimized.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/ao-polo-wika-leather-trang-xam_optimized.jpg&quot;
            }
        },
        {
            &quot;id&quot;: 25,
            &quot;danh_muc_id&quot;: 13,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o polo Wika Leather m&agrave;u trắng xanh&quot;,
            &quot;duong_dan&quot;: &quot;ao-polo-wika-leather-trang-xanh&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-30418&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất vải Polyester co gi&atilde;n, đ&agrave;n hồi tốt, giữ form\nSợi vải tho&aacute;ng kh&iacute;, mềm nhẹ tạ cảm gi&aacute;c dễ chịu khi tập\nSử dụng c&ocirc;ng nghệ Witech-dry thấm h&uacute;t mồ h&ocirc;i v&agrave; ngăn m&ugrave;i\nCổ &aacute;o được thiết kế cứng c&aacute;p, đứng form\nHoạ tiết mũi t&ecirc;n ph&aacute; c&aacute;ch 1 b&ecirc;n vai nổi bật c&ugrave;ng h&ocirc;ng &aacute;o\nForm &aacute;o chuẩn Việt cho cả nam &amp;amp; nữ&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Trở lại với những item polo thể thao, Wika ra mắt &aacute;o Wika Leather mang đến phong c&aacute;ch chuy&ecirc;n nghiệp c&ugrave;ng khả năng thấm h&uacute;t tối đa trong tập luyện.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Cảm hứng thiết kế&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Wika Lealther kh&ocirc;ng chỉ l&agrave; một chiếc &aacute;o polo thể thao, m&agrave; c&ograve;n l&agrave; tuy&ecirc;n ng&ocirc;n về sự bứt ph&aacute; mạnh mẽ v&agrave; tinh thần chinh phục. Lấy cảm hứng từ h&igrave;nh ảnh những chiến binh lu&ocirc;n hướng về ph&iacute;a trước, &aacute;o sở hữu họa tiết mũi t&ecirc;n sắc n&eacute;t chạy dọc một b&ecirc;n vai v&agrave; h&ocirc;ng &aacute;o, tạo n&ecirc;n một diện mạo đầy ph&aacute; c&aacute;ch v&agrave; nổi bật.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế v&agrave; c&ocirc;ng nghệ&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&Aacute;o polo Wika Leather kh&ocirc;ng chỉ nổi bật c&ugrave;ng họa tiết bất đối xứng với mũi t&ecirc;n đa hướng, m&agrave; c&ograve;n được thiết kế để mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch cho mọi người chơi thể thao. Đ&acirc;y l&agrave; chiếc &aacute;o ho&agrave;n hảo cho cả vận động vi&ecirc;n chuy&ecirc;n nghiệp lẫn người y&ecirc;u thể thao, với những điểm nhấn vượt trội:&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thoải m&aacute;i vượt trội &ndash; Vận động dễ chịu&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Chất liệu Polyester co gi&atilde;n 4 chiều gi&uacute;p &aacute;o linh hoạt theo từng cử động, mang lại cảm gi&aacute;c dễ chịu d&ugrave; bạn đang vận động mạnh hay luyện tập cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; C&ocirc;ng nghệ Wi-tech Dry gi&uacute;p thấm h&uacute;t mồ h&ocirc;i si&ecirc;u tốc, giữ cơ thể kh&ocirc; r&aacute;o v&agrave; tho&aacute;ng m&aacute;t suốt thời gian d&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế chuẩn Việt &ndash; T&ocirc;n d&aacute;ng cả nam &amp;amp; nữ&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Form &aacute;o được ph&aacute;t triển dựa tr&ecirc;n số đo trung b&igrave;nh của người Việt, mang lại sự vừa vặn.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; D&aacute;ng &aacute;o Regular Fit kh&ocirc;ng b&oacute; s&aacute;t, tạo cảm gi&aacute;c thoải m&aacute;i nhưng vẫn giữ được vẻ ngo&agrave;i gọn g&agrave;ng v&agrave; năng động.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Phong c&aacute;ch chuy&ecirc;n nghiệp &ndash; Tự tin thi đấu&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Cổ &aacute;o cứng c&aacute;p, đứng form v&agrave; chuy&ecirc;n nghiệp.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Phối m&agrave;u h&agrave;i h&ograve;a ở cổ v&agrave; viền tay &aacute;o, tạo điểm nhấn tinh tế, ph&ugrave; hợp với mọi tone da.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Dễ d&agrave;ng kết hợp với nhiều kiểu quần shorts hay quần d&agrave;i, linh hoạt phong c&aacute;ch.&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;strong&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Size v&agrave; m&agrave;u sắc&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; Size: S &amp;#8211; M &amp;#8211; L &amp;#8211; XL &amp;#8211; XXL&lt;/span&gt;&lt;/p&gt;\n&lt;p style=\&quot;text-align: justify\&quot;&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;&amp;#8211; 3 phối m&agrave;u nổi bật: Trắng &amp;#8211; Xanh Dương &amp;#8211; Đỏ&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;250000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;219000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 13,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o Polo&quot;,
                &quot;duong_dan&quot;: &quot;ao-polo&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 12,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 244,
                &quot;san_pham_id&quot;: 25,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/ao-polo-wika-leather-trang-xanh_optimized.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/ao-polo-wika-leather-trang-xanh_optimized.jpg&quot;
            }
        },
        {
            &quot;id&quot;: 26,
            &quot;danh_muc_id&quot;: 6,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Vợt Pickeball Wika Bao Fire t&iacute;m&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickeball-wika-bao-fire-tim&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-30303&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Lấy cảm hứng từ Na Tra, mang DNA chiến binh hệ Lửa với tốc độ v&agrave; sức mạnh b&ugrave;ng nổ.\nL&otilde;i Cannon-Core&trade; tạo tiếng nổ lớn, trợ lực mạnh cho reset, flick v&agrave; volley.\nMặt Carbon T700 nh&aacute;m tăng 30%, bền bỉ v&agrave; tối ưu spin, kiểm so&aacute;t b&oacute;ng.\nViền Foam giảm rung, thiết kế SweetMax mở rộng điểm ngọt, hạn chế mis-hit.\nThiết kế họa tiết lửa độc bản, được nhiều VĐV chọn d&ugrave;ng, đồng h&agrave;nh c&ugrave;ng nh&agrave; v&ocirc; địch Vietnam Masters 2025.&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt pickleball thế hệ mới lấy cảm hứng từ h&igrave;nh tượng Na Tra &ndash; nguồn năng lượng y&ecirc;u th&iacute;ch của VĐV Dương Thi&ecirc;n Bảo. Với DNA của một chiến binh hệ Lửa, Bao Fire mang đến trải nghiệm đ&aacute;nh b&ugrave;ng nổ, tốc độ vượt trội v&agrave; khả năng kiểm so&aacute;t b&oacute;ng tối đa trong mọi pha xử l&yacute;. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho người chơi theo phong c&aacute;ch tốc độ, phản xạ nhanh v&agrave; chủ động kiểm so&aacute;t thế trận.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-30296 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-tim-1.jpg\&quot; alt=\&quot;vot-pickleball-wika-bao-fire-tim-1\&quot; width=\&quot;1144\&quot; height=\&quot;1430\&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Acirc;m thanh vang dội &ndash; Trợ lực tối đa với Cannon-Core&trade;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Trang bị l&otilde;i Cannon-Core&trade;, Wika Bao Fire tạo n&ecirc;n tiếng nổ POP lớn đầy uy lực, gi&uacute;p người chơi cảm nhận r&otilde; lực truyền khi thực hiện c&aacute;c kỹ thuật reset, flick hay volley. C&ocirc;ng nghệ l&otilde;i tối ưu h&oacute;a độ đ&agrave;n hồi, tăng lực đẩy v&agrave; cho cảm gi&aacute;c b&oacute;ng chuẩn x&aacute;c hơn.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Mặt Carbon T700 bền bỉ &ndash; Nh&aacute;m tăng 30%&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire sử dụng sợi Carbon T700 thế hệ mới cho độ bền vượt thời gian. Bề mặt nh&aacute;m tăng th&ecirc;m 30% gi&uacute;p tạo xo&aacute;y tốt hơn, hỗ trợ tối ưu c&aacute;c t&igrave;nh huống spin, giữ b&oacute;ng b&aacute;m mặt vợt l&acirc;u hơn, mang lại cảm gi&aacute;c kiểm so&aacute;t vượt trội.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Viền Foam giảm rung &ndash; Tối ưu lực đ&aacute;nh&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế Foam viền gi&uacute;p giảm rung r&otilde; rệt, tăng độ ổn định trong từng c&uacute; đ&aacute;nh. Người chơi c&oacute; cảm gi&aacute;c &ecirc;m tay hơn, đồng thời hạn chế tối đa rung chấn khi tiếp b&oacute;ng mạnh.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;SweetMax &ndash; Điểm ngọt mở rộng, giảm mis-hit&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire sở hữu cấu tr&uacute;c SweetMax gi&uacute;p mở rộng điểm ngọt của mặt vợt. Nhờ đ&oacute;, người chơi vẫn giữ được độ ổn định v&agrave; ch&iacute;nh x&aacute;c cao ngay cả khi đ&aacute;nh lệch t&acirc;m, hạn chế tối đa t&igrave;nh trạng mis-hit.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế lửa cuốn h&uacute;t &ndash; Phi&ecirc;n bản độc bản mang dấu ấn Dương Thi&ecirc;n Bảo&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire g&acirc;y ấn tượng mạnh với họa tiết lửa đặc trưng, kết hợp năm phối m&agrave;u mang dấu ấn c&aacute; nh&acirc;n của VĐV Dương Thi&ecirc;n Bảo. Mẫu vợt sở hữu phong c&aacute;ch thị gi&aacute;c mạnh mẽ, nổi bật ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Được tin chọn bởi nhiều VĐV chuy&ecirc;n nghiệp&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt đồng h&agrave;nh c&ugrave;ng nhiều vận động vi&ecirc;n trong nước v&agrave; quốc tế. Đặc biệt, sản phẩm đ&atilde; được VĐV Amanda Hendry lựa chọn v&agrave; c&ugrave;ng c&ocirc; gi&agrave;nh chức v&ocirc; địch tại Vietnam Masters Petrolimex Cup 2025.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;2900000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;2699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 6,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 5,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 246,
                &quot;san_pham_id&quot;: 26,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-tim-2.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-tim-2.jpg&quot;
            }
        },
        {
            &quot;id&quot;: 27,
            &quot;danh_muc_id&quot;: 6,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Vợt Pickeball Wika Bao Fire xanh ngọc&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickeball-wika-bao-fire-xanh-ngoc&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-30302&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Lấy cảm hứng từ Na Tra, mang DNA chiến binh hệ Lửa với tốc độ v&agrave; sức mạnh b&ugrave;ng nổ.\nL&otilde;i Cannon-Core&trade; tạo tiếng nổ lớn, trợ lực mạnh cho reset, flick v&agrave; volley.\nMặt Carbon T700 nh&aacute;m tăng 30%, bền bỉ v&agrave; tối ưu spin, kiểm so&aacute;t b&oacute;ng.\nViền Foam giảm rung, thiết kế SweetMax mở rộng điểm ngọt, hạn chế mis-hit.\nThiết kế họa tiết lửa độc bản, được nhiều VĐV chọn d&ugrave;ng, đồng h&agrave;nh c&ugrave;ng nh&agrave; v&ocirc; địch Vietnam Masters 2025.&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt pickleball thế hệ mới lấy cảm hứng từ h&igrave;nh tượng Na Tra &ndash; nguồn năng lượng y&ecirc;u th&iacute;ch của VĐV Dương Thi&ecirc;n Bảo. Với DNA của một chiến binh hệ Lửa, Bao Fire mang đến trải nghiệm đ&aacute;nh b&ugrave;ng nổ, tốc độ vượt trội v&agrave; khả năng kiểm so&aacute;t b&oacute;ng tối đa trong mọi pha xử l&yacute;. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho người chơi theo phong c&aacute;ch tốc độ, phản xạ nhanh v&agrave; chủ động kiểm so&aacute;t thế trận.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-30299 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-xanh-ngoc-3.jpg\&quot; alt=\&quot;vot-pickleball-wika-bao-fire-xanh-ngoc-3\&quot; width=\&quot;1144\&quot; height=\&quot;1430\&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Acirc;m thanh vang dội &ndash; Trợ lực tối đa với Cannon-Core&trade;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Trang bị l&otilde;i Cannon-Core&trade;, Wika Bao Fire tạo n&ecirc;n tiếng nổ POP lớn đầy uy lực, gi&uacute;p người chơi cảm nhận r&otilde; lực truyền khi thực hiện c&aacute;c kỹ thuật reset, flick hay volley. C&ocirc;ng nghệ l&otilde;i tối ưu h&oacute;a độ đ&agrave;n hồi, tăng lực đẩy v&agrave; cho cảm gi&aacute;c b&oacute;ng chuẩn x&aacute;c hơn.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Mặt Carbon T700 bền bỉ &ndash; Nh&aacute;m tăng 30%&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire sử dụng sợi Carbon T700 thế hệ mới cho độ bền vượt thời gian. Bề mặt nh&aacute;m tăng th&ecirc;m 30% gi&uacute;p tạo xo&aacute;y tốt hơn, hỗ trợ tối ưu c&aacute;c t&igrave;nh huống spin, giữ b&oacute;ng b&aacute;m mặt vợt l&acirc;u hơn, mang lại cảm gi&aacute;c kiểm so&aacute;t vượt trội.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Viền Foam giảm rung &ndash; Tối ưu lực đ&aacute;nh&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế Foam viền gi&uacute;p giảm rung r&otilde; rệt, tăng độ ổn định trong từng c&uacute; đ&aacute;nh. Người chơi c&oacute; cảm gi&aacute;c &ecirc;m tay hơn, đồng thời hạn chế tối đa rung chấn khi tiếp b&oacute;ng mạnh.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;SweetMax &ndash; Điểm ngọt mở rộng, giảm mis-hit&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire sở hữu cấu tr&uacute;c SweetMax gi&uacute;p mở rộng điểm ngọt của mặt vợt. Nhờ đ&oacute;, người chơi vẫn giữ được độ ổn định v&agrave; ch&iacute;nh x&aacute;c cao ngay cả khi đ&aacute;nh lệch t&acirc;m, hạn chế tối đa t&igrave;nh trạng mis-hit.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế lửa cuốn h&uacute;t &ndash; Phi&ecirc;n bản độc bản mang dấu ấn Dương Thi&ecirc;n Bảo&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire g&acirc;y ấn tượng mạnh với họa tiết lửa đặc trưng, kết hợp năm phối m&agrave;u mang dấu ấn c&aacute; nh&acirc;n của VĐV Dương Thi&ecirc;n Bảo. Mẫu vợt sở hữu phong c&aacute;ch thị gi&aacute;c mạnh mẽ, nổi bật ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Được tin chọn bởi nhiều VĐV chuy&ecirc;n nghiệp&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt đồng h&agrave;nh c&ugrave;ng nhiều vận động vi&ecirc;n trong nước v&agrave; quốc tế. Đặc biệt, sản phẩm đ&atilde; được VĐV Amanda Hendry lựa chọn v&agrave; c&ugrave;ng c&ocirc; gi&agrave;nh chức v&ocirc; địch tại Vietnam Masters Petrolimex Cup 2025.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;2900000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;2699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 6,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 5,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 248,
                &quot;san_pham_id&quot;: 27,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-xanh-ngoc-1.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-xanh-ngoc-1.jpg&quot;
            }
        },
        {
            &quot;id&quot;: 28,
            &quot;danh_muc_id&quot;: 6,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Vợt Pickeball Wika Bao Fire hồng&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickeball-wika-bao-fire-hong&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-30301&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Lấy cảm hứng từ Na Tra, mang DNA chiến binh hệ Lửa với tốc độ v&agrave; sức mạnh b&ugrave;ng nổ.\nL&otilde;i Cannon-Core&trade; tạo tiếng nổ lớn, trợ lực mạnh cho reset, flick v&agrave; volley.\nMặt Carbon T700 nh&aacute;m tăng 30%, bền bỉ v&agrave; tối ưu spin, kiểm so&aacute;t b&oacute;ng.\nViền Foam giảm rung, thiết kế SweetMax mở rộng điểm ngọt, hạn chế mis-hit.\nThiết kế họa tiết lửa độc bản, được nhiều VĐV chọn d&ugrave;ng, đồng h&agrave;nh c&ugrave;ng nh&agrave; v&ocirc; địch Vietnam Masters 2025.&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt pickleball thế hệ mới lấy cảm hứng từ h&igrave;nh tượng Na Tra &ndash; nguồn năng lượng y&ecirc;u th&iacute;ch của VĐV Dương Thi&ecirc;n Bảo. Với DNA của một chiến binh hệ Lửa, Bao Fire mang đến trải nghiệm đ&aacute;nh b&ugrave;ng nổ, tốc độ vượt trội v&agrave; khả năng kiểm so&aacute;t b&oacute;ng tối đa trong mọi pha xử l&yacute;. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho người chơi theo phong c&aacute;ch tốc độ, phản xạ nhanh v&agrave; chủ động kiểm so&aacute;t thế trận.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-30291 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-hong-2.jpg\&quot; alt=\&quot;vot-pickleball-wika-bao-fire-hong-2\&quot; width=\&quot;1144\&quot; height=\&quot;1430\&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Acirc;m thanh vang dội &ndash; Trợ lực tối đa với Cannon-Core&trade;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Trang bị l&otilde;i Cannon-Core&trade;, Wika Bao Fire tạo n&ecirc;n tiếng nổ POP lớn đầy uy lực, gi&uacute;p người chơi cảm nhận r&otilde; lực truyền khi thực hiện c&aacute;c kỹ thuật reset, flick hay volley. C&ocirc;ng nghệ l&otilde;i tối ưu h&oacute;a độ đ&agrave;n hồi, tăng lực đẩy v&agrave; cho cảm gi&aacute;c b&oacute;ng chuẩn x&aacute;c hơn.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Mặt Carbon T700 bền bỉ &ndash; Nh&aacute;m tăng 30%&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire sử dụng sợi Carbon T700 thế hệ mới cho độ bền vượt thời gian. Bề mặt nh&aacute;m tăng th&ecirc;m 30% gi&uacute;p tạo xo&aacute;y tốt hơn, hỗ trợ tối ưu c&aacute;c t&igrave;nh huống spin, giữ b&oacute;ng b&aacute;m mặt vợt l&acirc;u hơn, mang lại cảm gi&aacute;c kiểm so&aacute;t vượt trội.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Viền Foam giảm rung &ndash; Tối ưu lực đ&aacute;nh&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế Foam viền gi&uacute;p giảm rung r&otilde; rệt, tăng độ ổn định trong từng c&uacute; đ&aacute;nh. Người chơi c&oacute; cảm gi&aacute;c &ecirc;m tay hơn, đồng thời hạn chế tối đa rung chấn khi tiếp b&oacute;ng mạnh.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;SweetMax &ndash; Điểm ngọt mở rộng, giảm mis-hit&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire sở hữu cấu tr&uacute;c SweetMax gi&uacute;p mở rộng điểm ngọt của mặt vợt. Nhờ đ&oacute;, người chơi vẫn giữ được độ ổn định v&agrave; ch&iacute;nh x&aacute;c cao ngay cả khi đ&aacute;nh lệch t&acirc;m, hạn chế tối đa t&igrave;nh trạng mis-hit.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế lửa cuốn h&uacute;t &ndash; Phi&ecirc;n bản độc bản mang dấu ấn Dương Thi&ecirc;n Bảo&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire g&acirc;y ấn tượng mạnh với họa tiết lửa đặc trưng, kết hợp năm phối m&agrave;u mang dấu ấn c&aacute; nh&acirc;n của VĐV Dương Thi&ecirc;n Bảo. Mẫu vợt sở hữu phong c&aacute;ch thị gi&aacute;c mạnh mẽ, nổi bật ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Được tin chọn bởi nhiều VĐV chuy&ecirc;n nghiệp&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt đồng h&agrave;nh c&ugrave;ng nhiều vận động vi&ecirc;n trong nước v&agrave; quốc tế. Đặc biệt, sản phẩm đ&atilde; được VĐV Amanda Hendry lựa chọn v&agrave; c&ugrave;ng c&ocirc; gi&agrave;nh chức v&ocirc; địch tại Vietnam Masters Petrolimex Cup 2025.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;2900000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;2699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 6,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 5,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 249,
                &quot;san_pham_id&quot;: 28,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-hong-1.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-hong-1.jpg&quot;
            }
        },
        {
            &quot;id&quot;: 29,
            &quot;danh_muc_id&quot;: 6,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Vợt Pickeball Wika Bao Fire navy&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickeball-wika-bao-fire-navy&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-30300&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Lấy cảm hứng từ Na Tra, mang DNA chiến binh hệ Lửa với tốc độ v&agrave; sức mạnh b&ugrave;ng nổ.\nL&otilde;i Cannon-Core&trade; tạo tiếng nổ lớn, trợ lực mạnh cho reset, flick v&agrave; volley.\nMặt Carbon T700 nh&aacute;m tăng 30%, bền bỉ v&agrave; tối ưu spin, kiểm so&aacute;t b&oacute;ng.\nViền Foam giảm rung, thiết kế SweetMax mở rộng điểm ngọt, hạn chế mis-hit.\nThiết kế họa tiết lửa độc bản, được nhiều VĐV chọn d&ugrave;ng, đồng h&agrave;nh c&ugrave;ng nh&agrave; v&ocirc; địch Vietnam Masters 2025.&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt pickleball thế hệ mới lấy cảm hứng từ h&igrave;nh tượng Na Tra &ndash; nguồn năng lượng y&ecirc;u th&iacute;ch của VĐV Dương Thi&ecirc;n Bảo. Với DNA của một chiến binh hệ Lửa, Bao Fire mang đến trải nghiệm đ&aacute;nh b&ugrave;ng nổ, tốc độ vượt trội v&agrave; khả năng kiểm so&aacute;t b&oacute;ng tối đa trong mọi pha xử l&yacute;. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho người chơi theo phong c&aacute;ch tốc độ, phản xạ nhanh v&agrave; chủ động kiểm so&aacute;t thế trận.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-30295 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-navy-4.jpg\&quot; alt=\&quot;vot-pickleball-wika-bao-fire-navy-4\&quot; width=\&quot;1144\&quot; height=\&quot;1430\&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Acirc;m thanh vang dội &ndash; Trợ lực tối đa với Cannon-Core&trade;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Trang bị l&otilde;i Cannon-Core&trade;, Wika Bao Fire tạo n&ecirc;n tiếng nổ POP lớn đầy uy lực, gi&uacute;p người chơi cảm nhận r&otilde; lực truyền khi thực hiện c&aacute;c kỹ thuật reset, flick hay volley. C&ocirc;ng nghệ l&otilde;i tối ưu h&oacute;a độ đ&agrave;n hồi, tăng lực đẩy v&agrave; cho cảm gi&aacute;c b&oacute;ng chuẩn x&aacute;c hơn.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Mặt Carbon T700 bền bỉ &ndash; Nh&aacute;m tăng 30%&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire sử dụng sợi Carbon T700 thế hệ mới cho độ bền vượt thời gian. Bề mặt nh&aacute;m tăng th&ecirc;m 30% gi&uacute;p tạo xo&aacute;y tốt hơn, hỗ trợ tối ưu c&aacute;c t&igrave;nh huống spin, giữ b&oacute;ng b&aacute;m mặt vợt l&acirc;u hơn, mang lại cảm gi&aacute;c kiểm so&aacute;t vượt trội.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Viền Foam giảm rung &ndash; Tối ưu lực đ&aacute;nh&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế Foam viền gi&uacute;p giảm rung r&otilde; rệt, tăng độ ổn định trong từng c&uacute; đ&aacute;nh. Người chơi c&oacute; cảm gi&aacute;c &ecirc;m tay hơn, đồng thời hạn chế tối đa rung chấn khi tiếp b&oacute;ng mạnh.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;SweetMax &ndash; Điểm ngọt mở rộng, giảm mis-hit&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire sở hữu cấu tr&uacute;c SweetMax gi&uacute;p mở rộng điểm ngọt của mặt vợt. Nhờ đ&oacute;, người chơi vẫn giữ được độ ổn định v&agrave; ch&iacute;nh x&aacute;c cao ngay cả khi đ&aacute;nh lệch t&acirc;m, hạn chế tối đa t&igrave;nh trạng mis-hit.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế lửa cuốn h&uacute;t &ndash; Phi&ecirc;n bản độc bản mang dấu ấn Dương Thi&ecirc;n Bảo&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire g&acirc;y ấn tượng mạnh với họa tiết lửa đặc trưng, kết hợp năm phối m&agrave;u mang dấu ấn c&aacute; nh&acirc;n của VĐV Dương Thi&ecirc;n Bảo. Mẫu vợt sở hữu phong c&aacute;ch thị gi&aacute;c mạnh mẽ, nổi bật ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Được tin chọn bởi nhiều VĐV chuy&ecirc;n nghiệp&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt đồng h&agrave;nh c&ugrave;ng nhiều vận động vi&ecirc;n trong nước v&agrave; quốc tế. Đặc biệt, sản phẩm đ&atilde; được VĐV Amanda Hendry lựa chọn v&agrave; c&ugrave;ng c&ocirc; gi&agrave;nh chức v&ocirc; địch tại Vietnam Masters Petrolimex Cup 2025.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;2900000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;2699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 6,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 5,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 250,
                &quot;san_pham_id&quot;: 29,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-navy-1.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-navy-1.jpg&quot;
            }
        },
        {
            &quot;id&quot;: 30,
            &quot;danh_muc_id&quot;: 6,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Vợt Pickeball Wika Bao Fire đỏ&quot;,
            &quot;duong_dan&quot;: &quot;vot-pickleball-wika-bao-fire-do&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-30287&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Lấy cảm hứng từ Na Tra, mang DNA chiến binh hệ Lửa với tốc độ v&agrave; sức mạnh b&ugrave;ng nổ.\nL&otilde;i Cannon-Core&trade; tạo tiếng nổ lớn, trợ lực mạnh cho reset, flick v&agrave; volley.\nMặt Carbon T700 nh&aacute;m tăng 30%, bền bỉ v&agrave; tối ưu spin, kiểm so&aacute;t b&oacute;ng.\nViền Foam giảm rung, thiết kế SweetMax mở rộng điểm ngọt, hạn chế mis-hit.\nThiết kế họa tiết lửa độc bản, được nhiều VĐV chọn d&ugrave;ng, đồng h&agrave;nh c&ugrave;ng nh&agrave; v&ocirc; địch Vietnam Masters 2025.&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt pickleball thế hệ mới lấy cảm hứng từ h&igrave;nh tượng Na Tra &ndash; nguồn năng lượng y&ecirc;u th&iacute;ch của VĐV Dương Thi&ecirc;n Bảo. Với DNA của một chiến binh hệ Lửa, Bao Fire mang đến trải nghiệm đ&aacute;nh b&ugrave;ng nổ, tốc độ vượt trội v&agrave; khả năng kiểm so&aacute;t b&oacute;ng tối đa trong mọi pha xử l&yacute;. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho người chơi theo phong c&aacute;ch tốc độ, phản xạ nhanh v&agrave; chủ động kiểm so&aacute;t thế trận.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;aligncenter wp-image-30289 size-full\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-do-2.jpg\&quot; alt=\&quot;vot-pickleball-wika-bao-fire-do-2\&quot; width=\&quot;1144\&quot; height=\&quot;1430\&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Acirc;m thanh vang dội &ndash; Trợ lực tối đa với Cannon-Core&trade;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Trang bị l&otilde;i Cannon-Core&trade;, Wika Bao Fire tạo n&ecirc;n tiếng nổ POP lớn đầy uy lực, gi&uacute;p người chơi cảm nhận r&otilde; lực truyền khi thực hiện c&aacute;c kỹ thuật reset, flick hay volley. C&ocirc;ng nghệ l&otilde;i tối ưu h&oacute;a độ đ&agrave;n hồi, tăng lực đẩy v&agrave; cho cảm gi&aacute;c b&oacute;ng chuẩn x&aacute;c hơn.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Mặt Carbon T700 bền bỉ &ndash; Nh&aacute;m tăng 30%&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire sử dụng sợi Carbon T700 thế hệ mới cho độ bền vượt thời gian. Bề mặt nh&aacute;m tăng th&ecirc;m 30% gi&uacute;p tạo xo&aacute;y tốt hơn, hỗ trợ tối ưu c&aacute;c t&igrave;nh huống spin, giữ b&oacute;ng b&aacute;m mặt vợt l&acirc;u hơn, mang lại cảm gi&aacute;c kiểm so&aacute;t vượt trội.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Viền Foam giảm rung &ndash; Tối ưu lực đ&aacute;nh&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế Foam viền gi&uacute;p giảm rung r&otilde; rệt, tăng độ ổn định trong từng c&uacute; đ&aacute;nh. Người chơi c&oacute; cảm gi&aacute;c &ecirc;m tay hơn, đồng thời hạn chế tối đa rung chấn khi tiếp b&oacute;ng mạnh.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;SweetMax &ndash; Điểm ngọt mở rộng, giảm mis-hit&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire sở hữu cấu tr&uacute;c SweetMax gi&uacute;p mở rộng điểm ngọt của mặt vợt. Nhờ đ&oacute;, người chơi vẫn giữ được độ ổn định v&agrave; ch&iacute;nh x&aacute;c cao ngay cả khi đ&aacute;nh lệch t&acirc;m, hạn chế tối đa t&igrave;nh trạng mis-hit.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Thiết kế lửa cuốn h&uacute;t &ndash; Phi&ecirc;n bản độc bản mang dấu ấn Dương Thi&ecirc;n Bảo&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Bao Fire g&acirc;y ấn tượng mạnh với họa tiết lửa đặc trưng, kết hợp năm phối m&agrave;u mang dấu ấn c&aacute; nh&acirc;n của VĐV Dương Thi&ecirc;n Bảo. Mẫu vợt sở hữu phong c&aacute;ch thị gi&aacute;c mạnh mẽ, nổi bật ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Được tin chọn bởi nhiều VĐV chuy&ecirc;n nghiệp&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Bao Fire l&agrave; mẫu vợt đồng h&agrave;nh c&ugrave;ng nhiều vận động vi&ecirc;n trong nước v&agrave; quốc tế. Đặc biệt, sản phẩm đ&atilde; được VĐV Amanda Hendry lựa chọn v&agrave; c&ugrave;ng c&ocirc; gi&agrave;nh chức v&ocirc; địch tại Vietnam Masters Petrolimex Cup 2025.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;2900000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;2699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 6,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 5,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 252,
                &quot;san_pham_id&quot;: 30,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-do-1.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/12/vot-pickleball-wika-bao-fire-do-1.jpg&quot;
            }
        },
        {
            &quot;id&quot;: 43,
            &quot;danh_muc_id&quot;: 7,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Wind đỏ&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da-wika-wind-do&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-29596&quot;,
            &quot;mo_ta_ngan&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Wind mang cảm hứng &ldquo;cơn lốc&rdquo;, thiết kế tốc độ v&agrave; mạnh mẽ.\nChất liệu Wikarotex co gi&atilde;n 4 chiều, mềm m&aacute;t, giữ form bền.\nC&ocirc;ng nghệ Witech-dry tho&aacute;t mồ h&ocirc;i nhanh, tối ưu cho thi đấu.\nForm Regular Fit dễ mặc, họa tiết bền m&agrave;u, logo PU phản quang.\nSize: S&ndash;XXL, ph&ugrave; hợp cả nam &amp;amp; nữ.\nĐặt &aacute;o đội li&ecirc;n hệ &ldquo;CHAT ZALO&rdquo; để được ưu đ&atilde;i!&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Wind &ndash; t&acirc;n binh đầy b&ugrave;ng nổ vừa ch&iacute;nh thức ra mắt, mang theo tinh thần tốc độ v&agrave; phong c&aacute;ch thiết kế hiện đại. Lấy cảm hứng từ chuyển động mạnh mẽ của cơn lốc xo&aacute;y, họa tiết bao phủ th&acirc;n &aacute;o gi&uacute;p tạo cảm gi&aacute;c nhanh &ndash; gọn &ndash; mạnh trong từng đường b&oacute;ng, trở th&agrave;nh lựa chọn l&yacute; tưởng cho những trận đấu đ&ograve;i hỏi sự linh hoạt v&agrave; bứt ph&aacute;.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&lt;strong&gt;Thiết kế ấn tượng &ndash; Tối ưu cho vận động&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o sở hữu form Regular Fit dễ mặc, &ocirc;m gọn cơ thể vừa đủ để t&ocirc;n d&aacute;ng m&agrave; vẫn đảm bảo thoải m&aacute;i khi di chuyển.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Cổ tr&ograve;n đi k&egrave;m phần viền cổ v&agrave; tay &aacute;o phối m&agrave;u đồng điệu, tạo n&ecirc;n tổng thể liền mạch, thể thao v&agrave; chuy&ecirc;n nghiệp hơn.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&lt;strong&gt;Chất liệu cao cấp &ndash; Sẵn s&agrave;ng cho mọi trận đấu&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Wind được ho&agrave;n thiện từ chất liệu Wikarotex co gi&atilde;n 4 chiều, mềm &ndash; m&aacute;t &ndash; &ocirc;m form l&acirc;u d&agrave;i, gi&uacute;p bạn tự tin thi đấu từ đầu đến cuối trận.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Kết hợp c&ugrave;ng c&ocirc;ng nghệ Witech-dry, &aacute;o tho&aacute;t mồ h&ocirc;i nhanh, giữ cơ thể lu&ocirc;n kh&ocirc; tho&aacute;ng ngay cả khi vận động cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&lt;strong&gt;Những ưu điểm nổi bật:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Chất liệu Wikarotex 4-way stretch đ&agrave;n hồi tốt, tho&aacute;ng nhẹ&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;C&ocirc;ng nghệ Witech-dry gi&uacute;p thấm h&uacute;t &ndash; tho&aacute;t mồ h&ocirc;i cực nhanh&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Hoạ tiết in sắc n&eacute;t, bền m&agrave;u theo thời gian&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Logo PU phản quang, nổi bật trong mọi điều kiện &aacute;nh s&aacute;ng&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Form Regular Fit ph&ugrave; hợp cả nam &amp;amp; nữ&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;T&aacute;i hiện tinh thần &ldquo;Wind&rdquo; &ndash; tốc độ, linh hoạt, b&ugrave;ng nổ&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Sẵn s&agrave;ng bứt ph&aacute; mọi giới hạn.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;H&atilde;y kho&aacute;c l&ecirc;n m&igrave;nh Wika Wind v&agrave; biến mỗi đường chạy tr&ecirc;n s&acirc;n th&agrave;nh một &ldquo;cơn lốc&rdquo; mang dấu ấn của ri&ecirc;ng bạn!&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;249000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;239000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: false,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 7,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
                &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 6,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;thuong_hieu&quot;: {
                &quot;id&quot;: 1,
                &quot;ten&quot;: &quot;Wika Sports&quot;,
                &quot;duong_dan&quot;: &quot;wika-sports&quot;,
                &quot;logo&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/10/wika-1.png&quot;,
                &quot;mo_ta&quot;: &quot;Thương hiệu thể thao h&agrave;ng đầu Việt Nam, đồng h&agrave;nh c&ugrave;ng Quang Hải, Ho&agrave;ng Đức, C&ocirc;ng Phượng.&quot;,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            },
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 337,
                &quot;san_pham_id&quot;: 43,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/11/ao-bong-da-wika-wind-do-1.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2025/11/ao-bong-da-wika-wind-do-1.jpg&quot;
            }
        }
    ],
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;last_page&quot;: 4,
        &quot;per_page&quot;: 12,
        &quot;total&quot;: 44,
        &quot;from&quot;: 1,
        &quot;to&quot;: 12
    },
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/v1/products?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/v1/products?page=4&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost:8000/api/v1/products?page=2&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-products" data-method="GET"
      data-path="api/v1/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-products"
                    onclick="tryItOut('GETapi-v1-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-products"
                    onclick="cancelTryOut('GETapi-v1-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tu_khoa</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tu_khoa"                data-endpoint="GETapi-v1-products"
               value="áo"
               data-component="query">
    <br>
<p>Tìm kiếm theo tên sản phẩm. Example: <code>áo</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>danh_muc_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="danh_muc_id"                data-endpoint="GETapi-v1-products"
               value="3"
               data-component="query">
    <br>
<p>Lọc theo ID danh mục. Example: <code>3</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>thuong_hieu_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="thuong_hieu_id"                data-endpoint="GETapi-v1-products"
               value=""
               data-component="query">
    <br>
<p>Lọc theo ID thương hiệu.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sap_xep</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sap_xep"                data-endpoint="GETapi-v1-products"
               value="moi_nhat"
               data-component="query">
    <br>
<p>Tiêu chí sắp xếp: <code>moi_nhat</code>, <code>ban_chay</code>, <code>gia_tang</code>, <code>gia_giam</code>. Example: <code>moi_nhat</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>gioi_han</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="gioi_han"                data-endpoint="GETapi-v1-products"
               value="12"
               data-component="query">
    <br>
<p>Số lượng sản phẩm trên mỗi trang (Mặc định: 12). Example: <code>12</code></p>
            </div>
                </form>

                    <h2 id="2-san-pham-danh-muc-khach-hang-GETapi-v1-products--slug-">Xem chi tiết sản phẩm</h2>

<p>
</p>

<p>Trả về thông tin chi tiết một sản phẩm, bao gồm biến thể và hình ảnh.
Cập nhật thêm luồng Tracking hành vi xem chi tiết phục vụ cho Suggestion ML.</p>

<span id="example-requests-GETapi-v1-products--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/products/ao-thun-the-thao-nam" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/products/ao-thun-the-thao-nam"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-products--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Sản phẩm kh&ocirc;ng tồn tại hoặc đ&atilde; ngừng b&aacute;n&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-products--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-products--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-products--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-products--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-products--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-products--slug-" data-method="GET"
      data-path="api/v1/products/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-products--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-products--slug-"
                    onclick="tryItOut('GETapi-v1-products--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-products--slug-"
                    onclick="cancelTryOut('GETapi-v1-products--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-products--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/products/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-products--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-products--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="slug"                data-endpoint="GETapi-v1-products--slug-"
               value="ao-thun-the-thao-nam"
               data-component="url">
    <br>
<p>Slug duy nhất của sản phẩm. Example: <code>ao-thun-the-thao-nam</code></p>
            </div>
                    </form>

                                <h2 id="2-san-pham-danh-muc-khach-hang-banner-trang-chu-quan-ly-hien-thi-banner-dong-tren-giao-dien-cua-hang">Banner Trang chủ

Quản lý hiển thị Banner động trên giao diện Cửa hàng.</h2>
                                                    <h2 id="2-san-pham-danh-muc-khach-hang-GETapi-v1-banners">Danh sách Banner</h2>

<p>
</p>

<p>Lấy các Banner đang hoạt động để hiển thị Slideshow trên Trang chủ.</p>

<span id="example-requests-GETapi-v1-banners">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/banners" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/banners"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-banners">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Danh s&aacute;ch Banner&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;tieu_de&quot;: &quot;Banner Gi&agrave;y b&oacute;ng đ&aacute; Wika 1&quot;,
            &quot;hinh_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2021/06/banner-giay-da-bong-1-2048x823.jpg&quot;,
            &quot;duong_dan&quot;: &quot;/danh-muc/giay-bong-da&quot;,
            &quot;thu_tu&quot;: 1,
            &quot;trang_thai&quot;: 1,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;tieu_de&quot;: &quot;Banner Gi&agrave;y b&oacute;ng đ&aacute; Wika 2&quot;,
            &quot;hinh_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2021/06/banner-giay-da-bong-2-scaled.jpg&quot;,
            &quot;duong_dan&quot;: &quot;/danh-muc/giay-bong-da&quot;,
            &quot;thu_tu&quot;: 2,
            &quot;trang_thai&quot;: 1,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;tieu_de&quot;: &quot;Nguyễn Ho&agrave;ng Đức x Wika&quot;,
            &quot;hinh_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2023/02/nguyen-hoang-duc-banner.jpg&quot;,
            &quot;duong_dan&quot;: &quot;/danh-muc/ao-bong-da&quot;,
            &quot;thu_tu&quot;: 3,
            &quot;trang_thai&quot;: 1,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;tieu_de&quot;: &quot;Wika Hunter&quot;,
            &quot;hinh_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2022/02/banner-wika-hunter-1536x568.jpg&quot;,
            &quot;duong_dan&quot;: &quot;/danh-muc/giay-bong-da&quot;,
            &quot;thu_tu&quot;: 4,
            &quot;trang_thai&quot;: 1,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:19.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-banners" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-banners"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-banners"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-banners" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-banners">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-banners" data-method="GET"
      data-path="api/v1/banners"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-banners', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-banners"
                    onclick="tryItOut('GETapi-v1-banners');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-banners"
                    onclick="cancelTryOut('GETapi-v1-banners');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-banners"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/banners</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-banners"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-banners"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="2-san-pham-danh-muc-khach-hang-danh-gia-san-pham">Đánh giá Sản phẩm</h2>
                                                    <h2 id="2-san-pham-danh-muc-khach-hang-POSTapi-v1-reviews">Gửi đánh giá</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Khách hàng gửi đánh giá cho sản phẩm đã mua. Đánh giá sẽ cần Admin duyệt trước khi hiển thị.</p>

<span id="example-requests-POSTapi-v1-reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/reviews" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"san_pham_id\": 1,
    \"don_hang_id\": 5,
    \"so_sao\": 5,
    \"tieu_de\": \"Sản phẩm rất tốt\",
    \"noi_dung\": \"Giày đi êm chân, đúng size.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/reviews"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "san_pham_id": 1,
    "don_hang_id": 5,
    "so_sao": 5,
    "tieu_de": "Sản phẩm rất tốt",
    "noi_dung": "Giày đi êm chân, đúng size."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-reviews">
</span>
<span id="execution-results-POSTapi-v1-reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-reviews" data-method="POST"
      data-path="api/v1/reviews"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-reviews"
                    onclick="tryItOut('POSTapi-v1-reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-reviews"
                    onclick="cancelTryOut('POSTapi-v1-reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-reviews"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>san_pham_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="san_pham_id"                data-endpoint="POSTapi-v1-reviews"
               value="1"
               data-component="body">
    <br>
<p>ID sản phẩm được đánh giá. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>don_hang_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="don_hang_id"                data-endpoint="POSTapi-v1-reviews"
               value="5"
               data-component="body">
    <br>
<p>ID đơn hàng. Giúp xác thực người dùng đã thực sự mua hàng. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>so_sao</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="so_sao"                data-endpoint="POSTapi-v1-reviews"
               value="5"
               data-component="body">
    <br>
<p>Số điểm đánh giá (1-5 sao). Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tieu_de</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tieu_de"                data-endpoint="POSTapi-v1-reviews"
               value="Sản phẩm rất tốt"
               data-component="body">
    <br>
<p>Tiêu đề đánh giá. Example: <code>Sản phẩm rất tốt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>noi_dung</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noi_dung"                data-endpoint="POSTapi-v1-reviews"
               value="Giày đi êm chân, đúng size."
               data-component="body">
    <br>
<p>Nội dung đánh giá chi tiết. Example: <code>Giày đi êm chân, đúng size.</code></p>
        </div>
        </form>

                    <h2 id="2-san-pham-danh-muc-khach-hang-GETapi-v1-reviews--id-">Chi tiết đánh giá</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-reviews--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/reviews/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/reviews/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-reviews--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-reviews--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-reviews--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-reviews--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-reviews--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-reviews--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-reviews--id-" data-method="GET"
      data-path="api/v1/reviews/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-reviews--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-reviews--id-"
                    onclick="tryItOut('GETapi-v1-reviews--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-reviews--id-"
                    onclick="cancelTryOut('GETapi-v1-reviews--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-reviews--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/reviews/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-reviews--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-reviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-reviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-reviews--id-"
               value="1"
               data-component="url">
    <br>
<p>ID của đánh giá. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="3-gio-hang-thanh-toan">3. Giỏ hàng & Thanh toán</h1>

    

                        <h2 id="3-gio-hang-thanh-toan-quan-ly-gio-hang-cho-phep-khach-hang-them-sua-xoa-san-pham-trong-gio-hang-ho-tro-ca-khach-vang-lai-luu-qua-header-x-session-id-va-nguoi-dung-da-dang-nhap-luu-qua-user-id">Quản lý Giỏ hàng

Cho phép khách hàng thêm, sửa, xóa sản phẩm trong giỏ hàng.
Hỗ trợ cả khách vãng lai (lưu qua Header `X-Session-ID`) và người dùng đã đăng nhập (lưu qua User ID).</h2>
                                                    <h2 id="3-gio-hang-thanh-toan-GETapi-v1-cart">Lấy thông tin giỏ hàng</h2>

<p>
</p>

<p>Lấy danh sách sản phẩm, tổng số lượng và số tiền tạm tính hiện có trong giỏ.</p>

<span id="example-requests-GETapi-v1-cart">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/cart" \
    --header "X-Session-ID: ID phiên làm việc (nếu người dùng chưa đăng nhập)" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/cart"
);

const headers = {
    "X-Session-ID": "ID phiên làm việc (nếu người dùng chưa đăng nhập)",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-cart">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-cart" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-cart"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-cart"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-cart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-cart">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-cart" data-method="GET"
      data-path="api/v1/cart"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-cart', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-cart"
                    onclick="tryItOut('GETapi-v1-cart');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-cart"
                    onclick="cancelTryOut('GETapi-v1-cart');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-cart"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/cart</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Session-ID</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Session-ID"                data-endpoint="GETapi-v1-cart"
               value="ID phiên làm việc (nếu người dùng chưa đăng nhập)"
               data-component="header">
    <br>
<p>Example: <code>ID phiên làm việc (nếu người dùng chưa đăng nhập)</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="3-gio-hang-thanh-toan-POSTapi-v1-cart-items">Thêm sản phẩm vào giỏ</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-cart-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/cart/items" \
    --header "X-Session-ID: ID phiên làm việc (nếu người dùng chưa đăng nhập)" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"san_pham_id\": 1,
    \"bien_the_id\": null,
    \"so_luong\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/cart/items"
);

const headers = {
    "X-Session-ID": "ID phiên làm việc (nếu người dùng chưa đăng nhập)",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "san_pham_id": 1,
    "bien_the_id": null,
    "so_luong": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-cart-items">
</span>
<span id="execution-results-POSTapi-v1-cart-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-cart-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-cart-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-cart-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-cart-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-cart-items" data-method="POST"
      data-path="api/v1/cart/items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-cart-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-cart-items"
                    onclick="tryItOut('POSTapi-v1-cart-items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-cart-items"
                    onclick="cancelTryOut('POSTapi-v1-cart-items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-cart-items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/cart/items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Session-ID</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Session-ID"                data-endpoint="POSTapi-v1-cart-items"
               value="ID phiên làm việc (nếu người dùng chưa đăng nhập)"
               data-component="header">
    <br>
<p>Example: <code>ID phiên làm việc (nếu người dùng chưa đăng nhập)</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-cart-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-cart-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>san_pham_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="san_pham_id"                data-endpoint="POSTapi-v1-cart-items"
               value="1"
               data-component="body">
    <br>
<p>ID của sản phẩm muốn thêm. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bien_the_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="bien_the_id"                data-endpoint="POSTapi-v1-cart-items"
               value=""
               data-component="body">
    <br>
<p>ID của biến thể (kích thước, màu sắc). Null nếu sản phẩm không có biến thể.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>so_luong</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="so_luong"                data-endpoint="POSTapi-v1-cart-items"
               value="1"
               data-component="body">
    <br>
<p>Số lượng muốn thêm (1-99). Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="3-gio-hang-thanh-toan-PUTapi-v1-cart-items--id-">Cập nhật số lượng sản phẩm</h2>

<p>
</p>



<span id="example-requests-PUTapi-v1-cart-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/cart/items/16" \
    --header "X-Session-ID: ID phiên làm việc (nếu người dùng chưa đăng nhập)" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"so_luong\": 2
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/cart/items/16"
);

const headers = {
    "X-Session-ID": "ID phiên làm việc (nếu người dùng chưa đăng nhập)",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "so_luong": 2
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-cart-items--id-">
</span>
<span id="execution-results-PUTapi-v1-cart-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-cart-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-cart-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-cart-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-cart-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-cart-items--id-" data-method="PUT"
      data-path="api/v1/cart/items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-cart-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-cart-items--id-"
                    onclick="tryItOut('PUTapi-v1-cart-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-cart-items--id-"
                    onclick="cancelTryOut('PUTapi-v1-cart-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-cart-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/cart/items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Session-ID</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Session-ID"                data-endpoint="PUTapi-v1-cart-items--id-"
               value="ID phiên làm việc (nếu người dùng chưa đăng nhập)"
               data-component="header">
    <br>
<p>Example: <code>ID phiên làm việc (nếu người dùng chưa đăng nhập)</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-cart-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-cart-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-cart-items--id-"
               value="16"
               data-component="url">
    <br>
<p>ID của item trong giỏ hàng (không phải san_pham_id) Example: <code>16</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>so_luong</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="so_luong"                data-endpoint="PUTapi-v1-cart-items--id-"
               value="2"
               data-component="body">
    <br>
<p>Số lượng mới muốn cập nhật (1-99). Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="3-gio-hang-thanh-toan-DELETEapi-v1-cart-items--id-">Xóa sản phẩm khỏi giỏ</h2>

<p>
</p>



<span id="example-requests-DELETEapi-v1-cart-items--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/cart/items/16" \
    --header "X-Session-ID: ID phiên làm việc (nếu người dùng chưa đăng nhập)" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/cart/items/16"
);

const headers = {
    "X-Session-ID": "ID phiên làm việc (nếu người dùng chưa đăng nhập)",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-cart-items--id-">
</span>
<span id="execution-results-DELETEapi-v1-cart-items--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-cart-items--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-cart-items--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-cart-items--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-cart-items--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-cart-items--id-" data-method="DELETE"
      data-path="api/v1/cart/items/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-cart-items--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-cart-items--id-"
                    onclick="tryItOut('DELETEapi-v1-cart-items--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-cart-items--id-"
                    onclick="cancelTryOut('DELETEapi-v1-cart-items--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-cart-items--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/cart/items/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Session-ID</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Session-ID"                data-endpoint="DELETEapi-v1-cart-items--id-"
               value="ID phiên làm việc (nếu người dùng chưa đăng nhập)"
               data-component="header">
    <br>
<p>Example: <code>ID phiên làm việc (nếu người dùng chưa đăng nhập)</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-cart-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-cart-items--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-cart-items--id-"
               value="16"
               data-component="url">
    <br>
<p>ID của item trong giỏ hàng (không phải san_pham_id) Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="3-gio-hang-thanh-toan-DELETEapi-v1-cart">Xóa toàn bộ giỏ hàng</h2>

<p>
</p>

<p>Dùng khi người dùng muốn dọn dẹp giỏ hoặc sau khi đặt hàng thành công.</p>

<span id="example-requests-DELETEapi-v1-cart">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/cart" \
    --header "X-Session-ID: ID phiên làm việc (nếu người dùng chưa đăng nhập)" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/cart"
);

const headers = {
    "X-Session-ID": "ID phiên làm việc (nếu người dùng chưa đăng nhập)",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-cart">
</span>
<span id="execution-results-DELETEapi-v1-cart" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-cart"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-cart"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-cart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-cart">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-cart" data-method="DELETE"
      data-path="api/v1/cart"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-cart', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-cart"
                    onclick="tryItOut('DELETEapi-v1-cart');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-cart"
                    onclick="cancelTryOut('DELETEapi-v1-cart');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-cart"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/cart</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>X-Session-ID</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="X-Session-ID"                data-endpoint="DELETEapi-v1-cart"
               value="ID phiên làm việc (nếu người dùng chưa đăng nhập)"
               data-component="header">
    <br>
<p>Example: <code>ID phiên làm việc (nếu người dùng chưa đăng nhập)</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-cart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                                <h2 id="3-gio-hang-thanh-toan-ma-giam-gia">Mã giảm giá</h2>
                                                    <h2 id="3-gio-hang-thanh-toan-POSTapi-v1-coupons-validate">Kiểm tra mã giảm giá</h2>

<p>
</p>

<p>Xác thực mã giảm giá do người dùng nhập trước khi áp dụng vào đơn hàng.
Trả về số tiền được giảm nếu mã hợp lệ.</p>

<span id="example-requests-POSTapi-v1-coupons-validate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/coupons/validate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ma_code\": \"SALE2025\",
    \"tam_tinh\": \"500000\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/coupons/validate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ma_code": "SALE2025",
    "tam_tinh": "500000"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-coupons-validate">
</span>
<span id="execution-results-POSTapi-v1-coupons-validate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-coupons-validate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-coupons-validate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-coupons-validate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-coupons-validate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-coupons-validate" data-method="POST"
      data-path="api/v1/coupons/validate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-coupons-validate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-coupons-validate"
                    onclick="tryItOut('POSTapi-v1-coupons-validate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-coupons-validate"
                    onclick="cancelTryOut('POSTapi-v1-coupons-validate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-coupons-validate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/coupons/validate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-coupons-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-coupons-validate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ma_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ma_code"                data-endpoint="POSTapi-v1-coupons-validate"
               value="SALE2025"
               data-component="body">
    <br>
<p>Mã giảm giá người dùng nhập. Example: <code>SALE2025</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tam_tinh</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tam_tinh"                data-endpoint="POSTapi-v1-coupons-validate"
               value="500000"
               data-component="body">
    <br>
<p>Tổng tiền tạm tính của giỏ hàng. Example: <code>500000</code></p>
        </div>
        </form>

                                <h2 id="3-gio-hang-thanh-toan-thanh-toan-lich-su-don-hang-cho-phep-khach-hang-xem-lich-su-mua-hang-chi-tiet-don-va-thuc-hien-dat-hang-checkout">Thanh toán &amp; Lịch sử đơn hàng

Cho phép khách hàng xem lịch sử mua hàng, chi tiết đơn và thực hiện đặt hàng (Checkout).</h2>
                                                    <h2 id="3-gio-hang-thanh-toan-GETapi-v1-orders">Danh sách Đơn hàng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Lấy danh sách lịch sử đơn hàng của người dùng đang đăng nhập. Có phân trang.</p>

<span id="example-requests-GETapi-v1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/orders" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/orders"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-orders">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-orders" data-method="GET"
      data-path="api/v1/orders"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-orders"
                    onclick="tryItOut('GETapi-v1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-orders"
                    onclick="cancelTryOut('GETapi-v1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-orders"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="3-gio-hang-thanh-toan-POSTapi-v1-orders">Đặt hàng (Checkout)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tạo đơn hàng mới từ các mặt hàng đang có trong Giỏ. Sau khi thanh toán thành công, giỏ hàng sẽ bị xóa.</p>

<span id="example-requests-POSTapi-v1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/orders" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"dia_chi_id\": 2,
    \"phuong_thuc_tt\": \"cod\",
    \"ma_coupon\": \"SALE2025\",
    \"ghi_chu\": \"Giao vào giờ hành chính\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/orders"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "dia_chi_id": 2,
    "phuong_thuc_tt": "cod",
    "ma_coupon": "SALE2025",
    "ghi_chu": "Giao vào giờ hành chính"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-orders">
</span>
<span id="execution-results-POSTapi-v1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-orders" data-method="POST"
      data-path="api/v1/orders"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-orders"
                    onclick="tryItOut('POSTapi-v1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-orders"
                    onclick="cancelTryOut('POSTapi-v1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-orders"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dia_chi_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="dia_chi_id"                data-endpoint="POSTapi-v1-orders"
               value="2"
               data-component="body">
    <br>
<p>ID địa chỉ giao hàng của người dùng. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phuong_thuc_tt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phuong_thuc_tt"                data-endpoint="POSTapi-v1-orders"
               value="cod"
               data-component="body">
    <br>
<p>Phương thức thanh toán (cod, chuyen_khoan, vnpay, momo). Example: <code>cod</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ma_coupon</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ma_coupon"                data-endpoint="POSTapi-v1-orders"
               value="SALE2025"
               data-component="body">
    <br>
<p>Mã giảm giá (nếu có áp dụng). Example: <code>SALE2025</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ghi_chu</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ghi_chu"                data-endpoint="POSTapi-v1-orders"
               value="Giao vào giờ hành chính"
               data-component="body">
    <br>
<p>Ghi chú thêm cho đơn hàng. Example: <code>Giao vào giờ hành chính</code></p>
        </div>
        </form>

                    <h2 id="3-gio-hang-thanh-toan-GETapi-v1-orders--code-">Chi tiết đơn hàng</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Xem chi tiết một đơn hàng thông qua Mã đơn hàng.</p>

<span id="example-requests-GETapi-v1-orders--code-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/orders/DH202503050001" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/orders/DH202503050001"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-orders--code-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-orders--code-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-orders--code-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-orders--code-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-orders--code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-orders--code-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-orders--code-" data-method="GET"
      data-path="api/v1/orders/{code}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-orders--code-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-orders--code-"
                    onclick="tryItOut('GETapi-v1-orders--code-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-orders--code-"
                    onclick="cancelTryOut('GETapi-v1-orders--code-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-orders--code-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/orders/{code}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-orders--code-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-orders--code-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-orders--code-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="code"                data-endpoint="GETapi-v1-orders--code-"
               value="DH202503050001"
               data-component="url">
    <br>
<p>Mã đơn hàng (VD: DH202503...). Example: <code>DH202503050001</code></p>
            </div>
                    </form>

                <h1 id="4-thong-tin-ca-nhan-dia-chi">4. Thông tin cá nhân & Địa chỉ</h1>

    

                        <h2 id="4-thong-tin-ca-nhan-dia-chi-so-dia-chi-quan-ly-so-dia-chi-giao-hang-cua-nguoi-dung">Sổ địa chỉ

Quản lý sổ địa chỉ giao hàng của người dùng.</h2>
                                                    <h2 id="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-addresses">Danh sách địa chỉ</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-addresses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/addresses" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/addresses"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-addresses">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-addresses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-addresses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-addresses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-addresses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-addresses" data-method="GET"
      data-path="api/v1/addresses"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-addresses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-addresses"
                    onclick="tryItOut('GETapi-v1-addresses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-addresses"
                    onclick="cancelTryOut('GETapi-v1-addresses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-addresses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/addresses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-addresses"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="4-thong-tin-ca-nhan-dia-chi-POSTapi-v1-addresses">Thêm địa chỉ mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-addresses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/addresses" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ho_va_ten\": \"Nguyễn Văn B\",
    \"so_dien_thoai\": \"0988777666\",
    \"tinh_thanh\": \"Hà Nội\",
    \"quan_huyen\": \"Cầu Giấy\",
    \"phuong_xa\": \"Dịch Vọng\",
    \"dia_chi_cu_the\": \"123 Xuân Thủy\",
    \"la_mac_dinh\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/addresses"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ho_va_ten": "Nguyễn Văn B",
    "so_dien_thoai": "0988777666",
    "tinh_thanh": "Hà Nội",
    "quan_huyen": "Cầu Giấy",
    "phuong_xa": "Dịch Vọng",
    "dia_chi_cu_the": "123 Xuân Thủy",
    "la_mac_dinh": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-addresses">
</span>
<span id="execution-results-POSTapi-v1-addresses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-addresses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-addresses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-addresses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-addresses" data-method="POST"
      data-path="api/v1/addresses"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-addresses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-addresses"
                    onclick="tryItOut('POSTapi-v1-addresses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-addresses"
                    onclick="cancelTryOut('POSTapi-v1-addresses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-addresses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/addresses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-addresses"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-addresses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ho_va_ten</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ho_va_ten"                data-endpoint="POSTapi-v1-addresses"
               value="Nguyễn Văn B"
               data-component="body">
    <br>
<p>Họ và tên người nhận. Example: <code>Nguyễn Văn B</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>so_dien_thoai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="so_dien_thoai"                data-endpoint="POSTapi-v1-addresses"
               value="0988777666"
               data-component="body">
    <br>
<p>Số điện thoại nhận hàng. Example: <code>0988777666</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tinh_thanh</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tinh_thanh"                data-endpoint="POSTapi-v1-addresses"
               value="Hà Nội"
               data-component="body">
    <br>
<p>Tỉnh/Thành phố. Example: <code>Hà Nội</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quan_huyen</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="quan_huyen"                data-endpoint="POSTapi-v1-addresses"
               value="Cầu Giấy"
               data-component="body">
    <br>
<p>Quận/Huyện. Example: <code>Cầu Giấy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phuong_xa</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phuong_xa"                data-endpoint="POSTapi-v1-addresses"
               value="Dịch Vọng"
               data-component="body">
    <br>
<p>Phường/Xã. Example: <code>Dịch Vọng</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dia_chi_cu_the</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dia_chi_cu_the"                data-endpoint="POSTapi-v1-addresses"
               value="123 Xuân Thủy"
               data-component="body">
    <br>
<p>Số nhà, đường. Example: <code>123 Xuân Thủy</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>la_mac_dinh</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-addresses" style="display: none">
            <input type="radio" name="la_mac_dinh"
                   value="true"
                   data-endpoint="POSTapi-v1-addresses"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-addresses" style="display: none">
            <input type="radio" name="la_mac_dinh"
                   value="false"
                   data-endpoint="POSTapi-v1-addresses"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Đặt làm địa chỉ mặc định (true/false). Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-addresses--id-">Lấy chi tiết một địa chỉ</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-addresses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/addresses/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/addresses/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-addresses--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-addresses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-addresses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-addresses--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-addresses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-addresses--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-addresses--id-" data-method="GET"
      data-path="api/v1/addresses/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-addresses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-addresses--id-"
                    onclick="tryItOut('GETapi-v1-addresses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-addresses--id-"
                    onclick="cancelTryOut('GETapi-v1-addresses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-addresses--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/addresses/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-addresses--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-addresses--id-"
               value="1"
               data-component="url">
    <br>
<p>ID của địa chỉ. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-addresses--id-">Cập nhật địa chỉ</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-addresses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/addresses/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ho_va_ten\": \"Nguyễn Văn B\",
    \"so_dien_thoai\": \"0988777666\",
    \"tinh_thanh\": \"Hồ Chí Minh\",
    \"quan_huyen\": \"Quận 1\",
    \"phuong_xa\": \"Bến Nghé\",
    \"dia_chi_cu_the\": \"Tòa nhà Bitexco\",
    \"la_mac_dinh\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/addresses/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ho_va_ten": "Nguyễn Văn B",
    "so_dien_thoai": "0988777666",
    "tinh_thanh": "Hồ Chí Minh",
    "quan_huyen": "Quận 1",
    "phuong_xa": "Bến Nghé",
    "dia_chi_cu_the": "Tòa nhà Bitexco",
    "la_mac_dinh": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-addresses--id-">
</span>
<span id="execution-results-PUTapi-v1-addresses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-addresses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-addresses--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-addresses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-addresses--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-addresses--id-" data-method="PUT"
      data-path="api/v1/addresses/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-addresses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-addresses--id-"
                    onclick="tryItOut('PUTapi-v1-addresses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-addresses--id-"
                    onclick="cancelTryOut('PUTapi-v1-addresses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-addresses--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/addresses/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/addresses/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-addresses--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-addresses--id-"
               value="1"
               data-component="url">
    <br>
<p>ID của địa chỉ cần sửa. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ho_va_ten</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ho_va_ten"                data-endpoint="PUTapi-v1-addresses--id-"
               value="Nguyễn Văn B"
               data-component="body">
    <br>
<p>Họ và tên người nhận. Example: <code>Nguyễn Văn B</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>so_dien_thoai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="so_dien_thoai"                data-endpoint="PUTapi-v1-addresses--id-"
               value="0988777666"
               data-component="body">
    <br>
<p>Số điện thoại nhận hàng. Example: <code>0988777666</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tinh_thanh</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tinh_thanh"                data-endpoint="PUTapi-v1-addresses--id-"
               value="Hồ Chí Minh"
               data-component="body">
    <br>
<p>Tỉnh/Thành phố. Example: <code>Hồ Chí Minh</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quan_huyen</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="quan_huyen"                data-endpoint="PUTapi-v1-addresses--id-"
               value="Quận 1"
               data-component="body">
    <br>
<p>Quận/Huyện. Example: <code>Quận 1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phuong_xa</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phuong_xa"                data-endpoint="PUTapi-v1-addresses--id-"
               value="Bến Nghé"
               data-component="body">
    <br>
<p>Phường/Xã. Example: <code>Bến Nghé</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dia_chi_cu_the</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dia_chi_cu_the"                data-endpoint="PUTapi-v1-addresses--id-"
               value="Tòa nhà Bitexco"
               data-component="body">
    <br>
<p>Số nhà, đường. Example: <code>Tòa nhà Bitexco</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>la_mac_dinh</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-addresses--id-" style="display: none">
            <input type="radio" name="la_mac_dinh"
                   value="true"
                   data-endpoint="PUTapi-v1-addresses--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-addresses--id-" style="display: none">
            <input type="radio" name="la_mac_dinh"
                   value="false"
                   data-endpoint="PUTapi-v1-addresses--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Đặt làm địa chỉ mặc định (true/false). Example: <code>true</code></p>
        </div>
        </form>

                    <h2 id="4-thong-tin-ca-nhan-dia-chi-DELETEapi-v1-addresses--id-">Xóa địa chỉ</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-addresses--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/addresses/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/addresses/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-addresses--id-">
</span>
<span id="execution-results-DELETEapi-v1-addresses--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-addresses--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-addresses--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-addresses--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-addresses--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-addresses--id-" data-method="DELETE"
      data-path="api/v1/addresses/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-addresses--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-addresses--id-"
                    onclick="tryItOut('DELETEapi-v1-addresses--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-addresses--id-"
                    onclick="cancelTryOut('DELETEapi-v1-addresses--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-addresses--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/addresses/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-addresses--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-addresses--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-addresses--id-"
               value="1"
               data-component="url">
    <br>
<p>ID của địa chỉ cần xóa. Example: <code>1</code></p>
            </div>
                    </form>

                                <h2 id="4-thong-tin-ca-nhan-dia-chi-yeu-thich">Yêu thích</h2>
                                                    <h2 id="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-wishlist">Danh sách sản phẩm yêu thích</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-wishlist">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/wishlist" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/wishlist"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-wishlist">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-wishlist" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-wishlist"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-wishlist"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-wishlist" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-wishlist">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-wishlist" data-method="GET"
      data-path="api/v1/wishlist"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-wishlist', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-wishlist"
                    onclick="tryItOut('GETapi-v1-wishlist');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-wishlist"
                    onclick="cancelTryOut('GETapi-v1-wishlist');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-wishlist"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/wishlist</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-wishlist"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-wishlist"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-wishlist"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="4-thong-tin-ca-nhan-dia-chi-POSTapi-v1-wishlist--productId-">Thêm/Xóa yêu thích</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Tự động thêm sản phẩm vào danh sách yêu thích nếu chưa có, hoặc xóa khỏi danh sách nếu đã tồn tại.</p>

<span id="example-requests-POSTapi-v1-wishlist--productId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/wishlist/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/wishlist/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-wishlist--productId-">
</span>
<span id="execution-results-POSTapi-v1-wishlist--productId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-wishlist--productId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-wishlist--productId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-wishlist--productId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-wishlist--productId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-wishlist--productId-" data-method="POST"
      data-path="api/v1/wishlist/{productId}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-wishlist--productId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-wishlist--productId-"
                    onclick="tryItOut('POSTapi-v1-wishlist--productId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-wishlist--productId-"
                    onclick="cancelTryOut('POSTapi-v1-wishlist--productId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-wishlist--productId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/wishlist/{productId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-wishlist--productId-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-wishlist--productId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-wishlist--productId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>productId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="productId"                data-endpoint="POSTapi-v1-wishlist--productId-"
               value="1"
               data-component="url">
    <br>
<p>ID sản phẩm. Example: <code>1</code></p>
            </div>
                    </form>

                                <h2 id="4-thong-tin-ca-nhan-dia-chi-quan-ly-thong-bao-kiem-tra-cac-thong-bao-don-hang-khuyen-mai-he-thong-danh-rieng-cho-nguoi-dung">Quản lý Thông báo

Kiểm tra các thông báo (đơn hàng, khuyến mãi, hệ thống...) dành riêng cho người dùng.</h2>
                                                    <h2 id="4-thong-tin-ca-nhan-dia-chi-GETapi-v1-notifications">Lấy danh sách thông báo</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-notifications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/notifications" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/notifications"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-notifications">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-notifications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-notifications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-notifications"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-notifications">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-notifications" data-method="GET"
      data-path="api/v1/notifications"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-notifications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-notifications"
                    onclick="tryItOut('GETapi-v1-notifications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-notifications"
                    onclick="cancelTryOut('GETapi-v1-notifications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-notifications"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/notifications</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-notifications"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-notifications"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-notifications--id--read">Đánh dấu 1 thông báo là đã đọc</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-notifications--id--read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/notifications/1/read" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/notifications/1/read"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-notifications--id--read">
</span>
<span id="execution-results-PUTapi-v1-notifications--id--read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-notifications--id--read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-notifications--id--read"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-notifications--id--read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-notifications--id--read">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-notifications--id--read" data-method="PUT"
      data-path="api/v1/notifications/{id}/read"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-notifications--id--read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-notifications--id--read"
                    onclick="tryItOut('PUTapi-v1-notifications--id--read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-notifications--id--read"
                    onclick="cancelTryOut('PUTapi-v1-notifications--id--read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-notifications--id--read"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/notifications/{id}/read</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-notifications--id--read"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-notifications--id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-notifications--id--read"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-notifications--id--read"
               value="1"
               data-component="url">
    <br>
<p>ID thông báo. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="4-thong-tin-ca-nhan-dia-chi-PUTapi-v1-notifications-read-all">Đánh dấu toàn bộ là đã đọc</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-notifications-read-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/notifications/read-all" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/notifications/read-all"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-notifications-read-all">
</span>
<span id="execution-results-PUTapi-v1-notifications-read-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-notifications-read-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-notifications-read-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-notifications-read-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-notifications-read-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-notifications-read-all" data-method="PUT"
      data-path="api/v1/notifications/read-all"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-notifications-read-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-notifications-read-all"
                    onclick="tryItOut('PUTapi-v1-notifications-read-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-notifications-read-all"
                    onclick="cancelTryOut('PUTapi-v1-notifications-read-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-notifications-read-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/notifications/read-all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-notifications-read-all"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-notifications-read-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="6-quan-tri-vien-admin">6. Quản trị viên (Admin)</h1>

    

                        <h2 id="6-quan-tri-vien-admin-quan-ly-san-pham">Quản lý Sản phẩm</h2>
                                                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-products">Danh sách sản phẩm (Admin)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Lấy toàn bộ danh sách sản phẩm phục vụ trang quản trị.</p>

<span id="example-requests-GETapi-v1-admin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/products"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-products">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-products" data-method="GET"
      data-path="api/v1/admin/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-products"
                    onclick="tryItOut('GETapi-v1-admin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-products"
                    onclick="cancelTryOut('GETapi-v1-admin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-products"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="6-quan-tri-vien-admin-POSTapi-v1-admin-products">Tạo sản phẩm mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/admin/products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ten_san_pham\": \"Áo khoác thể thao\",
    \"danh_muc_id\": 1,
    \"thuong_hieu_id\": 2,
    \"gia_goc\": \"500000\",
    \"gia_khuyen_mai\": \"450000\",
    \"mo_ta_ngan\": \"Áo khoác dù chống nước\",
    \"mo_ta_day_du\": \"&lt;p&gt;Chi tiết...&lt;\\/p&gt;\",
    \"trang_thai\": true,
    \"noi_bat\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/products"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ten_san_pham": "Áo khoác thể thao",
    "danh_muc_id": 1,
    "thuong_hieu_id": 2,
    "gia_goc": "500000",
    "gia_khuyen_mai": "450000",
    "mo_ta_ngan": "Áo khoác dù chống nước",
    "mo_ta_day_du": "&lt;p&gt;Chi tiết...&lt;\/p&gt;",
    "trang_thai": true,
    "noi_bat": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-products">
</span>
<span id="execution-results-POSTapi-v1-admin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-products" data-method="POST"
      data-path="api/v1/admin/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-products"
                    onclick="tryItOut('POSTapi-v1-admin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-products"
                    onclick="cancelTryOut('POSTapi-v1-admin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-products"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ten_san_pham</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ten_san_pham"                data-endpoint="POSTapi-v1-admin-products"
               value="Áo khoác thể thao"
               data-component="body">
    <br>
<p>Tên sản phẩm. Example: <code>Áo khoác thể thao</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>danh_muc_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="danh_muc_id"                data-endpoint="POSTapi-v1-admin-products"
               value="1"
               data-component="body">
    <br>
<p>ID danh mục. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>thuong_hieu_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="thuong_hieu_id"                data-endpoint="POSTapi-v1-admin-products"
               value="2"
               data-component="body">
    <br>
<p>ID thương hiệu (nếu có). Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gia_goc</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gia_goc"                data-endpoint="POSTapi-v1-admin-products"
               value="500000"
               data-component="body">
    <br>
<p>Giá nhập / Giá niêm yết. Example: <code>500000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gia_khuyen_mai</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gia_khuyen_mai"                data-endpoint="POSTapi-v1-admin-products"
               value="450000"
               data-component="body">
    <br>
<p>Giá bán thực tế sau giảm. Example: <code>450000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mo_ta_ngan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mo_ta_ngan"                data-endpoint="POSTapi-v1-admin-products"
               value="Áo khoác dù chống nước"
               data-component="body">
    <br>
<p>Mô tả ngắn. Example: <code>Áo khoác dù chống nước</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mo_ta_day_du</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mo_ta_day_du"                data-endpoint="POSTapi-v1-admin-products"
               value="<p>Chi tiết...</p>"
               data-component="body">
    <br>
<p>Mô tả chi tiết (HTML). Example: <code>&lt;p&gt;Chi tiết...&lt;/p&gt;</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>trang_thai</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-admin-products" style="display: none">
            <input type="radio" name="trang_thai"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-products"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-products" style="display: none">
            <input type="radio" name="trang_thai"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-products"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Có đang mở bán hay không. Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>noi_bat</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="POSTapi-v1-admin-products" style="display: none">
            <input type="radio" name="noi_bat"
                   value="true"
                   data-endpoint="POSTapi-v1-admin-products"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v1-admin-products" style="display: none">
            <input type="radio" name="noi_bat"
                   value="false"
                   data-endpoint="POSTapi-v1-admin-products"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Có đưa lên danh sách nổi bật không. Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-products--id-">GET api/v1/admin/products/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/products/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/products/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-products--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-products--id-" data-method="GET"
      data-path="api/v1/admin/products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-products--id-"
                    onclick="tryItOut('GETapi-v1-admin-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-products--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-products--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-products--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-PUTapi-v1-admin-products--id-">PUT api/v1/admin/products/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/admin/products/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ten_san_pham\": \"b\",
    \"danh_muc_id\": 16,
    \"thuong_hieu_id\": 16,
    \"gia_goc\": 39,
    \"gia_khuyen_mai\": 84,
    \"trang_thai\": true,
    \"noi_bat\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/products/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ten_san_pham": "b",
    "danh_muc_id": 16,
    "thuong_hieu_id": 16,
    "gia_goc": 39,
    "gia_khuyen_mai": 84,
    "trang_thai": true,
    "noi_bat": false
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-products--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-products--id-" data-method="PUT"
      data-path="api/v1/admin/products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-products--id-"
                    onclick="tryItOut('PUTapi-v1-admin-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-products--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/products/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-products--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ten_san_pham</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ten_san_pham"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 200 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>danh_muc_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="danh_muc_id"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the danh_muc table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>thuong_hieu_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="thuong_hieu_id"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the thuong_hieu table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gia_goc</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="gia_goc"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gia_khuyen_mai</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="gia_khuyen_mai"                data-endpoint="PUTapi-v1-admin-products--id-"
               value="84"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>84</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>trang_thai</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-admin-products--id-" style="display: none">
            <input type="radio" name="trang_thai"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-products--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-products--id-" style="display: none">
            <input type="radio" name="trang_thai"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-products--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>true</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>noi_bat</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="PUTapi-v1-admin-products--id-" style="display: none">
            <input type="radio" name="noi_bat"
                   value="true"
                   data-endpoint="PUTapi-v1-admin-products--id-"
                   data-component="body"             >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-v1-admin-products--id-" style="display: none">
            <input type="radio" name="noi_bat"
                   value="false"
                   data-endpoint="PUTapi-v1-admin-products--id-"
                   data-component="body"             >
            <code>false</code>
        </label>
    <br>
<p>Example: <code>false</code></p>
        </div>
        </form>

                    <h2 id="6-quan-tri-vien-admin-DELETEapi-v1-admin-products--id-">DELETE api/v1/admin/products/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/admin/products/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/products/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-products--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-products--id-" data-method="DELETE"
      data-path="api/v1/admin/products/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-products--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-products--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-products--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-products--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-products--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-products--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-products--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>architecto</code></p>
            </div>
                    </form>

                                <h2 id="6-quan-tri-vien-admin-quan-ly-danh-muc">Quản lý Danh mục</h2>
                                                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-categories">Danh sách danh mục (Admin)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/categories" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/categories"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-categories">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-categories" data-method="GET"
      data-path="api/v1/admin/categories"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-categories"
                    onclick="tryItOut('GETapi-v1-admin-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-categories"
                    onclick="cancelTryOut('GETapi-v1-admin-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-categories"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="6-quan-tri-vien-admin-POSTapi-v1-admin-categories">Tạo danh mục mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/admin/categories" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ten\": \"Giày bóng đá\",
    \"danh_muc_cha_id\": null
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/categories"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ten": "Giày bóng đá",
    "danh_muc_cha_id": null
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-categories">
</span>
<span id="execution-results-POSTapi-v1-admin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-categories" data-method="POST"
      data-path="api/v1/admin/categories"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-categories"
                    onclick="tryItOut('POSTapi-v1-admin-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-categories"
                    onclick="cancelTryOut('POSTapi-v1-admin-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-categories"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ten</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ten"                data-endpoint="POSTapi-v1-admin-categories"
               value="Giày bóng đá"
               data-component="body">
    <br>
<p>Tên danh mục. Example: <code>Giày bóng đá</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>danh_muc_cha_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="danh_muc_cha_id"                data-endpoint="POSTapi-v1-admin-categories"
               value=""
               data-component="body">
    <br>
<p>ID danh mục cha (Nếu là danh mục con).</p>
        </div>
        </form>

                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-categories--id-">GET api/v1/admin/categories/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/categories/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/categories/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-categories--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-categories--id-" data-method="GET"
      data-path="api/v1/admin/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-categories--id-"
                    onclick="tryItOut('GETapi-v1-admin-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-categories--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-categories--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-categories--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-PUTapi-v1-admin-categories--id-">PUT api/v1/admin/categories/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/admin/categories/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/categories/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-categories--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-categories--id-" data-method="PUT"
      data-path="api/v1/admin/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-categories--id-"
                    onclick="tryItOut('PUTapi-v1-admin-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-categories--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/categories/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-categories--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-categories--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-DELETEapi-v1-admin-categories--id-">DELETE api/v1/admin/categories/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/admin/categories/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/categories/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-categories--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-categories--id-" data-method="DELETE"
      data-path="api/v1/admin/categories/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-categories--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-categories--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-categories--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-categories--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>architecto</code></p>
            </div>
                    </form>

                                <h2 id="6-quan-tri-vien-admin-quan-ly-thuong-hieu">Quản lý Thương hiệu</h2>
                                                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-brands">Danh sách thương hiệu (Admin)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/brands" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/brands"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-brands">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-brands" data-method="GET"
      data-path="api/v1/admin/brands"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-brands"
                    onclick="tryItOut('GETapi-v1-admin-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-brands"
                    onclick="cancelTryOut('GETapi-v1-admin-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-brands"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="6-quan-tri-vien-admin-POSTapi-v1-admin-brands">Tạo thương hiệu mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-brands">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/admin/brands" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ten\": \"Nike\",
    \"mo_ta\": \"Thương hiệu toàn cầu.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/brands"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ten": "Nike",
    "mo_ta": "Thương hiệu toàn cầu."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-brands">
</span>
<span id="execution-results-POSTapi-v1-admin-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-brands"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-brands">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-brands" data-method="POST"
      data-path="api/v1/admin/brands"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-brands"
                    onclick="tryItOut('POSTapi-v1-admin-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-brands"
                    onclick="cancelTryOut('POSTapi-v1-admin-brands');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-brands"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/brands</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-brands"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-brands"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ten</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ten"                data-endpoint="POSTapi-v1-admin-brands"
               value="Nike"
               data-component="body">
    <br>
<p>Tên thương hiệu. Example: <code>Nike</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mo_ta</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="mo_ta"                data-endpoint="POSTapi-v1-admin-brands"
               value="Thương hiệu toàn cầu."
               data-component="body">
    <br>
<p>Mô tả chi tiết. Example: <code>Thương hiệu toàn cầu.</code></p>
        </div>
        </form>

                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-brands--id-">GET api/v1/admin/brands/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-brands--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/brands/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/brands/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-brands--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-brands--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-brands--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-brands--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-brands--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-brands--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-brands--id-" data-method="GET"
      data-path="api/v1/admin/brands/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-brands--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-brands--id-"
                    onclick="tryItOut('GETapi-v1-admin-brands--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-brands--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-brands--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-brands--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/brands/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-brands--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-brands--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-PUTapi-v1-admin-brands--id-">PUT api/v1/admin/brands/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-brands--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/admin/brands/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/brands/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-brands--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-brands--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-brands--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-brands--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-brands--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-brands--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-brands--id-" data-method="PUT"
      data-path="api/v1/admin/brands/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-brands--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-brands--id-"
                    onclick="tryItOut('PUTapi-v1-admin-brands--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-brands--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-brands--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-brands--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/brands/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/brands/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-brands--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-brands--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-DELETEapi-v1-admin-brands--id-">DELETE api/v1/admin/brands/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-brands--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/admin/brands/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/brands/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-brands--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-brands--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-brands--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-brands--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-brands--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-brands--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-brands--id-" data-method="DELETE"
      data-path="api/v1/admin/brands/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-brands--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-brands--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-brands--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-brands--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-brands--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-brands--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/brands/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-brands--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-brands--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-brands--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the brand. Example: <code>architecto</code></p>
            </div>
                    </form>

                                <h2 id="6-quan-tri-vien-admin-quan-ly-don-hang">Quản lý Đơn hàng</h2>
                                                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-orders">Danh sách đơn hàng (Admin)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/orders?trang_thai=cho_xac_nhan" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/orders"
);

const params = {
    "trang_thai": "cho_xac_nhan",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-orders">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-orders" data-method="GET"
      data-path="api/v1/admin/orders"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-orders"
                    onclick="tryItOut('GETapi-v1-admin-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-orders"
                    onclick="cancelTryOut('GETapi-v1-admin-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-orders"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>trang_thai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="trang_thai"                data-endpoint="GETapi-v1-admin-orders"
               value="cho_xac_nhan"
               data-component="query">
    <br>
<p>Lọc đơn hàng theo trạng thái (cho_xac_nhan, da_giao...). Example: <code>cho_xac_nhan</code></p>
            </div>
                </form>

                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-orders--id-">Chi tiết đơn hàng (Admin)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/orders/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/orders/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-orders--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-orders--id-" data-method="GET"
      data-path="api/v1/admin/orders/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-orders--id-"
                    onclick="tryItOut('GETapi-v1-admin-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-orders--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-orders--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-admin-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>ID đơn hàng. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-PUTapi-v1-admin-orders--id--status">Cập nhật trạng thái đơn</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-orders--id--status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/admin/orders/1/status" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"trang_thai\": \"da_xac_nhan\",
    \"ghi_chu\": \"Khách hàng đồng ý giao chiều nay.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/orders/1/status"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "trang_thai": "da_xac_nhan",
    "ghi_chu": "Khách hàng đồng ý giao chiều nay."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-orders--id--status">
</span>
<span id="execution-results-PUTapi-v1-admin-orders--id--status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-orders--id--status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-orders--id--status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-orders--id--status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-orders--id--status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-orders--id--status" data-method="PUT"
      data-path="api/v1/admin/orders/{id}/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-orders--id--status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-orders--id--status"
                    onclick="tryItOut('PUTapi-v1-admin-orders--id--status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-orders--id--status"
                    onclick="cancelTryOut('PUTapi-v1-admin-orders--id--status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-orders--id--status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/orders/{id}/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-orders--id--status"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-orders--id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-orders--id--status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-admin-orders--id--status"
               value="1"
               data-component="url">
    <br>
<p>ID đơn hàng. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>trang_thai</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="trang_thai"                data-endpoint="PUTapi-v1-admin-orders--id--status"
               value="da_xac_nhan"
               data-component="body">
    <br>
<p>Trạng thái mới (cho_xac_nhan, da_xac_nhan, dang_xu_ly, dang_giao, da_giao, da_huy, hoan_tra). Example: <code>da_xac_nhan</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ghi_chu</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ghi_chu"                data-endpoint="PUTapi-v1-admin-orders--id--status"
               value="Khách hàng đồng ý giao chiều nay."
               data-component="body">
    <br>
<p>Ghi chú cập nhật (VD: Đã gọi xác nhận). Example: <code>Khách hàng đồng ý giao chiều nay.</code></p>
        </div>
        </form>

                                <h2 id="6-quan-tri-vien-admin-quan-ly-ma-giam-gia">Quản lý Mã giảm giá</h2>
                                                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-coupons">Danh sách mã giảm giá (Admin)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-coupons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/coupons" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/coupons"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-coupons">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-coupons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-coupons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-coupons"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-coupons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-coupons">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-coupons" data-method="GET"
      data-path="api/v1/admin/coupons"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-coupons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-coupons"
                    onclick="tryItOut('GETapi-v1-admin-coupons');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-coupons"
                    onclick="cancelTryOut('GETapi-v1-admin-coupons');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-coupons"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/coupons</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-coupons"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="6-quan-tri-vien-admin-POSTapi-v1-admin-coupons">Cấp mã giảm giá mới</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-admin-coupons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/admin/coupons" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"ma_code\": \"SUMMER25\",
    \"loai_giam\": \"phan_tram\",
    \"gia_tri\": \"10\",
    \"gia_tri_don_hang_min\": \"300000\",
    \"gioi_han_su_dung\": 100,
    \"bat_dau_luc\": \"2025-06-01\",
    \"het_han_luc\": \"2025-06-30\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/coupons"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "ma_code": "SUMMER25",
    "loai_giam": "phan_tram",
    "gia_tri": "10",
    "gia_tri_don_hang_min": "300000",
    "gioi_han_su_dung": 100,
    "bat_dau_luc": "2025-06-01",
    "het_han_luc": "2025-06-30"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-admin-coupons">
</span>
<span id="execution-results-POSTapi-v1-admin-coupons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-admin-coupons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-admin-coupons"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-admin-coupons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-admin-coupons">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-admin-coupons" data-method="POST"
      data-path="api/v1/admin/coupons"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-admin-coupons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-admin-coupons"
                    onclick="tryItOut('POSTapi-v1-admin-coupons');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-admin-coupons"
                    onclick="cancelTryOut('POSTapi-v1-admin-coupons');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-admin-coupons"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/admin/coupons</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-v1-admin-coupons"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ma_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ma_code"                data-endpoint="POSTapi-v1-admin-coupons"
               value="SUMMER25"
               data-component="body">
    <br>
<p>Mã code duy nhất. Example: <code>SUMMER25</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>loai_giam</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="loai_giam"                data-endpoint="POSTapi-v1-admin-coupons"
               value="phan_tram"
               data-component="body">
    <br>
<p>Loại giảm (phan_tram, so_tien_co_dinh). Example: <code>phan_tram</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gia_tri</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gia_tri"                data-endpoint="POSTapi-v1-admin-coupons"
               value="10"
               data-component="body">
    <br>
<p>Mức giảm (%, VNĐ). Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gia_tri_don_hang_min</code></b>&nbsp;&nbsp;
<small>numeric</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gia_tri_don_hang_min"                data-endpoint="POSTapi-v1-admin-coupons"
               value="300000"
               data-component="body">
    <br>
<p>Đơn thiểu áp dụng. Example: <code>300000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gioi_han_su_dung</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="gioi_han_su_dung"                data-endpoint="POSTapi-v1-admin-coupons"
               value="100"
               data-component="body">
    <br>
<p>Tổng lượt dùng tối đa. Example: <code>100</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bat_dau_luc</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bat_dau_luc"                data-endpoint="POSTapi-v1-admin-coupons"
               value="2025-06-01"
               data-component="body">
    <br>
<p>Thời gian khởi động. Example: <code>2025-06-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>het_han_luc</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="het_han_luc"                data-endpoint="POSTapi-v1-admin-coupons"
               value="2025-06-30"
               data-component="body">
    <br>
<p>Thời gian kết thúc. Example: <code>2025-06-30</code></p>
        </div>
        </form>

                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-coupons--id-">GET api/v1/admin/coupons/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-coupons--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/coupons/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/coupons/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-coupons--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-coupons--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-coupons--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-coupons--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-coupons--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-coupons--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-coupons--id-" data-method="GET"
      data-path="api/v1/admin/coupons/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-coupons--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-coupons--id-"
                    onclick="tryItOut('GETapi-v1-admin-coupons--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-coupons--id-"
                    onclick="cancelTryOut('GETapi-v1-admin-coupons--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-coupons--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/coupons/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-coupons--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-v1-admin-coupons--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-PUTapi-v1-admin-coupons--id-">PUT api/v1/admin/coupons/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-v1-admin-coupons--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/admin/coupons/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/coupons/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-coupons--id-">
</span>
<span id="execution-results-PUTapi-v1-admin-coupons--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-coupons--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-coupons--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-coupons--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-coupons--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-coupons--id-" data-method="PUT"
      data-path="api/v1/admin/coupons/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-coupons--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-coupons--id-"
                    onclick="tryItOut('PUTapi-v1-admin-coupons--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-coupons--id-"
                    onclick="cancelTryOut('PUTapi-v1-admin-coupons--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-coupons--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/coupons/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/admin/coupons/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-coupons--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-v1-admin-coupons--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-DELETEapi-v1-admin-coupons--id-">DELETE api/v1/admin/coupons/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-coupons--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/admin/coupons/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/coupons/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-coupons--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-coupons--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-coupons--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-coupons--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-coupons--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-coupons--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-coupons--id-" data-method="DELETE"
      data-path="api/v1/admin/coupons/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-coupons--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-coupons--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-coupons--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-coupons--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-coupons--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-coupons--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/coupons/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-coupons--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-coupons--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>architecto</code></p>
            </div>
                    </form>

                                <h2 id="6-quan-tri-vien-admin-quan-ly-danh-gia">Quản lý Đánh giá</h2>
                                                    <h2 id="6-quan-tri-vien-admin-GETapi-v1-admin-reviews">Danh sách đánh giá (Admin)</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-admin-reviews">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/admin/reviews?da_duyet=" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/reviews"
);

const params = {
    "da_duyet": "0",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-admin-reviews">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-admin-reviews" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-admin-reviews"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-admin-reviews"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-admin-reviews" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-admin-reviews">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-admin-reviews" data-method="GET"
      data-path="api/v1/admin/reviews"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-admin-reviews', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-admin-reviews"
                    onclick="tryItOut('GETapi-v1-admin-reviews');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-admin-reviews"
                    onclick="cancelTryOut('GETapi-v1-admin-reviews');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-admin-reviews"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/admin/reviews</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-admin-reviews"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-admin-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-admin-reviews"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>da_duyet</code></b>&nbsp;&nbsp;
<small>boolean</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <label data-endpoint="GETapi-v1-admin-reviews" style="display: none">
            <input type="radio" name="da_duyet"
                   value="1"
                   data-endpoint="GETapi-v1-admin-reviews"
                   data-component="query"             >
            <code>true</code>
        </label>
        <label data-endpoint="GETapi-v1-admin-reviews" style="display: none">
            <input type="radio" name="da_duyet"
                   value="0"
                   data-endpoint="GETapi-v1-admin-reviews"
                   data-component="query"             >
            <code>false</code>
        </label>
    <br>
<p>Lọc theo trạng thái duyệt (true/false). Example: <code>false</code></p>
            </div>
                </form>

                    <h2 id="6-quan-tri-vien-admin-PUTapi-v1-admin-reviews--id--approve">Duyệt đánh giá</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Admin xác nhận duyệt để đánh giá hiển thị công khai trên ứng dụng. Hệ thống tự tính lại sao trung bình của sản phẩm.</p>

<span id="example-requests-PUTapi-v1-admin-reviews--id--approve">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/v1/admin/reviews/1/approve" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/reviews/1/approve"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-v1-admin-reviews--id--approve">
</span>
<span id="execution-results-PUTapi-v1-admin-reviews--id--approve" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-v1-admin-reviews--id--approve"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-admin-reviews--id--approve"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-v1-admin-reviews--id--approve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-admin-reviews--id--approve">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-v1-admin-reviews--id--approve" data-method="PUT"
      data-path="api/v1/admin/reviews/{id}/approve"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-admin-reviews--id--approve', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-v1-admin-reviews--id--approve"
                    onclick="tryItOut('PUTapi-v1-admin-reviews--id--approve');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-v1-admin-reviews--id--approve"
                    onclick="cancelTryOut('PUTapi-v1-admin-reviews--id--approve');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-v1-admin-reviews--id--approve"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/v1/admin/reviews/{id}/approve</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-v1-admin-reviews--id--approve"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-v1-admin-reviews--id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-v1-admin-reviews--id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-v1-admin-reviews--id--approve"
               value="1"
               data-component="url">
    <br>
<p>ID đánh giá. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="6-quan-tri-vien-admin-DELETEapi-v1-admin-reviews--id-">Xóa đánh giá</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-admin-reviews--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/v1/admin/reviews/architecto" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/admin/reviews/architecto"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-admin-reviews--id-">
</span>
<span id="execution-results-DELETEapi-v1-admin-reviews--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-admin-reviews--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-admin-reviews--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-admin-reviews--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-admin-reviews--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-admin-reviews--id-" data-method="DELETE"
      data-path="api/v1/admin/reviews/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-admin-reviews--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-admin-reviews--id-"
                    onclick="tryItOut('DELETEapi-v1-admin-reviews--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-admin-reviews--id-"
                    onclick="cancelTryOut('DELETEapi-v1-admin-reviews--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-admin-reviews--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/admin/reviews/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-admin-reviews--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-admin-reviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-admin-reviews--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-v1-admin-reviews--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the review. Example: <code>architecto</code></p>
            </div>
                    </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-v1-chatbot-message">POST api/v1/chatbot/message</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-chatbot-message">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/chatbot/message" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"noi_dung\": \"b\",
    \"ma_phien\": \"n\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/chatbot/message"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "noi_dung": "b",
    "ma_phien": "n"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-chatbot-message">
</span>
<span id="execution-results-POSTapi-v1-chatbot-message" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-chatbot-message"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-chatbot-message"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-chatbot-message" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-chatbot-message">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-chatbot-message" data-method="POST"
      data-path="api/v1/chatbot/message"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-chatbot-message', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-chatbot-message"
                    onclick="tryItOut('POSTapi-v1-chatbot-message');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-chatbot-message"
                    onclick="cancelTryOut('POSTapi-v1-chatbot-message');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-chatbot-message"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/chatbot/message</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-chatbot-message"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-chatbot-message"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>noi_dung</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="noi_dung"                data-endpoint="POSTapi-v1-chatbot-message"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 2000 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ma_phien</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ma_phien"                data-endpoint="POSTapi-v1-chatbot-message"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>n</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-v1-chatbot-history">GET api/v1/chatbot/history</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-chatbot-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/chatbot/history" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/chatbot/history"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-chatbot-history">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Thiếu m&atilde; phi&ecirc;n&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-chatbot-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-chatbot-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-chatbot-history"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-chatbot-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-chatbot-history">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-chatbot-history" data-method="GET"
      data-path="api/v1/chatbot/history"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-chatbot-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-chatbot-history"
                    onclick="tryItOut('GETapi-v1-chatbot-history');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-chatbot-history"
                    onclick="cancelTryOut('GETapi-v1-chatbot-history');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-chatbot-history"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/chatbot/history</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-chatbot-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-chatbot-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-recommendations">Lấy gợi ý sản phẩm từ Python AI service hoặc trả fallback.</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-recommendations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/recommendations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/recommendations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-recommendations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Sản phẩm phổ biến&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;danh_muc_id&quot;: 1,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Balo Wika Helix xanh b&iacute;ch&quot;,
            &quot;duong_dan&quot;: &quot;balo-wika-helix-xanh-bich&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31636&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu PU cao cấp bền bỉ, form balo cứng c&aacute;p, phủ lớp chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi di chuyển.\nNgăn đựng vợt chống nước ri&ecirc;ng biệt, c&oacute; thể chứa nhiều vợt pickleball.\nNgăn ch&iacute;nh dung t&iacute;ch lớn, dễ d&agrave;ng đựng quần &aacute;o, khăn tập, phụ kiện v&agrave; đồ c&aacute; nh&acirc;n.\nNgăn gi&agrave;y ri&ecirc;ng dưới đ&aacute;y balo, t&iacute;ch hợp lỗ tho&aacute;ng kh&iacute; gi&uacute;p hạn chế t&iacute;ch tụ m&ugrave;i mồ h&ocirc;i.\nĐệm lưng d&agrave;y v&agrave; &ecirc;m, hỗ trợ ph&acirc;n t&aacute;n lực tốt, gi&uacute;p đeo l&acirc;u vẫn thoải m&aacute;i.\nThiết kế đa năng, ph&ugrave; hợp cho pickleball, gym v&agrave; c&aacute;c hoạt động tập luyện h...&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Balo WIKA HELIX &ndash; Gọn g&agrave;ng b&ecirc;n ngo&agrave;i, rộng r&atilde;i b&ecirc;n trong&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Balo WIKA HELIX được thiết kế d&agrave;nh cho những người chơi thể thao y&ecirc;u th&iacute;ch sự gọn g&agrave;ng, tiện dụng nhưng vẫn cần kh&ocirc;ng gian chứa đồ rộng r&atilde;i. Với cấu tr&uacute;c th&ocirc;ng minh v&agrave; form d&aacute;ng cứng c&aacute;p, Helix gi&uacute;p bạn mang theo vợt, trang phục v&agrave; c&aacute;c phụ kiện cần thiết một c&aacute;ch ngăn nắp trong mọi buổi tập hoặc thi đấu.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Sản phẩm sử dụng chất liệu vải PU cao cấp bền bỉ, c&oacute; lớp phủ chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi gặp thời tiết mưa nhẹ. Thiết kế b&ecirc;n trong tối ưu kh&ocirc;ng gian với nhiều ngăn chuy&ecirc;n dụng, gi&uacute;p người d&ugrave;ng sắp xếp đồ dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Điểm nổi bật của Balo WIKA HELIX&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Chất liệu PU cao cấp bền bỉ, form balo cứng c&aacute;p, phủ lớp chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi di chuyển.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn đựng vợt chống nước ri&ecirc;ng biệt, c&oacute; thể chứa nhiều vợt pickleball.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn ch&iacute;nh dung t&iacute;ch lớn, dễ d&agrave;ng đựng quần &aacute;o, khăn tập, phụ kiện v&agrave; đồ c&aacute; nh&acirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn gi&agrave;y ri&ecirc;ng dưới đ&aacute;y balo, t&iacute;ch hợp lỗ tho&aacute;ng kh&iacute; gi&uacute;p hạn chế t&iacute;ch tụ m&ugrave;i mồ h&ocirc;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đệm lưng d&agrave;y v&agrave; &ecirc;m, hỗ trợ ph&acirc;n t&aacute;n lực tốt, gi&uacute;p đeo l&acirc;u vẫn thoải m&aacute;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế đa năng, ph&ugrave; hợp cho pickleball, gym v&agrave; c&aacute;c hoạt động tập luyện hằng ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Th&ocirc;ng tin sản phẩm&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;K&iacute;ch thước: 25 x 30 x 50 cm&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;M&agrave;u sắc: Xanh ngọc, Xanh b&iacute;ch, Hồng&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;WIKA HELIX l&agrave; lựa chọn ph&ugrave; hợp cho những ai cần một chiếc balo thể thao gọn g&agrave;ng, tiện dụng v&agrave; đủ sức chứa để đồng h&agrave;nh trong mọi buổi tập luyện v&agrave; thi đấu.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;1700000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;1600000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 4,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:50:14.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 1,
                &quot;san_pham_id&quot;: 1,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/balo-wika-helix-xanh-bich-1_optimized-scaled.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/balo-wika-helix-xanh-bich-1_optimized-scaled.jpg&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 1,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Balo Wika HELIX&quot;,
                &quot;duong_dan&quot;: &quot;balo-wika-helix&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;danh_muc_id&quot;: 1,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Balo Wika Helix hồng&quot;,
            &quot;duong_dan&quot;: &quot;balo-wika-helix-hong&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31618&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu PU cao cấp bền bỉ, form balo cứng c&aacute;p, phủ lớp chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi di chuyển.\nNgăn đựng vợt chống nước ri&ecirc;ng biệt, c&oacute; thể chứa nhiều vợt pickleball.\nNgăn ch&iacute;nh dung t&iacute;ch lớn, dễ d&agrave;ng đựng quần &aacute;o, khăn tập, phụ kiện v&agrave; đồ c&aacute; nh&acirc;n.\nNgăn gi&agrave;y ri&ecirc;ng dưới đ&aacute;y balo, t&iacute;ch hợp lỗ tho&aacute;ng kh&iacute; gi&uacute;p hạn chế t&iacute;ch tụ m&ugrave;i mồ h&ocirc;i.\nĐệm lưng d&agrave;y v&agrave; &ecirc;m, hỗ trợ ph&acirc;n t&aacute;n lực tốt, gi&uacute;p đeo l&acirc;u vẫn thoải m&aacute;i.\nThiết kế đa năng, ph&ugrave; hợp cho pickleball, gym v&agrave; c&aacute;c hoạt động tập luyện h...&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Balo WIKA HELIX &ndash; Gọn g&agrave;ng b&ecirc;n ngo&agrave;i, rộng r&atilde;i b&ecirc;n trong&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Balo WIKA HELIX được thiết kế d&agrave;nh cho những người chơi thể thao y&ecirc;u th&iacute;ch sự gọn g&agrave;ng, tiện dụng nhưng vẫn cần kh&ocirc;ng gian chứa đồ rộng r&atilde;i. Với cấu tr&uacute;c th&ocirc;ng minh v&agrave; form d&aacute;ng cứng c&aacute;p, Helix gi&uacute;p bạn mang theo vợt, trang phục v&agrave; c&aacute;c phụ kiện cần thiết một c&aacute;ch ngăn nắp trong mọi buổi tập hoặc thi đấu.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Sản phẩm sử dụng chất liệu vải PU cao cấp bền bỉ, c&oacute; lớp phủ chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi gặp thời tiết mưa nhẹ. Thiết kế b&ecirc;n trong tối ưu kh&ocirc;ng gian với nhiều ngăn chuy&ecirc;n dụng, gi&uacute;p người d&ugrave;ng sắp xếp đồ dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Điểm nổi bật của Balo WIKA HELIX&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Chất liệu PU cao cấp bền bỉ, form balo cứng c&aacute;p, phủ lớp chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi di chuyển.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn đựng vợt chống nước ri&ecirc;ng biệt, c&oacute; thể chứa nhiều vợt pickleball.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn ch&iacute;nh dung t&iacute;ch lớn, dễ d&agrave;ng đựng quần &aacute;o, khăn tập, phụ kiện v&agrave; đồ c&aacute; nh&acirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn gi&agrave;y ri&ecirc;ng dưới đ&aacute;y balo, t&iacute;ch hợp lỗ tho&aacute;ng kh&iacute; gi&uacute;p hạn chế t&iacute;ch tụ m&ugrave;i mồ h&ocirc;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đệm lưng d&agrave;y v&agrave; &ecirc;m, hỗ trợ ph&acirc;n t&aacute;n lực tốt, gi&uacute;p đeo l&acirc;u vẫn thoải m&aacute;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế đa năng, ph&ugrave; hợp cho pickleball, gym v&agrave; c&aacute;c hoạt động tập luyện hằng ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Th&ocirc;ng tin sản phẩm&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;K&iacute;ch thước: 25 x 30 x 50 cm&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;M&agrave;u sắc: Xanh ngọc, Xanh b&iacute;ch, Hồng&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;WIKA HELIX l&agrave; lựa chọn ph&ugrave; hợp cho những ai cần một chiếc balo thể thao gọn g&agrave;ng, tiện dụng v&agrave; đủ sức chứa để đồng h&agrave;nh trong mọi buổi tập luyện v&agrave; thi đấu.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;1700000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;1600000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 3,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:51:58.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 16,
                &quot;san_pham_id&quot;: 2,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/balo-wika-helix-hong-1_optimized-scaled.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/balo-wika-helix-hong-1_optimized-scaled.jpg&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 1,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Balo Wika HELIX&quot;,
                &quot;duong_dan&quot;: &quot;balo-wika-helix&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;danh_muc_id&quot;: 1,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Balo Wika Helix xanh ngọc&quot;,
            &quot;duong_dan&quot;: &quot;balo-wika-helix-xanh-ngoc&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31604&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu PU cao cấp bền bỉ, form balo cứng c&aacute;p, phủ lớp chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi di chuyển.\nNgăn đựng vợt chống nước ri&ecirc;ng biệt, c&oacute; thể chứa nhiều vợt pickleball.\nNgăn ch&iacute;nh dung t&iacute;ch lớn, dễ d&agrave;ng đựng quần &aacute;o, khăn tập, phụ kiện v&agrave; đồ c&aacute; nh&acirc;n.\nNgăn gi&agrave;y ri&ecirc;ng dưới đ&aacute;y balo, t&iacute;ch hợp lỗ tho&aacute;ng kh&iacute; gi&uacute;p hạn chế t&iacute;ch tụ m&ugrave;i mồ h&ocirc;i.\nĐệm lưng d&agrave;y v&agrave; &ecirc;m, hỗ trợ ph&acirc;n t&aacute;n lực tốt, gi&uacute;p đeo l&acirc;u vẫn thoải m&aacute;i.\nThiết kế đa năng, ph&ugrave; hợp cho pickleball, gym v&agrave; c&aacute;c hoạt động tập luyện h...&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Balo WIKA HELIX &ndash; Gọn g&agrave;ng b&ecirc;n ngo&agrave;i, rộng r&atilde;i b&ecirc;n trong&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Balo WIKA HELIX được thiết kế d&agrave;nh cho những người chơi thể thao y&ecirc;u th&iacute;ch sự gọn g&agrave;ng, tiện dụng nhưng vẫn cần kh&ocirc;ng gian chứa đồ rộng r&atilde;i. Với cấu tr&uacute;c th&ocirc;ng minh v&agrave; form d&aacute;ng cứng c&aacute;p, Helix gi&uacute;p bạn mang theo vợt, trang phục v&agrave; c&aacute;c phụ kiện cần thiết một c&aacute;ch ngăn nắp trong mọi buổi tập hoặc thi đấu.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Sản phẩm sử dụng chất liệu vải PU cao cấp bền bỉ, c&oacute; lớp phủ chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi gặp thời tiết mưa nhẹ. Thiết kế b&ecirc;n trong tối ưu kh&ocirc;ng gian với nhiều ngăn chuy&ecirc;n dụng, gi&uacute;p người d&ugrave;ng sắp xếp đồ dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Điểm nổi bật của Balo WIKA HELIX&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Chất liệu PU cao cấp bền bỉ, form balo cứng c&aacute;p, phủ lớp chống nước gi&uacute;p bảo vệ đồ d&ugrave;ng khi di chuyển.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn đựng vợt chống nước ri&ecirc;ng biệt, c&oacute; thể chứa nhiều vợt pickleball.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn ch&iacute;nh dung t&iacute;ch lớn, dễ d&agrave;ng đựng quần &aacute;o, khăn tập, phụ kiện v&agrave; đồ c&aacute; nh&acirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ngăn gi&agrave;y ri&ecirc;ng dưới đ&aacute;y balo, t&iacute;ch hợp lỗ tho&aacute;ng kh&iacute; gi&uacute;p hạn chế t&iacute;ch tụ m&ugrave;i mồ h&ocirc;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đệm lưng d&agrave;y v&agrave; &ecirc;m, hỗ trợ ph&acirc;n t&aacute;n lực tốt, gi&uacute;p đeo l&acirc;u vẫn thoải m&aacute;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế đa năng, ph&ugrave; hợp cho pickleball, gym v&agrave; c&aacute;c hoạt động tập luyện hằng ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Th&ocirc;ng tin sản phẩm&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;K&iacute;ch thước: 25 x 30 x 50 cm&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;M&agrave;u sắc: Xanh ngọc, Xanh b&iacute;ch, Hồng&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;WIKA HELIX l&agrave; lựa chọn ph&ugrave; hợp cho những ai cần một chiếc balo thể thao gọn g&agrave;ng, tiện dụng v&agrave; đủ sức chứa để đồng h&agrave;nh trong mọi buổi tập luyện v&agrave; thi đấu.&lt;/span&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;1700000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;1600000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 30,
                &quot;san_pham_id&quot;: 3,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/balo-wika-helix-xanh-ngoc-1_optimized-scaled.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/balo-wika-helix-xanh-ngoc-1_optimized-scaled.jpg&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 1,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Balo Wika HELIX&quot;,
                &quot;duong_dan&quot;: &quot;balo-wika-helix&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;danh_muc_id&quot;: 4,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Gi&agrave;y Pickleball Wika Stark Quang Dương hồng&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-stark-quang-duong-hong&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31580&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Thiết kế cổ cao thế hệ mới, &ocirc;m ch&acirc;n chắc chắn, tăng độ ổn định khi di chuyển nhanh\nCổ gi&agrave;y Wi Fly-knit 2.0 hạn chế x&ocirc; lệch, hỗ trợ xoay trụ v&agrave; đổi hướng li&ecirc;n tục\nĐế ngo&agrave;i cao su v&acirc;n xương c&aacute; b&aacute;m s&acirc;n tốt, tối ưu di chuyển đa hướng\nĐế t&aacute;ch biệt mũi v&agrave; g&oacute;t gi&uacute;p xoay chuyển tự nhi&ecirc;n, giảm mỏi b&agrave;n ch&acirc;n\nThanh TPU chống xoắn giữ form bền bỉ, hạn chế lật cổ ch&acirc;n khi thi đấu&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG &ndash; Thiết kế cổ cao thế hệ mới cho nhịp chơi tốc độ&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG được ph&aacute;t triển d&agrave;nh ri&ecirc;ng cho đặc th&ugrave; vận động cường độ cao của pickleball &ndash; nơi người chơi li&ecirc;n tục đổi hướng, xoay trụ v&agrave; dừng đột ngột. Thiết kế cổ cao thế hệ mới kết hợp chất liệu vải cao cấp &ocirc;m ch&acirc;n, gi&uacute;p tăng độ ổn định, giảm rủi ro chấn thương v&agrave; hỗ trợ người chơi tập trung tối đa v&agrave;o kỹ thuật.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ưu điểm nổi bật&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế cổ cao Wi Fly-knit 2.0: Cổ gi&agrave;y chun dệt &ocirc;m s&aacute;t cổ ch&acirc;n, hạn chế x&ocirc; lệch khi đổi hướng nhanh v&agrave; xoay trụ li&ecirc;n tục.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đế ngo&agrave;i cao su v&acirc;n xương c&aacute;: Tối ưu khả năng di chuyển đa hướng, tăng độ b&aacute;m s&acirc;n, ph&ugrave; hợp thi đấu v&agrave; tập luyện pickleball.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đế t&aacute;ch biệt mũi v&agrave; g&oacute;t: Hỗ trợ xoay chuyển tự nhi&ecirc;n, ph&acirc;n bổ lực hợp l&yacute;, giảm &aacute;p lực l&ecirc;n l&ograve;ng b&agrave;n ch&acirc;n v&agrave; hạn chế nhức mỏi khi chơi l&acirc;u.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thanh TPU chống xoắn: Giữ form gi&agrave;y bền bỉ, tăng độ ổn định, hạn chế lật cổ ch&acirc;n v&agrave; duy tr&igrave; nhịp chơi vững v&agrave;ng.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG l&agrave; lựa chọn l&yacute; tưởng cho người chơi t&igrave;m kiếm sự ổn định, linh hoạt v&agrave; thoải m&aacute;i trong từng pha di chuyển tr&ecirc;n s&acirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3764 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-giay-wika_optimized.jpg\&quot; alt=\&quot;bang-size-giay-wika\&quot; width=\&quot;1920\&quot; height=\&quot;1080\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;1800000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;1699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 1,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:54:54.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 42,
                &quot;san_pham_id&quot;: 4,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/giay-pickleball-wika-stark-quang-duong-hong-1_optimized-scaled.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/giay-pickleball-wika-stark-quang-duong-hong-1_optimized-scaled.jpg&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 4,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Gi&agrave;y Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;giay-pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 3,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;danh_muc_id&quot;: 4,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Gi&agrave;y Pickleball Wika Stark Quang Dương xanh l&aacute;&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-stark-quang-duong-xanh-la&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31569&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Thiết kế cổ cao thế hệ mới, &ocirc;m ch&acirc;n chắc chắn, tăng độ ổn định khi di chuyển nhanh\nCổ gi&agrave;y Wi Fly-knit 2.0 hạn chế x&ocirc; lệch, hỗ trợ xoay trụ v&agrave; đổi hướng li&ecirc;n tục\nĐế ngo&agrave;i cao su v&acirc;n xương c&aacute; b&aacute;m s&acirc;n tốt, tối ưu di chuyển đa hướng\nĐế t&aacute;ch biệt mũi v&agrave; g&oacute;t gi&uacute;p xoay chuyển tự nhi&ecirc;n, giảm mỏi b&agrave;n ch&acirc;n\nThanh TPU chống xoắn giữ form bền bỉ, hạn chế lật cổ ch&acirc;n khi thi đấu&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG &ndash; Thiết kế cổ cao thế hệ mới cho nhịp chơi tốc độ&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG được ph&aacute;t triển d&agrave;nh ri&ecirc;ng cho đặc th&ugrave; vận động cường độ cao của pickleball &ndash; nơi người chơi li&ecirc;n tục đổi hướng, xoay trụ v&agrave; dừng đột ngột. Thiết kế cổ cao thế hệ mới kết hợp chất liệu vải cao cấp &ocirc;m ch&acirc;n, gi&uacute;p tăng độ ổn định, giảm rủi ro chấn thương v&agrave; hỗ trợ người chơi tập trung tối đa v&agrave;o kỹ thuật.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ưu điểm nổi bật&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế cổ cao Wi Fly-knit 2.0: Cổ gi&agrave;y chun dệt &ocirc;m s&aacute;t cổ ch&acirc;n, hạn chế x&ocirc; lệch khi đổi hướng nhanh v&agrave; xoay trụ li&ecirc;n tục.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đế ngo&agrave;i cao su v&acirc;n xương c&aacute;: Tối ưu khả năng di chuyển đa hướng, tăng độ b&aacute;m s&acirc;n, ph&ugrave; hợp thi đấu v&agrave; tập luyện pickleball.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đế t&aacute;ch biệt mũi v&agrave; g&oacute;t: Hỗ trợ xoay chuyển tự nhi&ecirc;n, ph&acirc;n bổ lực hợp l&yacute;, giảm &aacute;p lực l&ecirc;n l&ograve;ng b&agrave;n ch&acirc;n v&agrave; hạn chế nhức mỏi khi chơi l&acirc;u.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thanh TPU chống xoắn: Giữ form gi&agrave;y bền bỉ, tăng độ ổn định, hạn chế lật cổ ch&acirc;n v&agrave; duy tr&igrave; nhịp chơi vững v&agrave;ng.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG l&agrave; lựa chọn l&yacute; tưởng cho người chơi t&igrave;m kiếm sự ổn định, linh hoạt v&agrave; thoải m&aacute;i trong từng pha di chuyển tr&ecirc;n s&acirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3764 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-giay-wika_optimized.jpg\&quot; alt=\&quot;bang-size-giay-wika\&quot; width=\&quot;1920\&quot; height=\&quot;1080\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;1800000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;1699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 52,
                &quot;san_pham_id&quot;: 5,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/giay-pickleball-wika-stark-quang-duong-xanh-la-1_optimized-scaled.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/giay-pickleball-wika-stark-quang-duong-xanh-la-1_optimized-scaled.jpg&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 4,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Gi&agrave;y Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;giay-pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 3,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;danh_muc_id&quot;: 4,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;Gi&agrave;y Pickleball Wika Stark Quang Dương xanh dương&quot;,
            &quot;duong_dan&quot;: &quot;giay-pickleball-wika-stark-quang-duong-xanh-duong&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31526&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Thiết kế cổ cao thế hệ mới, &ocirc;m ch&acirc;n chắc chắn, tăng độ ổn định khi di chuyển nhanh\nCổ gi&agrave;y Wi Fly-knit 2.0 hạn chế x&ocirc; lệch, hỗ trợ xoay trụ v&agrave; đổi hướng li&ecirc;n tục\nĐế ngo&agrave;i cao su v&acirc;n xương c&aacute; b&aacute;m s&acirc;n tốt, tối ưu di chuyển đa hướng\nĐế t&aacute;ch biệt mũi v&agrave; g&oacute;t gi&uacute;p xoay chuyển tự nhi&ecirc;n, giảm mỏi b&agrave;n ch&acirc;n\nThanh TPU chống xoắn giữ form bền bỉ, hạn chế lật cổ ch&acirc;n khi thi đấu&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG &ndash; Thiết kế cổ cao thế hệ mới cho nhịp chơi tốc độ&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG được ph&aacute;t triển d&agrave;nh ri&ecirc;ng cho đặc th&ugrave; vận động cường độ cao của pickleball &ndash; nơi người chơi li&ecirc;n tục đổi hướng, xoay trụ v&agrave; dừng đột ngột. Thiết kế cổ cao thế hệ mới kết hợp chất liệu vải cao cấp &ocirc;m ch&acirc;n, gi&uacute;p tăng độ ổn định, giảm rủi ro chấn thương v&agrave; hỗ trợ người chơi tập trung tối đa v&agrave;o kỹ thuật.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Ưu điểm nổi bật&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thiết kế cổ cao Wi Fly-knit 2.0: Cổ gi&agrave;y chun dệt &ocirc;m s&aacute;t cổ ch&acirc;n, hạn chế x&ocirc; lệch khi đổi hướng nhanh v&agrave; xoay trụ li&ecirc;n tục.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đế ngo&agrave;i cao su v&acirc;n xương c&aacute;: Tối ưu khả năng di chuyển đa hướng, tăng độ b&aacute;m s&acirc;n, ph&ugrave; hợp thi đấu v&agrave; tập luyện pickleball.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Đế t&aacute;ch biệt mũi v&agrave; g&oacute;t: Hỗ trợ xoay chuyển tự nhi&ecirc;n, ph&acirc;n bổ lực hợp l&yacute;, giảm &aacute;p lực l&ecirc;n l&ograve;ng b&agrave;n ch&acirc;n v&agrave; hạn chế nhức mỏi khi chơi l&acirc;u.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Thanh TPU chống xoắn: Giữ form gi&agrave;y bền bỉ, tăng độ ổn định, hạn chế lật cổ ch&acirc;n v&agrave; duy tr&igrave; nhịp chơi vững v&agrave;ng.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;color: #000000;font-size: 100%\&quot;&gt;Gi&agrave;y Pickleball WIKA STARK x QUANG DƯƠNG l&agrave; lựa chọn l&yacute; tưởng cho người chơi t&igrave;m kiếm sự ổn định, linh hoạt v&agrave; thoải m&aacute;i trong từng pha di chuyển tr&ecirc;n s&acirc;n.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3764 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-giay-wika_optimized.jpg\&quot; alt=\&quot;bang-size-giay-wika\&quot; width=\&quot;1920\&quot; height=\&quot;1080\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;1800000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;1699000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 2,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T08:15:39.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 62,
                &quot;san_pham_id&quot;: 6,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/giay-pickleball-wika-stark-quang-duong-xanh-1_optimized-scaled.jpg&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/03/giay-pickleball-wika-stark-quang-duong-xanh-1_optimized-scaled.jpg&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 4,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;Gi&agrave;y Pickleball&quot;,
                &quot;duong_dan&quot;: &quot;giay-pickleball&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 3,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;danh_muc_id&quot;: 7,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Luska xanh&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da-wika-luska-xanh&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31383&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu Wikarotex co gi&atilde;n 4 chiều, mềm m&aacute;t \nC&ocirc;ng nghệ Witech-dry tho&aacute;t mồ h&ocirc;i si&ecirc;u tốc \nHoạ tiết in bền m&agrave;u \nForm Regular Fit dễ mặc, t&ocirc;n d&aacute;ng vận động vi&ecirc;n \nLogo PU phản quang\nĐặt &aacute;o đội li&ecirc;n hệ &amp;#8220;CHAT ZALO&amp;#8221; để được ưu đ&atilde;i!&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o b&oacute;ng đ&aacute; Wika Luska &ndash; Thiết kế mới b&ugrave;ng nổ cho m&ugrave;a giải&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Luska l&agrave; t&acirc;n binh mới nhất gia nhập bộ sưu tập &aacute;o b&oacute;ng đ&aacute; Wika, mang đến l&agrave;n gi&oacute; thiết kế hiện đại v&agrave; gi&agrave;u năng lượng cho m&ugrave;a giải mới. Sản phẩm g&acirc;y ấn tượng mạnh với họa tiết xếp tầng độc đ&aacute;o, tạo hiệu ứng chuyển động linh hoạt, tượng trưng cho sức mạnh tập thể v&agrave; tinh thần thi đấu lan tỏa từ s&acirc;n cỏ đến kh&aacute;n đ&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o được thiết kế ph&ugrave; hợp cho cả nam v&agrave; nữ, đ&aacute;p ứng tối đa nhu cầu tập luyện v&agrave; thi đấu với cảm gi&aacute;c nhẹ, tho&aacute;ng v&agrave; linh hoạt trong từng chuyển động. Chất liệu Wikarotex cao cấp co gi&atilde;n 4 chiều gi&uacute;p &aacute;o mềm m&aacute;t, dễ chịu khi mặc trong thời gian d&agrave;i. Kết hợp c&ugrave;ng c&ocirc;ng nghệ Witech-dry, sản phẩm hỗ trợ tho&aacute;t mồ h&ocirc;i nhanh, giữ cơ thể lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; thoải m&aacute;i ngay cả khi vận động cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Họa tiết in bền m&agrave;u, form Regular Fit dễ mặc v&agrave; t&ocirc;n d&aacute;ng vận động vi&ecirc;n, ph&ugrave; hợp cho nhiều d&aacute;ng người. Logo PU phản quang l&agrave; điểm nhấn tinh tế, tăng độ nhận diện v&agrave; t&iacute;nh thẩm mỹ. Wika Luska l&agrave; lựa chọn l&yacute; tưởng cho tập luyện, thi đấu v&agrave; c&aacute;c hoạt động thể thao thường ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3552 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-ao-wika-sports-1.jpg\&quot; alt=\&quot;bang-size-ao-wika-sports-1\&quot; width=\&quot;1024\&quot; height=\&quot;336\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;249000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;239000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 72,
                &quot;san_pham_id&quot;: 7,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-xanh-1_optimized.png&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-xanh-1_optimized.png&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 7,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
                &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 6,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;danh_muc_id&quot;: 7,
            &quot;thuong_hieu_id&quot;: 1,
            &quot;ten_san_pham&quot;: &quot;&Aacute;o b&oacute;ng đ&aacute; Wika Luska kem&quot;,
            &quot;duong_dan&quot;: &quot;ao-bong-da-wika-luska-kem&quot;,
            &quot;ma_sku&quot;: &quot;WIKA-31377&quot;,
            &quot;mo_ta_ngan&quot;: &quot;Chất liệu Wikarotex co gi&atilde;n 4 chiều, mềm m&aacute;t \nC&ocirc;ng nghệ Witech-dry tho&aacute;t mồ h&ocirc;i si&ecirc;u tốc \nHoạ tiết in bền m&agrave;u \nForm Regular Fit dễ mặc, t&ocirc;n d&aacute;ng vận động vi&ecirc;n \nLogo PU phản quang\nĐặt &aacute;o đội li&ecirc;n hệ &amp;#8220;CHAT ZALO&amp;#8221; để được ưu đ&atilde;i!&quot;,
            &quot;mo_ta_day_du&quot;: &quot;&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o b&oacute;ng đ&aacute; Wika Luska &ndash; Thiết kế mới b&ugrave;ng nổ cho m&ugrave;a giải&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Wika Luska l&agrave; t&acirc;n binh mới nhất gia nhập bộ sưu tập &aacute;o b&oacute;ng đ&aacute; Wika, mang đến l&agrave;n gi&oacute; thiết kế hiện đại v&agrave; gi&agrave;u năng lượng cho m&ugrave;a giải mới. Sản phẩm g&acirc;y ấn tượng mạnh với họa tiết xếp tầng độc đ&aacute;o, tạo hiệu ứng chuyển động linh hoạt, tượng trưng cho sức mạnh tập thể v&agrave; tinh thần thi đấu lan tỏa từ s&acirc;n cỏ đến kh&aacute;n đ&agrave;i.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;&Aacute;o được thiết kế ph&ugrave; hợp cho cả nam v&agrave; nữ, đ&aacute;p ứng tối đa nhu cầu tập luyện v&agrave; thi đấu với cảm gi&aacute;c nhẹ, tho&aacute;ng v&agrave; linh hoạt trong từng chuyển động. Chất liệu Wikarotex cao cấp co gi&atilde;n 4 chiều gi&uacute;p &aacute;o mềm m&aacute;t, dễ chịu khi mặc trong thời gian d&agrave;i. Kết hợp c&ugrave;ng c&ocirc;ng nghệ Witech-dry, sản phẩm hỗ trợ tho&aacute;t mồ h&ocirc;i nhanh, giữ cơ thể lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; thoải m&aacute;i ngay cả khi vận động cường độ cao.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;span style=\&quot;font-size: 100%;color: #000000\&quot;&gt;Họa tiết in bền m&agrave;u, form Regular Fit dễ mặc v&agrave; t&ocirc;n d&aacute;ng vận động vi&ecirc;n, ph&ugrave; hợp cho nhiều d&aacute;ng người. Logo PU phản quang l&agrave; điểm nhấn tinh tế, tăng độ nhận diện v&agrave; t&iacute;nh thẩm mỹ. Wika Luska l&agrave; lựa chọn l&yacute; tưởng cho tập luyện, thi đấu v&agrave; c&aacute;c hoạt động thể thao thường ng&agrave;y.&lt;/span&gt;&lt;/p&gt;\n&lt;p&gt;&lt;img class=\&quot;size-full wp-image-3552 aligncenter\&quot; src=\&quot;https://wikasports.com/wp-content/uploads/2021/06/bang-size-ao-wika-sports-1.jpg\&quot; alt=\&quot;bang-size-ao-wika-sports-1\&quot; width=\&quot;1024\&quot; height=\&quot;336\&quot; /&gt;&lt;/p&gt;&quot;,
            &quot;gia_goc&quot;: &quot;249000.00&quot;,
            &quot;gia_khuyen_mai&quot;: &quot;239000.00&quot;,
            &quot;so_luong_ton_kho&quot;: 100,
            &quot;can_nang_kg&quot;: null,
            &quot;noi_bat&quot;: true,
            &quot;trang_thai&quot;: true,
            &quot;da_ban&quot;: 0,
            &quot;luot_xem&quot;: 0,
            &quot;diem_danh_gia&quot;: &quot;0.00&quot;,
            &quot;so_luot_danh_gia&quot;: 0,
            &quot;created_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-03-08T07:41:18.000000Z&quot;,
            &quot;anh_chinh&quot;: {
                &quot;id&quot;: 82,
                &quot;san_pham_id&quot;: 8,
                &quot;duong_dan_anh&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-kem-1_optimized.png&quot;,
                &quot;chu_thich&quot;: null,
                &quot;thu_tu&quot;: 0,
                &quot;la_anh_chinh&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08 07:41:18&quot;,
                &quot;url&quot;: &quot;https://wikasports.com/wp-content/uploads/2026/02/ao-bong-da-wika-luska-kem-1_optimized.png&quot;
            },
            &quot;danh_muc&quot;: {
                &quot;id&quot;: 7,
                &quot;danh_muc_cha_id&quot;: null,
                &quot;ten&quot;: &quot;&Aacute;o B&oacute;ng Đ&aacute;&quot;,
                &quot;duong_dan&quot;: &quot;ao-bong-da&quot;,
                &quot;hinh_anh&quot;: null,
                &quot;mo_ta&quot;: null,
                &quot;thu_tu&quot;: 6,
                &quot;trang_thai&quot;: true,
                &quot;created_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-03-08T07:41:17.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-recommendations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-recommendations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-recommendations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-recommendations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-recommendations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-recommendations" data-method="GET"
      data-path="api/v1/recommendations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-recommendations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-recommendations"
                    onclick="tryItOut('GETapi-v1-recommendations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-recommendations"
                    onclick="cancelTryOut('GETapi-v1-recommendations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-recommendations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/recommendations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-recommendations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-recommendations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-behaviors">Ghi nhận hành vi người dùng cho ML.</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-behaviors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/behaviors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"san_pham_id\": 16,
    \"hanh_vi\": \"them_gio_hang\",
    \"thoi_gian_xem_s\": 39
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/behaviors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "san_pham_id": 16,
    "hanh_vi": "them_gio_hang",
    "thoi_gian_xem_s": 39
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-behaviors">
</span>
<span id="execution-results-POSTapi-v1-behaviors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-behaviors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-behaviors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-behaviors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-behaviors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-behaviors" data-method="POST"
      data-path="api/v1/behaviors"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-behaviors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-behaviors"
                    onclick="tryItOut('POSTapi-v1-behaviors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-behaviors"
                    onclick="cancelTryOut('POSTapi-v1-behaviors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-behaviors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/behaviors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-behaviors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-behaviors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>san_pham_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="san_pham_id"                data-endpoint="POSTapi-v1-behaviors"
               value="16"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the san_pham table. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>hanh_vi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hanh_vi"                data-endpoint="POSTapi-v1-behaviors"
               value="them_gio_hang"
               data-component="body">
    <br>
<p>Example: <code>them_gio_hang</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>xem</code></li> <li><code>click</code></li> <li><code>them_gio_hang</code></li> <li><code>mua_hang</code></li> <li><code>yeu_thich</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>thoi_gian_xem_s</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="thoi_gian_xem_s"                data-endpoint="POSTapi-v1-behaviors"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>39</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
