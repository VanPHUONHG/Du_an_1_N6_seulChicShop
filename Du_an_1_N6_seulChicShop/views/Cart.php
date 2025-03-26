<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- Display success message if set -->
<?php if(isset($_SESSION['success'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> <?= $_SESSION['success'] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Display error message if set -->
<?php if(isset($_SESSION['error_message'])): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> <?= $_SESSION['error_message'] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<!-- breadcrumb -->
<div class="container">
    <div class="flex-w p-l-25 p-lr-0-lg p-r-15 p-t-30 bread-crumb">
        <a href="<?= BASE_URL ?>" class="cl8 hov-cl1 stext-109 trans-04">
            Home
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <span class="cl4 stext-109">
            Shopping Cart
        </span>
    </div>
</div>


<!-- Shopping Cart -->
<form class="p-b-85 p-t-75 bg0" method="POST" action="<?= BASE_URL ?>?act=cap-nhat-so-luong" enctype="multipart/form-data">
    <div class="container">
        <h2 class="cl2 mtext-105 text-center p-b-30">Your Shopping Cart</h2>
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-b-50 m-lr-auto">
                <div class="m-l-25 m-lr-0-xl m-r--38">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2">Product Name</th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                                <th class="column-6">Action</th>
                            </tr>

                            <?php 
                            $totalCart = 0;
                            if (!empty($detailCart)) : 
                                foreach ($detailCart as $item) : 
                                    $price = $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                                    $totalItem = $price * $item['so_luong'];
                                    $totalCart += $totalItem;
                            ?>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>">
                                    </div>
                                </td>
                                <td class="column-2"><?= $item['ten_san_pham'] ?></td>
                                <td class="column-3">$<?= number_format($price, 2) ?></td>
                                <td class="column-4">
                                    <div class="flex-w m-l-auto m-r-0 wrap-num-product">
                                        <div class="flex-c-m btn-num-product-down cl8 hov-btn3 trans-04" 
                                             onclick="decreaseQuantity(<?= $item['id'] ?>)">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="cl3 mtext-104 num-product txt-center" type="number" id="quantity-<?= $item['id'] ?>"
                                            name="quantity[<?= $item['id'] ?>]" value="<?= $item['so_luong'] ?>" min="1"
                                            onchange="validateQuantity(<?= $item['id'] ?>)">
                                        <input type="hidden" name="san_pham_id[<?= $item['id'] ?>]" value="<?= $item['san_pham_id'] ?>">

                                        <div class="flex-c-m btn-num-product-up cl8 hov-btn3 trans-04"
                                             onclick="increaseQuantity(<?= $item['id'] ?>)">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$<?= number_format($totalItem, 2) ?></td>
                                <td class="column-6">
                                    <button type="button" 
                                       class="btn-delete-cart cl2 hov-cl1 trans-04" 
                                       onclick="if(confirm('Are you sure you want to delete this product?')) window.location.href='<?= BASE_URL ?>?act=xoa-san-pham-gio-hang&id=<?= $item['id'] ?>'">
                                        <i class="zmdi zmdi-delete fs-16"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php 
                                endforeach; 
                            else : 
                            ?>
                            <tr class="table_row">
                                <td colspan="6" class="text-center p-tb-20">Your cart is empty</td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </div>

                    <div class="flex-sb-m flex-w p-b-15 p-lr-15-sm p-lr-40 p-t-18 bor15">
                        <?php if (!empty($detailCart)) : ?>
                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                Total: $<?= number_format($totalCart, 2) ?>
                            </span>
                        </div>
                        <?php endif; ?>
                        
                        <div class="flex-w m-tb-10 justify-content-end">
                            <?php if (!empty($detailCart)) : ?>
                            <button type="submit" 
                                class="flex-c-m m-r-10 p-lr-15 bg8 bor13 cl2 hov-btn3 pointer size-119 stext-101 trans-04">
                                Update Cart
                            </button>

                            <a href="<?= BASE_URL ?>?act=thanh-toan" 
                                class="flex-c-m p-lr-15 bg3 bor14 cl0 hov-btn3 pointer size-119 stext-101 trans-04">
                                Checkout
                            </a>
                            <?php else : ?>
                            <a href="<?= BASE_URL ?>?act=danh-sach-san-pham" 
                                class="flex-c-m p-lr-15 bg3 bor14 cl0 hov-btn3 pointer size-119 stext-101 trans-04">
                                Continue Shopping
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function increaseQuantity(id) {
        const input = document.getElementById('quantity-' + id);
        input.value = parseInt(input.value) + 1;
        validateQuantity(id);
        updateCartItem(id, input.value);
    }
    
    function decreaseQuantity(id) {
        const input = document.getElementById('quantity-' + id);
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            updateCartItem(id, input.value);
        }
        validateQuantity(id);
    }
    
    function validateQuantity(id) {
        const input = document.getElementById('quantity-' + id);
        if (parseInt(input.value) < 1 || isNaN(parseInt(input.value))) {
            input.value = 1;
        }
    }
    
    function updateCartItem(id, quantity) {
        // Get the product ID from the hidden input
        const productId = document.querySelector(`input[name="san_pham_id[${id}]"]`).value;
        
        // You can use AJAX to update the cart without refreshing the page
        // This is optional and can be implemented if needed
        console.log(`Updated product ID ${productId} to quantity ${quantity}`);
    }
</script>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>