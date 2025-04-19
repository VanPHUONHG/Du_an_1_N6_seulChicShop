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
                    <h1>Thêm biến thể sản phẩm</h1>
                </div>
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
                            <h3 class="card-title">Thêm biến thể mới</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-bien-the-san-pham' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="san_pham_id" value="<?= $_GET['id_san_pham'] ?>">
                                
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Màu sắc</label>
                                        <input type="text" class="form-control" name="mau_sac" placeholder="Nhập màu sắc">
                                        <?php if (isset($_SESSION['error']['variant'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['variant'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Kích thước</label>
                                        <input type="text" class="form-control" name="kich_thuoc" placeholder="Nhập kích thước">
                                        <?php if (isset($_SESSION['error']['variant'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['variant'] ?></p>
                                        <?php  } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Giá tiền</label>
                                        <input type="number" class="form-control" name="gia" placeholder="Nhập giá biến thể">
                                        <?php if (isset($_SESSION['error']['gia'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['gia'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Giá khuyến mãi</label>
                                        <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                    </div>
                                </div>

                                <div class="form-group">
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

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Thêm biến thể</button>
                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $_GET['id_san_pham'] ?>" class="btn btn-secondary">Quay lại</a>
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
