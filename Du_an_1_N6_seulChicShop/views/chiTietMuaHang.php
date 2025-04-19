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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> <?= $_SESSION['success'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <!-- Display error message if set -->
    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?= $_SESSION['error_message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="<?= BASE_URL ?>" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">Chi tiết đơn hàng</span>
        </div>
    </div>

    <!-- Order Details -->
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="m-0">Chi Tiết Đơn Hàng #<?= isset($donHang['ma_don_hang']) ? $donHang['ma_don_hang'] : '' ?></h3>
                        </div>

                        <div class="card-body">
                            <!-- Order Info -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold mb-3">Thông tin đơn hàng</h4>
                                    <p><strong>Ngày đặt:</strong> <?= isset($donHang['ngay_dat']) ? $donHang['ngay_dat'] : '' ?></p>
                                    <p><strong>Trạng thái:</strong> 
                                        <span class="badge badge-info">
                                            <?= isset($donHang['trang_thai_don_hang_id']) && isset($trangThaiOrder[$donHang['trang_thai_don_hang_id']]) ? $trangThaiOrder[$donHang['trang_thai_don_hang_id']] : '' ?>
                                        </span>
                                    </p>
                                    <p><strong>Phương thức thanh toán:</strong>
                                        <?= isset($donHang['phuong_thuc_thanh_toan_id']) && isset($phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]) ? $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] : '' ?>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="font-weight-bold mb-3">Thông tin người nhận</h4>
                                    <p><strong>Người nhận:</strong> <?= isset($donHang['ten_nguoi_nhan']) ? $donHang['ten_nguoi_nhan'] : '' ?></p>
                                    <p><strong>Email:</strong> <?= isset($donHang['email_nguoi_nhan']) ? $donHang['email_nguoi_nhan'] : '' ?></p>
                                    <p><strong>Số điện thoại:</strong> <?= isset($donHang['sdt_nguoi_nhan']) ? $donHang['sdt_nguoi_nhan'] : '' ?></p>
                                    <p><strong>Địa chỉ:</strong>
                                        <?= isset($donHang['dia_chi_cu_the']) ? $donHang['dia_chi_cu_the'] . ', ' : '' ?>
                                        <?= isset($donHang['xa_phuong']) ? $donHang['xa_phuong'] . ', ' : '' ?>
                                        <?= isset($donHang['huyen_quan']) ? $donHang['huyen_quan'] . ', ' : '' ?>
                                        <?= isset($donHang['tinh_thanhpho']) ? $donHang['tinh_thanhpho'] : '' ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <h4 class="font-weight-bold mb-3">Chi tiết sản phẩm</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">Hình ảnh</th>
                                            <th class="text-center">Tên sản phẩm</th>
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
                                                    <td class="text-center" style="width: 100px">
                                                        <img src="<?= isset($item['hinh_anh']) ? $item['hinh_anh'] : 'assets/images/no-image.png' ?>"
                                                            alt="<?= isset($item['ten_san_pham']) ? $item['ten_san_pham'] : '' ?>"
                                                            class="img-thumbnail" style="max-width: 80px">
                                                    </td>
                                                    <td><?= isset($item['ten_san_pham']) ? $item['ten_san_pham'] : '' ?></td>
                                                    <td class="text-center">
                                                        <?= isset($item['mau_sac']) ? $item['mau_sac'] : '' ?>
                                                        <?= (isset($item['mau_sac']) && isset($item['kich_thuoc'])) ? ' - ' : '' ?>
                                                        <?= isset($item['kich_thuoc']) ? $item['kich_thuoc'] : '' ?>
                                                    </td>
                                                    <td class="text-center"><?= isset($item['so_luong']) ? $item['so_luong'] : '' ?></td>
                                                    <td class="text-right"><?= isset($item['don_gia']) ? formatPrice($item['don_gia']) : '' ?> VND</td>
                                                    <td class="text-right"><?= isset($item['thanh_tien']) ? formatPrice($item['thanh_tien']) : '' ?> VND</td>
                                                    <td class="text-center"><?= isset($item['ma_khuyen_mai']) && !empty($item['ma_khuyen_mai']) ? $item['ma_khuyen_mai'] : 'Không dùng mã giảm giá' ?></td>
                                                    <td class="text-right"><?= isset($item['tien_giam']) && !empty($item['tien_giam']) ? formatPrice($item['tien_giam']) . ' VND' : '0 VND' ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right font-weight-bold">Tổng tiền:</td>
                                            <td class="text-right font-weight-bold">
                                                <?= isset($donHang['tong_tien']) ? formatPrice($donHang['tong_tien']) : '' ?> VND
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-center mt-4">
                                <a href="<?= BASE_URL ?>?act=lich-su-mua-hang" class="btn btn-primary">
                                    <i class="fa fa-arrow-left mr-2"></i>Quay lại
                                </a>
                                <?php if (isset($donHang['trang_thai_don_hang_id']) && $donHang['trang_thai_don_hang_id'] == 1): ?>
                                    <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= isset($donHang['id']) ? $donHang['id'] : '' ?>"
                                        class="btn btn-danger ml-2" 
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