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
            Shopping Cart
        </span>
    </div>
</div>


<!-- Shopping Cart -->
<form class="p-b-85 p-t-75 bg0" method="POST" action="<?= BASE_URL ?>?act=cap-nhat-so-luong" enctype="multipart/form-data">
    <div class="container mx-auto my-10">
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-8">Bills</h2>
        <div class="flex justify-center">
            <div class="w-full lg:w-10/12 xl:w-7/12 bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 bg-white">
                            <thead>
                                <tr class="bg-blue-600 text-red-888 text-left">
                                    <th class="py-3 px-4 border border-gray-300">Mã Đơn Hàng</th>
                                    <th class="py-3 px-4 border border-gray-300">Ngày Đặt</th>
                                    <th class="py-3 px-4 border border-gray-300">Tổng Tiền</th>
                                    <th class="py-3 px-4 border border-gray-300">Phương Thức Thanh Toán</th>
                                    <th class="py-3 px-4 border border-gray-300">Trạng Thái Đơn Hàng</th>
                                    <th class="py-3 px-4 border border-gray-300">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($donHang as $donHangs): ?>
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="py-3 px-4 border border-gray-300"><?= $donHangs['ma_don_hang'] ?></td>
                                        <td class="py-3 px-4 border border-gray-300"><?= $donHangs['ngay_dat'] ?></td>
                                        <td class="py-3 px-4 border border-gray-300"><?= formatPrice($donHangs['tong_tien']) ?> VND</td>
                                        <td class="py-3 px-4 border border-gray-300"><?= $phuongThucThanhToan[$donHangs['phuong_thuc_thanh_toan_id']] ?></td>
                                        <td class="py-3 px-4 border border-gray-300"><?= $trangThaiOrder[$donHangs['trang_thai_id']] ?></td>
                                        <td class="py-3 px-4 border border-gray-300">

                                            <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHangs['id'] ?>"
                                                class="btn btn-warning">
                                                Chi tiết đơn hàng
                                            </a>

                                            <?php if ($donHangs['trang_thai_id'] === 1) { ?>
                                                <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHangs['id'] ?>"
                                                    class="btn btn-warning"
                                                    onclick="return confirm('Bạn xác nhận huỷ đơn hàng?')">
                                                    Hủy
                                                </a>
                                            <?php } ?>
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
</form>


<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>