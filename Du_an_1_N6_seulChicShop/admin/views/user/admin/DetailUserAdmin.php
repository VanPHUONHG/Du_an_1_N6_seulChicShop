<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<style>
.admin-dashboard {
    padding: 2rem;
    background: #f8f9fc;
    min-height: calc(100vh - 60px);
}

.admin-header {
    margin-bottom: 2rem;
}

.admin-header h1 {
    font-size: 1.8rem;
    color: #2c3e50;
    font-weight: 700;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-admin {
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.btn-secondary-admin {
    background: linear-gradient(45deg, #3498db, #2980b9);
    color: white;
    border: none;
}

.btn-secondary-admin:hover {
    background: linear-gradient(45deg, #2980b9, #3498db);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.admin-card {
    background: white;
    border: none;
    border-radius: 15px;
    overflow: hidden;
    animation: slideUp 0.6s ease;
    box-shadow: 0 10px 20px rgba(0,0,0,0.08);
}

.card-header {
    background: linear-gradient(120deg, #3498db, #2980b9);
    border-bottom: none;
    padding: 1.5rem;
}

.card-header h3 {
    font-size: 1.4rem;
    letter-spacing: 1px;
}

.admin-profile {
    position: relative;
    padding: 2rem;
}

.admin-profile-avatar {
    width: 180px;
    height: 180px;
    object-fit: cover;
    transition: all 0.4s ease;
    border: 4px solid #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

.admin-profile-avatar:hover {
    transform: scale(1.05) rotate(5deg);
}

.status-badge {
    display: inline-block;
    font-weight: 600;
    font-size: 0.9rem;
    padding: 0.5rem 1.2rem;
    margin-top: 1rem;
    box-shadow: 0 3px 8px rgba(0,0,0,0.12);
}

.status-active {
    background: linear-gradient(45deg, #2ecc71, #27ae60);
    color: white;
}

.status-inactive {
    background: linear-gradient(45deg, #e74c3c, #c0392b);
    color: white;
}

.profile-info {
    margin-top: 2rem;
    border-radius: 12px;
    background: #f8f9fa;
    border: none;
}

.info-item {
    transition: all 0.3s ease;
    padding: 1.2rem;
    margin: 0.5rem 0;
    border-radius: 8px;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.info-item:hover {
    transform: translateX(8px);
    background: #f8f9fa;
}

.icon-wrapper {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(52,152,219,0.2);
    background: linear-gradient(135deg, #3498db, #2980b9);
}

.icon-wrapper i {
    font-size: 1.2rem;
}

small.text-muted {
    font-size: 0.85rem;
    letter-spacing: 0.8px;
    color: #7f8c8d;
    font-weight: 500;
}

strong {
    font-size: 1.1rem;
    color: #2c3e50;
    font-weight: 600;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<div class="content-wrapper">
    <div class="admin-dashboard">
        <div class="admin-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>
                    <i class="fas fa-user-shield me-3"></i>
                    Thông tin chi tiết Admin
                </h1>
                <a href="<?= BASE_URL_ADMIN ?>?act=tai-khoan-quan-tri" class="btn-admin btn-secondary-admin">
                    <i class="fas fa-arrow-left me-2"></i>
                    Quay lại danh sách
                </a>
            </div>
        </div>

        <div class="admin-card">
            <div class="card-header">
                <h3 class="card-title mb-0 text-white">
                    <i class="fas fa-id-card-alt me-2"></i>
                    Hồ sơ chi tiết
                </h3>
            </div>
            <div class="admin-profile">
                <div class="text-center mb-4">
                    <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>" 
                         class="admin-profile-avatar rounded-circle"
                         alt="<?= htmlspecialchars($user['ten_tai_khoan']) ?>"
                         onerror="this.src='<?= BASE_URL ?>assets/images/product-01.jpg'">
                    
                    <h2 class="mt-4 mb-2 text-primary fw-bold"><?= htmlspecialchars($user['ten_tai_khoan']) ?></h2>
                    
                    <span class="status-badge <?= $user['trang_thai'] == 1 ? 'status-active' : 'status-inactive' ?> rounded-pill">
                        <i class="fas <?= $user['trang_thai'] == 1 ? 'fa-check-circle' : 'fa-times-circle' ?> me-2"></i>
                        <?= $user['trang_thai'] == 1 ? 'Đang hoạt động' : 'Ngừng hoạt động' ?>
                    </span>
                </div>

                <div class="profile-info p-4">
                    <div class="info-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper rounded-circle me-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <small class="text-muted text-uppercase">Email</small>
                                <strong class="d-block mt-1"><?= htmlspecialchars($user['email']) ?></strong>
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper rounded-circle me-4">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <small class="text-muted text-uppercase">Số điện thoại</small>
                                <strong class="d-block mt-1"><?= htmlspecialchars($user['so_dien_thoai']) ?></strong>
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper rounded-circle me-4">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <small class="text-muted text-uppercase">Ngày tạo tài khoản</small>
                                <strong class="d-block mt-1"><?= date('d/m/Y', strtotime($user['ngay_tao'])) ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './views/layout/footer.php'; ?>
</body>
</html>