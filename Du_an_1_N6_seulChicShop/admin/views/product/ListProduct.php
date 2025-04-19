<!-- Header -->
<?php include './views/layout/header.php'; ?>
<style>
.content-wrapper {
    background-color: #f8f9fa;
    padding: 20px;
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(135deg, #2C3E50 0%, #3498DB 100%);
    border-radius: 15px 15px 0 0 !important;
    padding: 20px;
}

.btn-success {
    background: #2ecc71;
    border: none;
    padding: 10px 20px;
    transition: all 0.3s;
}

.btn-success:hover {
    background: #27ae60;
    transform: translateY(-2px);
}

.table {
    margin-top: 20px;
}

.table thead th {
    background: #f1f3f4;
    color: #2C3E50;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    padding: 15px;
}

.table tbody td {
    padding: 15px;
    vertical-align: middle;
}

.table img {
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.table img:hover {
    transform: scale(1.05);
}

.btn {
    padding: 8px 12px;
    margin: 0 3px;
    border-radius: 6px;
}

.alert {
    border-radius: 10px;
    margin-bottom: 20px;
    padding: 15px;
    border: none;
}

.alert-success {
    background-color: rgba(46, 204, 113, 0.1);
    color: #2ecc71;
    border-left: 4px solid #2ecc71;
}

.alert-danger {
    background-color: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
    border-left: 4px solid #e74c3c;
}
</style>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-primary">Quản lý sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title text-white mb-0">Danh sách sản phẩm</h3>
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham'  ?>" class="btn btn-success">
                                <i class="fas fa-plus mr-2"></i>Thêm sản phẩm
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá nhập</th>
                                        <th>Giá bán</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Số lượng</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($listProduct)): ?>
                                        <?php foreach ($listProduct as $key => $product): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td class="font-weight-bold"><?= $product['ten_san_pham'] ?></td>
                                                <td>
                                                    <img src="<?= BASE_URL . $product['hinh_anh'] ?>" 
                                                         style="width:100px; height:100px; object-fit:cover;" 
                                                         alt="<?= $product['ten_san_pham'] ?>"
                                                         onerror="this.onerror=null; this.src='<?= BASE_URL ?>assets/images/product-09.jpg'">
                                                </td>
                                                <td><?= number_format($product['gia_nhap']).'đ' ?></td>
                                                <td><?= number_format($product['gia_san_pham']).'đ' ?></td>
                                                <td><?= $product['gia_san_pham_khuyen_mai'] > 0 ? number_format($product['gia_san_pham_khuyen_mai']).'đ' : '0đ' ?></td>
                                                <td><?= $product['so_luong'] ?></td>
                                                <td><?= $product['ten_danh_muc'] ?></td>
                                                <td>
                                                    <span class="badge badge-<?= $product['trang_thai'] == 1 ? 'success' : 'danger' ?>">
                                                        <?= $product['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng' ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= BASE_URL_ADMIN.'?act=chi-tiet-san-pham&id_san_pham=' . $product['id'] ?>" 
                                                           class="btn btn-warning" title="Xem chi tiết">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                        <a href="<?= BASE_URL_ADMIN.'?act=form-sua-san-pham&id_san_pham='. $product['id'] ?>" 
                                                           class="btn btn-primary" title="Chỉnh sửa">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $product['id'] ?>" 
                                                           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" 
                                                           class="btn btn-danger" title="Xóa">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">Không có sản phẩm nào</td>
                                        </tr>
                                    <?php endif; ?>
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
            "pageLength": 5,
            "autoWidth": false,
            "language": {
                "search": "Tìm kiếm:",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối", 
                    "next": "Sau",
                    "previous": "Trước"
                },
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                "zeroRecords": "Không tìm thấy dữ liệu phù hợp"
            }
        });

        // Auto hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    });
</script>
</body>
</html>