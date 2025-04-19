<!-- Header -->
<?php include 'layouts/header.php'; ?>

<!-- Navbar -->
<?php include 'layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include 'layouts/miniCart.php'; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm mx-3" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        <?= $_SESSION['success'] ?>
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
            <div class="item-slick1" style="background-image: url(<?php echo !empty($banners[2]['hinh_anh_url']) ? $banners[2]['hinh_anh_url'] : 'assets/images/banner-default.jpg'; ?>); background-size: cover; background-position: center;">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-b-30 p-t-100">
                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 respon2 text-shadow">
                                SEULCHICSHOP
                            </span>
                        </div>

                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInUp" data-delay="800">
                            <h2 class="p-b-43 p-t-19 ltext-104 respon1 text-shadow">
                                Nâng Tầm Phong Cách
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 btn-glow">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(<?php echo !empty($banners[1]['hinh_anh_url']) ? $banners[1]['hinh_anh_url'] : 'assets/images/banner-default.jpg'; ?>); background-size: cover; background-position: center;">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-b-30 p-t-100">
                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 respon2 text-shadow">
                                Elegance comes from the details
                            </span>
                        </div>

                        <div class="animated layer-slick1 visible-false text-white" data-appear="fadeInUp" data-delay="800">
                            <h2 class="p-b-43 p-t-19 ltext-104 respon1 text-shadow">
                                Every piece has its own signature.
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 btn-glow">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(<?php echo !empty($banners[0]['hinh_anh_url']) ? $banners[0]['hinh_anh_url'] : 'assets/images/banner-default.jpg'; ?>); background-size: cover; background-position: center;">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                            <span class="ltext-202 cl2 respon2 text-shadow">
                                Women Collection 2024
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                            <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1 text-shadow">
                                NEW SEASON
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 btn-glow">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg hover-zoom h-100">
                <div class="card-img-top" style="height: 400px; overflow: hidden;">
                    <img src="assets/image_da1/HodiMixiKhoa1.webp" alt="Áo Khoác" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-img-overlay d-flex flex-column justify-content-end text-white" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                    <h3 class="card-title mb-2">Áo Khoác</h3>
                    <p class="card-text mb-3">Spring 2025</p>
                    <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" class="btn btn-outline-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg hover-zoom h-100">
                <div class="card-img-top" style="height: 400px; overflow: hidden;">
                    <img src="assets/image_da1/Boni4.webp" alt="Áo Thun" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-img-overlay d-flex flex-column justify-content-end text-white" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                    <h3 class="card-title mb-2">Áo Thun</h3>
                    <p class="card-text mb-3">Spring 2025</p>
                    <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" class="btn btn-outline-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-lg hover-zoom h-100">
                <div class="card-img-top" style="height: 400px; overflow: hidden;">
                    <img src="assets/image_da1/coc_snecker2.webp" alt="Đồ lưu niệm" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="card-img-overlay d-flex flex-column justify-content-end text-white" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                    <h3 class="card-title mb-2">Đồ lưu niệm</h3>
                    <p class="card-text mb-3">Hot Trend</p>
                    <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" class="btn btn-outline-light">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Product -->
