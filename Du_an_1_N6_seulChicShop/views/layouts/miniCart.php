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
            <?php 
            $totalMiniCart = 0;
            if (isset($_SESSION['user_client'])) {
                $ModelClientUser = new ClientUser();
                $ModelClientCart = new ClientCart();
                $user = $ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
                $cart = $ModelClientCart->getCartFromUser($user['id']);
                if ($cart) {
                    $miniCartItems = $ModelClientCart->getDetailCart($cart['id']);
                    if (!empty($miniCartItems)) : 
            ?>
            <ul class="w-full header-cart-wrapitem">
                <?php 
                    foreach ($miniCartItems as $item) : 
                        $price = $item['gia_san_pham_khuyen_mai'] > 0 ? $item['gia_san_pham_khuyen_mai'] : $item['gia_san_pham'];
                        $totalItem = $price * $item['so_luong'];
                        $totalMiniCart += $totalItem;
                ?>
                <li class="flex-t flex-w m-b-12 header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="<?= empty($item['hinh_anh']) ? 'assets/images/product-01.jpg' : $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>">
                    </div>

                    <div class="p-t-8 header-cart-item-txt">
                        <a href="<?= BASE_URL ?>?act=chi-tiet-san-pham&id=<?= $item['san_pham_id'] ?>" class="m-b-18 header-cart-item-name hov-cl1 trans-04">
                            <?= $item['ten_san_pham'] ?>
                        </a>

                        <span class="header-cart-item-info">
                            <?= $item['so_luong'] ?> x <?= number_format($price, 0, ',', '.') ?>đ
                        </span>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="w-full">
                <div class="p-tb-40 w-full header-cart-total">
                    Total: <?= number_format($totalMiniCart, 0, ',', '.') ?>đ
                </div>

                <div class="flex-w w-full header-cart-buttons">
                    <a href="<?= BASE_URL ?>?act=gio-hang"
                        class="flex-c-m m-b-10 m-r-8 p-lr-15 bg3 bor2 cl0 hov-btn3 size-107 stext-101 trans-04">
                        View Cart
                    </a>

                    <a href="<?= BASE_URL ?>?act=thanh-toan"
                        class="flex-c-m m-b-10 p-lr-15 bg3 bor2 cl0 hov-btn3 size-107 stext-101 trans-04">
                        Check Out
                    </a>
                </div>
            </div>
            <?php 
                    else: 
            ?>
            <div class="w-full text-center p-t-30">
                <p class="cl6 stext-109">Your cart is empty</p>
            </div>
            <?php 
                    endif;
                } else {
            ?>
            <div class="w-full text-center p-t-30">
                <p class="cl6 stext-109">Your cart is empty</p>
            </div>
            <?php
                }
            } else {
            ?>
            <div class="w-full text-center p-t-30">
                <p class="cl6 stext-109">Please login to view your cart</p>
                <div class="p-t-10">
                    <a href="<?= BASE_URL ?>?act=dang-nhap" class="cl6 hov-cl1 trans-04 stext-109">
                        Login now
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>