<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-2">
                <div class="col-sm-10">
                    <h1>Quản lý đơn hàng <?= $donHang['ma_don_hang'] ?></h1>
                </div>
                <div class="">
                    <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    
                    <div class="col-sm-5 mb-3">
                    <form action="" method="post">
                        <select name="" id="" class="form-group">
                            <?php foreach ($listTrangThaiOder as $key => $trangThai):  ?>
                                <option
                                <?=  $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected':'' ?> 
                                <?=  $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled':'' ?> 
                                
                                    value="<?= $trangThai['id']; ?>">
                                    <?= $trangThai['ten_trang_thai']; ?> </option>

                            <?php endforeach ?>
                        </select>
                    </form>
                </div>
                    
                        <?php
                        if ($donHang['trang_thai_id'] == 1) {
                            $colorAlerst = 'primary';
                        } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                            $colorAlerst = 'warning';
                        } elseif ($donHang['trang_thai_id'] == 10) {
                            $colorAlerst = 'success';
                        } else {
                            $colorAlerst = 'danger';
                        }
                        ?>
                        <div class="alert alert-<?= $colorAlerst; ?>" role="alert">
                            A simple primary alert—check it out!
                        </div>


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-cube"></i> SEUL CHIC SHOP.NHOM 6
                                        <small class="float-right">Date:
                                            <?=
                                            formatDate(($donHang['ngay_dat']));
                                            ?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Thông tin người đặt
                                    <address><br />
                                        <strong>Tên: <?= $donHang['ten_tai_khoan'] ?></strong><br>
                                        Email: <?= $donHang['email'] ?><br>
                                        SDT: <?= $donHang['so_dien_thoai'] ?><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Thông tin người nhận
                                    <address><br />
                                        <strong>Tên:<?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                        Email: <?= $donHang['email_nguoi_nhan'] ?> <br>
                                        SDT: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                        Địa Chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Thông tin
                                    <address><br />
                                        <strong>MDH:<?= $donHang['ma_don_hang'] ?></strong><br>
                                        Tổng tiền: <?= $donHang['tong_tien'] ?> <br>
                                        Ghi chú: <?= $donHang['ghi_chu'] ?><br>
                                        Thanh toán: <?= $donHang['ten_phuong_thuc'] ?> <br>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $tong_tien = 0; ?>
                                            <?php foreach ($sanPhamDonHang as $key => $sanPham): ?>

                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $sanPham['ten_san_pham'] ?></td>
                                                    <td><?= $sanPham['don_gia'] ?></td>
                                                    <td><?= $sanPham['so_luong'] ?></td>
                                                    <td><?= $sanPham['thanh_tien'] ?></td>
                                                </tr>
                                                <?php $tong_tien += $sanPham['thanh_tien']; ?>

                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <!-- /.col -->
                                <div class="col-6">
                                    <strong class="text-danger" style="font-size: 25px;">Order Date: <?= formatDate(($donHang['ngay_dat'])) ?></strong>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td><?= number_format($tong_tien) ?> VND</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping Fee:</th>
                                                <td><?= number_format(20000) ?> VND</td>
                                            </tr>
                                            <tr>
                                                <th>Pay:</th>
                                                <td><?= number_format($tong_tien + 20000) ?> VND</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->

                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </section>


</div>
<?php include './views/layout/footer.php'; ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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