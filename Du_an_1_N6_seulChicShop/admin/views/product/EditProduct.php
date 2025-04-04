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
                    <h1>Sửa thông tin sản phẩm: <?= $Product['ten_san_pham'] ?></h1>
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Quay lại</a>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">

                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="san_pham_id" value="<?= $Product['id'] ?>">
                                <label for="ten_san_pham">Tên sản phẩm</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $Product['ten_san_pham'] ?>">
                                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="gia_san_pham">Giá sản phẩm</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $Product['gia_san_pham'] ?>">

                            </div>
                            <div class="form-group">
                                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $Product['gia_khuyen_mai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="so_luong">Số lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $Product['so_luong'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="ngay_nhap">Ngày nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $Product['ngay_nhap'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Danh mục sản phẩm</label>
                                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                    <?php foreach ($listCategory as $Category) : ?>
                                        <option <?= $Category['id'] == $Product['danh_muc_id'] ? 'selected' : '' ?> value="<?= $Category['id']; ?>"><?= $Category['ten_danh_muc']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="trang_thai">Trạng thái sản phẩm</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                    <option <?= $Product['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn hàng</option>
                                    <option <?= $Product['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Hết hàng</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả sản phẩm</label>
                                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $Product['mo_ta'] ?></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                        </div>
                </div>
                </form>
                <!-- /.card -->
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

</body>

<script>
    var faqs_row = <?= count($listAnhProduct); ?>;

    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="https://tse2.mm.bing.net/th?id=OIP.DAwq4ufTfSCkcq3O8q_6AgHaHa&pid=Api&P=0&h=180" style="width:50px; height: 50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img_delete')
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>

</html>