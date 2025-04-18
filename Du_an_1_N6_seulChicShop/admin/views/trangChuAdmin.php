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
                                    <div class="card card-animate stat-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-money-dollar-circle-line me-2"></i>TỔNG THU NHẬP
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="growth-badge <?= $totalIncome['tang_truong'] >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?>">
                                                        <i class="ri-arrow-<?= $totalIncome['tang_truong'] >= 0 ? 'up' : 'down' ?>-line align-middle"></i>
                                                        <?= number_format(abs($totalIncome['tang_truong']), 2) ?>%
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
                                    <div class="card card-animate stat-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-user-line me-2"></i>TỔNG KHÁCH HÀNG ĐÃ MUA
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="growth-badge <?= $totalCustomers['tang_truong'] >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?>">
                                                        <i class="ri-arrow-<?= $totalCustomers['tang_truong'] >= 0 ? 'up' : 'down' ?>-line align-middle"></i>
                                                        <?= number_format(abs($totalCustomers['tang_truong']), 2) ?>%
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
                                    <div class="card card-animate stat-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-shopping-cart-line me-2"></i>TỔNG ĐƠN HÀNG
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="growth-badge <?= $totalOrders['tang_truong'] >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?>">
                                                        <i class="ri-arrow-<?= $totalOrders['tang_truong'] >= 0 ? 'up' : 'down' ?>-line align-middle"></i>
                                                        <?= number_format(abs($totalOrders['tang_truong']), 2) ?>%
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
                                    <div class="card card-animate stat-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-grow-1">
                                                    <p class="card-title-full">
                                                        <i class="ri-line-chart-line me-2"></i>LỢI NHUẬN
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="growth-badge <?= $profit['tang_truong'] >= 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' ?>">
                                                        <i class="ri-arrow-<?= $profit['tang_truong'] >= 0 ? 'up' : 'down' ?>-line align-middle"></i>
                                                        <?= number_format(abs($profit['tang_truong']), 2) ?>%
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
                                    <i class="ri-fire-line text-danger me-2"></i>Sản phẩm bán chạy nhất
                                </h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-soft-info btn-sm">
                                        <i class="ri-file-list-3-line align-middle"></i> Xem tất cả
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table table-hover table-bordered align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Đơn đặt</th>
                                                <th scope="col">Biến thể</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Doanh thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $maxProducts = 5;
                                            $count = 0;
                                            foreach ($listDetailOrder as $sanPham) {
                                                if ($count >= $maxProducts)
                                                    break;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="product-img-container">
                                                                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" 
                                                                    alt="<?= $sanPham['ten_san_pham'] ?>"
                                                                    class="product-img" />
                                                                <?php if (isset($sanPham['mau_sac']) && !empty($sanPham['mau_sac'])): ?>
                                                                <span class="variant-badge" 
                                                                      data-bs-toggle="tooltip" 
                                                                      data-bs-placement="top" 
                                                                      title="<?= $sanPham['mau_sac'] . ' - ' . $sanPham['kich_thuoc'] ?>">
                                                                    BT
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5 class="fs-14 my-1"><a
                                                                        href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['san_pham_id'] ?> "
                                                                        class="text-reset"><?= $sanPham['ten_san_pham'] ?></a>
                                                                </h5>
                                                                <span
                                                                    class="text-muted"><?= formatDate($sanPham['ngay_dat']) ?></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal">
                                                            <?php if ($sanPham['gia']): ?>
                                                                <?= number_format($sanPham['gia_khuyen_mai'] ? $sanPham['gia_khuyen_mai'] : $sanPham['gia'], 0, ',', '.') ?>
                                                            <?php else: ?>
                                                                <?= number_format($sanPham['gia_san_pham_khuyen_mai'] ? $sanPham['gia_san_pham_khuyen_mai'] : $sanPham['gia_san_pham'], 0, ',', '.') ?>
                                                            <?php endif; ?>
                                                            VNĐ
                                                        </h5>   
                                                        <span class="text-muted">Giá</span>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal"><?= $sanPham['so_don_dat'] ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal"><?= $sanPham['mau_sac'] . ' - ' . $sanPham['kich_thuoc'] ?>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal"><?= $sanPham['tong_so_luong'] ?>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="fs-14 my-1 fw-normal text-success">
                                                            <?= number_format($sanPham['tong_doanh_thu'], 0, ',', '.') ?> VNĐ
                                                        </h5>
                                                    </td>
                                                </tr>
                                            <?php
                                                $count++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                    <div class="col-sm">
                                        <div class="text-muted">
                                            Hiển thị <span class="fw-semibold">5</span> Kết quả bán chạy nhất trong
                                            tháng <?= date('m/Y') ?>
                                        </div>
                                    </div>
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
});
</script>

</body>

</html>