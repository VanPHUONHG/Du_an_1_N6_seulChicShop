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
                                id="cart-icon-desktop" data-notify="<?php
                                $itemCount = 0;
                                if (isset($_SESSION['user_client'])) {
                                    $user = (new ClientUser())->getAccountByNameUser($_SESSION['user_client']);
                                    $cart = (new ClientCart())->getCartFromUser($user['id']);
                                    if ($cart) {
                                        $detailCart = (new ClientCart())->getDetailCart($cart['id']);
                                        foreach ($detailCart as $item) {
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
                                            <img src="<?= $user['anh_dai_dien'] ?>" alt="avatar" class="rounded-circle"
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
                                                style="color: #333; text-decoration: none; transition: all 0.3s;"
                                                onmouseover="this.style.color='#717fe0'"
                                                onmouseout="this.style.color='#333'">Account Manage</a>
                                        </li>

                                        <li style="list-style: none; padding: 8px 16px;">
                                            <a href="<?= BASE_URL . "?act=lich-su-mua-hang" ?>"
                                                style="color: #333; text-decoration: none; transition: all 0.3s;"
                                                onmouseover="this.style.color='#717fe0'"
                                                onmouseout="this.style.color='#333'">Order</a>
                                        </li>
                                        <li style="list-style: none; padding: 8px 16px;">
                                            <a href="<?= BASE_URL . "?act=dang-xuat" ?>"
                                                style="color: #333; text-decoration: none; transition: all 0.3s;"
                                                onmouseover="this.style.color='#717fe0'"
                                                onmouseout="this.style.color='#333'">Sign Out</a>
                                        </li>

                                    <?php else: ?>
                                        <li style="list-style: none; padding: 8px 16px;">
                                            <a href="<?= BASE_URL . "?act=dang-nhap" ?>"
                                                style="color: #333; text-decoration: none; transition: all 0.3s;"
                                                onmouseover="this.style.color='#717fe0'"
                                                onmouseout="this.style.color='#333'">Sign In</a>
                                        </li>
                                        <li style="list-style: none; padding: 8px 16px;">
                                            <a href="<?= BASE_URL . "?act=dang-ky" ?>"
                                                style="color: #333; text-decoration: none; transition: all 0.3s;"
                                                onmouseover="this.style.color='#717fe0'"
                                                onmouseout="this.style.color='#333'">Sign Up</a>
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
                        id="cart-icon-mobile" data-notify="<?= $itemCount ?>">
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
                    <a href="<?= BASE_URL . "?act=quan-ly-tai-khoan" ?>"
                        style="color: #333; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.color='#717fe0'"
                        onmouseout="this.style.color='#333'">Account Manage</a>
                </li>
                <li>
                    <a href="<?= BASE_URL . "?act=lich-su-mua-hang" ?>"
                        style="color: #333; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.color='#717fe0'"
                        onmouseout="this.style.color='#333'">Order</a>
                </li>
                <li>
                    <a href="<?= BASE_URL . "?act=dang-xuat" ?>"
                        style="color: #333; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.color='#717fe0'"
                        onmouseout="this.style.color='#333'">Sign Out</a>
                </li>

            <?php else: ?>
                <li>
                    <a href="<?= BASE_URL . "?act=dang-nhap" ?>"
                        style="color: #333; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.color='#717fe0'"
                        onmouseout="this.style.color='#333'">Sign In</a>
                </li>
                <li>
                    <a href="<?= BASE_URL . "?act=dang-ky" ?>"
                        style="color: #333; text-decoration: none; transition: all 0.3s;"
                        onmouseover="this.style.color='#717fe0'"
                        onmouseout="this.style.color='#333'">Sign Up</a>
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

            <form class="flex-w p-l-15 wrap-search-header" id="search-form">
                <button class="flex-c-m trans-04" type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" id="search-input" placeholder="Nhập tên sản phẩm bạn cần tìm...">
            </form>
            
            <div id="search-results" class="search-results" style="max-height: 300px; overflow-y: auto; background: white; margin-top: 10px;">
                <!-- Kết quả tìm kiếm sẽ được hiển thị ở đây -->
            </div>
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
                    <a href="<?= BASE_URL . "?act=danh-sach-san-pham" ?>" class="cl2 hov-cl1 stext-102 trans-04">
                        Products
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?= isset($_SESSION['user_client']) ? BASE_URL . '?act=quan-ly-tai-khoan' : BASE_URL . '?act=dang-nhap' ?>"
                        class="cl2 hov-cl1 stext-102 trans-04">
                        My Account
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?= BASE_URL . "?act=gio-hang" ?>" class="cl2 hov-cl1 stext-102 trans-04">
                        Track Oder
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?= BASE_URL . "?act=gioi-thieu" ?>" class="cl2 hov-cl1 stext-102 trans-04">
                        About
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?= BASE_URL . "?act=lien-he" ?>" class="cl2 hov-cl1 stext-102 trans-04">
                        Contact
                    </a>
                </li>


            </ul>

            <div class="p-tb-30 w-full sidebar-gallery">
                <span class="cl5 mtext-101">
                    @ SEULCHIC SHOP
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
                    ✨ Sản phẩm đa dạng, phong cách độc đáo: Từ quần áo thời trang hiện đại, nhẹ nhàng đến đồ lưu niệm dễ
                    thương, ý nghĩa, chúng tôi luôn cập nhật xu hướng mới nhất để mang đến cho bạn những trải nghiệm mua
                    sắm thú vị và chất lượng. 🎁 Quà tặng và kỷ niệm – nhỏ xinh nhưng đầy ý nghĩa: Bạn muốn tìm một món
                    quà tặng bạn bè, người thân hoặc lưu giữ khoảnh khắc đáng nhớ? SEULCHIC SHOP có rất nhiều lựa chọn
                    sáng tạo, mang đậm dấu ấn riêng để bạn dễ dàng trao gửi tình cảm. 👗 Thời trang – tự tin là chính
                    mình: Dù bạn yêu phong cách ngọt ngào, nữ tính, hay năng động, cá tính, SEULCHIC SHOP đều có những
                    mẫu trang phục phù hợp với cá tính và gu thẩm mỹ của bạn. 🛍️ Mua sắm dễ dàng – Dịch vụ tận tâm:
                    Chúng tôi không chỉ cung cấp sản phẩm mà còn mang đến trải nghiệm mua sắm tận tâm, với chính sách
                    đổi trả linh hoạt, tư vấn nhiệt tình và hỗ trợ giao hàng toàn quốc.
                </p>
            </div>
        </div>
    </div>
</aside>

<!-- Cart -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = this.value.trim();
        
        if (searchTerm.length > 0) {
            searchTimeout = setTimeout(() => {
                fetch(`<?= BASE_URL ?>?act=search-ajax&keyword=${encodeURIComponent(searchTerm)}`)
                    .then(response => response.json())
                    .then(data => {
                        searchResults.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach(product => {
                                const productElement = document.createElement('div');
                                productElement.className = 'search-item';
                                productElement.style.cssText = 'padding: 10px; border-bottom: 1px solid #eee; display: flex; align-items: center; cursor: pointer;';
                                
                                productElement.innerHTML = `
                                    <img src="${product.hinh_anh}" alt="${product.ten_san_pham}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                    <div>
                                        <div style="font-weight: bold;">${product.ten_san_pham}</div>
                                        <div style="color: #e65540;">${product.gia_san_pham.toLocaleString('vi-VN')}đ</div>
                                    </div>
                                `;
                                
                                productElement.addEventListener('click', () => {
                                    window.location.href = `<?= BASE_URL ?>?act=chi-tiet-san-pham&id=${product.id}`;
                                });
                                
                                searchResults.appendChild(productElement);
                            });
                        } else {
                            searchResults.innerHTML = '<div style="padding: 10px; text-align: center;">Không tìm thấy sản phẩm nào</div>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        searchResults.innerHTML = '<div style="padding: 10px; text-align: center;">Đã xảy ra lỗi khi tìm kiếm</div>';
                    });
            }, 300);
        } else {
            searchResults.innerHTML = '';
        }
    });

    // Đóng kết quả tìm kiếm khi click ra ngoài
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.container-search-header')) {
            searchResults.innerHTML = '';
        }
    });
});
</script>