<!-- HEADER -->
<?php include_once './views/layouts/header.php'; ?>

<!-- NAVBAR -->
<?php include_once './views/layouts/navbar.php'; ?>
<!-- Mini Cart -->
<?php include_once './views/layouts/miniCart.php'; ?>

<div class="m-t-23 p-b-140 bg0">
    <div class="container">
        <div class="flex-sb-m flex-w p-b-52">
            <div class="flex-l-m flex-w m-tb-10 filter-tope-group">
                <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" class="m-r-32 m-tb-5 bor3 cl6 hov1 <?= !isset($_GET['id_danh_muc']) ? 'how-active1' : '' ?> stext-106 trans-04">
                    All Products
                </a>
                <?php foreach ($categories as $category): ?>
                    <a href="<?= BASE_URL . '?act=danh-sach-san-pham&id_danh_muc=' . $category['id'] ?>" 
                       class="m-r-32 m-tb-5 bor3 cl6 hov1 <?= isset($_GET['id_danh_muc']) && $_GET['id_danh_muc'] == $category['id'] ? 'how-active1' : '' ?> stext-106 trans-04">
                        <?= $category['ten_danh_muc'] ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="flex-c-m flex-w m-tb-10">
                <div class="flex-c-m m-r-8 m-tb-4 bor4 cl6 hov-btn3 js-show-filter pointer size-104 stext-106 trans-04">
                    <i class="m-r-6 cl2 fs-15 icon-filter trans-04 zmdi zmdi-filter-list"></i>
                    <i class="m-r-6 cl2 dis-none fs-15 icon-close-filter trans-04 zmdi zmdi-close"></i>
                    Filter
                </div>

                <div class="flex-c-m m-tb-4 bor4 cl6 hov-btn3 js-show-search pointer size-105 stext-106 trans-04">
                    <i class="m-r-6 cl2 fs-15 icon-search trans-04 zmdi zmdi-search"></i>
                    <i class="m-r-6 cl2 dis-none fs-15 icon-close-search trans-04 zmdi zmdi-close"></i>
                    Search
                </div>
            </div>

            <!-- Search product -->
            <div class="p-b-15 p-t-10 w-full dis-none panel-search">
                <div class="p-l-15 bor8 dis-flex">
                    <button class="flex-c-m cl2 fs-16 hov-cl1 size-113 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="p-r-15 cl2 mtext-107 plh2 size-114" type="text" name="search-product"
                        placeholder="Search">
                </div>
            </div>

            <!-- Filter -->
        </div>

        <div class="row isotope-grid">
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0" style="height: 300px; overflow: hidden;">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>">
                            <?php if ($product['hinh_anh']): ?>
                                <img src="<?= BASE_URL . $product['hinh_anh'] ?>" alt="IMG-PRODUCT" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <img src="assets/images/product-01.jpg" alt="NO IMAGE" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php endif; ?>
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                    class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    <?= $product['ten_san_pham'] ?>
                                </a>

                                <span class="cl3 stext-105">
                                    <?php if ($product['gia_san_pham_khuyen_mai'] > 0): ?>
                                        <span class="text-decoration-line-through"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                        <span class="text-danger"><?= number_format($product['gia_san_pham_khuyen_mai']) . 'đ' ?></span>
                                    <?php else: ?>
                                        <?= number_format($product['gia_san_pham']) . 'đ' ?>
                                    <?php endif; ?>
                                </span>
                            </div>

                            <div class="flex-r p-t-3 block2-txt-child2">
                                <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                    <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                        alt="ICON">
                                    <img class="ab-t-l dis-block icon-heart2 trans-04"
                                        src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>  
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w p-t-45 w-full">
            <a href="#" class="flex-c-m p-lr-15 bg2 bor1 cl5 hov-btn1 size-103 stext-101 trans-04">
                Load More
            </a>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php include_once './views/layouts/footer.php'; ?>