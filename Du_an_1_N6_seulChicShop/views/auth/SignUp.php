<!-- Header -->
<?php
include_once 'views/layouts/header.php';
?>
<link rel="stylesheet" type="text/css" href="assets/css/formlogin.css">
<!-- Navbar -->
<?php
include_once 'views/layouts/navbar.php';
?>
<!-- Body -->

<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; margin: 40px 0;">
        <div class="session">
            <div class="left">
                <svg enable-background="new 0 0 300 302.5" version="1.1" viewBox="0 0 300 302.5" xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg">
                    <style type="text/css">
                        .st01 {
                            fill: #fff;
                        }
                    </style>
                    <path class="st01"
                        d="m126 302.2c-2.3 0.7-5.7 0.2-7.7-1.2l-105-71.6c-2-1.3-3.7-4.4-3.9-6.7l-9.4-126.7c-0.2-2.4 1.1-5.6 2.8-7.2l93.2-86.4c1.7-1.6 5.1-2.6 7.4-2.3l125.6 18.9c2.3 0.4 5.2 2.3 6.4 4.4l63.5 110.1c1.2 2 1.4 5.5 0.6 7.7l-46.4 118.3c-0.9 2.2-3.4 4.6-5.7 5.3l-121.4 37.4zm63.4-102.7c2.3-0.7 4.8-3.1 5.7-5.3l19.9-50.8c0.9-2.2 0.6-5.7-0.6-7.7l-27.3-47.3c-1.2-2-4.1-4-6.4-4.4l-53.9-8c-2.3-0.4-5.7 0.7-7.4 2.3l-40 37.1c-1.7 1.6-3 4.9-2.8 7.2l4.1 54.4c0.2 2.4 1.9 5.4 3.9 6.7l45.1 30.8c2 1.3 5.4 1.9 7.7 1.2l52-16.2z" />
                </svg>
            </div>
            <form action="<?= BASE_URL . "?act=check-dang-ky" ?>" method="post" class="log-in" autocomplete="off">
                <?php
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo '<div class="alert alert-success" role="alert">Đăng ký thành công! Vui lòng đăng nhập.</div>';
                }
                ?>
                <h4>Chúng Tôi là <span>SEULCHIC SHOP</span></h4>
                <p>Chào mừng bạn đến với trang web của chúng tôi. Đăng ký tài khoản mới:</p>
                <div class="floating-label">
                    <input placeholder="Tên tài khoản" type="text" name="ten_tai_khoan" id="ten_tai_khoan"
                        autocomplete="off" required>
                    <label for="ten_tai_khoan">Tên tài khoản:</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M50 40.23c7.27 0 13.18-5.91 13.18-13.18S57.27 13.87 50 13.87s-13.18 5.91-13.18 13.18S42.73 40.23 50 40.23zM50 17.87c5.06 0 9.18 4.12 9.18 9.18s-4.12 9.18-9.18 9.18-9.18-4.12-9.18-9.18S44.94 17.87 50 17.87z" />
                            <path
                                d="M50 44.23c-14.89 0-27 12.11-27 27v15h54v-15C77 56.34 64.89 44.23 50 44.23zM73 82.23H27v-11c0-12.68 10.32-23 23-23s23 10.32 23 23V82.23z" />
                        </svg>
                    </div>
                </div>
                <div class="floating-label">
                    <input placeholder="Email" type="email" name="email" id="email" autocomplete="off" required>
                    <label for="email">Email:</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <style type="text/css">
                                .st0 {
                                    fill: none;
                                }
                            </style>
                            <g transform="translate(0 -952.36)">
                                <path
                                    d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z" />
                            </g>
                            <rect class="st0" width="100" height="100" />
                        </svg>
                    </div>
                </div>
                <div class="floating-label">
                    <input placeholder="Ảnh đại diện" type="file" name="anh_dai_dien" id="anh_dai_dien" accept="image/*">
                    <label for="anh_dai_dien">Ảnh đại diện:</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M50 40.23c7.27 0 13.18-5.91 13.18-13.18S57.27 13.87 50 13.87s-13.18 5.91-13.18 13.18S42.73 40.23 50 40.23zM50 17.87c5.06 0 9.18 4.12 9.18 9.18s-4.12 9.18-9.18 9.18-9.18-4.12-9.18-9.18S44.94 17.87 50 17.87z" />
                            <path
                                d="M50 44.23c-14.89 0-27 12.11-27 27v15h54v-15C77 56.34 64.89 44.23 50 44.23zM73 82.23H27v-11c0-12.68 10.32-23 23-23s23 10.32 23 23V82.23z" />
                        </svg>
                    </div>
                </div>
                <div class="floating-label">
                    <input placeholder="Mật khẩu" type="password" name="mat_khau" id="password" autocomplete="off"
                        required>
                    <label for="password">Mật khẩu:</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve"
                            xmlns="http://www.w3.org/2000/svg">
                            <style type="text/css">
                                .st0 {
                                    fill: none;
                                }

                                .st1 {
                                    fill: #010101;
                                }
                            </style>
                            <rect class="st0" width="24" height="24" />
                            <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z" />
                            <path class="st1"
                                d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z" />
                            <path class="st1"
                                d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z" />
                        </svg>
                    </div>
                </div>
                <div class="floating-label">
                    <input placeholder="Số điện Thoại" type="tel" pattern="[0-9]{10}" name="so_dien_thoai"
                        id="so_dien_thoai" autocomplete="off" required>
                    <label for="so_dien_thoai">Số điện Thoại:</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <style type="text/css">
                                .st0 {
                                    fill: none;
                                }
                            </style>
                            <path
                                d="M80.8 72.2L68.4 59.8c-2.3-2.3-6.2-2.3-8.5 0l-4.3 4.3-1.4-1.4c3.5-4.1 5.6-9.4 5.6-15.2 0-13-10.6-23.6-23.6-23.6S12.7 34.5 12.7 47.5s10.6 23.6 23.6 23.6c5.8 0 11.1-2.1 15.2-5.6l1.4 1.4-4.3 4.3c-2.3 2.3-2.3 6.2 0 8.5l12.4 12.4c2.3 2.3 6.2 2.3 8.5 0l11.3-11.3c2.3-2.4 2.3-6.2 0-8.6zM36.3 66.1c-10.2 0-18.6-8.3-18.6-18.6 0-10.2 8.3-18.6 18.6-18.6s18.6 8.3 18.6 18.6c0 10.2-8.4 18.6-18.6 18.6z" />
                            <rect class="st0" width="100" height="100" />
                        </svg>
                    </div>
                </div>
                <input type="hidden" name="chuc_vu_id" value="2">
                <input type="hidden" name="trang_thai" value="1">
                <button type="submit" name="submit"
                    style="background: rgb(182, 157, 230); color: #fff; box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, 0.13);">Đăng
                    ký</button>
                <a href="<?= BASE_URL . "?act=dang-nhap" ?>" class="discrete">Đã có tài khoản? Đăng nhập</a>
            </form>
        </div>
    </div>
</body>
<!-- Footer -->
<?php
include_once 'views/layouts/footer.php';
?>