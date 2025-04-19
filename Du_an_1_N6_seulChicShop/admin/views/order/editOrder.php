<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- css -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>/public/css/order.css">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h4 class="m-0 text-dark"><i class="fas fa-file-invoice mr-2"></i>Chi Tiết Đơn Hàng</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                $statusColor = 'danger';
                $statusIcon = 'times-circle';
                if ($donHang['trang_thai_don_hang_id'] == 1) {
                    $statusColor = 'info';
                    $statusIcon = 'clock';
                } elseif ($donHang['trang_thai_don_hang_id'] >= 2 && $donHang['trang_thai_don_hang_id'] <= 4) {
                    $statusColor = 'warning';
                    $statusIcon = 'truck';
                } elseif ($donHang['trang_thai_don_hang_id'] == 5) {
                    $statusColor = 'success';
                    $statusIcon = 'check-circle';
                }
                ?>

                <div class="col-12">
                    <div class="card card-<?= $statusColor ?> card-outline">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="fas fa-<?= $statusIcon ?> mr-2"></i>
                                    <?= $donHang['ten_trang_thai'] ?>
                                </h3>
                                <span class="text-muted">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?>
                                </span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <h5 class="info-box-text text-muted mb-2">Thông tin người đặt</h5>
                                            <p class="mb-1"><strong>Tên:</strong> <?= $donHang['ten_tai_khoan'] ?></p>
                                            <p class="mb-1"><strong>Email:</strong> <?= $donHang['email'] ?></p>
                                            <p class="mb-0"><strong>SĐT:</strong> <?= $donHang['so_dien_thoai'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <h5 class="info-box-text text-muted mb-2">Thông tin người nhận</h5>
                                            <p class="mb-1"><strong>Tên:</strong> <?= $donHang['ten_nguoi_nhan'] ?></p>
                                            <p class="mb-1"><strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?></p>
                                            <p class="mb-1"><strong>SĐT:</strong> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                                            <p class="mb-0"><strong>Địa chỉ:</strong> <?= $donHang['dia_chi_cu_the'] . ', ' . $donHang['xa_phuong'] . ', ' . $donHang['huyen_quan'] . ', ' . $donHang['tinh_thanhpho'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <h5 class="info-box-text text-muted mb-2">Thông tin đơn hàng</h5>
                                            <p class="mb-1"><strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?></p>
                                            <p class="mb-1"><strong>Tổng tiền:</strong> <?= number_format($donHang['tong_tien']) ?> VND</p>
                                            <p class="mb-1"><strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?></p>
                                            <p class="mb-0"><strong>Thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">STT</th>
                                            <th style="width: 25%">Sản Phẩm</th>
                                            <th style="width: 15%" class="text-right">Đơn Giá</th>
                                            <th style="width: 10%" class="text-center">Số Lượng</th>
                                            <th style="width: 15%" class="text-center">Mã Giảm Giá</th>
                                            <th style="width: 15%" class="text-right">Thành Tiền</th>
                                            <th style="width: 15%" class="text-right">Tiền Giảm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $index => $sanPham): ?>
                                            <tr>
                                                <td class="text-center"><?= $index + 1 ?></td>
                                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                                <td class="text-right"><?= number_format($sanPham['thanh_tien']) ?> VND</td>
                                                <td class="text-center"><?= $sanPham['so_luong'] ?></td>
                                                <td class="text-center"><?= $sanPham['ma_khuyen_mai'] ? $sanPham['ma_khuyen_mai'] : '<span class="badge badge-secondary">Không có</span>' ?></td>
                                                <td class="text-right"><?= number_format($sanPham['thanh_tien']) ?> VND</td>
                                                <td class="text-right text-danger"><?= $sanPham['tien_giam'] ? '- '.number_format($sanPham['tien_giam']) : '0' ?> VND</td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="5" class="text-right"><strong>Tổng cộng:</strong></td>
                                            <td class="text-right"><strong><?= number_format($tong_tien) ?> VND</strong></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                <h5 class="mb-3">Cập nhật trạng thái</h5>
                                <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                                    <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
                                    <div class="form-group">
                                        <select id="inputStatus" name="trang_thai_id" class="form-control select2" style="width: 100%;">
                                            <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                                                <?php if ($trangThai['id'] >= $donHang['trang_thai_don_hang_id'] || in_array($donHang['trang_thai_don_hang_id'], [])): ?>
                                                    <option value="<?= $trangThai['id'] ?>" <?= $trangThai['id'] == $donHang['trang_thai_don_hang_id'] ? 'selected' : '' ?>>
                                                        <?= $trangThai['ten_trang_thai'] ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Lưu thay đổi
                                    </button>
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