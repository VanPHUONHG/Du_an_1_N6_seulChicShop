<!-- header -->
<?php
    include_once './views/layouts/header.php';
?>
<!-- navbar -->
<?php
    include_once './views/layouts/navbar.php';
?>
<!-- Mini Cart -->
<?php
    include_once './views/layouts/miniCart.php';
?>

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="<?= BASE_URL ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="<?= BASE_URL ?>?act=bai-viet" class="stext-109 cl8 hov-cl1 trans-04">
            Blog
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
            <?= isset($blog['tieu_de']) ? $blog['tieu_de'] : 'Chi tiết bài viết' ?>
        </span>
    </div>
</div>

<!-- Content -->
<section class="bg0 p-t-52 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg bg-white shadow-lg rounded-lg">
                    <!-- Blog Detail -->
                    <div class="wrap-pic-w how-pos5-parent">
                        <img src="<?= isset($blog['hinh_anh']) ? $blog['hinh_anh'] : 'assets/images/blog-01.jpg' ?>" 
                             alt="<?= isset($blog['tieu_de']) ? $blog['tieu_de'] : '' ?>"
                             class="w-100 rounded-t-lg object-cover">
                    </div>

                    <div class="p-t-32 p-x-6">
                        <h4 class="ltext-109 cl2 p-b-28 font-weight-bold">
                            <?= isset($blog['tieu_de']) ? $blog['tieu_de'] : '' ?>
                        </h4>

                        <div class="flex-w flex-sb-m p-t-18 border-bottom pb-4">
                            <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                <span>
                                    <span class="cl4">By</span> 
                                    <span class="text-primary font-weight-bold">Admin</span>
                                    <span class="cl12 m-l-4 m-r-6">|</span>
                                </span>

                                <span>
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    <?= isset($blog['ngay_tao_bai_viet']) ? date('d/m/Y', strtotime($blog['ngay_tao_bai_viet'])) : '' ?>
                                    <span class="cl12 m-l-4 m-r-6">|</span>
                                </span>
                            </span>
                        </div>

                        <div class="stext-117 cl6 p-t-26 p-b-26 leading-relaxed">
                            <?= isset($blog['noi_dung']) ? $blog['noi_dung'] : '' ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <!-- Recent Posts -->
                    <div class="p-t-55 bg-white shadow-sm rounded-lg p-4">
                        <h4 class="mtext-112 cl2 p-b-33 border-bottom">
                            Bài viết mới nhất
                        </h4>

                        <ul class="list-unstyled">
                            <?php if(isset($recentPosts) && is_array($recentPosts)): ?>
                                <?php foreach($recentPosts as $post): ?>
                                    <li class="border-bottom hover-shadow transition-all">
                                        <a href="<?= BASE_URL ?>?act=chi-tiet-bai-viet&id=<?= $post['id'] ?>" 
                                           class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                            <?= $post['tieu_de'] ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php
    include_once './views/layouts/footer.php';
?>