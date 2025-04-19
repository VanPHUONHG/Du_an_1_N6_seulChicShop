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
                    <h1>Quản lý banner</h1>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Thêm banner</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <style>
                            .banner-form {
                                padding: 20px;
                                background-color: #f8f9fa;
                            }

                            .banner-form-card {
                                background: white;
                                border-radius: 12px;
                                box-shadow: 0 2px 15px rgba(0,0,0,0.08);
                                border: none;
                            }

                            .banner-form-header {
                                background: linear-gradient(135deg, #0396FF 0%, #ABDCFF 100%);
                                color: white;
                                padding: 20px;
                                border-radius: 12px 12px 0 0;
                            }

                            .form-group {
                                margin-bottom: 1.5rem;
                            }

                            .form-label {
                                font-weight: 500;
                                color: #495057;
                                margin-bottom: 0.5rem;
                            }

                            .form-control {
                                border-radius: 6px;
                                border: 1px solid #e2e8f0;
                                padding: 0.75rem 1rem;
                                transition: all 0.3s ease;
                            }

                            .form-control:focus {
                                border-color: #0396FF;
                                box-shadow: 0 0 0 2px rgba(3, 150, 255, 0.1);
                            }

                            .image-preview {
                                margin-top: 10px;
                                border-radius: 8px;
                                overflow: hidden;
                                max-width: 300px;
                            }

                            .image-preview img {
                                width: 100%;
                                height: auto;
                                display: block;
                            }

                            .btn-submit {
                                background: linear-gradient(135deg, #0396FF 0%, #ABDCFF 100%);
                                color: white;
                                border: none;
                                padding: 12px 24px;
                                border-radius: 6px;
                                font-weight: 600;
                                transition: all 0.3s ease;
                            }

                            .btn-submit:hover {
                                transform: translateY(-2px);
                                box-shadow: 0 4px 15px rgba(3, 150, 255, 0.3);
                            }

                            .error-message {
                                color: #dc3545;
                                font-size: 0.875rem;
                                margin-top: 0.25rem;
                            }
                        </style>

                        <div class="banner-form">
                            <div class="banner-form-card">
                                <div class="banner-form-header">
                                    <h3 class="mb-0">Thêm Banner Mới</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?= BASE_URL_ADMIN . '?act=them-banner' ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="form-label">Tiêu đề</label>
                                            <input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề banner">
                                            <?php if (isset($_SESSION['error']['tieu_de'])): ?>
                                                <div class="error-message"><?= $_SESSION['error']['tieu_de'] ?></div>
                                            <?php endif; ?>
                                </div>

                                        <div class="form-group">
                                            <label class="form-label">Hình ảnh</label>
                                            <input type="file" class="form-control" name="hinh_anh_url" onchange="previewImage(this)">
                                            <div class="image-preview" id="imagePreview"></div>
                                            <?php if (isset($_SESSION['error']['hinh_anh_url'])): ?>
                                                <div class="error-message"><?= $_SESSION['error']['hinh_anh_url'] ?></div>
                                            <?php endif; ?>
                                </div>

                                        <div class="form-group">
                                            <label class="form-label">Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                                <option value="">Chọn trạng thái</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                            <?php if (isset($_SESSION['error']['trang_thai'])): ?>
                                                <div class="error-message"><?= $_SESSION['error']['trang_thai'] ?></div>
                                            <?php endif; ?>
                                </div>

                                        <div class="form-group">
                                            <label class="form-label">Mô tả</label>
                                            <textarea class="form-control" name="mo_ta" rows="4" placeholder="Nhập mô tả banner"></textarea>
                                </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn-submit">
                                                <i class="fas fa-plus me-2"></i>Thêm Banner
                                            </button>
                            </div>
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>

</html>