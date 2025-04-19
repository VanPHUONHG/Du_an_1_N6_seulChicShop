<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End Header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/posts.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="posts-header">
                <h1><i class="fas fa-plus-circle me-2"></i>Thêm Bài Viết Mới</h1>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL_ADMIN . '?act=them-Posts' ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tiêu đề <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="tieu_de" required>
                                </div>

                                <div class="form-group">
                                    <label>Nội dung bài viết <span class="text-danger">*</span></label>
                                    <textarea class="form-control post-editor" name="bai_viet" rows="10" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Hình ảnh <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="hinh_anh" required 
                                           onchange="previewImage(this)">
                                    <div class="image-preview mt-2" id="imagePreview"></div>
                                </div>

                                <div class="form-group">
                                    <label>Tác giả <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="tac_gia" required>
                                </div>

                                <div class="form-group">
                                    <label>Trạng thái <span class="text-danger">*</span></label>
                                    <select class="form-control" name="trang_thai" required>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Lưu bài viết
                            </button>
                            <a href="<?= BASE_URL_ADMIN ?>?act=danh-sach-Posts" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="img-fluid">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>