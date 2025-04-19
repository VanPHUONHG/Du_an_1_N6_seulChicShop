<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(180deg, #2C3E50 0%, #3498DB 100%);">
  <!-- Brand Logo -->
  <a href="<?= BASE_URL ?>" class="brand-link text-center" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding: 20px 0;">
    <span class="brand-text font-weight-light" style="color: #fff; font-size: 24px; font-weight: 600;">SEUL CHIC</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid rgba(255,255,255,0.1);">
      <div class="image">
        <img src="<?= BASE_URL . $_SESSION['user']['anh_dai_dien'] ?>" class="img-circle elevation-2" alt="User Image" style="border: 2px solid #fff;">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="color: #fff; font-weight: 500;"><?= $_SESSION['user']['ten_tai_khoan'] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=/' ?>" class="nav-link text-white">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Thống kê</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link text-white">
            <i class="nav-icon fas fa-th"></i>
            <p>Quản lý danh mục</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link text-white">
            <i class="nav-icon fas fa-cube"></i>
            <p>Quản lý sản phẩm</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>" class="nav-link text-white">
            <i class="nav-icon fas fa-comment"></i>
            <p>Quản lý bình luận</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link text-white">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>Quản lý đơn hàng</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-banner' ?>" class="nav-link text-white">
            <i class="nav-icon fas fa-images"></i>
            <p>Quản lý hình ảnh banner</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=lien-he' ?>" class="nav-link text-white">
            <i class="nav-icon fas fa-id-badge"></i>
            <p>Quản lý liên hệ</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-khuyenMai' ?>" class="nav-link text-white">
            <i class="fas fa-ticket-alt nav-icon"></i>
            <p>Quản lý Khuyến Mại</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-Posts' ?>" class="nav-link text-white">
            <i class="fas fa-file-alt nav-icon"></i>
            <p>Quản lý Bài Viết</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Quản Lý Người Dùng
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-quan-tri' ?>" class="nav-link text-white">
                <i class="far fa-circle nav-icon"></i>
                <p>Tài khoản quản trị viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-khach-hang' ?>" class="nav-link text-white">
                <i class="far fa-circle nav-icon"></i>
                <p>Tài khoản khách hàng</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>