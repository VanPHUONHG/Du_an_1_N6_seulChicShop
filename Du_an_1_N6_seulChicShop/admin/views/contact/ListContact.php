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
                    <h1>Danh Sách Liên Hệ</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tài Khoản</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Tiêu Đề</th>
                                        <th>Nội Dung</th>
                                        <th>Thời Gian Gửi</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listContact as $key => $contact): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $contact['ten_tai_khoan'] ?? 'Khách vãng lai' ?></td>
                                            <td><?= $contact['ho_ten'] ?></td>
                                            <td><?= $contact['email'] ?></td>
                                            <td><?= $contact['so_dien_thoai'] ?></td>
                                            <td><?= $contact['tieu_de'] ?></td>
                                            <td><?= $contact['noi_dung'] ?></td>
                                            <td><?= $contact['thoi_gian_gui'] ?></td>
                                            <td><?= $contact['trang_thai'] == 1 ? 'Đã xử lý' : 'Chưa xử lý' ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=form-chinh-sua-lien-he&id=<?= $contact['id'] ?>"
                                                    class="btn btn-success"><i class="fas fa-edit"></i> Sửa Trạng Thái</a>
                                                <?php if ($contact['trang_thai'] == 1) { ?>
                                                    <a href="<?= BASE_URL_ADMIN ?>?act=xoa-lien-he&id=<?= $contact['id'] ?>"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
    });
</script>
</body>

</html>