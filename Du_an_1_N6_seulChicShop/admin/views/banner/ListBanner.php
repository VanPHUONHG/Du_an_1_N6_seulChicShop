<!-- Include header layout file -->
<?php include './views/layout/header.php'; ?>

<!-- Include navigation bar layout file -->
<?php include './views/layout/navbar.php'; ?>

<!-- Include sidebar layout file -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Custom CSS -->
<style>
    .banner-dashboard {
        padding: 30px;
        background-color: #f8f9fa;
        min-height: calc(100vh - 120px);
    }

    .banner-header {
        background: linear-gradient(120deg, #2b4c7e 0%, #1a365d 100%);
        color: white;
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .banner-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        border: none;
        margin-bottom: 30px;
        overflow: hidden;
    }

    .btn-add-banner {
        background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-add-banner:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        color: white;
        text-decoration: none;
    }

    .banner-table {
        width: 100%;
        margin-top: 25px;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .banner-table th {
        background: #f1f5f9;
        color: #334155;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 13px;
        padding: 18px;
        border: none;
    }

    .banner-table td {
        padding: 15px;
        vertical-align: middle;
        background: white;
        border-top: 1px solid #e9ecef;
        border-bottom: 1px solid #e9ecef;
    }

    .banner-table tr:hover td {
        background: #f8f9fa;
    }

    .banner-image {
        width: 220px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .banner-image:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .banner-status {
        padding: 8px 15px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 500;
        display: inline-block;
    }

    .status-active {
        background-color: #e6f4ea;
        color: #1e7e34;
    }

    .status-inactive {
        background-color: #fbe9e7;
        color: #d32f2f;
    }

    .banner-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-start;
    }

    .btn-action {
        padding: 10px;
        border-radius: 8px;
        border: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
    }

    .btn-view {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .btn-edit {
        background-color: #e8f5e9;
        color: #2e7d32;
    }

    .btn-delete {
        background-color: #fce4ec;
        color: #c2185b;
    }

    .btn-action:hover {
        transform: translateY(-2px);
    }

    .btn-view:hover {
        background-color: #1976d2;
        color: white;
    }

    .btn-edit:hover {
        background-color: #2e7d32;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c2185b;
        color: white;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 8px 12px;
        margin-left: 8px;
    }

    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 6px 10px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 8px;
        padding: 8px 15px;
        margin: 0 3px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #2b4c7e;
        border-color: #2b4c7e;
        color: white !important;
    }
</style>

<!-- Main content wrapper -->
<div class="content-wrapper">
    <!-- Content header section -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Quản Lý Banner</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content section -->
    <section class="content">
        <div class="container-fluid">
            <div class="banner-dashboard">
                <div class="banner-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-0">Danh Sách Banner</h1>
                        <a href="<?= BASE_URL_ADMIN ?>?act=form-them-banner" class="btn-add-banner">
                            <i class="fas fa-plus"></i>
                            Thêm Banner Mới
                        </a>
                    </div>
                </div>

                <div class="banner-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="banner-table table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($BannerProduct as $key => $banner): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td class="font-weight-medium"><?= htmlspecialchars($banner['tieu_de']) ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . $banner['hinh_anh_url'] ?>" 
                                                     class="banner-image"
                                                     alt="<?= htmlspecialchars($banner['tieu_de']) ?>">
                                            </td>
                                            <td>
                                                <span class="banner-status <?= $banner['trang_thai'] == 1 ? 'status-active' : 'status-inactive' ?>">
                                                    <?= $banner['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?>
                                                </span>
                                            </td>
                                            <td><?= formatDate($banner['ngay_tao']) ?></td>
                                            <td>
                                                <div class="banner-actions">
                                                    <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-banner&id=' . $banner['id'] ?>" 
                                                       class="btn-action btn-view" title="Xem chi tiết">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-banner&id=<?= $banner['id'] ?>" 
                                                       class="btn-action btn-edit" title="Chỉnh sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button onclick="deleteBanner(<?= $banner['id'] ?>)" 
                                                            class="btn-action btn-delete" title="Xóa">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
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

<!-- DataTables initialization script -->
<script>
    function deleteBanner(id) {
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: "Bạn có chắc chắn muốn xóa banner này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `<?= BASE_URL_ADMIN ?>?act=xoa-banner&id=${id}`;
            }
        })
    }

    $(document).ready(function() {
        $('.banner-table').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 10,
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
                "zeroRecords": "Không tìm thấy banner nào"
            }
        });
    });
</script>
</body>
</html>