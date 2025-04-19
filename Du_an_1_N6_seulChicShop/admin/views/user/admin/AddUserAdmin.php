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
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(45deg, #1cc88a, #36b9cc);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 20px;
}

.card-header h3 {
    margin: 0;
    font-size: 1.5rem;
}

.form-control {
    border-radius: 8px;
    padding: 12px;
    border: 1px solid #e3e6f0;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #1cc88a;
    box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
}

.btn-secondary {
    background: #858796;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    transition: all 0.3s;
}

.btn-secondary:hover {
    background: #717384;
    transform: translateY(-2px);
}

.btn-success {
    background: #1cc88a;
    border: none;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-success:hover {
    background: #169e6c;
    transform: translateY(-2px);
}

.form-group label {
    font-weight: 600;
    color: #4e73df;
    margin-bottom: 8px;
}

.text-danger {
    font-size: 0.9rem;
    margin-top: 5px;
}

select.form-control {
    cursor: pointer;
}

.card-body {
    padding: 30px;
}

.card-footer {
    background: transparent;
    border-top: 1px solid #e3e6f0;
    padding: 20px;
    text-align: right;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-plus mr-2"></i>
                    Quản Lý Tài Khoản Admin
                </h1>
                <a href="<?= BASE_URL_ADMIN . '?act=them-tai-khoan-admin' ?>" class="btn btn-secondary">
                    <i class="fa fa-backward mr-2"></i> Quay Lại
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card animate__animated animate__fadeIn">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Thêm Tài Khoản Admin
                            </h3>
                        </div>

                        <form action="<?= BASE_URL_ADMIN . '?act=them-tai-khoan-admin' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label><i class="fas fa-user mr-2"></i>Tên Tài Khoản</label>
                                    <input type="text" class="form-control" name="ten_tai_khoan" placeholder="Nhập tên tài khoản" value="<?= isset($_SESSION['old']['ten_tai_khoan']) ? $_SESSION['old']['ten_tai_khoan'] : '' ?>">
                                    <?php if (isset($_SESSION['error']['ten_tai_khoan'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_tai_khoan'] ?></p>
                                    <?php  } ?>
                                </div>
                                
                                <div class="form-group col-6">
                                    <label><i class="fas fa-envelope mr-2"></i>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Nhập email" value="<?= isset($_SESSION['old']['email']) ? $_SESSION['old']['email'] : '' ?>">
                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label><i class="fas fa-image mr-2"></i>Ảnh Đại Diện</label>
                                    <input type="file" class="form-control" name="anh_dai_dien">
                                    <?php if (isset($_SESSION['error']['anh_dai_dien'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['anh_dai_dien'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label><i class="fas fa-lock mr-2"></i>Mật Khẩu</label>
                                    <input type="password" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu">
                                    <?php if (isset($_SESSION['error']['mat_khau'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mat_khau'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label><i class="fas fa-phone mr-2"></i>Số điện thoại</label>
                                    <input type="number" class="form-control" min="0" name="so_dien_thoai" placeholder="Nhập số diện thoại" value="<?= isset($_SESSION['old']['so_dien_thoai']) ? $_SESSION['old']['so_dien_thoai'] : '' ?>">
                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label><i class="fas fa-toggle-on mr-2"></i>Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                        <option value="1">Kích hoạt</option>
                                        <option value="2">Không kích hoạt</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php  } ?>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Thêm Admin
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

<script>
$(document).ready(function() {
    // Preview image before upload
    $('input[type="file"]').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});
</script>