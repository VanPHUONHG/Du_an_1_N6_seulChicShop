<!-- Include header layout file -->
<?php include './views/layout/header.php'; ?>

<!-- Include navigation bar layout file -->
<?php include './views/layout/navbar.php'; ?>

<!-- Include sidebar layout file -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Main content wrapper -->
<div class="content-wrapper">
    <!-- Content header section -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Banner</h1>
                </div>

            </div>
        </div>
    </section>

    <!-- Main content section -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-6 ">
                                <!-- Add banner button -->
                                <a href="<?= BASE_URL_ADMIN ?>?act=form-them-banner" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Thêm Banner
                                </a>
                            </div>
                            <!-- Banner listing table -->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through banner items -->
                                    <?php foreach ($BannerProduct as $key => $banner): ?>
                                        <tr>
                                            <!-- Banner index -->
                                            <td><?= $key + 1 ?></td>
                                            <!-- Banner title -->
                                            <td><?= $banner['tieu_de'] ?></td>
                                            <!-- Banner image -->
                                            <td>
                                                <img src="<?= BASE_URL . $banner['hinh_anh_url'] ?>" style="width:200px"
                                                    alt=""
                                                    onerror="this.src='https://cdn.khamphadanang.vn/wp-content/uploads/2022/12/cua-hang-ban-do-luu-niem-da-nang-15.jpg%22'">
                                            </td>

                                            <!-- Banner status -->
                                            <td><?= $banner['trang_thai'] == 1 ? 'Hiện' : 'Ẩn' ?></td>
                                            <!-- Banner created date -->
                                            <td><?= $banner['ngay_tao'] ?></td>
                                            <!-- Action buttons -->
                                            <td>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=chi-tiet-banner&id=' . $banner['id'] ?>">
                                                    <button class="btn btn-warning"><i class="far fa-eye"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-banner&id=<?= $banner['id'] ?>">
                                                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=xoa-banner&id=<?= $banner['id'] ?>"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<!-- DataTables initialization script -->
<script>
    $(function () {
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