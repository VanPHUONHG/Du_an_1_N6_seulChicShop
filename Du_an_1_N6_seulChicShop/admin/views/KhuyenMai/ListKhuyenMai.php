<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/khuyenmai.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="promotion-header">
                <h1><i class="fas fa-tags"></i> Danh Sách Khuyến Mãi</h1>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="<?= BASE_URL_ADMIN ?>?act=form-them-khuyenMai" class="btn btn-success">
                            <i class="fas fa-plus"></i> Thêm Khuyến Mãi
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th width="5%">STT</th>
                                    <th width="10%">Mã KM</th>
                                    <th width="15%">Mô tả</th>
                                    <th width="10%">Loại</th>
                                    <th width="10%">Giá trị </th>
                                    <th width="10%">Điều kiện tối thiểu</th>
                                    <th width="10%">Số lần sử dụng tối đa</th>
                                    <th width="10%">Số lần đã sử dụng </th>
                                    <th width="10%">Ngày bắt đầu</th>
                                    <th width="10%">Ngày kết thúc</th>
                                    <th width="10%">Trạng thái</th>
                                    <th width="10%">Tài khoản</th>
                                    <th width="15%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($DanhSachKhuyenMai as $key => $khuyenMai): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $khuyenMai['ma_khuyen_mai'] ?></td>
                                    <td><?= $khuyenMai['mo_ta'] ?></td>
                                    <td><?= $khuyenMai['loai'] == 'phan_tram' ? 'Phần trăm' : 'Tiền' ?></td>
                                    <td><?= $khuyenMai['loai'] == 'phan_tram' ? $khuyenMai['gia_tri'] . '%' : number_format($khuyenMai['gia_tri']) . 'đ' ?></td>
                                    <td><?= $khuyenMai['dieu_kien_toi_thieu'] ?></td>
                                    <td><?= $khuyenMai['so_lan_su_dung'] ?></td>
                                    <td><?= $khuyenMai['so_lan_da_dung'] ?></td>
                                    <td><?= $khuyenMai['ngay_bat_dau'] ?></td>
                                    <td><?= $khuyenMai['ngay_ket_thuc'] ?></td>
                                    <td>
                                        <span class="status-badge <?= $khuyenMai['trang_thai'] == 1 ? 'status-active' : 'status-inactive' ?>">
                                            <?= $khuyenMai['trang_thai'] == 1 ? 'Hoạt động' : 'Ngừng' ?>
                                        </span>
                                    </td>
                                    <td><?= $khuyenMai['ten_tai_khoan'] ?></td>
                                    <td>
                                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khuyenMai&id=' . $khuyenMai['id'] ?>">
                                            <button class="btn btn-warning"><i class="far fa-eye"></i></button>
                                        </a>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-khuyenMai&id=<?= $khuyenMai['id'] ?>">
                                            <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=xoa-khuyenMai&id=<?= $khuyenMai['id'] ?>"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
