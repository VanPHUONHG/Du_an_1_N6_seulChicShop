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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body row">
                                <!-- Thông tin sản phẩm chính -->
                                <div class="col-md-12">
                                    <h4>Thông tin sản phẩm chính</h4>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                        <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Giá tiền</label>
                                            <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                            <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                            <?php  } ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Giá khuyến mãi</label>
                                            <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="hinh_anh">
                                            <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                            <?php  } ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Số lượng</label>
                                            <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                                            <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                            <?php  } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Danh mục</label>
                                            <select class="form-control" name="danh_muc_id">
                                                <option selected disabled>Chọn danh mục sản phẩm</option>
                                                <?php foreach ($listCategory as $danhMuc) : ?>
                                                    <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                            <?php  } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="form-control" name="trang_thai">
                                            <option value="1">Còn hàng</option>
                                            <option value="2">Hết hàng</option>
                                        </select>
                                        <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="mo_ta">Mô tả</label>
                                        <textarea id="mo_ta" class="form-control" name="mo_ta" placeholder="Nhập mô tả"></textarea>
                                    </div>
                                </div>

                                <!-- Biến thể sản phẩm -->
                                <div class="col-md-12 mt-4">
                                    <h4>Biến thể sản phẩm</h4>
                                    <div id="variants-container">
                                        <div class="variant-item border p-3 mb-3">
                                            <div class="row">
                                                <div class="form-group col-3">
                                                    <label>Màu sắc</label>
                                                    <input type="text" class="form-control" name="variant_name" placeholder="Nhập màu sắc">
                                                </div>
                                                <div class="form-group col-3">
                                                    <label>Kích thước</label>
                                                    <input type="text" class="form-control" name="variant_size" placeholder="Nhập kích thước">
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>Giá</label>
                                                    <input type="number" class="form-control" name="variant_price" placeholder="Nhập giá">
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>Số lượng</label>
                                                    <input type="number" class="form-control" name="variant_quantity" placeholder="Nhập số lượng">
                                                </div>
                                                <div class="form-group col-2">
                                                    <label>Hình ảnh</label>
                                                    <input type="file" class="form-control" name="variant_image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-info" id="add-variant">Thêm biến thể</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
                            </div>
                        </form>
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

        // Xử lý thêm biến thể
        $('#add-variant').click(function() {
            var variantHtml = `
                <div class="variant-item border p-3 mb-3">
                    <div class="row">
                        <div class="form-group col-3">
                            <label>Màu sắc</label>
                            <input type="text" class="form-control" name="variant_names[]" placeholder="Nhập màu sắc">
                        </div>
                        <div class="form-group col-3">
                            <label>Kích thước</label>
                            <input type="text" class="form-control" name="variant_sizes[]" placeholder="Nhập kích thước">
                        </div>
                        <div class="form-group col-2">
                            <label>Giá</label>
                            <input type="number" class="form-control" name="variant_prices[]" placeholder="Nhập giá">
                        </div>
                        <div class="form-group col-2">
                            <label>Số lượng</label>
                            <input type="number" class="form-control" name="variant_quantities[]" placeholder="Nhập số lượng">
                        </div>
                        <div class="form-group col-2">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="variant_images[]">
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger remove-variant mt-2">Xóa biến thể</button>
                </div>
            `;
            $('#variants-container').append(variantHtml);
        });

        // Xử lý xóa biến thể
        $(document).on('click', '.remove-variant', function() {
            $(this).closest('.variant-item').remove();
        });
    });
</script>
</body>
</html>