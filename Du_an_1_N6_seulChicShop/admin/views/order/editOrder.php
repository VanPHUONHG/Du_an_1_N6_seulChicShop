<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h4>Thông tin chi tiết đơn hàng</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                $statusColor = 'danger';
                if ($donHang['trang_thai_id'] == 1) {
                    $statusColor = 'primary';
                } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                    $statusColor = 'warning';
                } elseif ($donHang['trang_thai_id'] == 10) {
                    $statusColor = 'success';
                }
                ?>

                <div class="col-12">
                    <div class="alert alert-<?= $statusColor; ?> d-flex justify-content-between">
                        <p>Đơn hàng: <?= $donHang['ten_trang_thai'] ?></p>
                        <p>Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?></p>
                    </div>

                    <div class="invoice p-3 mb-3">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin người đặt:</strong>
                                <address>
                                    Tên: <?= $donHang['ten_tai_khoan'] ?><br />
                                    Email: <?= $donHang['email'] ?><br />
                                    SĐT: <?= $donHang['so_dien_thoai'] ?>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin người nhận:</strong>
                                <address>
                                    Tên: <?= $donHang['ten_nguoi_nhan'] ?><br />
                                    Email: <?= $donHang['email_nguoi_nhan'] ?><br />
                                    SĐT: <?= $donHang['sdt_nguoi_nhan'] ?><br />
                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin đơn hàng:</strong>
                                <address>
                                    MDH: <?= $donHang['ma_don_hang'] ?><br />
                                    Tổng tiền: <?= number_format($donHang['tong_tien']) ?><br />
                                    Ghi chú: <?= $donHang['ghi_chu'] ?><br />
                                    Thanh toán: <?= $donHang['ten_phuong_thuc'] ?>
                                </address>
                            </div>
                        </div><br /><br />

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-xl font-semibold mb-4">Bảng danh sách sản phẩm</h3>
                                <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
                                    <table class="min-w-full border border-gray-200">
                                        <thead class="bg-gray-100 text-gray-700">
                                            <tr>
                                                <th class="border px-4 py-2 text-left">STT</th>
                                                <th class="border px-4 py-2 text-left">Sản Phẩm</th>
                                                <th class="border px-4 py-2 text-right">Đơn Giá</th>
                                                <th class="border px-4 py-2 text-center">Số Lượng</th>
                                                <th class="border px-4 py-2 text-right">Thành Tiền</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $tong_tien = 0; ?>
                                            <?php foreach ($sanPhamDonHang as $index => $sanPham): ?>
                                                <tr class="<?= $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' ?>">
                                                    <td class="border px-4 py-2"><?= $index + 1 ?></td>
                                                    <td class="border px-4 py-2"><?= $sanPham['ten_san_pham'] ?></td>
                                                    <td class="border px-4 py-2 text-right"><?= number_format($sanPham['don_gia']) ?> VND</td>
                                                    <td class="border px-4 py-2 text-center"><?= $sanPham['so_luong'] ?></td>
                                                    <td class="border px-4 py-2 text-right"><?= number_format($sanPham['don_gia'] * $sanPham['so_luong']) ?> VND</td>
                                                </tr>
                                                <?php $tong_tien += $sanPham['don_gia'] * $sanPham['so_luong']; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Sửa trạng thái đơn hàng</h4>
                                <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                                    <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
                                    <div>
                                    
                                        <div class="form-group">
                                            <select id="inputStatus" name="trang_thai_id" class="form-control custom-select">
                                                <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                                                    <?php if ($trangThai['id'] >= $donHang['trang_thai_id'] && !in_array($donHang['trang_thai_id'], [9, 10, 11])) : ?>
                                                        <option
                                                            <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                                                            value="<?= $trangThai['id'] ?>">
                                                            <?= $trangThai['ten_trang_thai'] ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>