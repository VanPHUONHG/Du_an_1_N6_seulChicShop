<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- Add CSS link after header -->
<link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/css/category.css">

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php if (isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
        <div class="alert alert-<?= isset($_SESSION['success']) ? 'success' : 'danger' ?>">
            <?= isset($_SESSION['success']) ? $_SESSION['success'] : $_SESSION['error'] ?>
        </div>
        <?php unset($_SESSION['success'], $_SESSION['error']); ?>
    <?php endif; ?>

    <div class="category-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fas fa-folder me-2"></i>Quản lý danh mục sản phẩm</h1>
            <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>" class="btn btn-success">
                <i class="fas fa-plus"></i>
                <span>Thêm danh mục</span>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="category-filters">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" id="searchCategory" placeholder="Tìm kiếm danh mục...">
                </div>
            </div>

            <div class="table-responsive">
                <table id="categoryTable" class="table category-table">
                    <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th width="30%">Tên danh mục</th>
                            <th width="45%">Mô tả</th>
                            <th width="20%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listDanhmuc as $key => $danhMuc): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td class="font-weight-medium"><?= $danhMuc['ten_danh_muc'] ?></td>
                            <td><?= $danhMuc['mo_ta'] ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>" 
                                       onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')"
                                       class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
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

<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

<!-- Page specific script -->
<script>
$(document).ready(function() {
    // Initialize DataTable with custom options
    $('#categoryTable').DataTable({
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
            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ danh mục",
            "infoEmpty": "Hiển thị 0 đến 0 của 0 danh mục",
            "zeroRecords": "Không tìm thấy danh mục nào"
        }
    });

    // Custom search functionality
    $('#searchCategory').on('keyup', function() {
        $('#categoryTable').DataTable().search(this.value).draw();
    });
});
</script>
<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function() {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function(msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>
</body>

</html>