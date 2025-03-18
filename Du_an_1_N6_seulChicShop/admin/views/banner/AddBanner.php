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
                        <form action="<?= BASE_URL_ADMIN . '?act=them-banner' ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Tiêu đề</label>
                                    <input type="text" class="form-control" name="tieu_de"
                                        placeholder="Nhập tiêu đề banner">
                                    <?php if (isset($_SESSION['error']['tieu_de'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['tieu_de'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh_url">
                                    <?php if (isset($_SESSION['error']['hinh_anh_url'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh_url'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                        <option selected disabled>Chọn trạng thái</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label for="mo_ta">Mô tả</label>
                                    <textarea id="mo_ta" class="form-control" name="mo_ta"
                                        placeholder="Nhập mô tả"></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Thêm banner</button>
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
</script>
</body>

</html>