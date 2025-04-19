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
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h1 class="text-gradient">Quản Lý Banner</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header bg-primary-gradient p-4">
                            <h3 class="card-title text-white mb-0">
                                <i class="fas fa-edit mr-2"></i>Chỉnh Sửa Banner
                            </h3>
                        </div>

                        <form action="<?= BASE_URL_ADMIN . '?act=cap-nhat-banner&id=' . $banner['id'] ?>" method="POST"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="card-body p-4">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($banner['id']) ?>">
                                
                                <div class="form-group mb-4">
                                    <label for="tieu_de" class="form-label"><i class="fas fa-heading text-primary"></i> Tiêu đề</label>
                                    <input type="text" class="form-control custom-input" id="tieu_de" name="tieu_de"
                                        value="<?= htmlspecialchars($banner['tieu_de']) ?>" placeholder="Nhập tiêu đề banner" required>
                                    <?php if (isset($_SESSION['error']['tieu_de'])) { ?>
                                        <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['error']['tieu_de']) ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="hinh_anh" class="form-label"><i class="fas fa-image text-primary"></i> Hình ảnh</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh_url" accept="image/*">
                                        <label class="custom-file-label" for="hinh_anh">Chọn file</label>
                                    </div>
                                    <div class="mt-3">
                                        <?php if (!empty($banner['hinh_anh_url'])) { ?>
                                            <img src="<?= htmlspecialchars(BASE_URL . $banner['hinh_anh_url']) ?>" class="img-thumbnail shadow-sm" style="max-width: 300px; border-radius: 10px;" alt="Banner image">
                                        <?php } ?>
                                    </div>
                                    <?php if (isset($_SESSION['error']['hinh_anh_url'])) { ?>
                                        <small class="text-danger"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($_SESSION['error']['hinh_anh_url']) ?></small>
                                    <?php } ?>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="trang_thai" class="form-label"><i class="fas fa-toggle-on text-primary"></i> Trạng thái</label>
                                    <select class="form-control custom-select" id="trang_thai" name="trang_thai" required>
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

                                <div class="form-group mb-4">
                                    <label for="mo_ta" class="form-label"><i class="fas fa-align-left text-primary"></i> Mô tả</label>
                                    <textarea id="mo_ta" class="form-control custom-textarea" name="mo_ta" rows="4"
                                        placeholder="Nhập mô tả"><?= htmlspecialchars($banner['mo_ta']) ?></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-light text-center p-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5 mr-3 rounded-pill">
                                    <i class="fas fa-save mr-2"></i> Cập nhật
                                </button>
                                <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-banner' ?>" class="btn btn-secondary btn-lg px-5 rounded-pill">
                                    <i class="fas fa-arrow-left mr-2"></i> Quay lại
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

<style>
.bg-primary-gradient {
    background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
}

.text-gradient {
    background: linear-gradient(135deg, #333 0%, #666 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.custom-input {
    border-radius: 10px;
    border: 2px solid #eee;
    padding: 12px 20px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.custom-input:focus {
    border-color: #6B73FF;
    box-shadow: 0 0 15px rgba(107, 115, 255, 0.2);
}

.custom-select {
    border-radius: 10px;
    border: 2px solid #eee;
    padding: 12px 20px;
    height: auto;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.custom-textarea {
    border-radius: 10px;
    border: 2px solid #eee;
    padding: 12px 20px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
</style>

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