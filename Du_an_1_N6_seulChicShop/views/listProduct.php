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
                <button class="m-r-32 m-tb-5 bor3 cl6 hov1 how-active1 stext-106 trans-04" data-filter="*">
                    All Products
                </button>

                <button class="m-r-32 m-tb-5 bor3 cl6 hov1 stext-106 trans-04" data-filter=".women">
                    Women
                </button>

                <button class="m-r-32 m-tb-5 bor3 cl6 hov1 stext-106 trans-04" data-filter=".men">
                    Men
                </button>

                <button class="m-r-32 m-tb-5 bor3 cl6 hov1 stext-106 trans-04" data-filter=".bag">
                    Bag
                </button>

                <button class="m-r-32 m-tb-5 bor3 cl6 hov1 stext-106 trans-04" data-filter=".shoes">
                    Shoes
                </button>

                <button class="m-r-32 m-tb-5 bor3 cl6 hov1 stext-106 trans-04" data-filter=".watches">
                    Watches
                </button>
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
            <div class="p-t-10 w-full dis-none panel-filter">
                <div class="flex-w p-lr-15-sm p-lr-40 p-t-27 w-full bg6 wrap-filter">
                    <div class="p-b-27 p-r-15 filter-col1">
                        <div class="p-b-15 cl2 mtext-102">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Popularity
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Average rating
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link filter-link-active stext-106 trans-04">
                                    Newness
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="p-b-27 p-r-15 filter-col2">
                        <div class="p-b-15 cl2 mtext-102">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link filter-link-active stext-106 trans-04">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $0.00 - $50.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $100.00 - $150.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $150.00 - $200.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="p-b-27 p-r-15 filter-col3">
                        <div class="p-b-15 cl2 mtext-102">
                            Color
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <span class="m-r-6 fs-15 lh-12" style="color: #222;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Black
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="m-r-6 fs-15 lh-12" style="color: #4272d7;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link filter-link-active stext-106 trans-04">
                                    Blue
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="m-r-6 fs-15 lh-12" style="color: #b3b3b3;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Grey
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="m-r-6 fs-15 lh-12" style="color: #00ad5f;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Green
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="m-r-6 fs-15 lh-12" style="color: #fa4251;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Red
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="m-r-6 fs-15 lh-12" style="color: #aaa;">
                                    <i class="zmdi zmdi-circle-o"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    White
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="p-b-27 filter-col4">
                        <div class="p-b-15 cl2 mtext-102">
                            Tags
                        </div>

                        <div class="flex-w m-r--5 p-t-4">
                            <a href="#"
                                class="flex-c-m m-b-5 m-r-5 p-lr-15 bor7 cl6 hov-tag1 size-301 stext-107 trans-04">
                                Fashion
                            </a>

                            <a href="#"
                                class="flex-c-m m-b-5 m-r-5 p-lr-15 bor7 cl6 hov-tag1 size-301 stext-107 trans-04">
                                Lifestyle
                            </a>

                            <a href="#"
                                class="flex-c-m m-b-5 m-r-5 p-lr-15 bor7 cl6 hov-tag1 size-301 stext-107 trans-04">
                                Denim
                            </a>

                            <a href="#"
                                class="flex-c-m m-b-5 m-r-5 p-lr-15 bor7 cl6 hov-tag1 size-301 stext-107 trans-04">
                                Streetstyle
                            </a>

                            <a href="#"
                                class="flex-c-m m-b-5 m-r-5 p-lr-15 bor7 cl6 hov-tag1 size-301 stext-107 trans-04">
                                Crafts
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-01.jpg" alt="IMG-PRODUCT">

                        <a href="#"
                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                            Quick View
                        </a>
                    </div>

                    <div class="flex-t flex-w p-t-14 block2-txt">
                        <div class="flex-col-l block2-txt-child1">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                Esprit Ruffle Shirt
                            </a>

                            <span class="cl3 stext-105">
                                $16.64
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

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-02.jpg" alt="IMG-PRODUCT">

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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item men">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-03.jpg" alt="IMG-PRODUCT">

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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-04.jpg" alt="IMG-PRODUCT">

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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-05.jpg" alt="IMG-PRODUCT">

                        <a href="#"
                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                            Quick View
                        </a>
                    </div>

                    <div class="flex-t flex-w p-t-14 block2-txt">
                        <div class="flex-col-l block2-txt-child1">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                Front Pocket Jumper
                            </a>

                            <span class="cl3 stext-105">
                                $34.75
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

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item watches">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-06.jpg" alt="IMG-PRODUCT">

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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-07.jpg" alt="IMG-PRODUCT">

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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item shoes">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-09.jpg" alt="IMG-PRODUCT">

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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="assets/images/product-10.jpg" alt="IMG-PRODUCT">

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
                                <img class="dis-block icon-heart1 trans-04" src="assets/images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04"
                                    src="assets/images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item men">
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
                                <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04" src="images/icons/icon-heart-02.png"
                                    alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item men">
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
                                <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04" src="images/icons/icon-heart-02.png"
                                    alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
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
                                <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04" src="images/icons/icon-heart-02.png"
                                    alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="images/product-14.jpg" alt="IMG-PRODUCT">

                        <a href="#"
                            class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                            Quick View
                        </a>
                    </div>

                    <div class="flex-t flex-w p-t-14 block2-txt">
                        <div class="flex-col-l block2-txt-child1">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham' ?>"
                                class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                Pretty Little Thing
                            </a>

                            <span class="cl3 stext-105">
                                $54.79
                            </span>
                        </div>

                        <div class="flex-r p-t-3 block2-txt-child2">
                            <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04" src="images/icons/icon-heart-02.png"
                                    alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item watches">
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
                                <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04" src="images/icons/icon-heart-02.png"
                                    alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 p-b-35 isotope-item women">
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
                                <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                    alt="ICON">
                                <img class="ab-t-l dis-block icon-heart2 trans-04" src="images/icons/icon-heart-02.png"
                                    alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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