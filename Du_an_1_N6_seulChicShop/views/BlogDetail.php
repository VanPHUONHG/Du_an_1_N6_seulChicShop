
// views/BlogDetail.php
<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>
<section class="container p-t-62 p-b-60">
    <div class="row">
        <div class="col-lg-9 col-md-8">
            <div class="p-r-45">
                <div class="p-b-63">
                    <img src="<?= $blog['hinh_anh'] ?>" alt="IMG-BLOG">
                    <div class="p-t-32">
                        <h4><?= $blog['tieu_de'] ?></h4>
                        <span class="cl6 stext-117">Ngày đăng: <?= date('d M Y', strtotime($blog['ngay_tao_bai_viet'])) ?></span>
                        <p class="cl6 stext-117 p-t-18"> <?= $blog['bai_viet'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include './views/layouts/footer.php'; ?>
