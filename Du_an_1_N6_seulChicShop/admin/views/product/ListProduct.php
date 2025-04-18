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
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); 
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham'  ?>" class="btn btn-success"><i class="fas fa-plus"></i>Thêm sản phẩm</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listProduct as $key => $product): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $product['ten_san_pham'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $product['hinh_anh'] ?>" style="width:100px" alt=""
                                                        onerror="this.onerror=null; this.src='<?= BASE_URL ?>assets/images/product-09.jpg'">
                                            </td>
                                            <td><?= number_format($product['gia_san_pham']).'đ' ?></td>
                                            <td><?= $product['gia_san_pham_khuyen_mai'] > 0 ? number_format($product['gia_san_pham_khuyen_mai']).'đ' : '0đ' ?></td>
                                            <td><?= $product['so_luong'] ?></td>
                                            <td><?= $product['ten_danh_muc'] ?></td>
                                            <td><?= $product['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN.'?act=chi-tiet-san-pham&id_san_pham=' . $product['id'] ?>" class="btn btn-warning">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN.'?act=form-sua-san-pham&id_san_pham='. $product['id'] ?>" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $product['id'] ?>" 
                                                   onclick="return confirm('Bạn có chắc chắn xóa không')" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

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