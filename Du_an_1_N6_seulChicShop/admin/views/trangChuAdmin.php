<?php include './views/layout/header.php'; ?>
<style>
    .main-content {
        padding: 15px;
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
        width: 70px;
        height: 70px;
        overflow: hidden;
        position: relative;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
        bottom: 2px;
        right: 2px;
        font-size: 9px;
        padding: 2px 4px;
        border-radius: 3px;
        background-color: rgba(85, 110, 230, 0.15);
        color: #556ee6;
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
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <h1 class="fs-16 mb-1 text-center">Trang thống kê</h1>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <!-- Thống kê tổng thu nhập -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Tổng thu nhập</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h5 class="text-success fs-14 mb-0">
                                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>+50.24
                                                        %
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>
                                                            <?= number_format($totalOrder, 0, '.', '.') ?>
                                                        </span>VNĐ </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thống kê tổng khách hàng -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Tổng Khách hàng</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h5 class="text-success fs-14 mb-0">
                                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +20.24
                                                        %
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <?php
                                                    $TotalUser = 0;
                                                    foreach ($listUser as $user):
                                                        if (($user['trang_thai'] == 2) && ($user['chuc_vu_id'] == 2)) {
                                                            $TotalUser++;
                                                        }
                                                    endforeach;
                                                    ?>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>
                                                            <?= $TotalUser ?>
                                                        </span>Khách hàng </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thống kê tổng đơn hàng -->
                                <div class="col-xl-3 col-md-6">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                        Tổng Đơn Hàng</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h5 class="text-success fs-14 mb-0">
                                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +50.24
                                                        %
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <?php
                                                    $totalOder = count($listAllOrder);
                                                    ?>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>
                                                            <?= $totalOder ?>
                                                        </span>Đơn Hàng </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Sản phẩm bán chạy nhất</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-soft-info btn-sm">
                                        <i class="ri-file-list-3-line align-middle"></i> Xem tất cả
                                    </button>
                                </div>
                            </div><!-- end card header -->

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
                                                            <div>
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

                                <div
                                    class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
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

</body>

</html>