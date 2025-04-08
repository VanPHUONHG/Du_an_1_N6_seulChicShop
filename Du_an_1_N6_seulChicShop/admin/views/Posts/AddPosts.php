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
                    <h1>Quản lý Posts</h1>
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
                            <h3 class="card-title">Thêm Posts</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-Posts' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Hình ảnh <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="hinh_anh" required>
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Tiêu đề <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="tieu_de" 
                                           placeholder="Nhập tiêu đề" required>
                                    <?php if (isset($_SESSION['error']['tieu_de'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['tieu_de'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Bài viết <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="bai_viet" rows="5" 
                                              placeholder="Nhập nội dung bài viết" required></textarea>
                                    <?php if (isset($_SESSION['error']['bai_viet'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['bai_viet'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Tác giả <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="tac_gia"
                                           placeholder="Nhập tên tác giả" required>
                                    <?php if (isset($_SESSION['error']['tac_gia'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['tac_gia'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Trạng thái <span class="text-danger">*</span></label>
                                    <select class="form-control" name="trang_thai" required>
                                        <option value="">Chọn trạng thái</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Ẩn</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Thêm Posts</button>
                                <a href="<?= BASE_URL_ADMIN ?>?act=danh-sach-Posts" class="btn btn-secondary">Quay lại</a>
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