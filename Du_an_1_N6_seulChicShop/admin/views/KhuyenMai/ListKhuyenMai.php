<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh Sách Khuyến Mãi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-6">
                                <a href="<?= BASE_URL_ADMIN ?>?act=form-them-khuyenMai" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Thêm Khuyến Mãi
                                </a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã KM</th>
                                        <th>Mô tả</th>
                                        <th>Loại</th>
                                        <th>Giá trị </th>
                                        <th>Điều kiện tối thiểu</th>
                                        <th>Số lần sử dụng tối đa</th>
                                        <th>Số lần đã sử dụng </th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Trạng thái</th>
                                        <th>Tài khoản</th>
                                        <th>Thao tác</th>
                                        
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
                                            <td><?= $khuyenMai['ten_tai_khoan'] ?></td>
                                            <td><?= $khuyenMai['trang_thai'] == 1 ? 'Hoạt động' : 'Ngừng' ?></td>
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
