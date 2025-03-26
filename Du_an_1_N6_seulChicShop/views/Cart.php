<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>



<!-- breadcrumb -->
<div class="container">
    <div class="flex-w p-l-25 p-lr-0-lg p-r-15 p-t-30 bread-crumb">
        <a href="<?= BASE_URL ?>" class="cl8 hov-cl1 stext-109 trans-04">
            Home
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <span class="cl4 stext-109">
            Shoping Cart
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<form class="p-b-85 p-t-75 bg0">
    <div class="container">
        <h2 class="cl2 mtext-105 text-center p-b-30">Giỏ hàng của bạn</h2>
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-b-50 m-lr-auto">
                <div class="m-l-25 m-lr-0-xl m-r--38">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="assets/images/item-cart-04.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">Fresh Strawberries</td>
                                <td class="column-3">$ 36.00</td>
                                <td class="column-4">
                                    <div class="flex-w m-l-auto m-r-0 wrap-num-product">
                                        <div class="flex-c-m btn-num-product-down cl8 hov-btn3 trans-04">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="cl3 mtext-104 num-product txt-center" type="number"
                                            name="num-product1" value="1">

                                        <div class="flex-c-m btn-num-product-up cl8 hov-btn3 trans-04">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$ 36.00</td>
                            </tr>

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="assets/images/item-cart-05.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">Lightweight Jacket</td>
                                <td class="column-3">$ 16.00</td>
                                <td class="column-4">
                                    <div class="flex-w m-l-auto m-r-0 wrap-num-product">
                                        <div class="flex-c-m btn-num-product-down cl8 hov-btn3 trans-04">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="cl3 mtext-104 num-product txt-center" type="number"
                                            name="num-product2" value="1">

                                        <div class="flex-c-m btn-num-product-up cl8 hov-btn3 trans-04">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$ 16.00</td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-sb-m flex-w p-b-15 p-lr-15-sm p-lr-40 p-t-18 bor15">
                        <div class="flex-m flex-w m-r-20 m-tb-5">
                            <input class="m-r-10 m-tb-5 p-lr-20 bor13 cl2 plh4 size-117 stext-104" type="text"
                                name="coupon" placeholder="Coupon Code">

                            <button type="button"
                                class="flex-c-m m-tb-5 p-lr-15 bg8 bor13 cl2 hov-btn3 pointer size-118 stext-101 trans-04">
                                Apply coupon
                            </button>
                        </div>

                        <div class="flex-w m-tb-10">
                            <button type="button" 
                                class="flex-c-m m-r-10 p-lr-15 bg8 bor13 cl2 hov-btn3 pointer size-119 stext-101 trans-04">
                                Update Cart
                            </button>

                            <a href="<?= BASE_URL ?>?act=thanh-toan" 
                                class="flex-c-m p-lr-15 bg3 bor14 cl0 hov-btn3 pointer size-119 stext-101 trans-04">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>