<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End Header -->
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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi Tiết Liên Hệ</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tài Khoản:</label>
                                        <p><?= $contact['ten_tai_khoan'] ?? 'Khách vãng lai' ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Họ Tên:</label>
                                        <p><?= $contact['ho_ten'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <p><?= $contact['email'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Số Điện Thoại:</label>
                                        <p><?= $contact['so_dien_thoai'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tiêu Đề:</label>
                                        <p><?= $contact['tieu_de'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời Gian Gửi:</label>
                                        <p><?= $contact['thoi_gian_gui'] ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Nội Dung:</label>
                                        <p><?= $contact['noi_dung'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <form action="<?= BASE_URL_ADMIN ?>?act=xu-ly-lien-he" method="POST">
                                <input type="hidden" name="contact_id" value="<?= $contact['id'] ?>">

                                <div class="form-group">
                                    <label>Trạng Thái</label>
                                    <select class="form-control" name="trang_thai" <?= $contact['trang_thai'] == 1 ? 'disabled' : '' ?>>
                                        <option value="0" <?= $contact['trang_thai'] == 0 ? 'selected' : '' ?>>Chưa xử lý
                                        </option>
                                        <option value="1" <?= $contact['trang_thai'] == 1 ? 'selected' : '' ?>>Đã xử lý
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
                                <a href="<?= BASE_URL_ADMIN ?>?act=lien-he" class="btn btn-secondary">Quay lại</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->
</body>

</html>