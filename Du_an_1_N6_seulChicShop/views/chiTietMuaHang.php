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
    <div class="flex-w p-l-25 p-lr-0-lg p-r-15 p-t-30 bread-crumb">
        <a href="<?= BASE_URL ?>" class="cl8 hov-cl1 stext-109 trans-04">
            Home
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <span class="cl4 stext-109">
            Chi tiết đơn hàng
        </span>
    </div>
</div>

<!-- Order Details -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <p><strong>Mã đơn hàng:</strong> #<?= isset($donHang['ma_don_hang']) ? $donHang['ma_don_hang'] : '' ?></p>
                                <p><strong>Người nhận:</strong> <?= isset($donHang['ten_nguoi_nhan']) ? $donHang['ten_nguoi_nhan'] : '' ?></p>
                                <p><strong>Email:</strong> <?= isset($donHang['email_nguoi_nhan']) ? $donHang['email_nguoi_nhan'] : '' ?></p>
                                <p><strong>Số điện thoại:</strong> <?= isset($donHang['sdt_nguoi_nhan']) ? $donHang['sdt_nguoi_nhan'] : '' ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p><strong>Địa chỉ:</strong>
                                    <?php
                                    $diaChi = array_filter([
                                        $donHang['tinh_thanhpho'] ?? '',
                                        $donHang['huyen_quan'] ?? '',
                                        $donHang['xa_phuong'] ?? '',
                                        $donHang['dia_chi_cu_the'] ?? ''
                                    ]);

                                    echo implode(', ', $diaChi);
                                    ?>
                                </p>
                                <p><strong>Ngày đặt:</strong> <?= isset($donHang['ngay_dat']) ? $donHang['ngay_dat'] : '' ?></p>
                                <p><strong>Ghi chú:</strong> <?= isset($donHang['ghi_chu']) ? $donHang['ghi_chu'] : 'Không có' ?></p>
                                <p><strong>Phương thức thanh toán:</strong> <?= isset($donHang['phuong_thuc_thanh_toan_id']) && isset($phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]) ? $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] : '' ?></p>
                                <p><strong>Trạng thái đơn hàng:</strong> <?= isset($donHang['trang_thai_id']) && isset($trangThaiOrder[$donHang['trang_thai_id']]) ? $trangThaiOrder[$donHang['trang_thai_id']] : '' ?></p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 100px">Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $tongTien = 0;
                                    if (isset($chiTietDonHang) && is_array($chiTietDonHang)): 
                                    ?>
                                        <?php foreach ($chiTietDonHang as $item): 
                                            $thanhTien = isset($item['don_gia']) && isset($item['so_luong']) ? $item['don_gia'] * $item['so_luong'] : 0;
                                            $tongTien += $thanhTien;
                                        ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= isset($item['hinh_anh']) ? $item['hinh_anh'] : 'assets/images/no-image.jpg' ?>"
                                                        alt="<?= isset($item['ten_san_pham']) ? $item['ten_san_pham'] : '' ?>"
                                                        style="width: 80px; height: 80px; object-fit: cover;">
                                                </td>
                                                <td><?= isset($item['ten_san_pham']) ? $item['ten_san_pham'] : '' ?></td>
                                                <td class="text-right"><?= isset($item['don_gia']) ? formatPrice($item['don_gia']) : '' ?> VND</td>
                                                <td class="text-center"><?= isset($item['so_luong']) ? $item['so_luong'] : '' ?></td>
                                                <td class="text-right"><?= formatPrice($thanhTien) ?> VND</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Tổng tiền:</strong></td>
                                        <td class="text-right"><strong><?= formatPrice($tongTien) ?> VND</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="text-center mt-4">
                            <a href="<?= BASE_URL ?>?act=lich-su-mua-hang" class="btn btn-primary">Quay lại</a>
                            <?php if (isset($donHang['trang_thai_id']) && $donHang['trang_thai_id'] === 1): ?>
                                <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= isset($donHang['id']) ? $donHang['id'] : '' ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Bạn xác nhận huỷ đơn hàng?')">
                                    Hủy đơn hàng
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