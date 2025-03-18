<?php
require_once './views/layout/header.php';
require_once './views/layout/sidebar.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý hình ảnh</h1>
                </div>
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
                            <h3 class="card-title">Danh sách hình ảnh sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($imageProduct as $key => $item): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $item['hinh_anh'] ?>" width="100px" height="100px"
                                                    alt="">
                                            </td>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách hình ảnh tài khoản</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên người dùng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($imageAccount as $key => $item): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $item['anh_dai_dien'] ?>" width="100px"
                                                    height="100px" alt="">
                                            </td>
                                            <td><?= $item['ten_tai_khoan'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
require_once './views/layout/footer.php';
?>