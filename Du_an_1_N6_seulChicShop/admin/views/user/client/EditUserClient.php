<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper bg-light">
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-edit me-2 text-primary"></i>
                    Quản Lý Tài Khoản Khách Hàng
                </h1>
                <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-khach-hang' ?>" 
                   class="btn btn-secondary rounded-pill px-4">
                    <i class="fas fa-arrow-left me-2"></i>
                    Quay Lại
                </a>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title mb-0">
                                <i class="fas fa-pen me-2"></i>
                                Chỉnh Sửa Tài Khoản: <?= htmlspecialchars($user['ten_tai_khoan']) ?>
                            </h3>
                        </div>

                        <form action="<?= BASE_URL_ADMIN ?>?act=sua-tai-khoan-khach-hang" 
                              method="POST"
                              enctype="multipart/form-data"
                              class="needs-validation">
                            <input type="hidden" name="id_tai_khoan_client" value="<?= $user['id'] ?>">
                            
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="ten_tai_khoan"
                                                   id="ten_tai_khoan"
                                                   placeholder="Nhập tên tài khoản"
                                                   value="<?= htmlspecialchars($user['ten_tai_khoan']) ?>">
                                            <label for="ten_tai_khoan">Tên Tài Khoản</label>
                                            <?php if (isset($_SESSION['error']['ten_tai_khoan'])): ?>
                                                <div class="invalid-feedback d-block">
                                                    <?= $_SESSION['error']['ten_tai_khoan'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" 
                                                   class="form-control" 
                                                   name="email"
                                                   id="email" 
                                                   placeholder="Nhập email"
                                                   value="<?= htmlspecialchars($user['email']) ?>">
                                            <label for="email">Email</label>
                                            <?php if (isset($_SESSION['error']['email'])): ?>
                                                <div class="invalid-feedback d-block">
                                                    <?= $_SESSION['error']['email'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Ảnh Đại Diện</label>
                                            <input type="file" 
                                                   class="form-control" 
                                                   name="anh_dai_dien">
                                            <?php if (!empty($user['anh_dai_dien'])): ?>
                                                <div class="mt-2">
                                                    <img src="<?= BASE_URL . htmlspecialchars($user['anh_dai_dien']) ?>" 
                                                         alt="Avatar"
                                                         class="img-thumbnail"
                                                         style="max-width: 100px;">
                                                </div>
                                            <?php endif; ?>
                                            <?php if (isset($_SESSION['error']['anh_dai_dien'])): ?>
                                                <div class="invalid-feedback d-block">
                                                    <?= $_SESSION['error']['anh_dai_dien'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" 
                                                   class="form-control" 
                                                   name="mat_khau"
                                                   id="mat_khau"
                                                   placeholder="Nhập mật khẩu"
                                                   value="<?= htmlspecialchars($user['mat_khau']) ?>">
                                            <label for="mat_khau">Mật Khẩu</label>
                                            <?php if (isset($_SESSION['error']['mat_khau'])): ?>
                                                <div class="invalid-feedback d-block">
                                                    <?= $_SESSION['error']['mat_khau'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" 
                                                   class="form-control" 
                                                   name="so_dien_thoai"
                                                   id="so_dien_thoai"
                                                   placeholder="Nhập số điện thoại"
                                                   value="<?= htmlspecialchars($user['so_dien_thoai']) ?>">
                                            <label for="so_dien_thoai">Số Điện Thoại</label>
                                            <?php if (isset($_SESSION['error']['so_dien_thoai'])): ?>
                                                <div class="invalid-feedback d-block">
                                                    <?= $_SESSION['error']['so_dien_thoai'] ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" 
                                                    name="trang_thai"
                                                    id="trang_thai">
                                                <option value="1" <?= $user['trang_thai'] == 1 ? 'selected' : '' ?>>
                                                    Kích hoạt
                                                </option>
                                                <option value="0" <?= $user['trang_thai'] == 0 ? 'selected' : '' ?>>
                                                    Không kích hoạt
                                                </option>
                                            </select>
                                            <label for="trang_thai">Trạng Thái</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-light border-0 text-end">
                                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                    <i class="fas fa-save me-2"></i>
                                    Cập Nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<style>
.form-floating > .form-control,
.form-floating > .form-select {
    height: calc(3.5rem + 2px);
    line-height: 1.25;
}

.form-floating > label {
    padding: 1rem 0.75rem;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.invalid-feedback {
    font-size: 0.875em;
    color: #dc3545;
}
</style>

<script>
$(function () {
    // Add animation class to card
    $('.card').addClass('animate__animated animate__fadeIn');
    
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Initialize form validation
    $('.needs-validation').on('submit', function(event) {
        if (!this.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        $(this).addClass('was-validated');
    });
});
</script>
</body>
</html>