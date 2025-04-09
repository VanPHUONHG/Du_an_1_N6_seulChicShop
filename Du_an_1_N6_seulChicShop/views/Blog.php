<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- Blog Banner -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assets/images/bg-02.jpg');">
    <h2 class="ltext-105 cl0 txt-center">Blog</h2>
</section>

<!-- Blog Content -->
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <?php if (isset($PostsProduct) && !empty($PostsProduct)) : ?>
            <?php foreach ($PostsProduct as $index => $blog) : ?>
                <div class="row align-items-center mb-5 <?= $index % 2 == 0 ? '' : 'flex-row-reverse' ?>">
                    
                    <!-- Nội dung bên phải hoặc trái -->
                    <div class="col-md-7">
                        <!-- Tiêu đề -->
                        <h4 class="mb-3">
                            <a href="?act=chi-tiet-blog&id=<?= htmlspecialchars($blog['id']) ?>" class="text-dark font-weight-bold hov-cl1">
                                <?= htmlspecialchars($blog['tieu_de']) ?>
                            </a>
                        </h4>

                        <!-- Ngày đăng -->
                        <p class="text-muted mb-2">
                            <strong>Ngày đăng:</strong> <?= date('d/m/Y', strtotime($blog['ngay_tao_bai_viet'])) ?>
                        </p>

                        <!-- Nội dung ngắn -->
                        <p class="text-secondary">
                            <?= htmlspecialchars(substr(strip_tags($blog['bai_viet']), 0, 300)) ?>...
                        </p>

                        <!-- Link xem thêm -->
                        <a href="?act=chi-tiet-blog&id=<?= htmlspecialchars($blog['id']) ?>" class="text-primary font-weight-bold">
                            Đọc thêm <i class="fa fa-long-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <!-- Hình ảnh bên trái/phải -->
                    <div class="col-md-5 mb-4 mb-md-0">
                        <a href="?act=chi-tiet-blog&id=<?= htmlspecialchars($blog['id']) ?>">
                            <img src="<?= htmlspecialchars($blog['hinh_anh']) ?>" alt="Blog Image" class="img-fluid rounded shadow-sm w-100">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Chưa có bài viết nào được đăng.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
