<!-- Include header layout file -->
<?php include './views/layout/header.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/posts.css">

<!-- Include navigation bar layout file -->
<?php include './views/layout/navbar.php'; ?>

<!-- Include sidebar layout file -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Main content wrapper -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="posts-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1><i class="fas fa-newspaper me-2"></i>Quản lý Bài viết</h1>
                    <a href="<?= BASE_URL_ADMIN ?>?act=form-them-Posts" class="btn btn-light">
                        <i class="fas fa-plus"></i> Thêm bài viết
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="posts-table">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="15%">Hình ảnh</th>
                                    <th width="20%">Tiêu đề</th>
                                    <th width="25%">Bài viết</th>
                                    <th width="10%">Tác giả</th>
                                    <th width="10%">Ngày tạo</th>
                                    <th width="8%">Trạng thái</th>
                                    <th width="7%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($PostsProduct as $key => $Posts): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <img src="<?= BASE_URL . $Posts['hinh_anh'] ?>" 
                                             alt="<?= $Posts['tieu_de'] ?>"
                                             class="posts-image">
                                    </td>
                                    <td class="font-weight-bold"><?= $Posts['tieu_de'] ?></td>
                                    <td><?= substr($Posts['bai_viet'], 0, 100) ?>...</td>
                                    <td><?= $Posts['tac_gia'] ?></td>
                                    <td><?= date('d/m/Y', strtotime($Posts['ngay_tao_bai_viet'])) ?></td>
                                    <td>
                                        <span class="status-badge <?= $Posts['trang_thai'] == 1 ? 'status-active' : 'status-inactive' ?>">
                                            <?= $Posts['trang_thai'] == 1 ? 'Hiện' : 'Ẩn' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-Posts&id=' . $Posts['id'] ?>" 
                                               class="btn btn-sm btn-info">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-Posts&id=<?= $Posts['id'] ?>" 
                                               class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=xoa-Posts&id=<?= $Posts['id'] ?>" 
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')" 
                                               class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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