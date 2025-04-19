<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper bg-light">
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-envelope me-2 text-primary"></i>
                    Danh Sách Liên Hệ
                </h1>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-hover table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center" width="5%">ID</th>
                                    <th width="10%">Tài Khoản</th>
                                    <th width="12%">Họ Tên</th>
                                    <th width="12%">Email</th>
                                    <th width="10%">Số Điện Thoại</th>
                                    <th width="12%">Tiêu Đề</th>
                                    <th width="15%">Nội Dung</th>
                                    <th width="10%">Thời Gian Gửi</th>
                                    <th width="7%">Trạng Thái</th>
                                    <th width="12%">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listContact as $key => $contact): ?>
                                    <tr>
                                        <td class="text-center"><?= $key + 1 ?></td>
                                        <td><?= $contact['ten_tai_khoan'] ?? '<span class="text-muted">Khách vãng lai</span>' ?></td>
                                        <td><?= htmlspecialchars($contact['ho_ten']) ?></td>
                                        <td><?= htmlspecialchars($contact['email']) ?></td>
                                        <td><?= htmlspecialchars($contact['so_dien_thoai']) ?></td>
                                        <td><?= htmlspecialchars($contact['tieu_de']) ?></td>
                                        <td>
                                            <div class="text-truncate" style="max-width: 200px;" title="<?= htmlspecialchars($contact['noi_dung']) ?>">
                                                <?= htmlspecialchars($contact['noi_dung']) ?>
                                            </div>
                                        </td>
                                        <td><?= date('d/m/Y H:i', strtotime($contact['thoi_gian_gui'])) ?></td>
                                        <td class="text-center">
                                            <span class="badge <?= $contact['trang_thai'] == 1 ? 'bg-success' : 'bg-warning' ?> rounded-pill px-3 py-2">
                                                <?= $contact['trang_thai'] == 1 ? 'Đã xử lý' : 'Chưa xử lý' ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= BASE_URL_ADMIN ?>?act=form-chinh-sua-lien-he&id=<?= $contact['id'] ?>"
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?php if ($contact['trang_thai'] == 1): ?>
                                                    <a href="<?= BASE_URL_ADMIN ?>?act=xoa-lien-he&id=<?= $contact['id'] ?>"
                                                       class="btn btn-sm btn-outline-danger" 
                                                       onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php endif; ?>
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
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "language": {
            "search": "Tìm kiếm:",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "Sau",
                "previous": "Trước"
            },
            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
            "infoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi",
            "zeroRecords": "Không tìm thấy bản ghi phù hợp"
        }
    });
});
</script>

<style>
.table th {
    font-weight: 600;
    background-color: #4e73df;
    color: white;
}

.table td {
    vertical-align: middle;
}

.badge {
    font-weight: 500;
}

.btn-group .btn {
    margin: 0 2px;
}

.text-truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

</body>
</html>