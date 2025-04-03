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
    <div class="rs1-slick1 wrap-slick1">
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

                        <div class="animated layer-slick1 visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m p-lr-15 bg1 bor1 cl0 hov-btn1 size-101 stext-101 trans-04">
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

                        <div class="animated layer-slick1 visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m p-lr-15 bg1 bor1 cl0 hov-btn1 size-101 stext-101 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(assets/image_da1/baner_coc2.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-b-30 p-t-100">
                        <div class="animated layer-slick1 visible-false text-black font-bold" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 respon2">
                                Lưu giữ kỷ niệm, tạo nên phong cách riêng
                            </span>
                        </div>

                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInUp" data-delay="800">
                            <h2 class="p-b-43 p-t-19 ltext-104 respon1">
                                Preserve memories, create your own style.
                            </h2>
                        </div>

                        <div class="animated layer-slick1 visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html"
                                class="flex-c-m p-lr-15 bg1 bor1 cl0 hov-btn1 size-101 stext-101 trans-04">
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

                    <div class="p-b-4 block1-txt-child2 trans-05">
                        <div class="block1-link cl0 stext-101 trans-09">
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

                    <div class="p-b-4 block1-txt-child2 trans-05">
                        <div class="block1-link cl0 stext-101 trans-09">
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

                    <div class="p-b-4 block1-txt-child2 trans-05">
                        <div class="block1-link cl0 stext-101 trans-09">
                            Shop Now
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



<!-- Product -->
<section class="p-b-50 p-t-100 bg0 sec-product">
    <div class="container">
        <div class="p-b-32">
            <h3 class="cl5 ltext-105 respon1 txt-center">
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
            <div class="p-t-50 tab-content">
                <!-- - -->
                <div class="active fade show tab-pane" id="best-seller" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/image_da1/ao3lo1.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
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
                                        <img src="assets/image_da1/Boni1.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
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
                                        <img src="assets/image_da1/ao3lo2.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
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
                                        <img src="assets/image_da1/coc_snecker1.webp" alt="IMG-PRODUCT" style="width: 300px; height: 470px">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
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
                                        <img src="assets/image_da1/HodiMixi2.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
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
                                        <img src="assets/image_da1/HodiMixiKhoa1.webp" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
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
                                        <img src="assets/image_da1/coc_vit_nau.webp" alt="IMG-PRODUCT" style="width: 300px; height: 470px">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                               
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="assets/images/product-08.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Pieces Metallic Printed
                                            </a>

                                            <span class="cl3 stext-105">
                                                $18.96
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="fade tab-pane" id="featured" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
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

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
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

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
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

                <!-- - -->
                <div class="fade tab-pane" id="sale" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-02.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Herschel supply
                                            </a>

                                            <span class="cl3 stext-105">
                                                $35.31
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-04.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Classic Trench Coat
                                            </a>

                                            <span class="cl3 stext-105">
                                                $75.00
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-06.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Vintage Inspired Classic
                                            </a>

                                            <span class="cl3 stext-105">
                                                $93.20
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-09.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Converse All Star Hi Plimsolls
                                            </a>

                                            <span class="cl3 stext-105">
                                                $75.00
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-11.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Herschel supply
                                            </a>

                                            <span class="cl3 stext-105">
                                                $63.16
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-13.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                T-Shirt with Sleeve
                                            </a>

                                            <span class="cl3 stext-105">
                                                $18.49
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-15.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Mini Silver Mesh Watch
                                            </a>

                                            <span class="cl3 stext-105">
                                                $86.85
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-16.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Square Neck Back
                                            </a>

                                            <span class="cl3 stext-105">
                                                $29.64
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="fade tab-pane" id="top-rate" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
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

                                            <span class="cl3 stext-105">
                                                $25.50
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-06.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Vintage Inspired Classic
                                            </a>

                                            <span class="cl3 stext-105">
                                                $93.20
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-07.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Shirt in Stretch Cotton
                                            </a>

                                            <span class="cl3 stext-105">
                                                $52.66
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-08.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Pieces Metallic Printed
                                            </a>

                                            <span class="cl3 stext-105">
                                                $18.96
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-09.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Converse All Star Hi Plimsolls
                                            </a>

                                            <span class="cl3 stext-105">
                                                $75.00
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-10.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Femme T-Shirt In Stripe
                                            </a>

                                            <span class="cl3 stext-105">
                                                $25.85
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-11.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Herschel supply
                                            </a>

                                            <span class="cl3 stext-105">
                                                $63.16
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-12.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Herschel supply
                                            </a>

                                            <span class="cl3 stext-105">
                                                $63.15
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-13.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                T-Shirt with Sleeve
                                            </a>

                                            <span class="cl3 stext-105">
                                                $18.49
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="images/product-16.jpg" alt="IMG-PRODUCT">

                                        <a href="#"
                                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                            Quick View
                                        </a>
                                    </div>

                                    <div class="flex-t flex-w p-t-14 block2-txt">
                                        <div class="flex-col-l block2-txt-child1">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                                Square Neck Back
                                            </a>

                                            <span class="cl3 stext-105">
                                                $29.64
                                            </span>
                                        </div>

                                        <div class="flex-r p-t-3 block2-txt-child2">
                                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                                <img class="dis-block icon-heart1 trans-04"
                                                    src="images/icons/icon-heart-01.png" alt="ICON">
                                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                                    src="images/icons/icon-heart-02.png" alt="ICON">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Blog -->
            <section class="p-b-90 p-t-60 bg0 sec-blog">
                <div class="container">
                    <div class="p-b-66">
                        <h3 class="cl5 ltext-105 respon1 txt-center">
                            Our Blogs
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-6 p-b-40">
                            <div class="blog-item">
                                <div class="hov-img0">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet' ?>">
                                        <img src="assets/images/blog-01.jpg" alt="IMG-BLOG">
                                    </a>
                                </div>

                                <div class="p-t-15">
                                    <div class="flex-w p-b-14 stext-107">
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
                                        <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet' ?>" class="cl2 hov-cl1 mtext-101 trans-04">
                                            8 Inspiring Ways to Wear Dresses in the Winter
                                        </a>
                                    </h4>

                                    <p class="cl6 stext-108">
                                        Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id
                                        euismod. Interdum et male-suada fames
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 p-b-40">
                            <div class="blog-item">
                                <div class="hov-img0">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet' ?>">
                                        <img src="assets/images/blog-02.jpg" alt="IMG-BLOG">
                                    </a>
                                </div>

                                <div class="p-t-15">
                                    <div class="flex-w p-b-14 stext-107">
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
                                        <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet' ?>" class="cl2 hov-cl1 mtext-101 trans-04">
                                            The Great Big List of Men's Gifts for the Holidays
                                        </a>
                                    </h4>

                                    <p class="cl6 stext-108">
                                        Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                                        in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 p-b-40">
                            <div class="blog-item">
                                <div class="hov-img0">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet' ?>">
                                        <img src="assets/images/blog-03.jpg" alt="IMG-BLOG">
                                    </a>
                                </div>

                                <div class="p-t-15">
                                    <div class="flex-w p-b-14 stext-107">
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
                                        <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet' ?>" class="cl2 hov-cl1 mtext-101 trans-04">
                                            5 Winter-to-Spring Fashion Trends to Try Now
                                        </a>
                                    </h4>

                                    <p class="cl6 stext-108">
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