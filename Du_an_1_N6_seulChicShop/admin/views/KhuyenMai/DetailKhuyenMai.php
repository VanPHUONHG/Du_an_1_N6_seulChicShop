<!-- header  -->
<?php require './views/layout/header.php'; ?>
<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/khuyenmai.css">
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
            <div class="promotion-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1><i class="fas fa-info-circle"></i> Chi Tiết Khuyến Mãi</h1>
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-khuyenMai' ?>" class="btn btn-light">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-section">
                                <h4>Thông tin cơ bản</h4>
                                <p><strong>Mã khuyến mãi:</strong> <?= $khuyenMai['ma_khuyen_mai'] ?></p>
                                <p><strong>Mô tả:</strong> <?= $khuyenMai['mo_ta'] ?></p>
                                <p><strong>Loại giảm giá:</strong> <?= $khuyenMai['loai'] ?></p>
                                <p><strong>Giá trị giảm:</strong> <?= $khuyenMai['gia_tri'] ?></p>
                                <p><strong>Điều kiện tối thiểu:</strong> <?= $khuyenMai['dieu_kien_toi_thieu'] ?></p>
                                <p><strong>Số lượng tối đa:</strong> <?= $khuyenMai['so_lan_su_dung'] ?></p>
                                <p><strong>Số lượng đã dùng:</strong> <?= $khuyenMai['so_lan_da_dung'] ?></p>
                                <p><strong>Ngày bắt đầu:</strong> <?= $khuyenMai['ngay_bat_dau'] ?></p>
                                <p><strong>Ngày kết thúc:</strong> <?= $khuyenMai['ngay_ket_thuc'] ?></p>
                                <p><strong>Trạng thái:</strong> <?= $khuyenMai['trang_thai'] == 1 ? 'Hoạt động' : 'Ngừng' ?></p>
                                <p><strong>Tài khoản:</strong> <?= $khuyenMai['ten_tai_khoan'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-section">
                                <h4>Thông tin áp dụng</h4>
                                <!-- ... other details ... -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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