<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý bình luận</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách bình luận</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Người bình luận</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Số sao</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listComment as $key => $comment): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $comment['ten_tai_khoan'] ?></td>
                                            <td><img src="<?= BASE_URL . $comment['anh_dai_dien'] ?>" alt="Ảnh đại diện" class="img-fluid" style="max-width: 150px; height: auto;"></td>
                                            <td><?= $comment['ten_san_pham'] ?></td>
                                            <td><?= $comment['noi_dung'] ?></td>
                                            <td>
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <i class="fas fa-star <?= $i <= $comment['danh_gia'] ? 'text-warning' : 'text-secondary' ?>"></i>
                                                <?php endfor; ?>
                                            </td>
                                            <td>
                                                <?php if ($comment['trang_thai'] == 1): ?>
                                                    <span class="badge badge-success">Đã duyệt</span>
                                                <?php else: ?>
                                                    <span class="badge badge-warning">Chờ duyệt</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN.'?act=form-sua-binh-luan&id='. $comment['id'] ?>" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id=' . $comment['id'] ?>" 
                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
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

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
