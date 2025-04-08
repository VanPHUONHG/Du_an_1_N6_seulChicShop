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
                    <h1>Quản Lý Khuyến Mại</h1>
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
                            <h3 class="card-title">Thêm Khuyến Mại</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-khuyenMai' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Mã Khuyến Mại</label>
                                    <input type="text" class="form-control" name="ma_khuyen_mai" placeholder="Nhập mã khuyến mại">
                                    <?php if (isset($_SESSION['error']['ma_khuyen_mai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ma_khuyen_mai'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Mô Tả </label>
                                    <input type="text" class="form-control" name="mo_ta" placeholder="Nhập  mô tả">
                                    <?php if (isset($_SESSION['error']['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mo_ta'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Loại Giảm giá</label>
                                    <select class="form-control" name="loai_giam_gia">
                                        <option selected disabled>Chọn loại giảm giá</option>
                                        <option value="1">Phần Trăm</option>
                                        <option value="2">Number</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['loai_giam_gia'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['loai_giam_gia'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Giá trị giảm</label>
                                    <input type="number" class="form-control" name="gia_tri_giam">
                                    <?php if (isset($_SESSION['error']['gia_tri_giam'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_tri_giam'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Giá trị đơn hàng tối thiểu</label>
                                    <input type="number" class="form-control" name="gia_tri_don_hang_toi_thieu" placeholder="Nhập số lượng">
                                    <?php if (isset($_SESSION['error']['gia_tri_don_hang_toi_thieu'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_tri_don_hang_toi_thieu'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Số lượng tối đa</label>
                                    <input type="number" class="form-control" name="so_luong_toi_da">
                                    <?php if (isset($_SESSION['error']['so_luong_toi_da'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong_toi_da'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Số lượng đã dùng</label>
                                    <input type="number" class="form-control" name="so_luong_da_dung">
                                    <?php if (isset($_SESSION['error']['so_luong_da_dung'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong_da_dung'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày bắt đầu</label>
                                    <input type="datetime-local" class="form-control" name="ngay_bat_dau">
                                    <?php if (isset($_SESSION['error']['ngay_bat_dau'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_bat_dau'] ?></p>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày kết thúc</label>
                                    <input type="datetime-local" class="form-control" name="ngay_ket_thuc">
                                    <?php if (isset($_SESSION['error']['ngay_ket_thuc'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_ket_thuc'] ?></p>
                                    <?php  } ?>
                                </div>
                                

                                <div class="form-group col-6">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                        <option selected disabled>Chọn trạng thái</option>
                                        <option value="1">on</option>
                                        <option value="2">off</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php  } ?>
                                </div>


                                

                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success" fdprocessedid="6mz4gp">Thêm Khuyến Mại</button>
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

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
</script>
</body>

</html>