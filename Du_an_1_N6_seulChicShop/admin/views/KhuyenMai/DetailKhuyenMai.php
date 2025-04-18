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
                    <h1>Xem chi tiết khuyến mại</h1>
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-khuyenMai' ?>" class="btn btn-secondary">Quay lại</a>
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
                        <h3 class="my-3">Mã khuyến mại: <?= $khuyenMai['ma_khuyen_mai'] ?></h3>
                        <hr>
                        <h4 class="mt-3">Mô tả: <?= $khuyenMai['mo_ta'] ?></h4>
                        <h4 class="mt-3">Loại giảm giá : <?= $khuyenMai['loai'] ?></h4>
                        <h4 class="mt-3">giá trị giảm : <?= $khuyenMai['gia_tri'] ?></h4>
                        <h4 class="mt-3">Điều kiện tối thiểu: <?= $khuyenMai['dieu_kien_toi_thieu'] ?></h4>
                        <h4 class="mt-3">Số lượng tối đa : <?= $khuyenMai['so_lan_su_dung'] ?></h4>
                        <h4 class="mt-3">Số lượng đã dùng : <?= $khuyenMai['so_lan_da_dung']?></h4>
                        <h4 class="mt-3">Ngày bắt đầu  : <?= $khuyenMai['ngay_bat_dau'] ?></h4>
                        <h4 class="mt-3">Ngày kết thúc : <?= $khuyenMai['ngay_ket_thuc'] ?></h4>
                        <h4 class="mt-3">Trạng thái: <?= $khuyenMai['trang_thai'] == 1 ? 'Hoạt động' : 'Ngừng'  ?></h4>
                        <h4 class="mt-3">Tài khoản: <?= $khuyenMai['ten_tai_khoan'] ?></h4>


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