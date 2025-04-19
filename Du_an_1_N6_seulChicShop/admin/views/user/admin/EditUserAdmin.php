<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<style>
.content-wrapper {
    background: #f8f9fc;
    padding: 20px;
}

.card {
    border: none;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    border-radius: 15px;
}

.card-header {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    color: white;
    border-radius: 15px 15px 0 0 !important;
    padding: 20px;
}

.card-header h3 {
    margin: 0;
    font-size: 1.5rem;
}

.card-header .btn-secondary {
    background: rgba(255,255,255,0.2);
    border: none;
    padding: 8px 20px;
    transition: all 0.3s;
}

.card-header .btn-secondary:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-2px);
}

.card-body {
    padding: 30px;
}

.avatar {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #fff;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    transition: all 0.3s;
}

.avatar:hover {
    transform: scale(1.05);
}

.form-control {
    border-radius: 8px;
    padding: 12px;
    border: 1px solid #e3e6f0;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
}

.form-label {
    font-weight: 600;
    color: #5a5c69;
    margin-bottom: 8px;
}

.btn-primary {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(78,115,223,0.3);
}

select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1em;
}

.animate-fade-in {
    animation: fadeIn 0.5s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card animate-fade-in">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>
                        <i class="fas fa-user-edit fa-sm mr-2"></i>
                        <?= isset($user) ? 'Chỉnh sửa Admin' : 'Thêm Admin mới' ?>
                    </h3>
                    <a href="<?= BASE_URL_ADMIN ?>?act=tai-khoan-quan-tri" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Quay lại
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= BASE_URL_ADMIN ?>?act=sua-tai-khoan-admin&id_tai_khoan_admin=<?= $user['id'] ?>"
                      method="POST" 
                      enctype="multipart/form-data">
                    
                    <?php if(isset($user)): ?>
                        <input type="hidden" name="id_tai_khoan_admin" value="<?= $user['id'] ?>">
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center mb-4">
                                <img src="<?= isset($user) ? BASE_URL . $user['anh_dai_dien'] : BASE_URL . 'public/images/default-avatar.png' ?>" 
                                     class="avatar mb-4" 
                                     id="avatar-preview"
                                     alt="Avatar Preview">
                                
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-camera mr-2"></i>Ảnh đại diện
                                    </label>
                                    <input type="file" 
                                           class="form-control" 
                                           name="anh_dai_dien" 
                                           accept="image/*"
                                           onchange="previewImage(this)">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-user mr-2"></i>Tên tài khoản
                                        </label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="ten_tai_khoan" 
                                               value="<?= isset($user) ? htmlspecialchars($user['ten_tai_khoan']) : '' ?>"
                                               required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-envelope mr-2"></i>Email
                                        </label>
                                        <input type="email" 
                                               class="form-control" 
                                               name="email" 
                                               value="<?= isset($user) ? htmlspecialchars($user['email']) : '' ?>"
                                               required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-key mr-2"></i>Mật khẩu
                                        </label>
                                        <input type="password" 
                                               class="form-control" 
                                               name="mat_khau">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-phone mr-2"></i>Số điện thoại
                                        </label>
                                        <input type="number" 
                                               class="form-control" 
                                               name="so_dien_thoai" 
                                               value="<?= isset($user) ? htmlspecialchars($user['so_dien_thoai']) : '' ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="fas fa-toggle-on mr-2"></i>Trạng thái
                                        </label>
                                        <select class="form-control" name="trang_thai">
                                            <option value="1" <?= isset($user) && $user['trang_thai'] == 1 ? 'selected' : '' ?>>Kích hoạt</option>
                                            <option value="2" <?= isset($user) && $user['trang_thai'] == 2 ? 'selected' : '' ?>>Không kích hoạt</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            <?= isset($user) ? 'Cập nhật' : 'Thêm mới' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php include './views/layout/footer.php'; ?>