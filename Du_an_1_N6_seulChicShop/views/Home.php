<!-- Header -->
<?php include 'layouts/header.php'; ?>

<!-- Navbar -->
<?php include 'layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include 'layouts/miniCart.php'; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?= $_SESSION['success'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1 rs1-slick1">
        <div class="slick1">
            <div class="item-slick1" style="background-image: url(assets/image_da1/banner4.webp);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-b-30 p-t-100">
                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 respon2">
                                SEULCHICSHOP
                            </span>
                        </div>

                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInUp" data-delay="800">
                            <h2 class="p-b-43 p-t-19 ltext-104 respon1">
                                Nâng Tầm Phong Cách
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(assets/image_da1/banner5.webp);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-b-30 p-t-100">
                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 respon2">
                                Elegance comes from the details
                            </span>
                        </div>

                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInUp" data-delay="800">
                            <h2 class="p-b-43 p-t-19 ltext-104 respon1">
                                Every piece has its own signature.
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(assets/image_da1/baner_coc2.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                            <span class="ltext-202 cl2 respon2">
                                Women Collection 2018
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                NEW SEASON
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<br><br>


<!-- Banner -->
<div class="flex-c-m flex-w container">
    <div class="row justify-content-center">
        <div class="col-md-4 p-3">
            <!-- Block1 -->
            <div class="block1 wrap-pic-w">
                <img src="assets/image_da1/HodiMixiKhoa1.webp" alt="IMG-BANNER" style="width: 100%; height: 500px; object-fit: cover;">

                <a href="product.html" class="flex-col-l-sb p-lr-38 p-tb-34 ab-t-l block1-txt respon3 s-full trans-03">
                    <div class="flex-col-l block1-txt-child1">
                        <span class="p-b-8 block1-name ltext-102 trans-04">
                            Thời Trang - Thu Đông
                        </span>

                        <span class="block1-info stext-102 trans-04">
                            Nâng tầm phong cách
                        </span>
                    </div>

                    <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                            Shop Now
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4 p-3">
            <!-- Block1 -->
            <div class="block1 wrap-pic-w">
                <img src="assets/image_da1/Boni4.webp" alt="IMG-BANNER" style="width: 100%; height: 500px; object-fit: cover;">

                <a href="product.html" class="flex-col-l-sb p-lr-38 p-tb-34 ab-t-l block1-txt respon3 s-full trans-03">
                    <div class="flex-col-l block1-txt-child1">
                        <span class="p-b-8 block1-name ltext-102 trans-04">
                            Thời Trang - Xuân Hè
                        </span>

                        <span class="block1-info stext-102 trans-04">
                            Mặc 1 lần - Muốn Mặc Thêm
                        </span>
                    </div>

                    <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                            Shop Now
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4 p-3">
            <!-- Block1 -->
            <div class="block1 wrap-pic-w">
                <img src="assets/image_da1/coc_snecker2.webp" alt="IMG-BANNER" style="width: 100%; height: 500px; object-fit: cover;">

                <a href="product.html" class="flex-col-l-sb p-lr-38 p-tb-34 ab-t-l block1-txt respon3 s-full trans-03">
                    <div class="flex-col-l block1-txt-child1">
                        <span class="p-b-8 block1-name ltext-102 trans-04">
                            Cốc Bình ("Đồ Lưu LiệmLiệm")
                        </span>

                        <span class="block1-info stext-102 trans-04">
                            Sản Phẩm Cho Đi - Giá Trị Nhận Về
                        </span>
                    </div>

                    <div class="block1-txt-child2 p-b-4 trans-05">
                        <div class="block1-link stext-101 cl0 trans-09">
                            Shop Now
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



<!-- Product -->
<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Store Overview
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item p-b-10">
                    <a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
                </li>

                <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured</a>
                </li>

                <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
                </li>

                <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-t-50">
                <!-- - -->
                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/ao3lo1.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Áo 3 lỗ Logo Mixi
                                            </a>

                                            <span class="cl3 stext-105">
                                                190.000 VND
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/Boni1.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Bộ Đồ Nỉ Logo Mixi
                                            </a>

                                            <span class="cl3 stext-105">
                                                280.000 VND
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/ao3lo2.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Áo 3 lỗ (Quẩy Lên)
                                            </a>

                                            <span class="cl3 stext-105">
                                                190.000 VND
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/coc_snecker1.webp" alt="IMG-PRODUCT" style="width: 300px; height: 470px">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Bình giữ nhiệt Mixi (snecker)
                                            </a>

                                            <span class="cl3 stext-105">
                                                320.000 VND
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/HodiMixi2.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Áo hoodie Mixi classic
                                            </a>

                                            <span class="cl3 stext-105">
                                                320.000 VND
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/HodiMixiKhoa1.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Áo hoodie Mixi đen khoá ngực
                                            </a>

                                            <span class="cl3 stext-105">
                                                360.000 VND
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/coc_vit_nau.webp" alt="IMG-PRODUCT" style="width: 300px; height: 470px">

                                        <a href="#"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Bình giữ nhiệt Mixi (cốc vịt)
                                            </a>

                                            <span class="cl3 stext-105">
                                                320.000 VND
                                            </span>
                                        </div>

                                        <div class="block2-txt-child2 flex-r p-t-3">
                                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                <img class="icon-heart1 dis-block trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/Boni4.webp" alt="IMG-PRODUCT">

                                        <a href="#" class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Bộ Đồ Nỉ Logo Mixi (Đen)
                                            </a>

                                            <span class="cl3 stext-105">
                                                280.000 VND
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-r p-t-3 block2-txt-child2">
                                    <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                        <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="ab-t-l dis-block icon-heart2 trans-04" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="fade tab-pane" id="featured" role="tabpanel">
    <!-- Slide2 -->
    <div class="wrap-slick2">
        <div class="slick2">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Item 1 -->
                <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="assets/image_da1/Boni1.webp" alt="IMG-PRODUCT">

                            <a href="#" class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Bộ Đồ Nỉ Logo Mixi
                                </a>

                                <span class="cl3 stext-105">
                                    280.000 VND
                                </span>
                            </div>

                            <div class="flex-r p-t-3 block2-txt-child2">
                                <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                    <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="ab-t-l dis-block icon-heart2 trans-04" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="assets/image_da1/Boni4.webp" alt="IMG-PRODUCT">

                            <a href="#" class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Bộ Đồ Nỉ Logo Mixi (Đen)
                                </a>

                                <span class="cl3 stext-105">
                                    280.000 VND
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex-r p-t-3 block2-txt-child2">
                        <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                            <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                            <img class="ab-t-l dis-block icon-heart2 trans-04" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                        </a>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="assets/image_da1/coc_snecker1.webp" alt="IMG-PRODUCT" style="width: 300px; height: 470px">

                            <a href="#" class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Bình giữ nhiệt Mixi (snecker)
                                </a>

                                <span class="cl3 stext-105">
                                    320.000 VND
                                </span>
                            </div>

                            <div class="flex-r p-t-3 block2-txt-child2">
                                <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                    <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="ab-t-l dis-block icon-heart2 trans-04" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="assets/image_da1/coc_vit_nau.webp" alt="IMG-PRODUCT" style="width: 300px; height: 470px">

                            <a href="#" class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Bình giữ nhiệt Mixi (cốc vịt)
                                </a>

                                <span class="cl3 stext-105">
                                    320.000 VND
                                </span>
                            </div>

                            <div class="flex-r p-t-3 block2-txt-child2">
                                <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                    <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="ab-t-l dis-block icon-heart2 trans-04" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>

        <!-- - -->


        <!-- - -->
        <!-- <div class="fade tab-pane" id="top-rate" role="tabpanel">

            <div class="wrap-slick2">
                <div class="slick2">
                    <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">

                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="images/product-03.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                    Quick View
                                </a>
                            </div>

                            <div class="flex-t flex-w p-t-14 block2-txt">
                                <div class="flex-col-l block2-txt-child1">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                        class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                        Only Check Trouser
                                    </a>

                                    <span class="stext-105 cl3">
                                        $25.50
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="assets/images/product-06.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Vintage Inspired Classic
                                    </a>

                                    <span class="stext-105 cl3">
                                        $93.20
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="assets/images/product-07.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Shirt in Stretch Cotton
                                    </a>

                                    <span class="stext-105 cl3">
                                        $52.66
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="assets/images/product-08.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Pieces Metallic Printed
                                    </a>

                                    <span class="stext-105 cl3">
                                        $18.96
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="assets/images/product-09.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Converse All Star Hi Plimsolls
                                    </a>

                                    <span class="stext-105 cl3">
                                        $75.00
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="assets/images/product-10.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Femme T-Shirt In Stripe
                                    </a>

                                    <span class="stext-105 cl3">
                                        $25.85
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="assets/images/product-11.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Herschel supply
                                    </a>

                                    <span class="stext-105 cl3">
                                        $63.16
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="assets/images/product-12.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Herschel supply
                                    </a>

                                    <span class="stext-105 cl3">
                                        $63.15
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                        src="images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="images/product-13.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        T-Shirt with Sleeve
                                    </a>

                                    <span class="stext-105 cl3">
                                        $18.49
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="images/product-16.jpg" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Square Neck Back
                                    </a>

                                    <span class="stext-105 cl3">
                                        $29.64
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</section>


<!-- Blog -->
<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Our Blogs
            </h3>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-4 p-b-40">
                <div class="blog-item">
                    <div class="hov-img0">
                        <a href="blog-detail.html">
                            <img src="assets/images/blog-01.jpg" alt="IMG-BLOG">
                        </a>
                    </div>

                    <div class="p-t-15">
                        <div class="stext-107 flex-w p-b-14">
                            <span class="m-r-3">
                                <span class="cl4">
                                    By
                                </span>

                                <span class="cl5">
                                    Nancy Ward
                                </span>
                            </span>

                            <span>
                                <span class="cl4">
                                    on
                                </span>

                                <span class="cl5">
                                    July 22, 2017
                                </span>
                            </span>
                        </div>

                        <h4 class="p-b-12">
                            <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                8 Inspiring Ways to Wear Dresses in the Winter
                            </a>
                        </h4>

                        <p class="stext-108 cl6">
                            Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id
                            euismod. Interdum et male-suada fames
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 p-b-40">
                <div class="blog-item">
                    <div class="hov-img0">
                        <a href="blog-detail.html">
                            <img src="assets/images/blog-02.jpg" alt="IMG-BLOG">
                        </a>
                    </div>

                    <div class="p-t-15">
                        <div class="stext-107 flex-w p-b-14">
                            <span class="m-r-3">
                                <span class="cl4">
                                    By
                                </span>

                                <span class="cl5">
                                    Nancy Ward
                                </span>
                            </span>

                            <span>
                                <span class="cl4">
                                    on
                                </span>

                                <span class="cl5">
                                    July 18, 2017
                                </span>
                            </span>
                        </div>

                        <h4 class="p-b-12">
                            <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                The Great Big List of Men's Gifts for the Holidays
                            </a>
                        </h4>

                        <p class="stext-108 cl6">
                            Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                            in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 p-b-40">
                <div class="blog-item">
                    <div class="hov-img0">
                        <a href="blog-detail.html">
                            <img src="assets/images/blog-03.jpg" alt="IMG-BLOG">
                        </a>
                    </div>

                    <div class="p-t-15">
                        <div class="stext-107 flex-w p-b-14">
                            <span class="m-r-3">
                                <span class="cl4">
                                    By
                                </span>

                                <span class="cl5">
                                    Nancy Ward
                                </span>
                            </span>

                            <span>
                                <span class="cl4">
                                    on
                                </span>

                                <span class="cl5">
                                    July 2, 2017
                                </span>
                            </span>
                        </div>

                        <h4 class="p-b-12">
                            <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                5 Winter-to-Spring Fashion Trends to Try Now
                            </a>
                        </h4>

                        <p class="stext-108 cl6">
                            Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed
                            hendrerit ligula porttitor. Fusce sit amet maximus nunc
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include 'layouts/footer.php'; ?>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>

<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg js-show-modal1">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="assets/images/product-detail-01.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="assets/images/product-detail-01.jpg" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="assets/images/product-detail-01.jpg">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="assets/images/product-detail-02.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="assets/images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="assets/images/product-detail-02.jpg">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="assets/images/product-detail-03.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="assets/images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                            href="assets/images/product-detail-03.jpg">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            Lightweight Jacket
                        </h4>

                        <span class="mtext-106 cl2">
                            $58.79
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare
                            feugiat.
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Size S</option>
                                            <option>Size M</option>
                                            <option>Size L</option>
                                            <option>Size XL</option>
                                            <option>Size XXL</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Color
                                </div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Red</option>
                                            <option>Blue</option>
                                            <option>White</option>
                                            <option>Grey</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product"
                                            value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>

                                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                    data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/bootstrap/js/popper.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="assets/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/slick/slick.min.js"></script>
<script src="assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>
<!--===============================================================================================-->
<script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="assets/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addcart-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').text();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
</script>
<!--===============================================================================================-->
<script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        $(this).append('<div class="pscroll" style="position: absolute; left: 0; top: 0; width: 100%; height: 100%; overflow-y: hidden; pointer-events: none;"><div style="position: absolute; left: 0; top: 0;"></div></div>');
        $(this).find('.pscroll').width($(this).width() + "px");
    });
</script>
<!--===============================================================================================-->
<script src="assets/js/main.js"></script>