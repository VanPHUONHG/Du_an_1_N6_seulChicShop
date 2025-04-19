<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- breadcrumb -->
<div class="container">
    <div class="flex-w p-l-25 p-lr-0-lg p-r-15 p-t-30 bread-crumb">
        <a href="index.html" class="cl8 hov-cl1 stext-109 trans-04">
            Home
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <a href="<?= BASE_URL . '?act=danh-sach-san-pham&id_danh_muc=' . $Product['danh_muc_id'] ?>"
            class="cl8 hov-cl1 stext-109 trans-04">
            <?php echo $Product['ten_danh_muc'] ?>
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>

        </a>

        <span class="cl4 stext-109">
            <?php echo $Product['ten_san_pham'] ?>
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
                            <div class="item-slick3" data-thumb="<?= !empty($Product['hinh_anh']) ? $Product['hinh_anh'] : 'assets/images/product-04.jpg' ?>">
                                <div class="pos-relative wrap-pic-w">
                                    <img src="<?= !empty($Product['hinh_anh']) ? $Product['hinh_anh'] : 'assets/images/product-04.jpg' ?>" alt="IMG-PRODUCT">

                                    <a class="flex-c-m bg0 bor0 cl10 fs-16 hov-btn3 how-pos1 size-108 trans-04"
                                        href="assets/images/product-detail-01.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <?php if ($listVariant): ?>
                                <?php foreach ($listVariant as $variant): ?>
                                    <div class="item-slick3" data-thumb="<?= !empty($variant['hinh_anh_bien_the']) ? $variant['hinh_anh_bien_the'] : 'assets/images/product-04.jpg' ?>">
                                        <div class="pos-relative wrap-pic-w">
                                            <img src="<?= !empty($variant['hinh_anh_bien_the']) ? $variant['hinh_anh_bien_the'] : 'assets/images/product-04.jpg' ?>" alt="IMG-PRODUCT">

                                            <a class="flex-c-m bg0 bor0 cl10 fs-16 hov-btn3 how-pos1 size-108 trans-04"
                                                href="<?= !empty($variant['hinh_anh_bien_the']) ? $variant['hinh_anh_bien_the'] : 'assets/images/product-04.jpg' ?>">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6 p-b-30">
                <div class="p-lr-0-lg p-r-50 p-t-5">
                    <h4 class="p-b-14 cl2 js-name-detail mtext-105">
                        <?php echo $Product['ten_san_pham'] ?>
                    </h4>

                    <?php if ($Product['gia_san_pham_khuyen_mai'] > 0): ?>
                        <span class="cl2 mtext-106" style="text-decoration: line-through;">
                            <?php echo number_format($Product['gia_san_pham']) . 'đ' ?>
                        </span>
                        <span class="cl2 mtext-106 text-danger">
                            <?php echo number_format($Product['gia_san_pham_khuyen_mai']) . 'đ' ?>
                        </span>
                    <?php else: ?>
                        <span class="cl2 mtext-106">
                            <?php echo number_format($Product['gia_san_pham']) . 'đ' ?>
                        </span>
                    <?php endif; ?>

                    <p class="p-t-23 cl3 stext-102">
                        <?php echo $Product['mo_ta'] ?>
                    </p>
                    <form action="<?= BASE_URL . '?act=them-san-pham-gio-hang' ?>" method="post"
                        enctype="multipart/form-data">
                        <!-- Size and Color -->
                        <?php if (!empty($listVariant)): ?>
                            <div class="p-t-33">
                                <div class="flex-r-m flex-w p-b-10">
                                    <div class="flex-c-m respon6 size-203">
                                        Variant
                                    </div>

                                    <div class="respon6-next size-204">
                                        <div class="bg0 bor8 rs1-select2">
                                            <select class="js-select2" name="bien_the_san_pham_id"
                                                id="bien_the_san_pham_id">
                                                <option value="">Choose an option</option>
                                                <?php foreach ($listVariant as $variant): ?>
                                                    <?php if ($variant['so_luong'] > 0): ?>
                                                        <option value="<?= $variant['id'] ?>">
                                                            <?= $variant['kich_thuoc'] . ' - ' . $variant['mau_sac'] ?> (Còn
                                                            <?= $variant['so_luong'] ?> sản phẩm)
                                                        </option>
                                                    <?php else: ?>
                                                        <option value="<?= $variant['id'] ?>" disabled>
                                                            <?= $variant['kich_thuoc'] . ' - ' . $variant['mau_sac'] ?> (Hết hàng)
                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="flex-r-m flex-w p-b-10">
                            <div class="flex-m flex-w respon6-next size-204">
                                <div class="flex-w m-r-20 m-tb-10 wrap-num-product">
                                    <input type="hidden" name="san_pham_id" value="<?= $Product['id'] ?>">
                                    <div class="flex-c-m btn-num-product-down cl8 hov-btn3 trans-04">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="cl3 mtext-104 num-product txt-center" type="number" name="so_luong"
                                        value="1" min="1">

                                    <div class="flex-c-m btn-num-product-up cl8 hov-btn3 trans-04">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="flex-c-m p-lr-15 bg1 bor1 cl0 hov-btn1 size-101 stext-101 trans-04">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!--  -->
                <div class="flex-m flex-w p-l-100 p-t-40 respon7">
                    <div class="flex-m m-r-11 p-r-10 bor9">
                        <a href="#" class="p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 js-addwish-detail lh-10 tooltip100 trans-04"
                            data-tooltip="Add to Wishlist">
                            <i class="zmdi zmdi-favorite"></i>
                        </a>
                    </div>

                    <a href="#" class="m-r-8 p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 lh-10 tooltip100 trans-04"
                        data-tooltip="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#" class="m-r-8 p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 lh-10 tooltip100 trans-04"
                        data-tooltip="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="#" class="m-r-8 p-lr-5 p-tb-2 cl3 fs-14 hov-cl1 lh-10 tooltip100 trans-04"
                        data-tooltip="Google Plus">
                        <i class="fab fa-google-plus-g"></i>
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
                    <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="p-t-43 tab-content">
                <!-- - -->
                <div class="active fade show tab-pane" id="description" role="tabpanel">
                    <div class="p-lr-15-md how-pos2">
                        <p class="cl6 stext-102">
                            <?php echo $Product['mo_ta'] ?>
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
                                        <?php echo $Product['mau_sac'] ?>
                                    </span>
                                </li>

                                <li class="flex-t flex-w p-b-7">
                                    <span class="cl3 size-205 stext-102">
                                        Size
                                    </span>

                                    <span class="cl6 size-206 stext-102">
                                        <?php echo $Product['kich_thuoc'] ?>
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
                                <?php foreach ($listComment as $comment): ?>
                                    <div class="flex-t flex-w p-b-68">
                                        <div class="m-r-18 m-t-6 bor0 of-hidden size-109 wrap-pic-s">
                                            <img src="<?= !empty($comment['anh_dai_dien']) ? $comment['anh_dai_dien'] : 'assets/images/avatar-default.jpg' ?>" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-sb-m flex-w p-b-17">
                                                <span class="p-r-20 cl2 mtext-107">
                                                    <?php echo $comment['ten_tai_khoan'] ?>
                                                </span>
                                                <span class="cl11 fs-18">
                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                        <?php if ($i <= $comment['danh_gia']): ?>
                                                            <i class="zmdi zmdi-star"></i>
                                                        <?php else: ?>
                                                            <i class="zmdi zmdi-star-outline"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </span>
                                            </div>

                                            <p class="cl6 stext-102">
                                                <?php echo $comment['noi_dung'] ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <!-- Add review -->
                                <?php if(isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success">
                                        <?php echo $_SESSION['success']; ?>
                                        <?php unset($_SESSION['success']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['error']; ?>
                                        <?php unset($_SESSION['error']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(isset($_SESSION['user_client'])): ?>
                                <form class="w-full"
                                    action="<?= BASE_URL . '?act=them-binh-luan&id=' . $Product['id'] ?>" method="post">
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
                                            <i class="item-rating pointer zmdi zmdi-star-outline" data-value="1"
                                                onclick="rateProduct(1)"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline" data-value="2"
                                                onclick="rateProduct(2)"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline" data-value="3"
                                                onclick="rateProduct(3)"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline" data-value="4"
                                                onclick="rateProduct(4)"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline" data-value="5"
                                                onclick="rateProduct(5)"></i>
                                            <input class="dis-none" type="number" name="danh_gia" id="rating-input" required>
                                        </span>
                                    </div>

                                    <div class="row p-b-25">
                                        <div class="col-12 p-b-5">
                                            <label class="cl3 stext-102" for="review">Your review</label>
                                            <textarea class="p-lr-20 p-tb-10 bor8 cl2 size-110 stext-102" id="noi_dung"
                                                name="noi_dung" required></textarea>
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="flex-c-m m-b-10 p-lr-15 bg7 bor11 cl0 hov-btn3 size-112 stext-101 trans-04">
                                        Submit
                                    </button>
                                </form>
                                <?php else: ?>
                                    <div class="alert alert-info">
                                        Vui lòng <a href="<?= BASE_URL . '?act=dang-nhap' ?>">đăng nhập</a> để bình luận
                                    </div>
                                <?php endif; ?>
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
            Categories: <?php echo $Product['ten_danh_muc'] ?>
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
                <?php foreach ($listProductSameCategory as $product): ?>
                <div class="p-b-15 p-l-15 p-r-15 p-t-15 item-slick2">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="<?= !empty($product['hinh_anh']) ? $product['hinh_anh'] : 'assets/images/product-04.jpg' ?>" alt="IMG-PRODUCT">

                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                class="flex-c-m p-lr-15 bg0 block2-btn bor2 cl2 hov-btn1 js-show-modal1 size-102 stext-103 trans-04">
                                Quick View
                            </a>
                        </div>

                        <div class="flex-t flex-w p-t-14 block2-txt">
                            <div class="flex-col-l block2-txt-child1">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>" class="p-b-6 cl4 hov-cl1 js-name-b2 stext-104 trans-04">
                                    <?= $product['ten_san_pham'] ?>
                                </a>

                                <span class="cl3 stext-105">
                                    <?php if ($product['gia_san_pham_khuyen_mai'] > 0): ?>
                                        <span class="cl2 mtext-106 text-decoration-line-through">
                                            <?= number_format($product['gia_san_pham']) . 'đ' ?>
                                        </span>
                                        <span class="cl2 mtext-106 text-danger">
                                            <?= number_format($product['gia_san_pham_khuyen_mai']) . 'đ' ?>
                                        </span>
                                    <?php else: ?>
                                        <?= number_format($product['gia_san_pham']) . 'đ' ?>
                                    <?php endif; ?>
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<script>
    function rateProduct(rating) {
        // Update hidden input value
        document.getElementById('rating-input').value = rating;

        // Update star display
        const stars = document.querySelectorAll('.item-rating');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.remove('zmdi-star-outline');
                star.classList.add('zmdi-star');
            } else {
                star.classList.remove('zmdi-star');
                star.classList.add('zmdi-star-outline');
            }
        });
    }
</script>
<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>