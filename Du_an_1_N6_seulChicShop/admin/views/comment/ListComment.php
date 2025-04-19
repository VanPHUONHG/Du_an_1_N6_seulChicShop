<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/comment.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="comment-header">
                <h1><i class="fas fa-comments mr-2"></i>Quản lý bình luận</h1>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list mr-2"></i>Danh sách bình luận
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="15%">Người bình luận</th>
                                    <th width="10%">Ảnh</th>
                                    <th width="20%">Sản phẩm</th>
                                    <th width="25%">Nội dung</th>
                                    <th width="10%">Đánh giá</th>
                                    <th width="10%">Trạng thái</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listComment as $key => $comment): ?>
                                <tr>
                                    <td data-label="STT"><?= $key + 1 ?></td>
                                    <td data-label="Người bình luận"><?= $comment['ten_tai_khoan'] ?></td>
                                    <td data-label="Ảnh">
                                        <img src="<?= BASE_URL . $comment['anh_dai_dien'] ?>" 
                                             alt="Avatar" 
                                             class="comment-avatar">
                                    </td>
                                    <td data-label="Sản phẩm"><?= $comment['ten_san_pham'] ?></td>
                                    <td data-label="Nội dung">
                                        <div class="comment-content">
                                            <?= $comment['noi_dung'] ?>
                                        </div>
                                    </td>
                                    <td data-label="Đánh giá">
                                        <div class="rating-display">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <i class="fas fa-star <?= $i <= $comment['danh_gia'] ? 'text-warning' : 'text-secondary' ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </td>
                                    <td data-label="Trạng thái">
                                        <span class="badge <?= $comment['trang_thai'] == 1 ? 'badge-success' : 'badge-warning' ?>">
                                            <?= $comment['trang_thai'] == 1 ? 'Đã duyệt' : 'Chờ duyệt' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN.'?act=form-sua-binh-luan&id='. $comment['id'] ?>" 
                                               class="btn btn-sm btn-primary mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id=' . $comment['id'] ?>" 
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
