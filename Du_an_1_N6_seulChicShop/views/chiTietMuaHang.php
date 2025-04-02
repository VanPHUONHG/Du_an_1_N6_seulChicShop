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
            Order Details
        </span>
    </div>
</div>

<!-- Order Details -->
<form class="p-b-85 p-t-75 bg0">
    <div class="container mx-auto my-10">
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-8">Chi Tiết Đơn Hàng</h2>
        <div class="flex justify-center">
            <div class="w-full lg:w-10/12 xl:w-7/12 bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Thông tin đơn hàng -->
                <div class="p-4 border-b">
                    <h3 class="font-semibold mb-2">Thông tin đơn hàng #<?= isset($donHang['ma_don_hang']) ? $donHang['ma_don_hang'] : '' ?></h3>
                    <p>Ngày đặt: <?= isset($donHang['ngay_dat']) ? $donHang['ngay_dat'] : '' ?></p>
                    <p>Trạng thái: <?= isset($donHang['trang_thai_id']) && isset($trangThaiOrder[$donHang['trang_thai_id']]) ? $trangThaiOrder[$donHang['trang_thai_id']] : '' ?></p>
                    <p>Phương thức thanh toán: <?= isset($donHang['phuong_thuc_thanh_toan_id']) && isset($phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]) ? $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] : '' ?></p>
                </div>

                <!-- Thông tin người nhận -->
                <div class="p-4 border-b">
                    <h3 class="font-semibold mb-2">Thông tin người nhận</h3>
                    <p>Tên người nhận: <?= isset($donHang['ten_nguoi_nhan']) ? $donHang['ten_nguoi_nhan'] : '' ?></p>
                    <p>Email: <?= isset($donHang['email_nguoi_nhan']) ? $donHang['email_nguoi_nhan'] : '' ?></p>
                    <p>Số điện thoại: <?= isset($donHang['sdt_nguoi_nhan']) ? $donHang['sdt_nguoi_nhan'] : '' ?></p>
                    <p>Địa chỉ: <?= isset($donHang['dia_chi_nguoi_nhan']) ? $donHang['dia_chi_nguoi_nhan'] : '' ?></p>
                </div>

                <!-- Chi tiết sản phẩm -->
                <div class="p-4">
                    <h3 class="font-semibold mb-2">Chi tiết sản phẩm</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300">
                            <thead>
                                <tr class="bg-blue-600 text-white">
                                    <th class="py-2 px-4 border">Tên sản phẩm</th>
                                    <th class="py-2 px-4 border">Số lượng</th>
                                    <th class="py-2 px-4 border">Đơn giá</th>
                                    <th class="py-2 px-4 border">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($chiTietDonHang) && is_array($chiTietDonHang)): ?>
                                <?php foreach ($chiTietDonHang as $item): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border"><?= isset($item['ten_san_pham']) ? $item['ten_san_pham'] : '' ?></td>
                                    <td class="py-2 px-4 border text-center"><?= isset($item['so_luong']) ? $item['so_luong'] : '' ?></td>
                                    <td class="py-2 px-4 border text-right"><?= isset($item['don_gia']) ? formatPrice($item['don_gia']) : '' ?> VND</td>
                                    <td class="py-2 px-4 border text-right"><?= isset($item['thanh_tien']) ? formatPrice($item['thanh_tien']) : '' ?> VND</td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr class="bg-gray-50">
                                    <td colspan="3" class="py-2 px-4 border text-right font-semibold">Tổng tiền:</td>
                                    <td class="py-2 px-4 border text-right font-semibold"><?= isset($donHang['tong_tien']) ? formatPrice($donHang['tong_tien']) : '' ?> VND</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- Nút thao tác -->
                <div class="p-4 text-center">
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
</form>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>