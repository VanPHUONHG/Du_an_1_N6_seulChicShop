<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: linear-gradient(135deg, #2C3E50 0%, #3498DB 100%); box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: #fff;">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown" style="padding: 8px;">
                <?php if (isset($_SESSION['user'])) : ?>
                    <span class="mr-2" style="color: #fff;"><?= $_SESSION['user']['ten_tai_khoan'] ?></span>
                    <img src="<?= BASE_URL . $_SESSION['user']['anh_dai_dien'] ?>" class="img-circle elevation-2" alt="User Image" style="width: 35px; height: 35px; border: 2px solid #fff; object-fit: cover;">
                <?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                <span class="dropdown-header" style="font-weight: 600; color: #2C3E50;">Chào mừng đến trang Admin</span>
                <div class="dropdown-divider"></div>
                <!-- <a href="<?= BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>" class="dropdown-item" style="padding: 10px 20px;">
                    <i class="fas fa-user mr-2 text-primary"></i> Thông tin cá nhân
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="<?= BASE_URL_ADMIN . '?act=logout-admin' ?>" class="dropdown-item" style="padding: 10px 20px;"
                    onclick="return confirm('Bạn Đồng Ý Đăng Xuất?')">
                    <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Đăng xuất
                </a>
            </div>
        </li>
    </ul>
</nav>
