<!-- Header -->
<?php include_once './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include_once './views/layouts/navbar.php'; ?>

<!-- Content -->
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card border-0 shadow-lg rounded-lg mb-4 hover-shadow-lg transition-all">
                <div class="card-body text-center p-5">
                    <div class="position-relative mb-4">
                        <?php if (isset($user) && !empty($user['anh_dai_dien'])): ?>
                            <img src="<?= $user['anh_dai_dien'] ?>" alt="avatar" class="rounded-circle img-fluid shadow" style="width: 200px; height: 200px; object-fit: cover; border: 4px solid #fff;">
                        <?php else: ?>
                            <img src="assets/images/avatar-default.jpg" alt="avatar" class="rounded-circle img-fluid shadow" style="width: 200px; height: 200px; object-fit: cover; border: 4px solid #fff;">
                        <?php endif; ?>
                        <div class="position-absolute bottom-0 right-0">
                            <button type="button" class="btn btn-primary btn-sm rounded-circle p-2 shadow-sm" data-toggle="modal" data-target="#editProfileModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </div>
                    </div>
                    <h4 class="font-weight-bold mb-2"><?= isset($user) ? $user['ten_tai_khoan'] : '' ?></h4>
                    <p class="text-muted mb-4"><i class="fas fa-user mr-2"></i>Khách hàng</p>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary btn-lg px-4 shadow-sm hover-scale" data-toggle="modal" data-target="#editProfileModal">
                            <i class="fas fa-edit mr-2"></i>Chỉnh sửa thông tin
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-lg mb-4">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Thông tin tài khoản</h5>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($user)): ?>
                    <div class="row align-items-center py-3 hover-bg-light">
                        <div class="col-sm-4">
                            <p class="text-muted mb-0 font-weight-bold">Tên tài khoản</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="h6 mb-0"><?= $user['ten_tai_khoan'] ?></p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row align-items-center py-3 hover-bg-light">
                        <div class="col-sm-4">
                            <p class="text-muted mb-0 font-weight-bold">Email</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="h6 mb-0"><?= $user['email'] ?></p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row align-items-center py-3 hover-bg-light">
                        <div class="col-sm-4">
                            <p class="text-muted mb-0 font-weight-bold">Số điện thoại</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="h6 mb-0"><?= $user['so_dien_thoai'] ?></p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row align-items-center py-3 hover-bg-light">
                        <div class="col-sm-4">
                            <p class="text-muted mb-0 font-weight-bold">Ngày tạo</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="h6 mb-0"><i class="far fa-calendar-alt mr-2 text-primary"></i><?= date('d/m/Y', strtotime($user['ngay_tao'])) ?></p>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-warning d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle mr-3 fa-2x"></i>
                        <div>Vui lòng đăng nhập để xem thông tin tài khoản</div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="editProfileModalLabel"><i class="fas fa-user-edit mr-2"></i>Chỉnh sửa thông tin</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASE_URL ?>?act=cap-nhat-tai-khoan" method="POST" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <?php if (isset($_SESSION['errors'])): ?>
                        <?php foreach($_SESSION['errors'] as $error): ?>
                            <div class="alert alert-danger d-flex align-items-center fade show">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <?= $error ?>
                            </div>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>
                    <input type="hidden" name="ten_tai_khoan" value="<?= $user['ten_tai_khoan'] ?>">
                    
                    <div class="form-group">
                        <label class="font-weight-bold mb-3">Ảnh đại diện</label>
                        <div class="custom-file-container">
                            <div class="preview-image mb-3 text-center">
                                <?php if (isset($user) && !empty($user['anh_dai_dien'])): ?>
                                    <img src="<?= $user['anh_dai_dien'] ?>" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                                <?php endif; ?>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="anh_dai_dien" id="customFile" onchange="previewImage(this)">
                                <label class="custom-file-label shadow-sm" for="customFile">Chọn ảnh mới</label>
                            </div>
                            <small class="form-text text-muted mt-2">Chọn ảnh định dạng JPG, PNG. Kích thước tối đa 2MB</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="email" class="form-control shadow-sm" name="email" value="<?= $user['email'] ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">Số điện thoại</label>
                        <input type="text" class="form-control shadow-sm" name="so_dien_thoai" value="<?= $user['so_dien_thoai'] ?>" required>
                    </div>
                    
                    <div class="form-group mb-0">
                        <label class="font-weight-bold">Mật khẩu mới</label>
                        <input type="password" class="form-control shadow-sm" name="mat_khau" placeholder="Nhập mật khẩu mới">
                        <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light px-4 shadow-sm" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm hover-scale">
                        <i class="fas fa-save mr-2"></i>Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.hover-scale:hover {
    transform: scale(1.05);
    transition: transform 0.2s;
}

.hover-bg-light:hover {
    background-color: #f8f9fa;
    transition: background-color 0.2s;
}

.bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
}

.hover-shadow-lg:hover {
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    transition: box-shadow 0.2s;
}

.custom-file-container {
    border: 2px dashed #dee2e6;
    padding: 20px;
    border-radius: 8px;
    background: #f8f9fa;
}

.preview-image img {
    border-radius: 8px;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
}
</style>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            let preview = document.querySelector('.preview-image');
            preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 200px;">`;
        }
        reader.readAsDataURL(input.files[0]);
        
        // Update file name display
        let fileName = input.files[0].name;
        let label = input.nextElementSibling;
        label.innerHTML = fileName;
    }
}
</script>

<!-- Footer -->
<?php include_once './views/layouts/footer.php'; ?>