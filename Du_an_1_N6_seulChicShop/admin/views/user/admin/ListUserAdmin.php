<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>
<style>
.content-wrapper {
    background: #f8f9fc;
    padding: 20px;
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(45deg, #4e73df, #36b9cc);
    color: white;
    border-radius: 15px 15px 0 0;
    padding: 20px;
}

.card-header h3 {
    margin: 0;
    font-size: 1.5rem;
}

.card-header .fas {
    margin-right: 10px;
}

.btn-primary {
    background: #1cc88a;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    transition: all 0.3s;
}

.btn-primary:hover {
    background: #169e6c;
    transform: translateY(-2px);
}

.table {
    margin-top: 20px;
}

.table thead th {
    background: #f8f9fc;
    color: #4e73df;
    font-weight: 600;
    border: none;
}

.table tbody tr {
    transition: all 0.3s;
}

.table tbody tr:hover {
    background: #f3f4f8;
    transform: scale(1.01);
}

.avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #4e73df;
}

.badge {
    padding: 8px 12px;
    border-radius: 20px;
    font-weight: 500;
}

.badge-success {
    background: #1cc88a;
}

.badge-danger {
    background: #e74a3b;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.btn-action {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: all 0.3s;
}

.btn-view {
    background: #4e73df;
}

.btn-edit {
    background: #1cc88a;
}

.btn-action:hover {
    transform: scale(1.1);
    color: white;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 8px 16px;
    margin: 0 5px;
    border-radius: 5px;
    border: none !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #4e73df !important;
    color: white !important;
    border: none !important;
}

.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #d1d3e2;
    border-radius: 8px;
    padding: 8px 12px;
}
</style>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card mb-4 animate__animated animate__fadeIn">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>
                        <i class="fas fa-users fa-sm"></i>
                        Quản lý Tài khoản Admin
                    </h3>
                    <a href="<?= BASE_URL_ADMIN ?>?act=form-them-tai-khoan-admin" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Thêm Admin
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="adminTable">
                        <thead>
                            <tr>
                                <th style="width: 5%">STT</th>
                                <th style="width: 20%">Tên tài khoản</th>
                                <th style="width: 25%">Email</th>
                                <th style="width: 10%">Ảnh</th>
                                <th style="width: 15%">Số điện thoại</th>
                                <th style="width: 15%">Trạng thái</th>
                                <th style="width: 10%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listUser as $key => $user): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= htmlspecialchars($user['ten_tai_khoan']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td>
                                    <img src="<?= BASE_URL . $user['anh_dai_dien'] ?>" 
                                         class="avatar"
                                         alt="Avatar"
                                         onerror="this.src='<?= BASE_URL ?>assets/images/product-01.jpg'">
                                </td>
                                <td><?= htmlspecialchars($user['so_dien_thoai']) ?></td>
                                <td>
                                    <span class="badge <?= $user['trang_thai'] == 1 ? 'badge-success' : 'badge-danger' ?>">
                                        <?= $user['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="<?= BASE_URL_ADMIN ?>?act=chi-tiet-tai-khoan-admin&id_tai_khoan_admin=<?= $user['id'] ?>" 
                                           class="btn-action btn-view" title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= BASE_URL_ADMIN ?>?act=form-sua-tai-khoan-admin&id_tai_khoan_admin=<?= $user['id'] ?>" 
                                           class="btn-action btn-edit" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#adminTable').DataTable({
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json"
        },
        "pageLength": 10,
        "order": [[0, "asc"]],
        "columnDefs": [
            { "orderable": false, "targets": [3, 6] }
        ],
        "dom": '<"top"f>rt<"bottom"lip><"clear">'
    });
});
</script>

<?php include './views/layout/footer.php'; ?>