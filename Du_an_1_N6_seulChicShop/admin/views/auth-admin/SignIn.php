<!-- Body -->
<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success text-center">
                    <p><?= $_SESSION['success'] ?></p>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger text-center">
                    <p><?= $_SESSION['error'] ?></p>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">SEULCHIC SHOP</h4>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL_ADMIN . "?act=login-admin" ?>" method="post">
                        <div class="text-center mb-4">
                            <p class="text-muted">Chào mừng bạn đến với trang web của chúng tôi. Đăng nhập để xem thông tin hôm nay:</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="ten_tai_khoan" class="form-label">Tên tài khoản</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="ten_tai_khoan" id="ten_tai_khoan" placeholder="Nhập tên tài khoản" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="mat_khau" id="password" placeholder="Nhập mật khẩu" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/layout/footer.php'; ?>