<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1 position-relative text-center w-100">
                Store Overview
                <span class="position-absolute w-50 border-bottom border-primary" style="bottom: -10px; left: 25%;"></span>
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs justify-content-center border-0" role="tablist">
                <li class="nav-item p-b-10 mx-3">
                    <a class="nav-link active font-weight-bold" data-toggle="tab" href="#best-seller" role="tab" style="border: none; color: #333;">
                        <i class="fas fa-star text-warning mr-2"></i>Best Seller
                    </a>
                </li>

                <li class="nav-item p-b-10 mx-3">
                    <a class="nav-link font-weight-bold" data-toggle="tab" href="#sale" role="tab" style="border: none; color: #333;">
                        <i class="fas fa-tags text-danger mr-2"></i>Sale
                    </a>
                </li>

                <li class="nav-item p-b-10 mx-3">
                    <a class="nav-link font-weight-bold" data-toggle="tab" href="#top-rate" role="tab" style="border: none; color: #333;">
                        <i class="fas fa-thumbs-up text-success mr-2"></i>Top Rate
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-t-50">
                <!-- Best Seller -->
                <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                    <div class="wrap-slick2">
                        <div class="slick2">
                            <?php foreach ($productBestSeller as $product): ?>
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <div class="block2 rounded shadow-sm hover-shadow transition-all">
                                        <div class="block2-pic hov-img0 position-relative" style="height: 300px; overflow: hidden;">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>">
                                                <img src="<?= !empty($product['hinh_anh']) ? $product['hinh_anh'] : 'assets/images/product-01.jpg' ?>" alt="<?= $product['ten_san_pham'] ?>" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                            </a>
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 position-absolute" style="bottom: 20px; left: 50%; transform: translateX(-50%);">
                                                <i class="fas fa-eye mr-2"></i>Quick View
                                            </a>
                                        </div>

                                        <div class="block2-txt p-t-14 p-b-14 p-x-14">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                                        class="text-dark font-weight-bold mb-2 d-block hover-primary">
                                                        <?= $product['ten_san_pham'] ?>
                                                    </a>

                                                    <div class="price-wrapper">
                                                        <?php if ($product['gia_san_pham_khuyen_mai'] > 0): ?>
                                                            <span class="text-decoration-line-through text-muted"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                                            <span class="text-danger font-weight-bold ml-2"><?= number_format($product['gia_san_pham_khuyen_mai']) . 'đ' ?></span>
                                                        <?php else: ?>
                                                            <span class="text-primary font-weight-bold"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <a href="#" class="btn-addwish-b2 text-danger">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Sale -->
                <div class="tab-pane fade" id="sale" role="tabpanel">
                    <div class="wrap-slick2">
                        <div class="slick2">
                            <?php foreach ($productSelling as $product): ?>
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <div class="block2 rounded shadow-sm hover-shadow transition-all">
                                        <div class="block2-pic hov-img0 position-relative" style="height: 300px; overflow: hidden;">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>">
                                                <img src="<?= !empty($product['hinh_anh']) ? $product['hinh_anh'] : 'assets/images/product-02.jpg' ?>" alt="<?= $product['ten_san_pham'] ?>" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                            </a>
                                            <div class="sale-badge position-absolute bg-danger text-white px-3 py-1" style="top: 10px; right: 10px; border-radius: 20px;">
                                                Sale!
                                            </div>
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 position-absolute" style="bottom: 20px; left: 50%; transform: translateX(-50%);">
                                                <i class="fas fa-eye mr-2"></i>Quick View
                                            </a>
                                        </div>

                                        <div class="block2-txt p-t-14 p-b-14 p-x-14">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                                        class="text-dark font-weight-bold mb-2 d-block hover-primary">
                                                        <?= $product['ten_san_pham'] ?>
                                                    </a>

                                                    <div class="price-wrapper">
                                                        <?php if ($product['gia_san_pham_khuyen_mai'] > 0): ?>
                                                            <span class="text-decoration-line-through text-muted"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                                            <span class="text-danger font-weight-bold ml-2"><?= number_format($product['gia_san_pham_khuyen_mai']) . 'đ' ?></span>
                                                        <?php else: ?>
                                                            <span class="text-primary font-weight-bold"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <a href="#" class="btn-addwish-b2 text-danger">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Top Rate -->
                <div class="tab-pane fade" id="top-rate" role="tabpanel">
                    <div class="wrap-slick2">
                        <div class="slick2">
                            <?php foreach ($productTopRating as $product): ?>
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <div class="block2 rounded shadow-sm hover-shadow transition-all">
                                        <div class="block2-pic hov-img0 position-relative" style="height: 300px; overflow: hidden;">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>">
                                                <img src="<?= !empty($product['hinh_anh']) ? $product['hinh_anh'] : 'assets/images/product-01.jpg' ?>" alt="<?= $product['ten_san_pham'] ?>" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                            </a>
                                            <div class="rating-badge position-absolute bg-warning text-white px-2 py-1" style="top: 10px; right: 10px; border-radius: 20px;">
                                                <i class="fas fa-star"></i> Top Rated
                                            </div>
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 position-absolute" style="bottom: 20px; left: 50%; transform: translateX(-50%);">
                                                <i class="fas fa-eye mr-2"></i>Quick View
                                            </a>
                                        </div>

                                        <div class="block2-txt p-t-14 p-b-14 p-x-14">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                                        class="text-dark font-weight-bold mb-2 d-block hover-primary">
                                                        <?= $product['ten_san_pham'] ?>
                                                    </a>

                                                    <div class="price-wrapper">
                                                        <?php if ($product['gia_san_pham_khuyen_mai'] > 0): ?>
                                                            <span class="text-decoration-line-through text-muted"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                                            <span class="text-danger font-weight-bold ml-2"><?= number_format($product['gia_san_pham_khuyen_mai']) . 'đ' ?></span>
                                                        <?php else: ?>
                                                            <span class="text-primary font-weight-bold"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <a href="#" class="btn-addwish-b2 text-danger">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 class="ltext-105 cl5 txt-center respon1 position-relative text-center w-100">
                Our Blogs
                <span class="position-absolute w-50 border-bottom border-primary" style="bottom: -10px; left: 25%;"></span>
            </h3>
        </div>

        <div class="row">
            <?php foreach ($postNew as $post): ?>
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item rounded overflow-hidden shadow-sm hover-shadow transition-all">
                        <div class="position-relative">
                            <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet&id=' . $post['id'] ?>">
                                <img src="<?= !empty($post['hinh_anh']) ? $post['hinh_anh'] : 'assets/images/blog-01.jpg' ?>" alt="<?= $post['tieu_de'] ?>" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                            </a>
                            <div class="post-date position-absolute bg-primary text-white text-center p-2" style="top: 10px; left: 10px; border-radius: 5px;">
                                <?= date('d', strtotime($post['ngay_tao_bai_viet'])) ?>
                                <small class="d-block"><?= date('M', strtotime($post['ngay_tao_bai_viet'])) ?></small>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-user-edit text-primary mr-2"></i>
                                <span class="text-muted"><?= $post['tac_gia'] ?></span>
                            </div>

                            <h4 class="mb-3">
                                <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet&id=' . $post['id'] ?>" class="text-dark hover-primary font-weight-bold">
                                    <?= $post['tieu_de'] ?>
                                </a>
                            </h4>

                            <p class="text-muted mb-0">
                                <?= substr($post['bai_viet'], 0, 150) ?>...
                            </p>
                            
                            <a href="<?= BASE_URL . '?act=chi-tiet-bai-viet&id=' . $post['id'] ?>" class="btn btn-outline-primary btn-sm mt-3">
                                Read More <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="assets/images/icons/icon-close.png" alt="CLOSE">
            </button>

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
                            Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
                        </p>

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

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

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

                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
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