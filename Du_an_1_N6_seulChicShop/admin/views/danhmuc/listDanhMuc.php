<!-- header -->
<?php include './views/layout/header.php'; ?>

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
                    <h1>Quản Lý Danh Mục Sản Phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>">
                                <button class="btn btn-success">Thêm danh mục</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>STT</td>
                                        <td>Tên Danh Mục </td>
                                        <td>Mô Tả</td>
                                        <td>Thao Tác</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $danhMuc['ten_danh_muc'] ?></td>
                                            <td><?= $danhMuc['mo_ta'] ?></td>
                                            <td>
    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>" class="btn btn-warning icon-button">
        <i class="fas fa-edit"></i> <!-- Icon sửa -->
    </a>

    <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>" 
       onclick="return confirm('Bạn có chắc muốn xóa không?')" 
       class="btn btn-danger icon-button">
        <i class="fas fa-trash"></i> <!-- Icon xóa -->
    </a>
</td>

                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>STT</td>
                                        <td>Tên Danh Mục </td>
                                        <td>Mô Tả</td>
                                        <td>Thao Tác</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
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

<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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