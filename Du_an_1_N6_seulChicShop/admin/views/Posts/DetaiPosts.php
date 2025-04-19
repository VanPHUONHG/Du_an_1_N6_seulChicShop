<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/posts.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h1>Chi Tiết Posts</h1>
                </div>
                <div class="">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-Posts' ?>" class="btn btn-secondary"><i
                            class="fas fa-arrow-left"></i> Quay Lại</a>
                </div>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <th>Tiêu Đề</th>
                                        <th>Bài viết</th>
                                        <th>Tác giả</th>
                                        <th>Ngày Tạo</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>
                                            <img src="<?= BASE_URL . $Posts['hinh_anh'] ?>" style="width:200px"
                                                alt=""
                                                onerror="this.src='https://cdn.khamphadanang.vn/wp-content/uploads/2022/12/cua-hang-ban-do-luu-niem-da-nang-15.jpg%22'">
                                        </td>
                                        <td><?= $Posts['tieu_de'] ?></td>
                                        <td><?= $Posts['bai_viet'] ?></td>
                                        <td><?= $Posts['tac_gia'] ?></td>
                                        <td><?= $Posts['ngay_tao_bai_viet'] ?></td>
                                        <td><?= $Posts['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
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
    $(function () {
        $(" #example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching":
                false, "paging": false, "info": false
        });
    }); </script>
</body>

</html>