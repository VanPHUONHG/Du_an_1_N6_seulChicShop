<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h1>Chi Tiết Tài Khoản</h1>
                </div>
                <div class="">
                    <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan-client'  ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay Lại</a>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?= BASE_URL . $userClient['anh_dai_dien'] ?>" 
                                        class="img-fluid" 
                                        alt="Avatar"
                                        onerror="this.onerror=null; this.src='https://tse2.mm.bing.net/th?id=OIP.DAwq4ufTfSCkcq3O8q_6AgHaHa&pid=Api&P=0&h=180'">
                                </div>
                                <div class="col-md-6">
                                    <h3><?= $userClient['ten_tai_khoan'] ?></h3>
                                    <div class="mt-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-envelope mr-2"></i>
                                            <span class="font-weight-bold mr-2">Email:</span>
                                            <span><?= $userClient['email'] ?></span>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-key mr-2"></i>
                                            <span class="font-weight-bold mr-2">Mật khẩu:</span>
                                            <span><?= $userClient['mat_khau'] ?></span>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-phone mr-2"></i>
                                            <span class="font-weight-bold mr-2">Số điện thoại:</span>
                                            <span><?= $userClient['so_dien_thoai'] ?></span>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-calendar mr-2"></i>
                                            <span class="font-weight-bold mr-2">Ngày tạo:</span>
                                            <span><?= $userClient['ngay_tao'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>
</body>
</html>