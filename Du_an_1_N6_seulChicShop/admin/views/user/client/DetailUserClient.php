<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h1>Tài Khoản Admin</h1>
                </div>
                <div class="">
                    <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-khach-hang'  ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay Lại</a>
                </div>
            </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-busered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên Tài Khoản</th>
                                        <th>Email</th>
                                        <th>Mật Khẩu</th>
                                        <th>Ảnh Đại Diện</th>
                                        <th>Số điện Thoại</th>
                                        <th>Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><?= $user['ten_tai_khoan'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['mat_khau'] ?></td>
                                        <td>
                                            <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>" style="width:100px" alt=""
                                                onerror="this.onerror=null; this.src='https://tse2.mm.bing.net/th?id=OIP.DAwq4ufTfSCkcq3O8q_6AgHaHa&pid=Api&P=0&h=180'">
                                        </td>

                                        <td><?= $user['so_dien_thoai'] ?></td>
                                        <td><?= $user['ngay_tao'] ?></td>
                                    </tr>
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
            "usering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>