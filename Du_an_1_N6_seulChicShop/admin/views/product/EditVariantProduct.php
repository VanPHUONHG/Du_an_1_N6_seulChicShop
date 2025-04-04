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
                    <h1>Sửa biến thể sản phẩm</h1>
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
                                    <div>
                                        <?php if (!empty($Product[0]['hinh_anh_bien_the'])): ?>
                                            <img src="<?= BASE_URL . $Product[0]['hinh_anh_bien_the'] ?>" alt="Current Image" style="max-width: 200px;">
                                        <?php else: ?>
                                            <p>Không có hình ảnh</p>
                                        <?php endif; ?>
                                    </div>
                                    <label class="mt-3">Thay đổi hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh_bien_the">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật biến thể</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $Product[0]['san_pham_id'] ?>" class="btn btn-secondary">Quay lại</a>
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