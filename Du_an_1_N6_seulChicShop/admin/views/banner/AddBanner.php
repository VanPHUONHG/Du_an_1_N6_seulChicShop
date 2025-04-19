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
                                <i class="fas fa-plus-circle mr-2"></i>Thêm Banner Mới
                            </h3>
                        </div>

                        <style>
                            .bg-primary-gradient {
                                background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
                            }
                            
                            .text-gradient {
                                background: linear-gradient(135deg, #333 0%, #666 100%);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                            }

                            .form-control {
                                border-radius: 10px;
                                border: 2px solid #eee;
                                padding: 12px 20px;
                                font-size: 1rem;
                                transition: all 0.3s ease;
                            }

                            .form-control:focus {
                                border-color: #6B73FF;
                                box-shadow: 0 0 15px rgba(107, 115, 255, 0.2);
                            }

                            .form-label {
                                font-weight: 600;
                                font-size: 0.95rem;
                                color: #444;
                                margin-bottom: 0.75rem;
                            }

                            .btn-submit {
                                background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
                                color: white;
                                border: none;
                                padding: 15px 30px;
                                border-radius: 10px;
                                font-weight: 600;
                                letter-spacing: 0.5px;
                                transition: all 0.3s ease;
                            }

                            .btn-submit:hover {
                                transform: translateY(-2px);
                                box-shadow: 0 8px 20px rgba(107, 115, 255, 0.3);
                            }

                            .image-preview {
                                margin-top: 15px;
                                border-radius: 15px;
                                overflow: hidden;
                                max-width: 400px;
                                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                            }

                            .image-preview img {
                                width: 100%;
                                height: auto;
                                display: block;
                                transition: transform 0.3s ease;
                            }

                            .image-preview img:hover {
                                transform: scale(1.05);
                            }

                            .error-message {
                                color: #dc3545;
                                font-size: 0.875rem;
                                margin-top: 0.5rem;
                                font-style: italic;
                            }

                            .form-group {
                                margin-bottom: 2rem;
                            }
                        </style>

                        <div class="card-body p-5">
                            <form action="<?= BASE_URL_ADMIN . '?act=them-banner' ?>" method="POST" enctype="multipart/form-data" class="needs-validation">
                                <div class="form-group">
                                    <label class="form-label">Tiêu đề banner</label>
                                    <input type="text" class="form-control" name="tieu_de" placeholder="Nhập tiêu đề cho banner">
                                    <?php if (isset($_SESSION['error']['tieu_de'])): ?>
                                        <div class="error-message"><?= $_SESSION['error']['tieu_de'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Hình ảnh banner</label>
                                    <input type="file" class="form-control" name="hinh_anh_url" onchange="previewImage(this)">
                                    <div class="image-preview" id="imagePreview"></div>
                                    <?php if (isset($_SESSION['error']['hinh_anh_url'])): ?>
                                        <div class="error-message"><?= $_SESSION['error']['hinh_anh_url'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Trạng thái hiển thị</label>
                                    <select class="form-control" name="trang_thai">
                                        <option value="">-- Chọn trạng thái --</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])): ?>
                                        <div class="error-message"><?= $_SESSION['error']['trang_thai'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Mô tả banner</label>
                                    <textarea class="form-control" name="mo_ta" rows="4" placeholder="Nhập mô tả chi tiết về banner"></textarea>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn-submit">
                                        <i class="fas fa-plus-circle mr-2"></i>Thêm Banner
                                    </button>
                                </div>
                            </form>
                        </div>
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