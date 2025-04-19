<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/order.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <input type="text" id="filterName" class="form-control" placeholder="Tìm theo tên người đặt">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="filterPhone" class="form-control" placeholder="Tìm theo số điện thoại">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" id="startDate" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" id="endDate" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <select id="filterStatus" class="form-control">
                                        <option value="">Tất cả trạng thái</option>
                                        <option value="Chờ xác nhận">Chờ xác nhận</option>
                                        <option value="Đã xác nhận">Đã xác nhận</option>
                                        <option value="Đang giao hàng">Đang giao hàng</option>
                                        <option value="Đã giao hàng">Đã giao hàng</option>
                                        <option value="Đã hủy">Đã hủy</option>
                                    </select>
                                </div>
                            </div>

                            <table id="example1" class="table table-bordered table-striped">
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
                                            <td><?= $order['ma_don_hang'] ?></td>
                                            <td><?= $order['ten_nguoi_nhan'] ?></td>
                                            <td><?= $order['sdt_nguoi_nhan'] ?></td>
                                            <td><?= $order['ngay_dat'] ?></td>
                                            <td><?= number_format($order['tong_tien']) ?>đ</td>
                                            <td><?= $order['ten_trang_thai'] ?></td>
                                            <td><?= $order['ma_khuyen_mai'] ?></td>
                                            <td><?= $order['loai'] == 'tien_mat' ? number_format($order['gia_tri']) . 'đ' : $order['gia_tri'] . '%' ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' .($order['id']) ?>" class="btn btn-warning">
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
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

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
</script>
</body>
</html>