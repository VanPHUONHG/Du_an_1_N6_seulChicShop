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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa Posts</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=cap-nhat-Posts&id=' . $Posts['id'] ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="card-body row">
                                <input type="hidden" name="id" value="<?= $Posts['id'] ?>">

                                <div class="form-group col-12">
                                    <label>Hình ảnh <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="hinh_anh" accept="image/*">
                                    <input type="hidden" name="hinh_anh_cu" value="<?= $Posts['hinh_anh'] ?>">
                                    <?php if (!empty($Posts['hinh_anh'])): ?>
                                        <div class="mt-2">
                                            <label>Ảnh hiện tại:</label>
                                            <img src="<?= BASE_URL . $Posts['hinh_anh'] ?>" 
                                                 alt="Current image"
                                                 class="img-thumbnail mt-2" 
                                                 style="max-width: 200px"
                                                 onerror="this.src='<?= BASE_URL ?>/uploads/default.jpg'">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                    <?php } ?>
                                    <small class="form-text text-muted">
                                        Chọn ảnh mới để thay đổi. Để trống nếu muốn giữ ảnh cũ.
                                    </small>
                                </div>

                                <div class="form-group col-12">
                                    <label>Tiêu đề</label>
                                    <input type="text" class="form-control" name="tieu_de"
                                        value="<?= $Posts['tieu_de'] ?>" placeholder="Nhập tiêu đề ">
                                    <?php if (isset($_SESSION['error']['tieu_de'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['tieu_de'] ?></p>
                                    <?php } ?>
                                </div>
                                
                                <div class="form-group col-12">
                                    <label>Bài viết</label>
                                    <input type="text" class="form-control" name="bai_viet"
                                        value="<?= $Posts['bai_viet'] ?>" placeholder="Nhập tiêu đề ">
                                    <?php if (isset($_SESSION['error']['bai_viet'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['bai_viet'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label for="tac_gia">Tác giả</label>
                                    <textarea id="tac_gia" class="form-control" name="tac_gia"
                                        placeholder="Nhập tên tác giả"><?= $Posts['tac_gia'] ?></textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                        <option disabled>Chọn trạng thái</option>
                                        <option value="1" <?= $Posts['trang_thai'] == 1 ? 'selected' : '' ?>>Hiển thị
                                        </option>
                                        <option value="2" <?= $Posts['trang_thai'] == 2 ? 'selected' : '' ?>>Ẩn</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>

                                

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật Posts</button>
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