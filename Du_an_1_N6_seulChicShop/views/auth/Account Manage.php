<!-- Header -->
<?php include_once './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include_once './views/layouts/navbar.php'; ?>

<!-- Content -->
<div class="container mt-5 py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <?php if (isset($user) && !empty($user['anh_dai_dien'])): ?>
                        <img src="<?= $user['anh_dai_dien'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <?php else: ?>
                        <img src="assets/images/avatar-default.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <?php endif; ?>
                    <h5 class="my-3"><?= isset($user) ? $user['ten_tai_khoan'] : '' ?></h5>
                    <p class="text-muted mb-1">Khách hàng</p>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                            Chỉnh sửa
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <?php if (isset($user)): ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Tên tài khoản</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $user['ten_tai_khoan'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $user['email'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Số điện thoại</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $user['so_dien_thoai'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Ngày tạo</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= date('d/m/Y', strtotime($user['ngay_tao'])) ?></p>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-warning">
                        Vui lòng đăng nhập để xem thông tin tài khoản
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade mt-5" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Chỉnh sửa thông tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASE_URL ?>?act=cap-nhat-tai-khoan" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php if (isset($_SESSION['errors'])): ?>
                        <?php foreach($_SESSION['errors'] as $error): ?>
                            <div class="alert alert-danger">
                                <?= $error ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>
                    <input type="hidden" name="ten_tai_khoan" value="<?= $user['ten_tai_khoan'] ?>">
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" class="form-control" name="anh_dai_dien">
                    </div>
                    <?php if (isset($_SESSION['errors']['anh_dai_dien'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['errors']['anh_dai_dien'] ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                    </div>
                    <?php if (isset($_SESSION['errors']['email'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['errors']['email'] ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="so_dien_thoai" value="<?= $user['so_dien_thoai'] ?>" required>
                    </div>
                    <?php if (isset($_SESSION['errors']['so_dien_thoai'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['errors']['so_dien_thoai'] ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu mới">
                    </div>
                    <?php if (isset($_SESSION['errors']['mat_khau'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['errors']['mat_khau'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include_once './views/layouts/footer.php'; ?>