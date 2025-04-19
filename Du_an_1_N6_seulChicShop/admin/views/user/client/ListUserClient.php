<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <div class="client-dashboard">
        <div class="page-header bg-white shadow-sm rounded p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-users me-2 text-primary"></i>
                    Quản lý Tài khoản Khách hàng
                </h1>
                <a href="<?= BASE_URL_ADMIN ?>?act=form-them-tai-khoan-khach-hang" 
                   class="btn btn-primary btn-sm rounded-pill px-4 py-2 shadow-sm">
                    <i class="fas fa-plus me-2"></i>
                    <span>Thêm Khách hàng</span>
                </a>
            </div>
        </div>

        <div class="card shadow animate__animated animate__fadeIn">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover" id="example1">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3">STT</th>
                                <th class="py-3">Tên khách hàng</th>
                                <th class="py-3">Email</th>
                                <th class="py-3">Ảnh đại diện</th>
                                <th class="py-3">Số điện thoại</th>
                                <th class="py-3">Ngày tạo</th>
                                <th class="py-3">Trạng thái</th>
                                <th class="py-3">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listUserClient as $key => $user): ?>
                                <tr class="align-middle">
                                    <td><?= $key + 1 ?></td>
                                    <td class="fw-medium"><?= htmlspecialchars($user['ten_tai_khoan']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td>
                                        <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>" 
                                             class="rounded-circle"
                                             width="40"
                                             height="40"
                                             alt="<?= htmlspecialchars($user['ten_tai_khoan']) ?>">
                                    </td>
                                    <td><?= htmlspecialchars($user['so_dien_thoai']) ?></td>
                                    <td><?= date('d/m/Y', strtotime($user['ngay_tao'])) ?></td>
                                    <td>
                                        <?php if($user['trang_thai'] == 1): ?>
                                            <span class="badge bg-success rounded-pill px-3">Hoạt động</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger rounded-pill px-3">Không hoạt động</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= BASE_URL_ADMIN ?>?act=chi-tiet-tai-khoan-khach-hang&id_tai_khoan_client=<?= $user['id'] ?>" 
                                               class="btn btn-sm btn-info me-1" 
                                               title="Xem chi tiết">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-tai-khoan-khach-hang&id_tai_khoan_client=<?= $user['id'] ?>" 
                                               class="btn btn-sm btn-warning" 
                                               title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
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

<style>
.page-header h1 {
    font-size: 1.5rem;
    font-weight: 600;
}

.table th {
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    color: #555;
}

.table td {
    font-size: 0.9rem;
    color: #333;
}

.btn-group .btn {
    padding: 0.25rem 0.5rem;
    transition: all 0.2s;
}

.btn-group .btn:hover {
    transform: translateY(-1px);
}

.badge {
    font-weight: 500;
}
</style>

<script>
$(function() {
    $("#example1").DataTable({
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
            "zeroRecords": "Không tìm thấy dữ liệu phù hợp"
        },
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
    });
});
</script>
</body>
</html>