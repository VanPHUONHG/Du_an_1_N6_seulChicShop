<!-- Header -->
<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="p-l-45 limiter-menu-desktop">

                <!-- Logo desktop -->
                <a href="<?= BASE_URL ?>" class="logo">
                    <h2 style="color: #ff0000;">SEULCHIC</h2>
                    <h2 style="color: #000000;">SHOP</h2>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="<?= BASE_URL ?>">Home</a>
                        </li>

                        <li class="label1" data-label1="hot">
                            <a href="<?= BASE_URL . "?act=danh-sach-san-pham" ?>">Shop</a>
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

                    <?php
                    // Kiểm tra nếu không phải trang đăng ký hoặc đăng nhập thì hiển thị giỏ hàng
                    $currentPage = isset($_GET['act']) ? $_GET['act'] : '';
                    if ($currentPage != 'dang-nhap' && $currentPage != 'dang-ky' && isset($_SESSION['user_client'])):
                    ?>

                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <div class="p-lr-11 cl2 hov-cl1 icon-header-item icon-header-noti js-show-cart trans-04 t"
                            id="cart-icon-desktop"
                            data-notify="<?php 
                            $itemCount = 0;
                            if (isset($_SESSION['user_client'])) {
                                $user = (new ClientUser())->getAccountByNameUser($_SESSION['user_client']);
                                $cart = (new ClientCart())->getCartFromUser($user['id']);
                                if ($cart) {
                                    $detailCart = (new ClientCart())->getDetailCart($cart['id']);
                                    foreach($detailCart as $item) {
                                        $itemCount++;
                                    }
                                }
                            }
                            echo $itemCount;
                            ?>">
                            <i class="zmdi zmdi-shopping-cart"></i>

                        </div>

                    <?php endif; ?>

                    <!-- Button login -->
                    <div class="flex-c-m h-full p-lr-19">
                        <div class="flex-c-m h-full ">
                            <?php if (isset($_SESSION['user_client'])): ?>
                                <span class="cl0 text-dark stext-107"><?= $_SESSION['user_client'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="submenu" style="position: relative;">
                            <?php if (isset($_SESSION['user_client'])): ?>
                                <?php
                                $user = (new ClientUser())->getAccountByNameUser($_SESSION['user_client']);
                                if ($user && isset($user['anh_dai_dien'])): ?>
                                    <a href="#" class="p-lr-11 cl2 hov-cl1 icon-header-item trans-04">
                                        <img src="<?= $user['anh_dai_dien'] ?>"
                                            alt="avatar"
                                            class="rounded-circle"
                                            style="width: 25px; height: 25px;">
                                    </a>
                                <?php else: ?>
                                    <a href="#" class="p-lr-11 cl2 hov-cl1 icon-header-item trans-04">
                                        <i class="zmdi zmdi-account"></i>
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="#" class="p-lr-11 cl2 hov-cl1 icon-header-item trans-04">
                                    <i class="zmdi zmdi-account"></i>
                                </a>
                            <?php endif; ?>
                            <div class="submenu-content"
                                style="display: none; position: absolute; right: 0; background: #fff;  box-shadow: 0 2px 5px rgba(0,0,0,0.2); z-index: 100;">
                                <?php if (isset($_SESSION['user_client'])): ?>
                                    <li style="list-style: none; padding: 8px 16px;">
                                        <span style="color: #333;">Xin chào, <?= $_SESSION['user_client'] ?></span>
                                    </li>
                                    <li style="list-style: none; padding: 8px 16px;">
                                        <a href="<?= BASE_URL . "?act=quan-ly-tai-khoan" ?>"
                                            style="color: #333; text-decoration: none;">Account Manage</a>
                                    </li>
                                    <li style="list-style: none; padding: 8px 16px;">
                                        <a href="<?= BASE_URL . "?act=dang-xuat" ?>"
                                            style="color: #333; text-decoration: none;">Sign Out</a>
                                    </li>

                                    <li style="list-style: none; padding: 8px 16px;">
                                        <a href="<?= BASE_URL . "?act=lich-su-mua-hang" ?>">Order</a>
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

                    <div class="flex-c-m h-full p-lr-19">
                        <div class="p-lr-11 cl2 hov-cl1 icon-header-item js-show-sidebar trans-04">
                            <i class="zmdi zmdi-menu"></i>
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
            <a href="<?= BASE_URL ?>" style="text-decoration: none;">
                <span style="color: #ff0000;">SEULCHIC</span>
                <span style="color: #000000;">SHOP</span>
            </a>
        </div>

        <!-- Icon header -->
        <div class="flex-r-m flex-w h-full m-r-15 wrap-icon-header">
            <div class="flex-c-m h-full p-r-10">
                <div class="p-lr-11 cl2 hov-cl1 icon-header-item js-show-modal-search trans-04">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>

            <?php
            // Kiểm tra nếu không phải trang đăng ký hoặc đăng nhập và người dùng đã đăng nhập thì hiển thị giỏ hàng
            if ($currentPage != 'dang-nhap' && $currentPage != 'dang-ky' && isset($_SESSION['user_client'])):
            ?>
                <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="p-lr-11 cl2 hov-cl1 icon-header-item icon-header-noti js-show-cart trans-04"
                        id="cart-icon-mobile"
                        data-notify="<?= $itemCount ?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            <?php endif; ?>
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
                    <a href="<?= BASE_URL . "?act=quan-ly-tai-khoan" ?>">Account Manage</a>
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
                <input class="plh3" type="text" name="search" placeholder="Nhập tên sản phẩm bạn cần tìm...">
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

<!-- JavaScript to update cart count -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update cart count
        function updateCartCount(count) {
            const cartIconDesktop = document.getElementById('cart-icon-desktop');
            const cartIconMobile = document.getElementById('cart-icon-mobile');

            if (cartIconDesktop) {
                cartIconDesktop.setAttribute('data-notify', count);
            }

            if (cartIconMobile) {
                cartIconMobile.setAttribute('data-notify', count);
            }
        }

        // Listen for custom event when item is added to cart
        document.addEventListener('cartUpdated', function(e) {
            if (e.detail && e.detail.count !== undefined) {
                updateCartCount(e.detail.count);
            }
        });

        // Example of how to trigger the event when adding to cart
        // This should be called in your add-to-cart functionality
        function addToCart() {
            // Your add to cart logic

            // Then dispatch the event with the new count
            const currentCount = parseInt(document.getElementById('cart-icon-desktop')?.getAttribute('data-notify') || '0');
            const newCount = currentCount + 1;

            document.dispatchEvent(new CustomEvent('cartUpdated', {
                detail: {
                    count: newCount
                }
            }));
        }

        // Expose the function globally if needed
        window.updateCartCount = updateCartCount;

        // Hiệu ứng chuyển màu menu khi chuyển trang
        function setActiveMenuItem() {
            // Lấy URL hiện tại
            const currentUrl = window.location.href;
            const urlParams = new URLSearchParams(window.location.search);
            const currentPage = urlParams.get('act') || 'home';

            // Xóa class active-menu từ tất cả các menu items
            const menuItems = document.querySelectorAll('.main-menu > li');
            menuItems.forEach(item => {
                item.classList.remove('active-menu');
            });

            // Thêm class active-menu vào menu item tương ứng với trang hiện tại
            menuItems.forEach(item => {
                const link = item.querySelector('a');
                if (link) {
                    const href = link.getAttribute('href');

                    // Kiểm tra trang hiện tại và gán active-menu
                    if (currentPage === 'home' && href === '<?= BASE_URL ?>') {
                        item.classList.add('active-menu');
                    } else if (currentPage === 'danh-sach-san-pham' && href.includes('danh-sach-san-pham')) {
                        item.classList.add('active-menu');
                    } else if (currentPage === 'gio-hang' && href.includes('gio-hang')) {
                        item.classList.add('active-menu');
                    } else if (currentPage === 'bai-viet' && href.includes('bai-viet')) {
                        item.classList.add('active-menu');
                    } else if (currentPage === 'gioi-thieu' && href.includes('gioi-thieu')) {
                        item.classList.add('active-menu');
                    } else if (currentPage === 'lien-he' && href.includes('lien-he')) {
                        item.classList.add('active-menu');
                    }
                }
            });

            // Cũng áp dụng cho menu mobile
            const mobileMenuItems = document.querySelectorAll('.main-menu-m > li');
            mobileMenuItems.forEach(item => {
                const link = item.querySelector('a');
                if (link) {
                    const href = link.getAttribute('href');

                    if (currentPage === 'home' && href === '<?= BASE_URL ?>') {
                        link.classList.add('active-color');
                    } else if (currentPage === 'danh-sach-san-pham' && href.includes('danh-sach-san-pham')) {
                        link.classList.add('active-color');
                    } else if (currentPage === 'gio-hang' && href.includes('gio-hang')) {
                        link.classList.add('active-color');
                    } else if (currentPage === 'bai-viet' && href.includes('bai-viet')) {
                        link.classList.add('active-color');
                    } else if (currentPage === 'gioi-thieu' && href.includes('gioi-thieu')) {
                        link.classList.add('active-color');
                    } else if (currentPage === 'lien-he' && href.includes('lien-he')) {
                        link.classList.add('active-color');
                    }
                }
            });
        }

        // Thêm CSS cho active-color
        const style = document.createElement('style');
        style.textContent = `
        .active-color {
            color: #6c7ae0 !important;
        }
    `;
        document.head.appendChild(style);

        // Gọi hàm khi trang được tải
        setActiveMenuItem();
    });
</script>

<!-- Cart -->