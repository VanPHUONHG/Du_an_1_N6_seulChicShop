<!-- Header -->
<?php include './views/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assets/images/bg-02.jpg'); background-position: center; background-size: cover;">
    <h2 class="ltext-105 cl0 txt-center" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
        Our Blog
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <!-- item blog -->
                    <?php if (!empty($posts)): ?>
                        <?php foreach ($posts as $post): ?>
                            <div class="p-b-63 blog-card shadow-sm rounded overflow-hidden">
                                <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet&id=' . $post['id'] ?>" class="hov-img0 how-pos5-parent">
                                    <img src="<?= !empty($post['hinh_anh']) ? BASE_URL . $post['hinh_anh'] : BASE_URL . 'assets/images/blog-01.jpg' ?>" 
                                         alt="<?= htmlspecialchars($post['tieu_de']) ?>"
                                         class="img-fluid transition-all" 
                                         style="transform: scale(1); transition: transform 0.3s ease;">

                                    <div class="flex-col-c-m size-123 bg9 how-pos5" style="border-radius: 8px;">
                                        <span class="ltext-107 cl2 txt-center">
                                            <?= date('d', strtotime($post['ngay_tao_bai_viet'])) ?>
                                        </span>
                                        <span class="stext-109 cl3 txt-center">
                                            <?= date('m/Y', strtotime($post['ngay_tao_bai_viet'])) ?>
                                        </span>
                                    </div>
                                </a>

                                <div class="p-t-32 p-lr-25">
                                    <h4 class="p-b-15">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet&id=' . $post['id'] ?>" 
                                           class="ltext-108 cl2 hov-cl1 trans-04 font-weight-bold">
                                            <?= htmlspecialchars($post['tieu_de']) ?>
                                        </a>
                                    </h4>

                                    <p class="stext-117 cl6 line-height-1-8">
                                        <?= htmlspecialchars(substr($post['bai_viet'], 0, 200)) ?>...
                                    </p>

                                    <div class="flex-w flex-sb-m p-t-18">
                                        <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                            <span>
                                                <i class="far fa-user mr-2"></i>
                                                <span class="cl4">By</span> <?= htmlspecialchars($post['tac_gia']) ?>
                                            </span>
                                        </span>

                                        <a href="<?= BASE_URL . '?act=chi-tiet-blog&id=' . $post['id'] ?>" 
                                           class="stext-101 cl2 hov-cl1 trans-04 m-tb-10 btn btn-outline-primary btn-sm">
                                            Read More
                                            <i class="fa fa-long-arrow-right m-l-9"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info text-center">No posts available at the moment.</div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <!-- Search -->
                    <div class="bor17 of-hidden pos-relative rounded">
                        <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search posts...">
                        <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </div>

                    <!-- Categories -->
                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-33 border-bottom">
                            Categories
                        </h4>
                        <ul class="list-unstyled">
                            <?php foreach ($category as $item): ?>
                                <li class="bor18 hover-shadow">
                                    <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                        <i class="fas fa-folder mr-2"></i>
                                        <?= $item['ten_danh_muc'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Archive -->
                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-20 border-bottom">
                            Archive
                        </h4>
                        <ul class="list-unstyled">
                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span><i class="far fa-calendar-alt mr-2"></i>July 2023</span>
                                    <span class="badge badge-primary">9</span>
                                </a>
                            </li>
                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span><i class="far fa-calendar-alt mr-2"></i>June 2023</span>
                                    <span class="badge badge-primary">39</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './views/layouts/footer.php'; ?>