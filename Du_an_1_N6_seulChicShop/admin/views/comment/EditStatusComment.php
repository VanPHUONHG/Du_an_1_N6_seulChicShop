<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/comment.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="comment-header">
                <h1><i class="fas fa-edit mr-2"></i>Chi tiết bình luận</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>">Quản lý bình luận</a></li>
                        <li class="breadcrumb-item active">Chi tiết bình luận</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle mr-2"></i>Thông tin bình luận
                    </h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL_ADMIN . '?act=cap-nhat-binh-luan' ?>" method="post">
                        <input type="hidden" name="id" value="<?= $comment['id'] ?>">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-user mr-2"></i>Người bình luận:</label>
                                    <p class="form-control-static font-weight-bold"><?= $comment['ten_tai_khoan'] ?></p>
                                </div>
                                
                                <div class="form-group">
                                    <label><i class="fas fa-image mr-2"></i>Ảnh đại diện:</label>
                                    <div class="mt-2">
                                        <img src="<?= BASE_URL . $comment['anh_dai_dien'] ?>" 
                                             alt="Avatar" 
                                             class="img-fluid rounded" 
                                             style="max-width: 150px">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-comment mr-2"></i>Nội dung bình luận:</label>
                                    <div class="comment-content">
                                        <?= $comment['noi_dung'] ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label><i class="fas fa-star mr-2"></i>Đánh giá:</label>
                                    <div class="rating-display">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="fas fa-star <?= $i <= $comment['danh_gia'] ? 'text-warning' : 'text-secondary' ?>"></i>
                                        <?php endfor; ?>
                                        <span class="ml-2">(<?= $comment['danh_gia'] ?> sao)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-toggle-on mr-2"></i>Thay đổi trạng thái:</label>
                            <select class="form-control" name="trang_thai">
                                <option value="0" <?= $comment['trang_thai'] == 0 ? 'selected' : '' ?>>Chờ duyệt</option>
                                <option value="1" <?= $comment['trang_thai'] == 1 ? 'selected' : '' ?>>Đã duyệt</option>
                            </select>
                        </div>
                        
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Cập nhật trạng thái
                            </button>
                            <a href="<?= BASE_URL_ADMIN . '?act=binh-luan' ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Quay lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
</body>
</html>
