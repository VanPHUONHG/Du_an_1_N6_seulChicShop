<!-- Header -->
<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="p-l-45 limiter-menu-desktop">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="assets/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="<?= BASE_URL ?>">Home</a>
                        </li>

                        <li>
                            <a href="<?= BASE_URL . "?act=danh-sach-san-pham" ?>">Shop</a>
                        </li>

                        <li class="label1" data-label1="hot">
                            <a href="<?= BASE_URL . "?act=gio-hang" ?>">Features</a>
                        </li>

                        <li>
                            <a href="<?= BASE_URL . "?act=bai-viet" ?>">Blog</a>
                        </li>

                        <li>
                            <a href="<?= BASE_URL . "?act=gioi-thieu" ?>">About</a>
                        </li>

                        <li>
                            <a href="<?= BASE_URL . "?act=lien-he" ?>">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="flex-r-m flex-w h-full wrap-icon-header">
                    <div class="flex-c-m h-full p-r-24">
                        <div class="p-lr-11 cl2 hov-cl1 icon-header-item js-show-modal-search trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <div class="p-lr-11 cl2 hov-cl1 icon-header-item icon-header-noti js-show-cart trans-04"
                            data-notify="2">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-lr-19">
                        <div class="p-lr-11 cl2 hov-cl1 icon-header-item js-show-sidebar trans-04">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-lr-19">
                        <div class="submenu" style="position: relative;">
                            <a href="#" class="p-lr-11 cl2 hov-cl1 icon-header-item trans-04">
                                <i class="zmdi zmdi-account"></i>
                            </a>
                            <div class="submenu-content"
                                style="display: none; position: absolute; top: 100%; right: 0; background: #fff; min-width: 120px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); z-index: 100;">
                                <?php if (isset($_SESSION['user_client'])): ?>
                                    <li style="list-style: none; padding: 8px 16px;">
                                        <span style="color: #333;">Welcome, <?= $_SESSION['user_client'] ?></span>
                                    </li>
                                    <li style="list-style: none; padding: 8px 16px;">
                                        <a href="<?= BASE_URL . "?act=dang-xuat" ?>"
                                            style="color: #333; text-decoration: none;">Sign Out</a>
                                    </li>
                                <?php else: ?>
                                    <li style="list-style: none; padding: 8px 16px;">
                                        <a href="<?= BASE_URL . "?act=dang-nhap" ?>"
                                            style="color: #333; text-decoration: none;">Sign In</a>
                                    </li>
                                    <li style="list-style: none; padding: 8px 16px;">
                                        <a href="<?= BASE_URL . "?act=dang-ky" ?>"
                                            style="color: #333; text-decoration: none;">Sign Up</a>
                                    </li>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="assets/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="flex-r-m flex-w h-full m-r-15 wrap-icon-header">
            <div class="flex-c-m h-full p-r-10">
                <div class="p-lr-11 cl2 hov-cl1 icon-header-item js-show-modal-search trans-04">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>

            <div class="flex-c-m h-full p-lr-10 bor5">
                <div class="p-lr-11 cl2 hov-cl1 icon-header-item icon-header-noti js-show-cart trans-04"
                    data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="<?= BASE_URL ?>">Home</a>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>

            <li>
                <a href="<?= BASE_URL . "?act=danh-sach-san-pham" ?>">Shop</a>
            </li>

            <li>
                <a href="<?= BASE_URL . "?act=gio-hang" ?>" class="label1 rs1" data-label1="hot">Features</a>
            </li>

            <li>
                <a href="<?= BASE_URL . "?act=bai-viet" ?>">Blog</a>
            </li>

            <li>
                <a href="<?= BASE_URL . "?act=gioi-thieu" ?>">About</a>
            </li>

            <li>
                <a href="<?= BASE_URL . "?act=lien-he" ?>">Contact</a>
            </li>

            <?php if (isset($_SESSION['user_client'])): ?>
                <li>
                    <span>Welcome, <?= $_SESSION['user_client'] ?></span>
                </li>
                <li>
                    <a href="<?= BASE_URL . "?act=dang-xuat" ?>">Sign Out</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="<?= BASE_URL . "?act=dang-nhap" ?>">Sign In</a>
                </li>
                <li>
                    <a href="<?= BASE_URL . "?act=dang-ky" ?>">Sign Up</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="flex-c-m modal-search-header js-hide-modal-search trans-04">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search js-hide-modal-search trans-04">
                <img src="assets/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="flex-w p-l-15 wrap-search-header">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>

