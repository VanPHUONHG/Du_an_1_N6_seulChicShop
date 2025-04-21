<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>/public/css/order.css">
<style>
    .content-wrapper {
        background: #f8f9fa;
        padding: 20px;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        padding: 1.5rem;
    }

    .info-box {
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        height: 100%;
        transition: all 0.3s ease;
    }

    .info-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .table {
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead th {
        background: #f8f9fa;
        border: none;
        padding: 15px;
        font-weight: 600;
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
    }

    .btn {
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .select2-container--default .select2-selection--single {
        height: 45px;
        border-radius: 10px;
        border: 2px solid #eee;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 45px;
        padding-left: 15px;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-sm-10">
                    <h2 class="m-0 text-dark">
                        <i class="fas fa-file-invoice mr-2 text-primary"></i>
                        Chi Tiết Đơn Hàng
                    </h2>
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
                } elseif ($donHang['trang_thai_don_hang_id'] >= 2 && $donHang['trang_thai_don_hang_id'] <= 3) {
                    $statusColor = 'warning';
                    $statusIcon = 'truck';
                } elseif ($donHang['trang_thai_don_hang_id'] == 4) {
                    $statusColor = 'success';
                    $statusIcon = 'check-circle';
                }
                ?>

                <div class="col-12">
                    <div class="card card-<?= $statusColor ?> card-outline">
                        <div class="card-header bg-gradient-<?= $statusColor ?>">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title text-white mb-0">
                                    <i class="fas fa-<?= $statusIcon ?> mr-2"></i>
                                    <?= $donHang['ten_trang_thai'] ?>
                                </h3>
                                <span class="text-white">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?>
                                </span>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <div class="info-box bg-white">
                                        <div class="info-box-content">
                                            <h5 class="info-box-text text-primary mb-3">
                                                <i class="fas fa-user mr-2"></i>
                                                Thông tin người đặt
                                            </h5>
                                            <p class="mb-2"><strong>Tên:</strong> <?= $donHang['ten_tai_khoan'] ?></p>
                                            <p class="mb-2"><strong>Email:</strong> <?= $donHang['email'] ?></p>
                                            <p class="mb-0"><strong>SĐT:</strong> <?= $donHang['so_dien_thoai'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="info-box bg-white">
                                        <div class="info-box-content">
                                            <h5 class="info-box-text text-primary mb-3">
                                                <i class="fas fa-shipping-fast mr-2"></i>
                                                Thông tin người nhận
                                            </h5>
                                            <p class="mb-2"><strong>Tên:</strong> <?= $donHang['ten_nguoi_nhan'] ?></p>
                                            <p class="mb-2"><strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?></p>
                                            <p class="mb-2"><strong>SĐT:</strong> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                                            <p class="mb-0"><strong>Địa chỉ:</strong> <?= $donHang['dia_chi_cu_the'] . ', ' . $donHang['xa_phuong'] . ', ' . $donHang['huyen_quan'] . ', ' . $donHang['tinh_thanhpho'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="info-box bg-white">
                                        <div class="info-box-content">
                                            <h5 class="info-box-text text-primary mb-3">
                                                <i class="fas fa-info-circle mr-2"></i>
                                                Thông tin đơn hàng
                                            </h5>
                                            <p class="mb-2"><strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?></p>
                                            <p class="mb-2"><strong>Tổng tiền:</strong> <?= number_format($donHang['tong_tien']) ?> VND</p>
                                            <p class="mb-2"><strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?></p>
                                            <p class="mb-0"><strong>Thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
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
                                                <td class="font-weight-medium"><?= $sanPham['ten_san_pham'] ?></td>
                                                <td class="text-right"><?= number_format($sanPham['thanh_tien']) ?> VND</td>
                                                <td class="text-center"><?= $sanPham['so_luong'] ?></td>
                                                <td class="text-center"><?= $sanPham['ma_khuyen_mai'] ? $sanPham['ma_khuyen_mai'] : '<span class="badge badge-light">Không có</span>' ?></td>
                                                <td class="text-right font-weight-bold"><?= number_format($sanPham['thanh_tien']) ?> VND</td>
                                                <td class="text-right text-danger font-weight-bold"><?= $sanPham['tien_giam'] ? '- ' . number_format($sanPham['tien_giam']) : '0' ?> VND</td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php endforeach; ?>
                                        <tr class="bg-light">
                                            <td colspan="5" class="text-right"><strong>Tổng cộng:</strong></td>
                                            <td class="text-right"><strong class="text-primary"><?= number_format($tong_tien) ?> VND</strong></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-5">
                                <h5 class="mb-4 text-primary">
                                    <i class="fas fa-sync-alt mr-2"></i>
                                    Cập nhật trạng thái
                                </h5>
                                <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                                    <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
                                    <div class="form-group">
                                        <select id="inputStatus" name="trang_thai_id" class="form-control select2" style="width: 100%;">
                                            <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                                                <?php if ($donHang['trang_thai_don_hang_id'] == 4): ?>
                                                    <?php if ($trangThai['id'] == 4 || $trangThai['id'] == 6): ?>
                                                        <option value="<?= $trangThai['id'] ?>" <?= $trangThai['id'] == $donHang['trang_thai_don_hang_id'] ? 'selected' : '' ?>>
                                                            <?= $trangThai['ten_trang_thai'] ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php elseif ($donHang['trang_thai_don_hang_id'] == 1): ?>
                                                    <?php if ($trangThai['id'] == 1 ||$trangThai['id'] == 2 || $trangThai['id'] == 5): ?>
                                                        <option value="<?= $trangThai['id'] ?>" <?= $trangThai['id'] == $donHang['trang_thai_don_hang_id'] ? 'selected' : '' ?>>
                                                            <?= $trangThai['ten_trang_thai'] ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if ($trangThai['id'] == $donHang['trang_thai_don_hang_id'] || $trangThai['id'] == $donHang['trang_thai_don_hang_id'] + 1): ?>
                                                        <option value="<?= $trangThai['id'] ?>" <?= $trangThai['id'] == $donHang['trang_thai_don_hang_id'] ? 'selected' : '' ?>>
                                                            <?= $trangThai['ten_trang_thai'] ?>
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-2"></i> Lưu thay đổi
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