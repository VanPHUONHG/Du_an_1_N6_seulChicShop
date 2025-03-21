<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>


<!-- breadcrumb -->
<div class="container">
    <div class="flex-w p-l-25 p-lr-0-lg p-r-15 p-t-30 bread-crumb">
        <a href="index.html" class="cl8 hov-cl1 stext-109 trans-04">
            Home
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <a href="product.html" class="cl8 hov-cl1 stext-109 trans-04">
            Men
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <span class="cl4 stext-109">
            Lightweight Jacket
        </span>
    </div>
</div>


<!-- Product Detail -->
<section class="p-b-60 p-t-65 bg0 sec-product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 p-b-30">
                <div class="p-l-25 p-lr-0-lg p-r-30">
                    <div class="flex-sb flex-w wrap-slick3">
                        <div class="wrap-slick3-dots"></div>
                        <div class="flex-sb-m flex-w wrap-slick3-arrows"></div>

                        <div class="gallery-lb slick3">
                            <div class="item-slick3" data-thumb="assets/images/product-detail-01.jpg">
                                <div class="pos-relative wrap-pic-w">
                                    <img src="assets/images/product-detail-01.jpg" alt="IMG-PRODUCT">

                                    <a class="flex-c-m bg0 bor0 cl10 fs-16 hov-btn3 how-pos1 size-108 trans-04"
                                        href="assets/images/product-detail-01.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="item-slick3" data-thumb="assets/images/product-detail-02.jpg">
                                <div class="pos-relative wrap-pic-w">
                                    <img src="assets/images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                    <a class="flex-c-m bg0 bor0 cl10 fs-16 hov-btn3 how-pos1 size-108 trans-04"
                                        href="assets/images/product-detail-02.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="item-slick3" data-thumb="assets/images/product-detail-03.jpg">
                                <div class="pos-relative wrap-pic-w">
                                    <img src="assets/images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                    <a class="flex-c-m bg0 bor0 cl10 fs-16 hov-btn3 how-pos1 size-108 trans-04"
                                        href="assets/images/product-detail-03.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6 p-b-30">
                <div class="p-lr-0-lg p-r-50 p-t-5">
                    <h4 class="p-b-14 cl2 js-name-detail mtext-105">
                        Lightweight Jacket
                    </h4>

                    <span class="cl2 mtext-106">
                        $58.79
                    </span>

                    <p class="p-t-23 cl3 stext-102">
                        Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare
                        feugiat.
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        <div class="flex-r-m flex-w p-b-10">
                            <div class="flex-c-m respon6 size-203">
                                Size
                            </div>

                            <div class="respon6-next size-204">
                                <div class="bg0 bor8 rs1-select2">
                                    <select class="js-select2" name="time">
                                        <option>Choose an option</option>
                                        <option>Size S</option>
                                        <option>Size M</option>
                                        <option>Size L</option>
                                        <option>Size XL</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-r-m flex-w p-b-10">
                            <div class="flex-c-m respon6 size-203">
                                Color
                            </div>

                            <div class="respon6-next size-204">
                                <div class="bg0 bor8 rs1-select2">
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

                        <div class="flex-r-m flex-w p-b-10">
                            <div class="flex-m flex-w respon6-next size-204">
                                <div class="flex-w m-r-20 m-tb-10 wrap-num-product">
                                    <div class="flex-c-m btn-num-product-down cl8 hov-btn3 trans-04">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="cl3 mtext-104 num-product txt-center" type="number" name="num-product"
                                        value="1">

                                    <div class="flex-c-m btn-num-product-up cl8 hov-btn3 trans-04">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>

                                <button
                                    class="flex-c-m p-lr-15 bg1 bor1 cl0 hov-btn1 js-addcart-detail size-101 stext-101 trans-04">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-m flex-w p-l-100 p-t-40 respon7">
                        <div class="flex-m m-r-11 p-r-10 bor9">
                            <a href="#"
                                class="p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 js-addwish-detail lh-10 tooltip100 trans-04"
                                data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="m-r-8 p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 lh-10 tooltip100 trans-04"
                            data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="m-r-8 p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 lh-10 tooltip100 trans-04"
                            data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="m-r-8 p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 lh-10 tooltip100 trans-04"
                            data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-t-50 p-b-40 p-t-43 bor10">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="p-t-43 tab-content">
                    <!-- - -->
                    <div class="active fade show tab-pane" id="description" role="tabpanel">
                        <div class="p-lr-15-md how-pos2">
                            <p class="cl6 stext-102">
                                Aenean sit amet gravida nisi. Nam fermentum est felis, quis feugiat nunc fringilla sit
                                amet. Ut in blandit ipsum. Quisque luctus dui at ante aliquet, in hendrerit lectus
                                interdum. Morbi elementum sapien rhoncus pretium maximus. Nulla lectus enim, cursus et
                                elementum sed, sodales vitae eros. Ut ex quam, porta consequat interdum in, faucibus eu
                                velit. Quisque rhoncus ex ac libero varius molestie. Aenean tempor sit amet orci nec
                                iaculis. Cras sit amet nulla libero. Curabitur dignissim, nunc nec laoreet consequat,
                                purus nunc porta lacus, vel efficitur tellus augue in ipsum. Cras in arcu sed metus
                                rutrum iaculis. Nulla non tempor erat. Duis in egestas nunc.
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="fade tab-pane" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-10 m-lr-auto">
                                <ul class="p-lr-15-sm p-lr-28">
                                    <li class="flex-t flex-w p-b-7">
                                        <span class="cl3 size-205 stext-102">
                                            Weight
                                        </span>

                                        <span class="cl6 size-206 stext-102">
                                            0.79 kg
                                        </span>
                                    </li>

                                    <li class="flex-t flex-w p-b-7">
                                        <span class="cl3 size-205 stext-102">
                                            Dimensions
                                        </span>

                                        <span class="cl6 size-206 stext-102">
                                            110 x 33 x 100 cm
                                        </span>
                                    </li>

                                    <li class="flex-t flex-w p-b-7">
                                        <span class="cl3 size-205 stext-102">
                                            Materials
                                        </span>

                                        <span class="cl6 size-206 stext-102">
                                            60% cotton
                                        </span>
                                    </li>

                                    <li class="flex-t flex-w p-b-7">
                                        <span class="cl3 size-205 stext-102">
                                            Color
                                        </span>

                                        <span class="cl6 size-206 stext-102">
                                            Black, Blue, Grey, Green, Red, White
                                        </span>
                                    </li>

                                    <li class="flex-t flex-w p-b-7">
                                        <span class="cl3 size-205 stext-102">
                                            Size
                                        </span>

                                        <span class="cl6 size-206 stext-102">
                                            XL, L, M, S
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="fade tab-pane" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-sm-10 m-lr-auto">
                                <div class="m-lr-15-sm p-b-30">
                                    <!-- Review -->
                                    <div class="flex-t flex-w p-b-68">
                                        <div class="m-r-18 m-t-6 bor0 of-hidden size-109 wrap-pic-s">
                                            <img src="assets/images/avatar-01.jpg" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-sb-m flex-w p-b-17">
                                                <span class="p-r-20 cl2 mtext-107">
                                                    Ariana Grande
                                                </span>

                                                <span class="cl11 fs-18">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </span>
                                            </div>

                                            <p class="cl6 stext-102">
                                                Quod autem in homine praestantissimum atque optimum est, id deseruit.
                                                Apud ceteros autem philosophos
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="p-b-7 cl2 mtext-108">
                                            Add a review
                                        </h5>

                                        <p class="cl6 stext-102">
                                            Your email address will not be published. Required fields are marked *
                                        </p>

                                        <div class="flex-m flex-w p-b-23 p-t-50">
                                            <span class="m-r-16 cl3 stext-102">
                                                Your Rating
                                            </span>

                                            <span class="cl11 fs-18 pointer wrap-rating">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="cl3 stext-102" for="review">Your review</label>
                                                <textarea class="p-lr-20 p-tb-10 bor8 cl2 size-110 stext-102"
                                                    id="review" name="review"></textarea>
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="cl3 stext-102" for="name">Name</label>
                                                <input class="p-lr-20 bor8 cl2 size-111 stext-102" id="name" type="text"
                                                    name="name">
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="cl3 stext-102" for="email">Email</label>
                                                <input class="p-lr-20 bor8 cl2 size-111 stext-102" id="email"
                                                    type="text" name="email">
                                            </div>
                                        </div>

                                        <button
                                            class="flex-c-m m-b-10 p-lr-15 bg7 bor11 cl0 hov-btn3 size-112 stext-101 trans-04">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-c-m flex-w m-t-73 p-tb-15 bg6 size-302">
        <span class="p-lr-25 cl6 stext-107">
            SKU: JAK-01
        </span>

        <span class="p-lr-25 cl6 stext-107">
            Categories: Jacket, Men
        </span>
    </div>
