<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End Header -->

<style>
.content-wrapper {
    background-color: #f8f9fa;
    padding: 20px;
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    border-radius: 15px 15px 0 0 !important;
    padding: 20px;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.btn-success {
    background: #28a745;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-success:hover {
    background: #218838;
    transform: translateY(-2px);
}

.btn-secondary {
    background: #6c757d;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.form-group label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
}

.card-footer {
    background: transparent;
    border-top: 1px solid #eee;
    padding: 20px;
}

.text-danger {
    font-size: 0.9rem;
    margin-top: 5px;
}
</style>

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
                    <h1 class="text-success">Thêm biến thể sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title m-0">Thêm biến thể mới</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-bien-the-san-pham' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body p-4">
                                <input type="hidden" name="san_pham_id" value="<?= $_GET['id_san_pham'] ?>">
                                
                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label>Màu sắc</label>
                                        <input type="text" class="form-control" name="mau_sac" placeholder="Nhập màu sắc">
                                        <?php if (isset($_SESSION['error']['variant'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['variant'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Kích thước</label>
                                        <input type="text" class="form-control" name="kich_thuoc" placeholder="Nhập kích thước">
                                        <?php if (isset($_SESSION['error']['variant'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['variant'] ?></p>
                                        <?php  } ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label>Giá tiền</label>
                                        <input type="number" class="form-control" name="gia" placeholder="Nhập giá biến thể">
                                        <?php if (isset($_SESSION['error']['gia'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Giá khuyến mãi</label>
                                        <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh_bien_the">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success mr-2">
                                    <i class="fas fa-plus mr-2"></i>Thêm biến thể
                                </button>
                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $_GET['id_san_pham'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left mr-2"></i>Quay lại
                                </a>
                            </div>
                        </form>
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
