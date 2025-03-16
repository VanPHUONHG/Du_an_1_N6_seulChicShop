<aside class="main-sidebar  elevation-4">
  <!-- Brand Logo -->
  <a href="<?= BASE_URL ?>" class="brand-link text-center">
    <!-- <img srcalt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">SEUL CHIC SHOP </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-black">Alexander Pierce</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=/' ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Thống kê
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Quản lý danh mục</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
            <i class="nav-icon fas fa-cube"></i>
            <p>Quản lý sản phẩm</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>Quản lý đơn hàng</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=quan-ly-binh-luan' ?>" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
            <p>Quản lý bình luận</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=banner' ?>" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>Quản lý banner</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=tin-tuc' ?>" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>Quản lý tin tức</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=lien-he' ?>" class="nav-link">
            <i class="nav-icon fas fa-id-badge"></i>
            <p>Quản lý liên hệ</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p style="color: white;">Quản Lý Người Dùng</p>
            <i class="fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '/?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p style="color: white;">Tài khoản quản trị viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '/?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p style="color: white;">Tài khoản khách hàng</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '/?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p style="color: white;">Tài khoản cá nhân</p>
                </a>
              </li> -->
          </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>