</section>


<!-- Related Products -->
<section class="p-b-105 p-t-45 bg0 sec-relate-product">
    <div class="container">
        <div class="p-b-45">
            <h3 class="cl5 ltext-106 txt-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
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
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Esprit Ruffle Shirt
                                </a>

                                <span class="cl3 stext-105">
                                    $16.64
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
                            <img src="assets/images/product-02.jpg" alt="IMG-PRODUCT">

                            <a href="#"
                                class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Herschel supply
                                </a>

                                <span class="cl3 stext-105">
                                    $35.31
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
                            <img src="assets/images/product-03.jpg" alt="IMG-PRODUCT">

                            <a href="#"
                                class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Only Check Trouser
                                </a>

                                <span class="cl3 stext-105">
                                    $25.50
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
                            <img src="assets/images/product-04.jpg" alt="IMG-PRODUCT">

                            <a href="#"
                                class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Classic Trench Coat
                                </a>

                                <span class="cl3 stext-105">
                                    $75.00
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
                            <img src="assets/images/product-05.jpg" alt="IMG-PRODUCT">

                            <a href="#"
                                class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Front Pocket Jumper
                                </a>

                                <span class="cl3 stext-105">
                                    $34.75
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
                            <img src="assets/images/product-06.jpg" alt="IMG-PRODUCT">

                            <a href="#"
                                class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Vintage Inspired Classic
                                </a>

                                <span class="cl3 stext-105">
                                    $93.20
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
                            <img src="images/product-07.jpg" alt="IMG-PRODUCT">

                            <a href="#"
                                class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Shirt in Stretch Cotton
                                </a>

                                <span class="cl3 stext-105">
                                    $52.66
                                </span>
                            </div>

                            <div class="flex-r p-t-3 block2-txt-child2">
                                <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                    <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                        alt="ICON">
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
                                <a href="product-detail.html" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    Pieces Metallic Printed
                                </a>

                                <span class="cl3 stext-105">
                                    $18.96
                                </span>
                            </div>

                            <div class="flex-r p-t-3 block2-txt-child2">
                                <a href="#" class="btn-addwish-b2 dis-block js-addwish-b2 pos-relative">
                                    <img class="dis-block icon-heart1 trans-04" src="images/icons/icon-heart-01.png"
                                        alt="ICON">
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


<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>