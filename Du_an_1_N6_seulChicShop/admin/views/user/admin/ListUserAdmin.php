<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tài Khoản Admin</h1>
                </div>
            </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-tai-khoan-admin'  ?>" class="btn btn-success"><i class="fas fa-add"></i>Thêm Tài Khoản</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-busered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Tài Khoản</th>
                                        <th>Email</th>
                                        <th>Ảnh Đại Diện</th>
                                        <th>Số điện Thoại</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listUser as $key => $user): ?>

                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $user['ten_tai_khoan'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>" style="width:100px" alt=""
                                                    onerror="this.onerror=null; this.src='https://tse2.mm.bing.net/th?id=OIP.DAwq4ufTfSCkcq3O8q_6AgHaHa&pid=Api&P=0&h=180'">
                                            </td>

                                            <td><?= $user['so_dien_thoai'] ?></td>
                                            <td><?= $user['ngay_tao'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-tai-khoan-admin&id_tai_khoan_admin=' . $user['id'] ?>"><button class="btn btn-warning"><i class="far fa-eye"></i></button></a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=sua-tai-khoan-admin&id_tai_khoan_admin=' . $user['id'] ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i><!-- Icon Sửa --></button></a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-tai-khoan-admin&id_tai_khoan_admin=' . $user['id'] ?>"><button class="btn btn-danger"><i class="fas fa-trash"></i> <!-- Icon xóa --></button></a>

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