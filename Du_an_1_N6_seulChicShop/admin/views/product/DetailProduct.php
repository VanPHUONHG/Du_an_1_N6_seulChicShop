<!-- Header -->
<?php include './views/layout/header.php'; ?>
<style>
.content-wrapper {
    background-color: #f8f9fa;
    padding: 30px;
}

.card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.product-details {
    padding: 40px;
}

.product-image {
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}

.product-image:hover {
    transform: scale(1.02);
}

.product-info {
    padding: 30px;
    background: linear-gradient(to right bottom, #ffffff, #f8f9fa);
    border-radius: 15px;
}

.product-info h3 {
    color: #2c3e50;
    margin-bottom: 25px;
    font-weight: 600;
    font-size: 2rem;
}

.table {
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
}

.table th {
    background: linear-gradient(135deg, #3498db, #2c3e50);
    color: white;
    font-weight: 500;
    border: none;
    padding: 15px;
}

.table td {
    padding: 15px;
    vertical-align: middle;
}

.badge {
    padding: 10px 15px;
    border-radius: 25px;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.badge-success {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
}

.badge-danger {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.variant-section, .comment-section {
    margin-top: 50px;
    padding: 30px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.btn {
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 500;
    transition: all 0.3s;
    border: none;
}

.btn-primary {
    background: linear-gradient(135deg, #3498db, #2980b9);
}

.btn-secondary {
    background: linear-gradient(135deg, #95a5a6, #7f8c8d);
}

.btn-success {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
}

.btn-danger {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.btn i {
    margin-right: 8px;
}

.img-thumbnail {
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.img-thumbnail:hover {
    transform: scale(1.1);
}

.table-responsive {
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
}

.btn-group {
    gap: 8px;
}

.fa-star {
    color: #f1c40f;
}

/* Animation for alerts */
.alert {
    animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #3498db, #2c3e50);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #2980b9, #2c3e50);
}
</style>
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
                    <h1 class="text-primary">Chi tiết sản phẩm</h1>
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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Thông tin chi tiết</h3>
                            <a href="<?= BASE_URL_ADMIN . '?act=san-pham'  ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>Quay lại
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body product-details">
                            <!-- Thông tin sản phẩm chính -->
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?= $Product[0]['hinh_anh'] ? BASE_URL . $Product[0]['hinh_anh'] : BASE_URL . 'assets/images/product-05.jpg' ?>" class="img-fluid product-image" alt="Product Image">
                                </div>
                                <div class="col-md-6 product-info">
                                    <h3><?= $Product[0]['ten_san_pham'] ?></h3>
                                    <table class="table table-hover">
                                        <?php if($Product[0]['bien_the_id'] == null): ?>
                                            <?php if($Product[0]['gia_san_pham'] != null): ?>
                                            <tr>
                                                <th width="30%">Giá bán:</th>
                                                <td><?= number_format($Product[0]['gia_san_pham']) ?> VNĐ</td>
                                            </tr>
                                            <?php if($Product[0]['gia_san_pham_khuyen_mai'] != null): ?>
                                            <tr>
                                                <th>Giá khuyến mãi:</th>
                                                <td class="text-danger"><?= number_format($Product[0]['gia_san_pham_khuyen_mai']) ?> VNĐ</td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <tr>
                                            <th>Giá nhập:</th>
                                            <td><?= number_format($Product[0]['gia_nhap']) ?> VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th>Số lượng:</th>
                                            <td><?php
                                                $total = 0;
                                                foreach ($Product as $item) {
                                                    $total += $item['so_luong'];
                                                }
                                                echo $total;
                                            ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày nhập:</th>
                                            <td><?= date('d/m/Y', strtotime($Product[0]['ngay_nhap'])) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Danh mục:</th>
                                            <td><?= $Product[0]['ten_danh_muc'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái:</th>
                                            <td><span class="badge <?= $Product[0]['trang_thai'] == 1 ? 'badge-success' : 'badge-danger' ?>">
                                                <?= $Product[0]['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?>
                                            </span></td>
                                        </tr>
                                    </table>
                                    <div class="mt-4">
                                        <h5 class="text-primary">Mô tả:</h5>
                                        <p class="text-muted"><?=$Product[0]['mo_ta'] ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Biến thể sản phẩm -->
                            <div class="variant-section">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="text-primary">Biến thể sản phẩm</h4>
                                    <a href="<?= BASE_URL_ADMIN . '?act=form-them-bien-the-san-pham&id_san_pham=' . $Product[0]['id'] ?>" class="btn btn-success">
                                        <i class="fas fa-plus mr-2"></i>Thêm biến thể
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="color: white">Màu sắc</th>
                                                <th style="color: white">Kích thước</th>
                                                <th style="color: white">Giá</th>
                                                <th style="color: white">Giá khuyến mãi</th>
                                                <th style="color: white">Giá nhập</th>
                                                <th style="color: white">Số lượng</th>
                                                <th style="color: white">Hình ảnh</th>
                                                <th style="color: white">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($Product as $variant): ?>
                                                <?php if (!empty($variant['bien_the_id'])): ?>
                                                <tr>
                                                    <td><?= $variant['mau_sac'] ?></td>
                                                    <td><?= $variant['kich_thuoc'] ?></td>
                                                    <td><?= number_format($variant['gia_san_pham'], 0, ',', '.') ?> VNĐ</td>
                                                    <td><?= $variant['gia_khuyen_mai'] ? number_format($variant['gia_khuyen_mai'], 0, ',', '.') . ' VNĐ' : 'Không có' ?></td>
                                                    <td><?= number_format($variant['gia_nhap'], 0, ',', '.') ?> VNĐ</td>
                                                    <td><?= $variant['so_luong'] ?></td>
                                                    <td>
                                                        <img src="<?= BASE_URL . $variant['hinh_anh'] ?>" alt="Variant Image" class="img-thumbnail" style="max-width: 100px;">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-bien-the&id_bien_the=' . $variant['bien_the_id'] ?>" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="<?= BASE_URL_ADMIN . '?act=xoa-bien-the&id_bien_the=' . $variant['bien_the_id'] . '&id_san_pham=' . $Product[0]['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa biến thể này không?')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Lịch sử bình luận -->
                            <div class="comment-section">
                                <h4 class="text-primary mb-4">Lịch sử bình luận</h4>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Khách hàng</th>
                                            <th>Nội dung</th>
                                            <th>Số sao</th>
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
                                                    <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $comment['tai_khoan_id'] ?>" target="_blank">
                                                        <?= htmlspecialchars($comment['ten_tai_khoan']) ?>
                                                    </a>
                                                </td>
                                                <td><?= nl2br(htmlspecialchars($comment['noi_dung'])) ?></td>
                                                <td>
                                                    <?php
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $comment['danh_gia']) {
                                                            echo '<i class="fas fa-star text-warning"></i>';
                                                        } else {
                                                            echo '<i class="far fa-star text-warning"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= date('d/m/Y H:i', strtotime($comment['ngay_dang'])) ?></td>
                                                <td><span class="badge <?= $comment['trang_thai'] == 1 ? 'badge-success' : 'badge-danger' ?>">
                                                    <?= $comment['trang_thai'] == 1 ? 'Đã duyệt' : 'Chờ duyệt' ?>
                                                </span></td>
                                                <td>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id=' . $comment['id'] ?>" 
                                                       class="btn btn-danger btn-sm"
                                                       onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
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
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json"
            }
        });
    });
</script>