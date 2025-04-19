<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/order.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h1 class="text-gradient">Quản Lý Đơn Hàng</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="filterName" class="form-control custom-input" placeholder="Tìm theo tên người đặt">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="filterPhone" class="form-control custom-input" placeholder="Tìm theo số điện thoại">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" id="startDate" class="form-control custom-input">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="date" id="endDate" class="form-control custom-input">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select id="filterStatus" class="form-control custom-select">
                                            <option value="">Tất cả trạng thái</option>
                                            <option value="Chờ xác nhận">Chờ xác nhận</option>
                                            <option value="Đã xác nhận">Đã xác nhận</option>
                                            <option value="Đang giao hàng">Đang giao hàng</option>
                                            <option value="Đã giao hàng">Đã giao hàng</option>
                                            <option value="Đã hủy">Đã hủy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="example1" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Tên người nhận</th>
                                            <th>Số điện thoại</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Mã giảm giá</th>
                                            <th>Số tiền giảm</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listOrder as $key => $order): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><span class="badge badge-info"><?= $order['ma_don_hang'] ?></span></td>
                                                <td class="font-weight-medium"><?= $order['ten_nguoi_nhan'] ?></td>
                                                <td><?= $order['sdt_nguoi_nhan'] ?></td>
                                                <td><?= $order['ngay_dat'] ?></td>
                                                <td class="text-success font-weight-bold"><?= number_format($order['tong_tien']) ?>đ</td>
                                                <td>
                                                    <?php
                                                    $statusClass = '';
                                                    switch($order['ten_trang_thai']) {
                                                        case 'Chờ Xác Nhận':
                                                            $statusClass = 'badge-warning';
                                                            break;
                                                        case 'Đã Xác Nhận':
                                                            $statusClass = 'badge-info';
                                                            break;
                                                        case 'Đang Giao Hàng':
                                                            $statusClass = 'badge-primary';
                                                            break;
                                                        case 'Đã Giao':
                                                            $statusClass = 'badge-success';
                                                            break;
                                                        case 'Đã Hủy':
                                                            $statusClass = 'badge-danger';
                                                            break;
                                                        default:
                                                            $statusClass = 'badge-secondary';
                                                    }
                                                    ?>
                                                    <span class="badge <?= $statusClass ?>">
                                                        <?= $order['ten_trang_thai'] ?>
                                                    </span>
                                                </td>
                                                <td><?= $order['ma_khuyen_mai'] ? $order['ma_khuyen_mai'] : '<span class="text-muted">Không có</span>' ?></td>
                                                <td><?= $order['loai'] == 'tien_mat' ? number_format($order['gia_tri']) . 'đ' : $order['gia_tri'] . '%' ?></td>
                                                <td>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' .($order['id']) ?>" 
                                                       class="btn btn-warning btn-sm rounded-pill">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
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
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<style>
.text-gradient {
    background: linear-gradient(135deg, #333 0%, #666 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.custom-input {
    border-radius: 10px;
    border: 2px solid #eee;
    padding: 12px 20px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.custom-input:focus {
    border-color: #6B73FF;
    box-shadow: 0 0 15px rgba(107, 115, 255, 0.2);
}

.custom-select {
    border-radius: 10px;
    border: 2px solid #eee;
    padding: 12px 20px;
    height: auto;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.table {
    margin-top: 20px;
    border-collapse: separate;
    border-spacing: 0 8px;
}

.table thead th {
    background: #f8f9fa;
    color: #2C3E50;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    padding: 20px 15px;
    border: none;
    letter-spacing: 1px;
}

.table tbody td {
    padding: 20px 15px;
    vertical-align: middle;
    border-top: 1px solid #f1f3f4;
    background: white;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    transform: scale(1.01);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.badge {
    padding: 8px 12px;
    font-size: 0.85rem;
    font-weight: 500;
    border-radius: 30px;
    color: #fff;
}

.badge-info {
    background-color: #17a2b8;
}

.badge-success {
    background-color: #28a745;
}

.badge-warning {
    background-color: #ffc107;
    color: #000;
}

.badge-danger {
    background-color: #dc3545;
}

.badge-primary {
    background-color: #007bff;
}

.badge-secondary {
    background-color: #6c757d;
}

.btn-warning {
    background: linear-gradient(135deg, #f1c40f 0%, #f39c12 100%);
    border: none;
    padding: 8px 15px;
    transition: all 0.3s;
}

.btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(243, 156, 18, 0.3);
}
</style>

<script>
    $(function() {
        var table = $("#example1").DataTable({
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
                "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                "emptyTable": "Không có dữ liệu"
            }
        });

        // Filter by name
        $('#filterName').on('keyup', function() {
            table.column(2).search(this.value).draw();
        });

        // Filter by phone
        $('#filterPhone').on('keyup', function() {
            table.column(3).search(this.value).draw();
        });

        // Filter by date range
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#startDate').val();
                var max = $('#endDate').val();
                var dateStr = data[4];
                
                // Convert date string to Date object
                var dateParts = dateStr.split(/[- :]/);
                var date = new Date(dateParts[0], dateParts[1]-1, dateParts[2]);

                if (min === "" && max === "") {
                    return true;
                }
                if (min === "") {
                    return date <= new Date(max);
                }
                if (max === "") {
                    return date >= new Date(min);
                }
                return date >= new Date(min) && date <= new Date(max);
            }
        );

        // Trigger date filter on change
        $('#startDate, #endDate').change(function() {
            table.draw();
        });

        // Filter by status
        $('#filterStatus').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue !== '') {
                table.column(6).search(selectedValue).draw();
            } else {
                table.column(6).search('').draw();
            }
        });
    });

    function getStatusClass(status) {
        switch(status) {
            case 'Chờ xác nhận':
                return 'warning';
            case 'Đã xác nhận':
                return 'info';
            case 'Đang giao hàng':
                return 'primary';
            case 'Đã giao hàng':
                return 'success';
            case 'Đã hủy':
                return 'danger';
            default:
                return 'secondary';
        }
    }
</script>
</body>
</html>