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
            <div class="row mb-2">
                <div class="d-flex justify-content-between">
                    <h1>Xem chi tiết sản phẩm</h1>
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img style="width:400px; height: 400px" src="<?= BASE_URL . $Product['hinh_anh'] ?>"
                                class="Product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Tên sản phẩm: <?= $Product['ten_san_pham'] ?></h3>
                        <hr>
                        <h4 class="mt-3">Giá tiền: <?= $Product['gia_san_pham'] ?></h4>
                        <h4 class="mt-3">Giá khuyến mãi: <?= $Product['gia_khuyen_mai'] ?></h4>
                        <h4 class="mt-3">Số lượng: <?= $Product['so_luong'] ?></h4>
                        <!-- <h4 class="mt-3">Lượt xem: <?= $Product['luot_xem'] ?></h4> -->
                        <h4 class="mt-3">Ngày nhập: <?= $Product['ngay_nhap'] ?></h4>
                        <h4 class="mt-3">Danh mục: <?= $Product['ten_danh_muc'] ?></h4>
                        <h4 class="mt-3">Trạng thái: <?= $Product['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></h4>
                        <h4 class="mt-3">Mô tả: <?= $Product['mo_ta'] ?></h4>


                    </div>
                    <div class="col-12">
                        <h2>Lịch sử bình luận</h2>
                        <div>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listComment as $key => $comment): ?>

                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <a target="_blank"
                                                    href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $comment['tai_khoan_id'] ?>">
                                                    <?= $comment['ho_ten'] ?>
                                                </a>
                                            </td>
                                            <td><?= $comment['noi_dung'] ?></td>
                                            <td><?= $comment['ngay_dang'] ?></td>
                                            <td><?= $comment['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id=' . $comment['id']  ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                    Xóa bình luận
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

<!-- Page specific script -->
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
<!-- Code injected by live-server -->

</body>
<script>
    $(document).ready(function() {
        $('.Product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.Product-image').prop('src', $image_element.attr('src'))
            $('.Product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

</html>