<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <div class="client-dashboard">
        <div class="page-header bg-white shadow-sm rounded p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-circle me-2 text-primary"></i>
                    Chi Tiết Tài Khoản Khách Hàng
                </h1>
                <a href="<?= BASE_URL_ADMIN ?>?act=tai-khoan-khach-hang" 
                   class="btn btn-secondary btn-sm rounded-pill px-4 py-2 shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i>
                    <span>Quay lại</span>
                </a>
            </div>
        </div>

        <div class="card shadow animate__animated animate__fadeIn">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="avatar-wrapper mb-4">
                            <img src="<?= BASE_URL . $userClient['anh_dai_dien'] ?>"
                                 class="rounded-circle shadow-sm"
                                 width="200"
                                 height="200"
                                 alt="<?= htmlspecialchars($userClient['ten_tai_khoan']) ?>"
                                 onerror="this.src='<?= BASE_URL ?>public/images/avatar-default.png'">
                            <div class="status-badge">
                                <span class="badge <?= $userClient['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?> rounded-pill px-3">
                                    <?= $userClient['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?>
                                </span>
                            </div>
                        </div>
                        <h4 class="fw-bold text-primary mb-0">
                            <?= htmlspecialchars($userClient['ten_tai_khoan']) ?>
                        </h4>
                    </div>

                    <div class="col-md-8">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div class="info-card bg-light rounded p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper bg-primary bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="text-muted mb-1">Email</h6>
                                            <p class="fw-bold mb-0"><?= htmlspecialchars($userClient['email']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="info-card bg-light rounded p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper bg-success bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-phone text-success"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="text-muted mb-1">Số điện thoại</h6>
                                            <p class="fw-bold mb-0"><?= htmlspecialchars($userClient['so_dien_thoai']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="info-card bg-light rounded p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper bg-warning bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-calendar text-warning"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="text-muted mb-1">Ngày tạo</h6>
                                            <p class="fw-bold mb-0">
                                                <?= date('d/m/Y', strtotime($userClient['ngay_tao'])) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="info-card bg-light rounded p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-wrapper bg-info bg-opacity-10 rounded-circle p-3">
                                            <i class="fas fa-key text-info"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="text-muted mb-1">Mật khẩu</h6>
                                            <p class="fw-bold mb-0"><?= htmlspecialchars($userClient['mat_khau']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.client-dashboard {
    padding: 2rem;
    background: #f8f9fc;
    min-height: calc(100vh - 60px);
}

.page-header h1 {
    font-size: 1.5rem;
    font-weight: 600;
}

.avatar-wrapper {
    position: relative;
    display: inline-block;
}

.avatar-wrapper img {
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.status-badge {
    position: absolute;
    bottom: 10px;
    right: 10px;
}

.info-card {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.1);
}

.info-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.icon-wrapper {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-wrapper i {
    font-size: 1.2rem;
}

.badge {
    font-weight: 500;
    padding: 0.5rem 1rem;
}
</style>

<?php include './views/layout/footer.php'; ?>
</body>
</html>