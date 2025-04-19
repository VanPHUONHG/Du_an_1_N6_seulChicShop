<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/khuyenmai.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="promotion-header">
                <h1><i class="fas fa-plus-circle"></i> Thêm Khuyến Mãi Mới</h1>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL_ADMIN . '?act=them-khuyenMai' ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mã Khuyến Mại <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ma_khuyen_mai" required>
                                    <?php if (isset($_SESSION['error']['ma_khuyen_mai'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['ma_khuyen_mai'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <input type="text" class="form-control" name="mo_ta">
                                    <?php if (isset($_SESSION['error']['mo_ta'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['mo_ta'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Loại Giảm giá <span class="text-danger">*</span></label>
                                    <select class="form-control" name="loai" required>
                                        <option value="">Chọn loại giảm giá</option>
                                        <option value="phan_tram">Phần trăm</option>
                                        <option value="tien_mat">Tiền mặt</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['loai'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['loai'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giá trị giảm <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="gia_tri" required min="0">
                                    <?php if (isset($_SESSION['error']['gia_tri'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['gia_tri'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giá trị đơn hàng tối thiểu</label>
                                    <input type="number" class="form-control" name="dieu_kien_toi_thieu" min="0" value="0">
                                    <?php if (isset($_SESSION['error']['dieu_kien_toi_thieu'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['dieu_kien_toi_thieu'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số lượng tối đa <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="so_lan_su_dung" value="1" min="0">
                                    <?php if (isset($_SESSION['error']['so_lan_su_dung'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['so_lan_su_dung'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Số lượng đã dùng</label>
                                    <input type="number" class="form-control" name="so_lan_da_dung" value="0" min="0">
                                    <?php if (isset($_SESSION['error']['so_lan_da_dung'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['so_lan_da_dung'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày bắt đầu <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control" name="ngay_bat_dau" required>
                                    <?php if (isset($_SESSION['error']['ngay_bat_dau'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['ngay_bat_dau'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày kết thúc <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control" name="ngay_ket_thuc" required>
                                    <?php if (isset($_SESSION['error']['ngay_ket_thuc'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['ngay_ket_thuc'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Ngừng hoạt động</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tài khoản</label>
                                    <select class="form-control" name="tai_khoan_id">
                                        <option value="">Chọn tài khoản</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['ten_tai_khoan']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['tai_khoan_id'])): ?>
                                        <small class="text-danger"><?= $_SESSION['error']['tai_khoan_id'] ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Lưu Khuyến Mãi
                            </button>
                            <a href="<?= BASE_URL_ADMIN ?>?act=danh-sach-khuyenMai" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
</body>
</html>