<!-- Sidebar -->
<aside class="js-sidebar wrap-sidebar">
    <div class="js-hide-sidebar s-full"></div>

    <div class="flex-col-l p-b-25 p-t-22 sidebar">
        <div class="flex-r p-b-30 p-r-27 w-full">
            <div class="p-lr-5 cl2 fs-35 hov-cl1 js-hide-sidebar lh-10 pointer trans-04">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="flex-w p-lr-65 w-full js-pscroll sidebar-content">
            <ul class="w-full sidebar-link">
                <li class="p-b-13">
                    <a href="<?= BASE_URL ?>" class="cl2 hov-cl1 stext-102 trans-04">
                        Home
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="#" class="cl2 hov-cl1 stext-102 trans-04">
                        My Wishlist
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="#" class="cl2 hov-cl1 stext-102 trans-04">
                        My Account
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="#" class="cl2 hov-cl1 stext-102 trans-04">
                        Track Oder
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="#" class="cl2 hov-cl1 stext-102 trans-04">
                        Refunds
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="#" class="cl2 hov-cl1 stext-102 trans-04">
                        Help & FAQs
                    </a>
                </li>
            </ul>

            <div class="p-tb-30 w-full sidebar-gallery">
                <span class="cl5 mtext-101">
                    @ CozaStore
                </span>

                <div class="flex-sb flex-w p-t-36 gallery-lb">
                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-01.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-01.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-02.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-02.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-03.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-03.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-04.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-04.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-05.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-05.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-06.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-06.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-07.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-07.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-08.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-08.jpg');"></a>
                    </div>

                    <!-- item gallery sidebar -->
                    <div class="m-b-10 wrap-item-gallery">
                        <a class="bg-img1 item-gallery" href="assets/images/gallery-09.jpg" data-lightbox="gallery"
                            style="background-image: url('assets/images/gallery-09.jpg');"></a>
                    </div>
                </div>
            </div>

            <div class="w-full sidebar-gallery">
                <span class="cl5 mtext-101">
                    About Us
                </span>

                <p class="p-t-27 cl6 stext-108">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit.
                    Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum
                    quis.
                </p>
            </div>
        </div>
    </div>
</aside>


<!-- Cart -->
<div class="js-panel-cart wrap-header-cart">
    <div class="js-hide-cart s-full"></div>

    <div class="flex-col-l p-l-65 p-r-25 header-cart">
        <div class="flex-sb-m flex-w p-b-8 header-cart-title">
            <span class="cl2 mtext-103">
                Your Cart
            </span>

            <div class="p-lr-5 cl2 fs-35 hov-cl1 js-hide-cart lh-10 pointer trans-04">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="flex-w header-cart-content js-pscroll">
            <ul class="w-full header-cart-wrapitem">
                <li class="flex-t flex-w m-b-12 header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="assets/images/item-cart-01.jpg" alt="IMG">
                    </div>

                    <div class="p-t-8 header-cart-item-txt">
                        <a href="#" class="m-b-18 header-cart-item-name hov-cl1 trans-04">
                            White Shirt Pleat
                        </a>

                        <span class="header-cart-item-info">
                            1 x $19.00
                        </span>
                    </div>
                </li>

                <li class="flex-t flex-w m-b-12 header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="assets/images/item-cart-02.jpg" alt="IMG">
                    </div>

                    <div class="p-t-8 header-cart-item-txt">
                        <a href="#" class="m-b-18 header-cart-item-name hov-cl1 trans-04">
                            Converse All Star
                        </a>

                        <span class="header-cart-item-info">
                            1 x $39.00
                        </span>
                    </div>
                </li>

                <li class="flex-t flex-w m-b-12 header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="assets/images/item-cart-03.jpg" alt="IMG">
                    </div>

                    <div class="p-t-8 header-cart-item-txt">
                        <a href="#" class="m-b-18 header-cart-item-name hov-cl1 trans-04">
                            Nixon Porter Leather
                        </a>

                        <span class="header-cart-item-info">
                            1 x $17.00
                        </span>
                    </div>
                </li>
            </ul>

            <div class="w-full">
                <div class="p-tb-40 w-full header-cart-total">
                    Total: $75.00
                </div>

                <div class="flex-w w-full header-cart-buttons">
                    <a href="shoping-cart.html"
                        class="flex-c-m m-b-10 m-r-8 p-lr-15 bg3 bor2 cl0 hov-btn3 size-107 stext-101 trans-04">
                        View Cart
                    </a>

                    <a href="shoping-cart.html"
                        class="flex-c-m m-b-10 p-lr-15 bg3 bor2 cl0 hov-btn3 size-107 stext-101 trans-04">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>