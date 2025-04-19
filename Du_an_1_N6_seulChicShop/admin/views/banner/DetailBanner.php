<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<style>
.banner-detail {
    padding: 30px;
    background-color: #f8f9fa;
    min-height: calc(100vh - 120px);
}

.banner-header {
    background: linear-gradient(120deg, #2b4c7e 0%, #1a365d 100%);
    color: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.banner-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border: none;
    overflow: hidden;
}

.banner-image {
    max-width: 300px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.btn-back {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background: linear-gradient(135deg, #5a6268 0%, #383d41 100%);
    color: white;
    transform: translateY(-2px);
}

.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
}

.status-active {
    background-color: #e8f5e9;
    color: #2e7d32;
}

.status-inactive {
    background-color: #fce4ec;
    color: #c2185b;
}
</style>

<div class="content-wrapper banner-detail">
    <section class="content-header">
        <div class="container-fluid">
            <div class="banner-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-0">Chi Tiết Banner</h1>
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-banner' ?>" class="btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Quay Lại
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="banner-card">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Tiêu Đề:</label>
                                <p class="h5"><?= htmlspecialchars($banner['tieu_de']) ?></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Trạng Thái:</label>
                                <div class="status-badge <?= $banner['trang_thai'] == 1 ? 'status-active' : 'status-inactive' ?>">
                                    <?= $banner['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Ngày Tạo:</label>
                                <p><?= date('d/m/Y H:i', strtotime($banner['ngay_tao'])) ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <label class="font-weight-bold">Hình Ảnh Banner:</label>
                            <div class="mt-3">
                                <img src="<?= BASE_URL . $banner['hinh_anh_url'] ?>" 
                                     class="banner-image img-fluid"
                                     alt="<?= htmlspecialchars($banner['tieu_de']) ?>"
                                     onerror="this.src='https://cdn.khamphadanang.vn/wp-content/uploads/2022/12/cua-hang-ban-do-luu-niem-da-nang-15.jpg'">
                            </div>
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