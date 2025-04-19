<!-- Header -->
<?php include './views/layout/header.php'; ?>
<style>
.content-wrapper {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 30px;
}

.card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.card-primary .card-header {
    background: linear-gradient(135deg, #2C3E50 0%, #3498DB 100%);
    border-radius: 20px 20px 0 0;
    padding: 20px;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #fff;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    padding: 12px;
    transition: all 0.3s;
}

.form-control:focus {
    box-shadow: 0 0 15px rgba(52, 152, 219, 0.1);
    border-color: #3498db;
}

label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
}

.btn {
    padding: 12px 25px;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-primary {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    border: none;
}

.btn-secondary {
    background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
    border: none;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.text-danger {
    font-size: 0.9rem;
    margin-top: 5px;
}

.card-body {
    padding: 30px;
}

.card-footer {
    background: #f8f9fa;
    border-radius: 0 0 20px 20px;
    padding: 20px;
}

img {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

img:hover {
    transform: scale(1.05);
}

input[type="file"] {
    padding: 10px;
    background: #f8f9fa;
}

.form-group {
    margin-bottom: 25px;
}
</style>
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
                    <h1 class="text-primary">Sửa biến thể sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa biến thể</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-bien-the' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="bien_the_id" value="<?= $Product[0]['id'] ?>">

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Màu sắc</label>
                                        <input type="text" class="form-control" name="mau_sac" value="<?= $Product[0]['mau_sac'] ?>" placeholder="Nhập màu sắc">
                                        <?php if (isset($_SESSION['error']['mau_sac'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['mau_sac'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Kích thước</label>
                                        <input type="text" class="form-control" name="kich_thuoc" value="<?= $Product[0]['kich_thuoc'] ?>" placeholder="Nhập kích thước">
                                        <?php if (isset($_SESSION['error']['kich_thuoc'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['kich_thuoc'] ?></p>
                                        <?php  } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Giá tiền</label>
                                        <input type="number" class="form-control" name="gia" value="<?= $Product[0]['gia'] ?>" placeholder="Nhập giá biến thể">
                                        <?php if (isset($_SESSION['error']['gia'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Giá khuyến mãi</label>
                                        <input type="number" class="form-control" name="gia_khuyen_mai" value="<?= $Product[0]['gia_khuyen_mai'] ?>" placeholder="Nhập giá khuyến mãi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" name="so_luong" value="<?= $Product[0]['so_luong'] ?>" placeholder="Nhập số lượng">
                                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh hiện tại</label>
                                    <div class="mb-3">
                                        <?php if (!empty($Product[0]['hinh_anh_bien_the'])): ?>
                                            <img src="<?= BASE_URL . $Product[0]['hinh_anh_bien_the'] ?>" alt="Current Image" style="max-width: 200px;">
                                        <?php else: ?>
                                            <p class="text-muted">Không có hình ảnh</p>
                                        <?php endif; ?>
                                    </div>
                                    <label class="mt-3">Thay đổi hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh_bien_the">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-2"></i>Cập nhật biến thể
                                </button>
                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $Product[0]['san_pham_id'] ?>" class="btn btn-secondary">
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