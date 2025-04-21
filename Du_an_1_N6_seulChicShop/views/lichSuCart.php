<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- Display success message if set -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        <?= $_SESSION['success'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Display error message if set -->
<?php if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-exclamation-circle mr-2"></i>
        <?= $_SESSION['error_message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<!-- Breadcrumb -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent py-2">
            <li class="breadcrumb-item">
                <a href="<?= BASE_URL ?>" class="text-decoration-none">
                    <i class="fas fa-home mr-1"></i>Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Order History</li>
        </ol>
    </nav>
</div>

<!-- Order History -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-center">
                        <i class="fas fa-history mr-2"></i>Order History
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Order Code</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($donHang as $donHangs): ?>
                                    <tr>
                                        <td class="align-middle font-weight-bold">
                                            #<?= $donHangs['ma_don_hang'] ?>
                                        </td>
                                        <td class="align-middle">
                                            <i class="far fa-calendar-alt mr-1"></i>
                                            <?= date('d/m/Y H:i', strtotime($donHangs['ngay_dat'])) ?>
                                        </td>
                                        <td class="align-middle text-success font-weight-bold">
                                            <?= formatPrice($donHangs['tong_tien']) ?> VND
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-info">
                                                <?= $phuongThucThanhToan[$donHangs['phuong_thuc_thanh_toan_id']] ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-<?php 
                                                if ($donHangs['trang_thai_don_hang_id'] === 1) {
                                                    echo 'warning';
                                                } elseif ($donHangs['trang_thai_don_hang_id'] === 5) {
                                                    echo 'danger'; 
                                                } else {
                                                    echo 'success';
                                                }
                                            ?>">
                                                <?= $trangThaiOrder[$donHangs['trang_thai_don_hang_id']] ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group" role="group">
                                                <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHangs['id'] ?>"
                                                   class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye mr-1"></i>Details
                                                </a>

                                                <?php if ($donHangs['trang_thai_don_hang_id'] === 1): ?>
                                                    <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHangs['id'] ?>"
                                                       class="btn btn-danger btn-sm ml-2"
                                                       onclick="return confirm('Are you sure you want to cancel this order?')">
                                                        <i class="fas fa-times mr-1"></i>Cancel
                                                    </a>
                                                <?php endif; ?>
                                            </div>
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

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>