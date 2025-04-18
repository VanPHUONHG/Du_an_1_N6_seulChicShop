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
            <div class="d-flex justify-content-between">
                <div class="">
                    <h1>Quản Lý Tài Khoản Client</h1>
                </div>
                <div class="">
                    <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-khach-hang' ?>" class="btn btn-secondary"><i
                            class="fa fa-backward"></i> Quay Lai</a>
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
                            <h3 class="card-title">Sửa Tài Khoản Client: <?= $user['ten_tai_khoan'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-tai-khoan-khach-hang' ?>" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id_tai_khoan_client" value="<?= $user['id'] ?>">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Tên Tài Khoản</label>
                                    <input type="text" class="form-control" name="ten_tai_khoan"
                                        placeholder="Nhập tên tài khoản" value="<?= $user['ten_tai_khoan'] ?>">
                                    <?php if (isset($_SESSION['error']['ten_tai_khoan'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_tai_khoan'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Nhập email"
                                        value="<?= $user['email'] ?>">
                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Ảnh Đại Diện</label>
                                    <input type="file" class="form-control" name="anh_dai_dien">
                                    <?php if (!empty($user['anh_dai_dien'])) { ?>
                                        <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>" alt="Current avatar"
                                            style="max-width: 100px; margin-top: 10px;">
                                    <?php } ?>
                                    <?php if (isset($_SESSION['error']['anh_dai_dien'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['anh_dai_dien'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Mật Khẩu</label>
                                    <input type="password" class="form-control" name="mat_khau"
                                        placeholder="Nhập mật khẩu" value="<?= $user['mat_khau'] ?>">
                                    <?php if (isset($_SESSION['error']['mat_khau'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mat_khau'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Số điện thoại</label>
                                    <input type="number" class="form-control" name="so_dien_thoai"
                                        placeholder="Nhập số diện thoại" value="<?= $user['so_dien_thoai'] ?>">
                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                        <option value="1" <?= $user['trang_thai'] == 1 ? 'selected' : '' ?>>Kích hoạt
                                        </option>
                                        <option value="0" <?= $user['trang_thai'] == 2 ? 'selected' : '' ?>>Không kích hoạt
                                        </option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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