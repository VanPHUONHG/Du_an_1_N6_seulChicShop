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
                                                    onerror="this.onerror=null; this.src='https://tse2.mm.bing.net/th?id=OIP.DAwq4ufTfSCkcq3O8q_6AgHaHa&pid=Api&P=0&h=180'">
                                            </td>
                                            <td><?= $product['gia_san_pham'] ?></td>
                                            <td><?= $product['so_luong'] ?></td>
                                            <td><?= $product['ten_danh_muc'] ?></td>
                                            <td><?= $product['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $product['id'] ?>">
                                                    <button class="btn btn-warning"><i class="far fa-eye"></i><!-- Icon xem chi tiết --></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $product['id'] ?>"><button class="btn btn-primary"><i class="fas fa-edit"><!-- Icon sửa --></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $product['id'] ?>"
                                                    onclick="return confirm('Bạn có chắc chắn xóa không')"><button class="btn btn-danger"><i class="fas fa-trash"></i> <!-- Icon xóa --></button>

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