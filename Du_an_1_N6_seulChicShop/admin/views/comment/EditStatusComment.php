<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết bình luận</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>">Quản lý bình luận</a></li>
                        <li class="breadcrumb-item active">Chi tiết bình luận</li>
                    </ol>
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
                            <h3 class="card-title">Thông tin bình luận</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= BASE_URL_ADMIN . '?act=cap-nhat-binh-luan' ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                                <div class="form-group">
                                    <label>Người bình luận:</label>
                                    <p class="form-control-static"><?= $comment['ten_tai_khoan'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện:</label>
                                    <img src="<?= BASE_URL . $comment['anh_dai_dien'] ?>" alt="Ảnh đại diện" class="img-fluid" style="max-width: 150px; height: auto;">
                                </div>

                                <div class="form-group">
                                    <label>Nội dung bình luận:</label>
                                    <div class="p-3 bg-light rounded"><?= $comment['noi_dung'] ?></div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Đánh giá:</label>
                                    <div class="rating-display">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="fas fa-star <?= $i <= $comment['danh_gia'] ? 'text-warning' : 'text-secondary' ?>"></i>
                                        <?php endfor; ?>
                                        <span class="ml-2">(<?= $comment['danh_gia'] ?> sao)</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái hiện tại:</label>
                                    <div class="status-badge">
                                        <?php if ($comment['trang_thai'] == 1): ?>
                                            <span class="badge badge-success">Đã duyệt</span>
                                        <?php else: ?>
                                            <span class="badge badge-warning">Chờ duyệt</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Thay đổi trạng thái:</label>
                                    <select class="form-control" name="trang_thai">
                                        <option value="0" <?= $comment['trang_thai'] == 0 ? 'selected' : '' ?>>Chờ duyệt</option>
                                        <option value="1" <?= $comment['trang_thai'] == 1 ? 'selected' : '' ?>>Đã duyệt</option>
                                    </select>
                                </div>
                                
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
                                    <a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
</body>
</html>
