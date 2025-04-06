<!-- header  -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="">
                <div class="d-flex justify-content-between">
                    <h1>Sửa thông tin khuyến mãi: <?= $khuyenMai['ma_khuyen_mai'] ?></h1>
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-khuyenMai' ?>" class="btn btn-secondary">Quay lại</a>
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
                        <h3 class="card-title">Thông tin khuyến mại</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=cap-nhat-khuyenMai' ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $khuyenMai['id'] ?>">
                                <label for="ma_khuyen_mai">Mã khuyến mại</label>
                                <input type="text" id="ma_khuyen_mai" name="ma_khuyen_mai" class="form-control" value="<?= htmlspecialchars($khuyenMai['ma_khuyen_mai']) ?>" required>
                                <?php if (isset($_SESSION['error']['ma_khuyen_mai'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ma_khuyen_mai'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả</label>
                                <input type="text" id="mo_ta" name="mo_ta" class="form-control" value="<?= htmlspecialchars($khuyenMai['mo_ta']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="loai_giam_gia">Loại giảm giá</label>
                                <select id="loai_giam_gia" name="loai_giam_gia" class="form-control custom-select" required>
                                    <option value="1" <?= $khuyenMai['loai_giam_gia'] == 1 ? 'selected' : '' ?>>Phần trăm</option>
                                    <option value="2" <?= $khuyenMai['loai_giam_gia'] == 2 ? 'selected' : '' ?>>Number</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gia_tri_giam">Giá trị giảm</label>
                                <input type="number" id="gia_tri_giam" name="gia_tri_giam" class="form-control" value="<?= $khuyenMai['gia_tri_giam'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="gia_tri_don_hang_toi_thieu">Giá trị đơn hàng tối thiểu</label>
                                <input type="number" id="gia_tri_don_hang_toi_thieu" name="gia_tri_don_hang_toi_thieu" class="form-control" value="<?= $khuyenMai['gia_tri_don_hang_toi_thieu'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="so_luong_toi_da">Số lượng tối đa</label>
                                <input type="number" id="so_luong_toi_da" name="so_luong_toi_da" class="form-control" value="<?= $khuyenMai['so_luong_toi_da'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="so_luong_da_dung">Số lượng đã dùng</label>
                                <input type="number" id="so_luong_da_dung" name="so_luong_da_dung" class="form-control" value="<?= $khuyenMai['so_luong_da_dung'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ngay_bat_dau">Ngày bắt đầu</label>
                                <input type="datetime-local" id="ngay_bat_dau" name="ngay_bat_dau" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($khuyenMai['ngay_bat_dau'])) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ngay_ket_thuc">Ngày kết thúc</label>
                                <input type="datetime-local" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($khuyenMai['ngay_ket_thuc'])) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="trang_thai">Trạng thái khuyến mãi</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select" required>
                                    <option value="1" <?= $khuyenMai['trang_thai'] == 1 ? 'selected' : '' ?>>Còn mã</option>
                                    <option value="2" <?= $khuyenMai['trang_thai'] == 2 ? 'selected' : '' ?>>Hết mã</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

</body>
</html>