<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/category.css">

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="category-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-plus-circle me-2"></i>Thêm danh mục mới</h1>
            <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="btn btn-light">
                <i class="fas fa-arrow-left"></i>
                <span>Quay lại</span>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?>" method="POST">
                <div class="form-group">
                    <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="ten_danh_muc" required>
                    <?php if (isset($errors['ten_danh_muc'])): ?>
                        <div class="text-danger mt-2"><?= $errors['ten_danh_muc'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Mô tả</label>
                    <textarea name="mo_ta" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
                        <span>Lưu danh mục</span>
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i>
                        <span>Làm mới</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->


</body>

</html>