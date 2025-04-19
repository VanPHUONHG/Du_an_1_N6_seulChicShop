<!-- header  -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/khuyenmai.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-between">
                    <h1>Sửa thông tin khuyến mãi: <?= htmlspecialchars($khuyenMai['ma_khuyen_mai']) ?></h1>
                    <a href="<?= htmlspecialchars(BASE_URL_ADMIN . '?act=danh-sach-khuyenMai') ?>" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin khuyến mãi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= htmlspecialchars(BASE_URL_ADMIN . '?act=cap-nhat-khuyenMai') ?>" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($khuyenMai['id']) ?>">
                            
                            <div class="form-group">
                                <label for="ma_khuyen_mai">Mã khuyến mãi <span class="text-danger">*</span></label>
                                <input type="text" id="ma_khuyen_mai" name="ma_khuyen_mai" class="form-control" value="<?= htmlspecialchars($khuyenMai['ma_khuyen_mai']) ?>" required>
                                <?php if (isset($_SESSION['error']['ma_khuyen_mai'])): ?>
                                    <div class="text-danger"><?= htmlspecialchars($_SESSION['error']['ma_khuyen_mai']) ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="mo_ta">Mô tả <span class="text-danger">*</span></label>
                                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="3" required><?= htmlspecialchars($khuyenMai['mo_ta']) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="loai">Loại giảm giá <span class="text-danger">*</span></label>
                                <select id="loai" name="loai" class="form-control" required>
                                    <option value="1" <?= $khuyenMai['loai'] == 1 ? 'selected' : '' ?>>Phần trăm (%)</option>
                                    <option value="2" <?= $khuyenMai['loai'] == 2 ? 'selected' : '' ?>>Số tiền cố định (VNĐ)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gia_tri">Giá trị giảm <span class="text-danger">*</span></label>
                                <input type="number" id="gia_tri" name="gia_tri" class="form-control" min="0" value="<?= htmlspecialchars($khuyenMai['gia_tri']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="dieu_kien_toi_thieu">Giá trị đơn hàng tối thiểu (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" id="dieu_kien_toi_thieu" name="dieu_kien_toi_thieu" class="form-control" min="0" value="<?= htmlspecialchars($khuyenMai['dieu_kien_toi_thieu']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="so_lan_su_dung">Số lượng mã tối đa <span class="text-danger">*</span></label>
                                <input type="number" id="so_lan_su_dung" name="so_lan_su_dung" class="form-control" min="0" value="<?= htmlspecialchars($khuyenMai['so_lan_su_dung']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="so_lan_da_dung">Số lần đã sử dụng <span class="text-danger">*</span></label>
                                <input type="number" id="so_lan_da_dung" name="so_lan_da_dung" class="form-control" min="0" value="<?= htmlspecialchars($khuyenMai['so_lan_da_dung']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ngay_bat_dau">Ngày bắt đầu <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="ngay_bat_dau" name="ngay_bat_dau" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($khuyenMai['ngay_bat_dau'])) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="ngay_ket_thuc">Ngày kết thúc <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($khuyenMai['ngay_ket_thuc'])) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="trang_thai">Trạng thái <span class="text-danger">*</span></label>
                                <select id="trang_thai" name="trang_thai" class="form-control" required>
                                    <option value="1" <?= $khuyenMai['trang_thai'] == 1 ? 'selected' : '' ?>>Còn mã</option>
                                    <option value="2" <?= $khuyenMai['trang_thai'] == 2 ? 'selected' : '' ?>>Hết mã</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tai_khoan_id">Tài khoản <span class="text-danger">*</span></label>
                                <select id="tai_khoan_id" name="tai_khoan_id" class="form-control" required>
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?= $user['id'] ?>" <?= $khuyenMai['tai_khoan_id'] == $user['id'] ? 'selected' : '' ?>><?= $user['ten_tai_khoan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="<?= htmlspecialchars(BASE_URL_ADMIN . '?act=danh-sach-khuyenMai') ?>" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

</body>
</html>