<?php include './views/layout/header.php'; ?>
<style>
    .main-content {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .page-content {
        margin: 0 auto;
        margin-top: -20px;
        max-width: 1200px;
    }

    .container-fluid {
        padding: 0 15px;
    }

    .col {
        padding: 0 15px;
    }
    
    .product-img-container {
        width: 80px;
        height: 80px;
        overflow: hidden;
        position: relative;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .product-img:hover {
        transform: scale(1.1);
    }
    
    .variant-badge {
        position: absolute;
        bottom: 4px;
        right: 4px;
        font-size: 10px;
        padding: 3px 6px;
        border-radius: 4px;
        background-color: rgba(85, 110, 230, 0.2);
        color: #556ee6;
        font-weight: 500;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-animate {
        background: linear-gradient(to right, #ffffff, #f8f9fa);
    }

    .card-body {
        padding: 1.5rem;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .fs-22 {
        font-size: 24px !important;
        font-weight: 600;
    }

    .table {
        border-radius: 8px;
        overflow: hidden;
    }

    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        padding: 12px;
    }

    .table tbody td {
        padding: 15px 12px;
        vertical-align: middle;
    }

    .btn-soft-info {
        background-color: rgba(85, 110, 230, 0.1);
        color: #556ee6;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-soft-info:hover {
        background-color: #556ee6;
        color: #ffffff;
    }

    .content-header {
        margin-bottom: 20px;
    }

    .card-title-full {
        white-space: normal;
        overflow: visible;
        text-overflow: unset;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0;
    }

    .stat-card {
        min-height: 160px;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 1rem 0;
    }

    .stat-label {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .growth-badge {
        padding: 0.35rem 0.5rem;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .search-box {
        position: relative;
        min-width: 250px;
    }

    .search-box input {
        padding: 8px 15px;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
    }

    .form-select {
        min-width: 180px;
        padding: 8px 15px;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        cursor: pointer;
        background-color: #fff;
    }

    .stat-card {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .income-card {
        background: linear-gradient(135deg, #0396FF 0%, #ABDCFF 100%);
        color: white;
    }

    .customer-card {
        background: linear-gradient(135deg, #32CD32 0%, #90EE90 100%);
        color: white;
    }

    .order-card {
        background: linear-gradient(135deg, #FF6B6B 0%, #FFB4B4 100%);
        color: white;
    }

    .profit-card {
        background: linear-gradient(135deg, #7367F0 0%, #A9A7F5 100%);
        color: white;
    }

    .stat-card .text-muted,
    .stat-card .card-title-full,
    .stat-card .stat-label {
        color: white !important;
    }

    .stat-card .growth-badge {
        background: rgba(255, 255, 255, 0.2) !important;
        color: white !important;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .table-responsive {
        border-radius: 8px;
        background: white;
        padding: 1rem;
    }

    .table thead th {
        background: #f8f9fa;
        padding: 12px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        color: #495057;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .filter-container {
        display: flex;
        gap: 10px;
        margin-bottom: 1rem;
    }

    .filter-container .form-control,
    .filter-container .form-select {
        box-shadow: none;
        transition: all 0.3s;
    }

    .filter-container .form-control:focus,
    .filter-container .form-select:focus {
        border-color: #7367F0;
        box-shadow: 0 0 0 0.2rem rgba(115, 103, 240, 0.25);
    }

    .status-badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }

    .no-results {
        text-align: center;
        padding: 2rem;
        color: #6c757d;
        font-style: italic;
        background: #f8f9fa;
        border-radius: 8px;
        margin: 1rem 0;
    }
</style>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="h-100">
                            <div class="row mb-4 pb-1">
                                <div class="col-12">
                                    <h1 class="fs-24 fw-bold text-center text-primary">Thống Kê Tổng Quan</h1>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <!-- Thống kê tổng thu nhập -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-animate stat-card income-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-money-dollar-circle-line me-2"></i>TỔNG THU NHẬP
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <?php 
                                                    $growthClass = isset($totalIncome['tang_truong']) && $totalIncome['tang_truong'] >= 0 
                                                        ? 'bg-success-subtle text-success' 
                                                        : 'bg-danger-subtle text-danger';
                                                    $growthIcon = isset($totalIncome['tang_truong']) && $totalIncome['tang_truong'] >= 0 
                                                        ? 'up' 
                                                        : 'down';
                                                    $growthValue = isset($totalIncome['tang_truong']) 
                                                        ? abs(floatval($totalIncome['tang_truong'])) 
                                                        : 0;
                                                    ?>
                                                    <div class="growth-badge <?= $growthClass ?>">
                                                        <i class="ri-arrow-<?= $growthIcon ?>-line align-middle"></i>
                                                        <?= number_format($growthValue, 1) ?>%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="stat-value">
                                                    <?= number_format($totalIncome['tong_thu_nhap'], 0, ',', '.') ?> VNĐ
                                                </h3>
                                                <p class="stat-label mb-0">Thu nhập tháng này</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thống kê tổng khách hàng -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-animate stat-card customer-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-user-line me-2"></i>TỔNG KHÁCH HÀNG ĐÃ MUA
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <?php 
                                                    $growthClass = isset($totalCustomers['tang_truong']) && $totalCustomers['tang_truong'] >= 0 
                                                        ? 'bg-success-subtle text-success' 
                                                        : 'bg-danger-subtle text-danger';
                                                    $growthIcon = isset($totalCustomers['tang_truong']) && $totalCustomers['tang_truong'] >= 0 
                                                        ? 'up' 
                                                        : 'down';
                                                    $growthValue = isset($totalCustomers['tang_truong']) 
                                                        ? abs(floatval($totalCustomers['tang_truong'])) 
                                                        : 0;
                                                    ?>
                                                    <div class="growth-badge <?= $growthClass ?>">
                                                        <i class="ri-arrow-<?= $growthIcon ?>-line align-middle"></i>
                                                        <?= number_format($growthValue, 1) ?>%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="stat-value">
                                                    <?= number_format($totalCustomers['tong_khach_hang']) ?>
                                                </h3>
                                                <p class="stat-label mb-0">Khách hàng đã mua hàng</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thống kê tổng đơn hàng -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-animate stat-card order-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-shopping-cart-line me-2"></i>TỔNG ĐƠN HÀNG
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <?php 
                                                    $growthClass = isset($totalOrders['tang_truong']) && $totalOrders['tang_truong'] >= 0 
                                                        ? 'bg-success-subtle text-success' 
                                                        : 'bg-danger-subtle text-danger';
                                                    $growthIcon = isset($totalOrders['tang_truong']) && $totalOrders['tang_truong'] >= 0 
                                                        ? 'up' 
                                                        : 'down';
                                                    $growthValue = isset($totalOrders['tang_truong']) 
                                                        ? abs(floatval($totalOrders['tang_truong'])) 
                                                        : 0;
                                                    ?>
                                                    <div class="growth-badge <?= $growthClass ?>">
                                                        <i class="ri-arrow-<?= $growthIcon ?>-line align-middle"></i>
                                                        <?= number_format($growthValue, 1) ?>%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="stat-value">
                                                    <?= number_format($totalOrders['tong_don_hang']) ?>
                                                </h3>
                                                <p class="stat-label mb-0">Đơn hàng tháng này</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thống kê lợi nhuận -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-animate stat-card profit-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-line-chart-line me-2"></i>LỢI NHUẬN
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <?php 
                                                    $growthClass = isset($profit['tang_truong']) && $profit['tang_truong'] >= 0 
                                                        ? 'bg-success-subtle text-success' 
                                                        : 'bg-danger-subtle text-danger';
                                                    $growthIcon = isset($profit['tang_truong']) && $profit['tang_truong'] >= 0 
                                                        ? 'up' 
                                                        : 'down';
                                                    $growthValue = isset($profit['tang_truong']) 
                                                        ? abs(floatval($profit['tang_truong'])) 
                                                        : 0;
                                                    ?>
                                                    <div class="growth-badge <?= $growthClass ?>">
                                                        <i class="ri-arrow-<?= $growthIcon ?>-line align-middle"></i>
                                                        <?= number_format($growthValue, 1) ?>%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <h3 class="stat-value">
                                                    <?= number_format($profit['loi_nhuan'], 0, ',', '.') ?> VNĐ
                                                </h3>
                                                <p class="stat-label mb-0">
                                                    Lợi nhuận tháng này
                                                    <span class="text-muted ms-1" title="Vốn: <?= number_format($profit['von'], 0, ',', '.') ?> VNĐ">
                                                        (Doanh thu: <?= number_format($profit['doanh_thu'], 0, ',', '.') ?> VNĐ)
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">
                                    <i class="ri-fire-line text-danger me-2"></i>Danh sách sản phẩm đã bán
                                </h4>
                                <div class="flex-shrink-0 d-flex gap-2">
                                    <div class="search-box">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                                    </div>
                                    <select class="form-select" id="filterVariant">
                                        <option value="">Tất cả biến thể</option>
                                        <option value="has_variant">Có biến thể</option>
                                        <option value="no_variant">Không biến thể</option>
                                    </select>
                                    <select class="form-select" id="sortOrder">
                                        <option value="">Sắp xếp theo</option>
                                        <option value="quantity_desc">Số lượng bán (Cao → Thấp)</option>
                                        <option value="quantity_asc">Số lượng bán (Thấp → Cao)</option>
                                        <option value="revenue_desc">Doanh thu (Cao → Thấp)</option>
                                        <option value="revenue_asc">Doanh thu (Thấp → Cao)</option>
                                        <option value="date_desc">Ngày bán (Mới → Cũ)</option>
                                        <option value="date_asc">Ngày bán (Cũ → Mới)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-hover table-bordered align-middle table-nowrap mb-0" id="productTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Đơn đặt</th>
                                                <th scope="col">Biến thể</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Doanh thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listDetailOrder as $index => $sanPham): ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-img-container">
                                                                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" 
                                                                     alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>"
                                                                     class="product-img" />
                                                                <?php if (isset($sanPham['mau_sac']) && !empty($sanPham['mau_sac'])): ?>
                                                                    <span class="variant-badge" 
                                                                          data-bs-toggle="tooltip" 
                                                                          data-bs-placement="top" 
                                                                          title="<?= htmlspecialchars($sanPham['mau_sac'] . ' - ' . $sanPham['kich_thuoc']) ?>">
                                                                        BT
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5 class="fs-14 my-1">
                                                                    <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['san_pham_id'] ?>"
                                                                       class="text-reset">
                                                                        <?= htmlspecialchars($sanPham['ten_san_pham']) ?>
                                                                    </a>
                                                                </h5>
                                                                <span class="text-muted"><?= formatDate($sanPham['ngay_dat']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $gia = $sanPham['gia'] 
                                                            ? ($sanPham['gia_khuyen_mai'] ?: $sanPham['gia'])
                                                            : ($sanPham['gia_san_pham_khuyen_mai'] ?: $sanPham['gia_san_pham']);
                                                        ?>
                                                        <h5 class="fs-14 my-1 fw-normal">
                                                            <?= number_format($gia, 0, ',', '.') ?> VNĐ
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal"><?= $sanPham['so_don_dat'] ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal">
                                                            <?= $sanPham['mau_sac'] && $sanPham['kich_thuoc'] 
                                                                ? htmlspecialchars($sanPham['mau_sac'] . ' - ' . $sanPham['kich_thuoc'])
                                                                : 'Không có' ?>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal"><?= $sanPham['tong_so_luong'] ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal text-success">
                                                            <?= number_format($sanPham['tong_doanh_thu'], 0, ',', '.') ?> VNĐ
                                                        </h5>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Phân trang -->
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div class="text-muted">
                                        Hiển thị <span class="fw-semibold"><?= count($listDetailOrder) ?></span> sản phẩm
                                    </div>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-end mb-0">
                                            <!-- Thêm phân trang nếu cần -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Thống kê doanh thu theo tháng</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="revenueChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Tỷ lệ đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="orderPieChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Lợi nhuận theo tuần</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Thời gian</th>
                                                <th>Doanh thu</th>
                                                <th>Vốn</th>
                                                <th>Lợi nhuận</th>
                                                <th>Số đơn hàng</th>
                                                <th>Tăng trưởng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($weeklyProfits as $week): ?>
                                                <tr>
                                                    <td><?= $week['ngay_bat_dau'] ?> - <?= $week['ngay_ket_thuc'] ?></td>
                                                    <td><?= number_format($week['doanh_thu'], 0, ',', '.') ?> VNĐ</td>
                                                    <td><?= number_format($week['von'], 0, ',', '.') ?> VNĐ</td>
                                                    <td><?= number_format($week['loi_nhuan'], 0, ',', '.') ?> VNĐ</td>
                                                    <td><?= $week['so_don_hang'] ?></td>
                                                    <td>
                                                        <?php if ($week['tang_truong'] > 0): ?>
                                                            <span class="text-success">
                                                                <i class="ri-arrow-up-line"></i> <?= $week['tang_truong'] ?>%
                                                            </span>
                                                        <?php elseif ($week['tang_truong'] < 0): ?>
                                                            <span class="text-danger">
                                                                <i class="ri-arrow-down-line"></i> <?= abs($week['tang_truong']) ?>%
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="text-muted">0%</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<!-- Thêm script Chart.js và khởi tạo biểu đồ -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Biểu đồ doanh thu
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: <?= json_encode($monthlyRevenue) ?>,
                borderColor: '#556ee6',
                backgroundColor: 'rgba(85, 110, 230, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Doanh thu: ' + new Intl.NumberFormat('vi-VN', { 
                                style: 'currency', 
                                currency: 'VND' 
                            }).format(context.raw);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', { 
                                style: 'currency', 
                                currency: 'VND' 
                            }).format(value);
                        }
                    }
                }
            }
        }
    });

    // Biểu đồ tròn đơn hàng
    const orderCtx = document.getElementById('orderPieChart').getContext('2d');
    new Chart(orderCtx, {
        type: 'doughnut',
        data: {
            labels: ['Hoàn thành', 'Đang xử lý', 'Đã hủy'],
            datasets: [{
                data: [
                    <?= $orderStats['hoan_thanh'] ?>, 
                    <?= $orderStats['dang_xu_ly'] ?>, 
                    <?= $orderStats['da_huy'] ?>
                ],
                backgroundColor: ['#34c38f', '#556ee6', '#f46a6a']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${value} đơn (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    const table = document.getElementById('productTable');
    const tbody = table.querySelector('tbody');
    const searchInput = document.getElementById('searchInput');
    const filterVariant = document.getElementById('filterVariant');
    const sortOrder = document.getElementById('sortOrder');
    
    // Lưu trữ dữ liệu gốc
    const originalRows = Array.from(tbody.querySelectorAll('tr'));
    
    // Hàm lọc và sắp xếp
    function filterAndSortTable() {
        let filteredRows = [...originalRows];
        
        // Lọc theo tìm kiếm
        const searchTerm = searchInput.value.toLowerCase().trim();
        if (searchTerm) {
            filteredRows = filteredRows.filter(row => {
                const productName = row.querySelector('.fs-14 a').textContent.toLowerCase();
                return productName.includes(searchTerm);
            });
        }
        
        // Lọc theo biến thể
        const variantFilter = filterVariant.value;
        if (variantFilter) {
            filteredRows = filteredRows.filter(row => {
                const variantText = row.querySelector('td:nth-child(5)').textContent.trim();
                if (variantFilter === 'has_variant') {
                    return variantText !== 'Không có';
                } else {
                    return variantText === 'Không có';
                }
            });
        }
        
        // Sắp xếp
        const [sortBy, direction] = (sortOrder.value || '').split('_');
        if (sortBy) {
            filteredRows.sort((a, b) => {
                let aValue, bValue;
                
                switch(sortBy) {
                    case 'quantity':
                        aValue = parseInt(a.querySelector('td:nth-child(6)').textContent);
                        bValue = parseInt(b.querySelector('td:nth-child(6)').textContent);
                        break;
                    case 'revenue':
                        aValue = parseInt(a.querySelector('td:nth-child(7)').textContent.replace(/[^\d]/g, ''));
                        bValue = parseInt(b.querySelector('td:nth-child(7)').textContent.replace(/[^\d]/g, ''));
                        break;
                    case 'date':
                        aValue = new Date(a.querySelector('.text-muted').textContent);
                        bValue = new Date(b.querySelector('.text-muted').textContent);
                        break;
                }
                
                return direction === 'asc' ? aValue - bValue : bValue - aValue;
            });
        }
        
        // Xóa nội dung bảng hiện tại
        tbody.innerHTML = '';
        
        // Hiển thị kết quả
        if (filteredRows.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="no-results">
                        <div class="text-center">
                            <i class="ri-search-line fs-24 mb-2"></i>
                            <p class="mb-0">Không tìm thấy sản phẩm phù hợp</p>
                        </div>
                    </td>
                </tr>
            `;
        } else {
            filteredRows.forEach((row, index) => {
                row.querySelector('td:first-child').textContent = index + 1;
                tbody.appendChild(row);
            });
        }
        
        // Cập nhật số lượng hiển thị
        updateDisplayCount(filteredRows.length);
    }
    
    // Cập nhật số lượng hiển thị
    function updateDisplayCount(count) {
        const countElement = document.querySelector('.text-muted .fw-semibold');
        if (countElement) {
            countElement.textContent = count;
        }
    }
    
    // Thêm event listeners
    searchInput.addEventListener('input', debounce(filterAndSortTable, 300));
    filterVariant.addEventListener('change', filterAndSortTable);
    sortOrder.addEventListener('change', filterAndSortTable);
    
    // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
});
</script>

</body>

</html>