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
                    <h1>Danh Sách Posts</h1>
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
                                <!-- Add Posts button -->
                                <a href="<?= BASE_URL_ADMIN ?>?act=form-them-Posts" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Thêm Posts
                                </a>
                            </div>
                            <!-- Posts listing table -->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tiêu Đề</th>
                                        <th>Bài viết</th>
                                        <th>Tác giả</th>
                                        <th>Ngày Tạo</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through Posts items -->
                                    <?php foreach ($PostsProduct as $key => $Posts): ?>
                                        <tr>
                                            <!-- Posts index -->
                                            <td><?= $key + 1 ?></td>
                                            
                                            
                                            <!-- Posts image -->
                                            <td>
                                                <img src="<?= BASE_URL . $Posts['hinh_anh'] ?>" style="width:200px"
                                                    alt="<?= $Posts['tieu_de'] ?>"
                                                    onerror="this.src='<?= BASE_URL ?>/uploads/default.jpg'"
                                                    class="img-thumbnail">
                                            </td>
                                            <!-- Posts title -->
                                            <td><?= $Posts['tieu_de'] ?></td>
                                            <!-- Posts title -->
                                            <td><?= $Posts['bai_viet'] ?></td>
                                            <!-- Posts title -->
                                            <td><?= $Posts['tac_gia'] ?></td>
                                            <!-- Posts created date -->
                                            <td><?= $Posts['ngay_tao_bai_viet'] ?></td>
                                            <!-- Posts status -->
                                            <td><?= $Posts['trang_thai'] == 1 ? 'Hiện' : 'Ẩn' ?></td>
                                            
                                            <!-- Action buttons -->
                                            <td>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=chi-tiet-Posts&id=' . $Posts['id'] ?>">
                                                    <button class="btn btn-warning"><i class="far fa-eye"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-Posts&id=<?= $Posts['id'] ?>">
                                                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN ?>?act=xoa-Posts&id=<?= $Posts['id'] ?>"
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