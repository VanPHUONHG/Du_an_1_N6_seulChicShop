    <?php
    // Check if $donHang is set and not null before using it
    if (!isset($donHang)) {
        $donHang = [];
    }
    ?>
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
                        <i class="fas fa-home mr-1"></i>Trang chủ
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
            </ol>
        </nav>
    </div>

    <!-- Order Details -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header bg-gradient-primary text-white py-3">
                            <h3 class="m-0 text-center">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Chi Tiết Đơn Hàng #<?= isset($donHang['ma_don_hang']) ? $donHang['ma_don_hang'] : '' ?>
                            </h3>
                        </div>

                        <div class="card-body p-4">
                            <!-- Order Info -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="card h-100 border-left border-primary shadow-sm">
                                        <div class="card-body">
                                            <h4 class="font-weight-bold mb-3 text-primary">
                                                <i class="fas fa-info-circle mr-2"></i>Thông tin đơn hàng
                                            </h4>
                                            <p><strong>Ngày đặt:</strong> <?= isset($donHang['ngay_dat']) ? date('d/m/Y H:i', strtotime($donHang['ngay_dat'])) : '' ?></p>
                                            <p><strong>Trạng thái:</strong> 
                                                <span class="badge badge-pill badge-info">
                                                    <?= isset($donHang['trang_thai_don_hang_id']) && isset($trangThaiOrder[$donHang['trang_thai_don_hang_id']]) ? $trangThaiOrder[$donHang['trang_thai_don_hang_id']] : '' ?>
                                                </span>
                                            </p>
                                            <p class="mb-0"><strong>Phương thức thanh toán:</strong>
                                                <span class="badge badge-pill badge-success">
                                                    <?= isset($donHang['phuong_thuc_thanh_toan_id']) && isset($phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]) ? $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] : '' ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card h-100 border-left border-success shadow-sm">
                                        <div class="card-body">
                                            <h4 class="font-weight-bold mb-3 text-success">
                                                <i class="fas fa-user mr-2"></i>Thông tin người nhận
                                            </h4>
                                            <p><strong>Người nhận:</strong> <?= isset($donHang['ten_nguoi_nhan']) ? $donHang['ten_nguoi_nhan'] : '' ?></p>
                                            <p><strong>Email:</strong> <?= isset($donHang['email_nguoi_nhan']) ? $donHang['email_nguoi_nhan'] : '' ?></p>
                                            <p><strong>Số điện thoại:</strong> <?= isset($donHang['sdt_nguoi_nhan']) ? $donHang['sdt_nguoi_nhan'] : '' ?></p>
                                            <p class="mb-0"><strong>Địa chỉ:</strong>
                                                <?= isset($donHang['dia_chi_cu_the']) ? $donHang['dia_chi_cu_the'] . ', ' : '' ?>
                                                <?= isset($donHang['xa_phuong']) ? $donHang['xa_phuong'] . ', ' : '' ?>
                                                <?= isset($donHang['huyen_quan']) ? $donHang['huyen_quan'] . ', ' : '' ?>
                                                <?= isset($donHang['tinh_thanhpho']) ? $donHang['tinh_thanhpho'] : '' ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="card shadow-sm">
                                <div class="card-header bg-light">
                                    <h4 class="font-weight-bold mb-0 text-dark">
                                        <i class="fas fa-box-open mr-2"></i>Chi tiết sản phẩm
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center">Hình ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th class="text-center">Biến thể</th>
                                                    <th class="text-center">Số lượng</th>
                                                    <th class="text-right">Đơn giá</th>
                                                    <th class="text-right">Thành tiền</th>
                                                    <th class="text-center">Mã giảm giá</th>
                                                    <th class="text-right">Tiền giảm</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($chiTietDonHang) && is_array($chiTietDonHang)): ?>
                                                    <?php foreach ($chiTietDonHang as $item): ?>
                                                        <tr>
                                                            <td class="text-center align-middle" style="width: 100px">
                                                                <img src="<?= !empty($item['hinh_anh']) ? $item['hinh_anh'] : './assets/images/product-01.jpg' ?>"
                                                                    alt="<?= isset($item['ten_san_pham']) ? $item['ten_san_pham'] : '' ?>"
                                                                    class="img-thumbnail shadow-sm" style="max-width: 80px">
                                                            </td>
                                                            <td class="align-middle"><?= isset($item['ten_san_pham']) ? $item['ten_san_pham'] : '' ?></td>
                                                            <td class="text-center align-middle">
                                                                <span class="badge badge-pill badge-light">
                                                                    <?= isset($item['mau_sac']) ? $item['mau_sac'] : '' ?>
                                                                    <?= (isset($item['mau_sac']) && isset($item['kich_thuoc'])) ? ' - ' : '' ?>
                                                                    <?= isset($item['kich_thuoc']) ? $item['kich_thuoc'] : '' ?>
                                                                </span>
                                                            </td>
                                                            <td class="text-center align-middle font-weight-bold"><?= isset($item['so_luong']) ? $item['so_luong'] : '' ?></td>
                                                            <td class="text-right align-middle"><?= isset($item['don_gia']) ? formatPrice($item['don_gia']) : '' ?> VND</td>
                                                            <td class="text-right align-middle text-success font-weight-bold"><?= isset($item['thanh_tien']) ? formatPrice($item['thanh_tien']) : '' ?> VND</td>
                                                            <td class="text-center align-middle">
                                                                <?php if(isset($item['ma_khuyen_mai']) && !empty($item['ma_khuyen_mai'])): ?>
                                                                    <span class="badge badge-warning"><?= $item['ma_khuyen_mai'] ?></span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-secondary">Không có</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-right align-middle text-danger"><?= isset($item['tien_giam']) && !empty($item['tien_giam']) ? formatPrice($item['tien_giam']) . ' VND' : '0 VND' ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                            <tfoot class="bg-light">
                                                <tr>
                                                    <td colspan="5" class="text-right font-weight-bold">Tổng tiền:</td>
                                                    <td colspan="3" class="text-right font-weight-bold text-primary h5 mb-0">
                                                        <?= isset($donHang['tong_tien']) ? formatPrice($donHang['tong_tien']) : '' ?> VND
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-center mt-4">
                                <a href="<?= BASE_URL ?>?act=lich-su-mua-hang" class="btn btn-primary btn-lg px-5 mr-3">
                                    <i class="fa fa-arrow-left mr-2"></i>Quay lại
                                </a>
                                <?php if (isset($donHang['trang_thai_don_hang_id']) && $donHang['trang_thai_don_hang_id'] == 1): ?>
                                    <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= isset($donHang['id']) ? $donHang['id'] : '' ?>"
                                        class="btn btn-danger btn-lg px-5" 
                                        onclick="return confirm('Bạn xác nhận huỷ đơn hàng?')">
                                        <i class="fa fa-times mr-2"></i>Hủy đơn hàng
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include './views/layouts/footer.php'; ?>