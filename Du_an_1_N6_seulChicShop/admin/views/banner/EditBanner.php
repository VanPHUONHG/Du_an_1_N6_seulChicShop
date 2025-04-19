<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End Header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-image"></i> Quản lý banner</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-primary shadow">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><i class="fas fa-edit"></i> Sửa banner</h3>
                        </div>

                        <form action="<?= BASE_URL_ADMIN . '?act=cap-nhat-banner&id=' . $banner['id'] ?>" method="POST"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($banner['id']) ?>">
                                
                                <div class="form-group">
                                    <label for="tieu_de"><i class="fas fa-heading"></i> Tiêu đề</label>
                                    <input type="text" class="form-control" id="tieu_de" name="tieu_de"
                                        value="<?= htmlspecialchars($banner['tieu_de']) ?>" placeholder="Nhập tiêu đề banner" required>
                                    <?php if (isset($_SESSION['error']['tieu_de'])) { ?>
                                        <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['error']['tieu_de']) ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="hinh_anh"><i class="fas fa-image"></i> Hình ảnh</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh_url" accept="image/*">
                                        <label class="custom-file-label" for="hinh_anh">Chọn file</label>
                                    </div>
                                    <div class="mt-3">
                                        <?php if (!empty($banner['hinh_anh_url'])) { ?>
                                            <img src="<?= htmlspecialchars(BASE_URL . $banner['hinh_anh_url']) ?>" class="img-thumbnail" style="max-width: 300px" alt="Banner image">
                                        <?php } ?>
                                    </div>
                                    <?php if (isset($_SESSION['error']['hinh_anh_url'])) { ?>
                                        <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['error']['hinh_anh_url']) ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="trang_thai"><i class="fas fa-toggle-on"></i> Trạng thái</label>
                                    <select class="form-control" id="trang_thai" name="trang_thai" required>
                                        <option value="" disabled>Chọn trạng thái</option>
                                        <option value="1" <?= ($banner['trang_thai'] == 1) ? 'selected' : '' ?>>
                                            <i class="fas fa-eye"></i> Hiển thị
                                        </option>
                                        <option value="2" <?= ($banner['trang_thai'] == 2) ? 'selected' : '' ?>>
                                            <i class="fas fa-eye-slash"></i> Ẩn
                                        </option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['error']['trang_thai']) ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="mo_ta"><i class="fas fa-align-left"></i> Mô tả</label>
                                    <textarea id="mo_ta" class="form-control" name="mo_ta" rows="4"
                                        placeholder="Nhập mô tả"><?= htmlspecialchars($banner['mo_ta']) ?></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save"></i> Cập nhật banner
                                </button>
                                <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-banner' ?>" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

<script>
$(function() {
    // File input
    bsCustomFileInput.init();
    
    // Form validation
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // Image preview
    $('#hinh_anh').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.img-thumbnail').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
</body>
</html>