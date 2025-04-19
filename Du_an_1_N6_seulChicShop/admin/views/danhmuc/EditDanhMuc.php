<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/category.css">

<style>
/* Additional styles for edit page */
.edit-category-header {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.edit-form-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
}

.edit-form-card .card-header {
    background: linear-gradient(to right, #f8f9fa, #ffffff);
    padding: 20px 25px;
    border-bottom: 2px solid #edf2f7;
}

.edit-form-card .form-group {
    margin-bottom: 25px;
}

.edit-form-card .form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
}

.edit-form-card .form-control {
    border: 2px solid #e2e8f0;
    padding: 12px 15px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.edit-form-card .form-control:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.15);
}

.edit-form-card textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.btn-group-edit {
    display: flex;
    gap: 12px;
}

.btn-save {
    background: #3498db;
    color: white;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-save:hover {
    background: #2980b9;
    transform: translateY(-2px);
}

.btn-cancel {
    background: #95a5a6;
    color: white;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    background: #7f8c8d;
}

.error-feedback {
    color: #e74c3c;
    font-size: 14px;
    margin-top: 5px;
}

/* Animation for form elements */
.animate-form {
    animation: slideUp 0.5s ease-out;
}

@keyframes slideUp {
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

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="edit-category-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="text-white mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Chỉnh sửa danh mục
                    </h1>
                    <a href="<?= BASE_URL_ADMIN . "?act=danh-muc" ?>" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="edit-form-card animate-form">
                        <div class="card-header">
                            <h3 class="card-title mb-0">
                                <i class="fas fa-folder me-2"></i>
                                Thông tin danh mục
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $danhMuc['id'] ?>">

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-tag me-2"></i>
                                        Tên danh mục
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control <?= isset($errors['ten_danh_muc']) ? 'is-invalid' : '' ?>" 
                                           name="ten_danh_muc" 
                                           value="<?= htmlspecialchars($danhMuc['ten_danh_muc']) ?>" 
                                           placeholder="Nhập tên danh mục">
                                    <?php if (isset($errors['ten_danh_muc'])): ?>
                                        <div class="error-feedback">
                                            <?= $errors['ten_danh_muc'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-align-left me-2"></i>
                                        Mô tả
                                    </label>
                                    <textarea name="mo_ta" 
                                              class="form-control" 
                                              placeholder="Nhập mô tả chi tiết về danh mục"
                                              rows="4"><?= htmlspecialchars($danhMuc['mo_ta']) ?></textarea>
                                </div>

                                <div class="btn-group-edit">
                                    <button type="submit" class="btn btn-save">
                                        <i class="fas fa-save me-2"></i>
                                        Lưu thay đổi
                                    </button>
                                    <a href="<?= BASE_URL_ADMIN . "?act=danh-muc" ?>" 
                                       class="btn btn-cancel">
                                        <i class="fas fa-times me-2"></i>
                                        Hủy
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Add animation when form loads
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.classList.add('animate-form');
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const tenDanhMuc = document.querySelector('input[name="ten_danh_muc"]');
    if (!tenDanhMuc.value.trim()) {
        e.preventDefault();
        tenDanhMuc.classList.add('is-invalid');
        const feedback = document.createElement('div');
        feedback.className = 'error-feedback';
        feedback.textContent = 'Vui lòng nhập tên danh mục';
        tenDanhMuc.parentNode.appendChild(feedback);
    }
});
</script>

<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->


</body>

</html>