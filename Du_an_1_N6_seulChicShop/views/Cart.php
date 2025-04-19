<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- Display success message if set -->
<?php if(isset($_SESSION['success'])): ?>
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
  <i class="fas fa-check-circle mr-2"></i>
  <strong>Success!</strong> <?= $_SESSION['success'] ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Display error message if set -->
<?php if(isset($_SESSION['error_message'])): ?>
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
  <i class="fas fa-exclamation-circle mr-2"></i>
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
            <i class="fas fa-home mr-2"></i>Home
            <i class="m-l-9 m-r-10 fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <span class="cl4 stext-109">
            <i class="fas fa-shopping-cart mr-2"></i>Shopping Cart
        </span>
    </div>
</div>

<!-- Shopping Cart -->
<form class="p-b-85 p-t-75 bg0" method="POST" action="<?= BASE_URL ?>?act=cap-nhat-so-luong" enctype="multipart/form-data">
    <div class="container">
        <h2 class="cl2 mtext-105 text-center p-b-30">
            <i class="fas fa-shopping-cart mr-3"></i>Your Shopping Cart
        </h2>
        <div class="row">
            <div class="col-12 m-b-50">
                <div class="m-l-25 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart shadow-sm rounded">
                        <table class="table-shopping-cart w-100">
                            <tr class="table_head bg-light">
                                <th class="column-1" style="width: 8%">Product</th>
                                <th class="column-2" style="width: 15%">Product Name</th>
                                <th class="column-3" style="width: 10%">Price</th>
                                <th class="column-4" style="width: 8%">Color</th>
                                <th class="column-5" style="width: 8%">Size</th>
                                <th class="column-6 text-center" style="width: 22%">Quantity</th>
                                <th class="column-7 text-center" style="width: 17%">Total</th>
                                <th class="column-8" style="width: 12%">Action</th>
                            </tr>

                            <?php 
                            $totalCart = 0;
                            if (!empty($detailCart)) : 
                                foreach ($detailCart as $item) : 
                                    $price = $item['gia_san_pham_khuyen_mai'] > 0 ? $item['gia_san_pham_khuyen_mai'] : $item['gia_san_pham'];
                                    $totalItem = $price * $item['so_luong'];
                                    $totalCart += $totalItem;
                            ?>
                            <tr class="table_row hover-shadow">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="<?= !empty($item['hinh_anh']) ? $item['hinh_anh'] : 'assets/images/product-04.jpg' ?>" 
                                             alt="<?= $item['ten_san_pham'] ?>"
                                             class="img-fluid rounded">
                                    </div>
                                </td>
                                <td class="column-2 font-weight-bold"><?= $item['ten_san_pham'] ?></td>
                                <td class="column-3 text-danger"><?= number_format($price).' '.'đ' ?></td>
                                <td class="column-4">
                                    <span class="badge badge-info"><?= $item['mau_sac'] ?></span>
                                </td>
                                <td class="column-5">
                                    <span class="badge badge-secondary"><?= $item['kich_thuoc'] ?></span>
                                </td>
                                
                                <input type="hidden" name="san_pham_id[<?= $item['id'] ?>]" value="<?= $item['san_pham_id'] ?>">
                                <input type="hidden" name="bien_the_san_pham_id[<?= $item['id'] ?>]" value="<?= $item['bien_the_san_pham_id'] ?>">
                                <td class="column-6">
                                    <div class="flex-w m-l-auto m-r-0 wrap-num-product justify-content-center">
                                        <div class="flex-c-m btn-num-product-down cl8 hov-btn3 trans-04 m-r-10 shadow-sm" 
                                             onclick="decreaseQuantity(<?= $item['id'] ?>)">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="cl3 mtext-104 num-product txt-center shadow-sm" type="number" 
                                               id="quantity-<?= $item['id'] ?>"
                                               name="quantity[<?= $item['id'] ?>]" value="<?= $item['so_luong'] ?>" min="1"
                                               onchange="validateQuantity(<?= $item['id'] ?>)">

                                        <div class="flex-c-m btn-num-product-up cl8 hov-btn3 trans-04 m-l-10 shadow-sm"
                                             onclick="increaseQuantity(<?= $item['id'] ?>)">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-7 text-center font-weight-bold text-success">
                                    <?= number_format($totalItem).' '.'đ' ?>
                                </td>
                                <td class="column-8 text-center">
                                    <button type="button" 
                                       class="btn btn-outline-danger btn-sm btn-delete-cart" 
                                       onclick="if(confirm('Are you sure you want to delete this product?')) window.location.href='<?= BASE_URL ?>?act=xoa-san-pham-gio-hang&id=<?= $item['id'] ?>'">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php 
                                endforeach; 
                            else : 
                            ?>
                            <tr class="table_row">
                                <td colspan="8" class="text-center p-tb-20">
                                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Your cart is empty</p>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </div>

                    <div class="flex-sb-m flex-w p-b-15 p-lr-15-sm p-lr-40 p-t-18 bor15 bg-light rounded shadow-sm mt-4">
                        <?php if (!empty($detailCart)) : ?>
                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                <i class="fas fa-money-bill-wave mr-2"></i>
                                Total: <span class="text-danger font-weight-bold"><?= number_format($totalCart).' '.'đ' ?></span>
                            </span>
                        </div>
                        <?php endif; ?>
                        
                        <div class="flex-w m-tb-10 justify-content-end">
                            <?php if (!empty($detailCart)) : ?>
                            <button type="submit" 
                                class="flex-c-m m-r-20 p-lr-15 bg8 bor13 cl2 hov-btn3 pointer size-119 stext-101 trans-04 btn btn-info">
                                <i class="fas fa-sync-alt mr-2"></i>Update Cart
                            </button>

                            <a href="<?= BASE_URL ?>?act=thanh-toan" 
                                class="flex-c-m p-lr-15 bg3 bor14 cl0 hov-btn3 pointer size-119 stext-101 trans-04 btn btn-success">
                                <i class="fas fa-credit-card mr-2"></i>Checkout
                            </a>
                            <?php else : ?>
                            <a href="<?= BASE_URL ?>?act=danh-sach-san-pham" 
                                class="flex-c-m p-lr-15 bg3 bor14 cl0 hov-btn3 pointer size-119 stext-101 trans-04 btn btn-primary">
                                <i class="fas fa-shopping-bag mr-2"></i>Continue Shopping
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
        const productId = document.querySelector(`input[name="san_pham_id[${id}]"]`).value;
        console.log(`Updated product ID ${productId} to quantity ${quantity}`);
    }
</script>

<style>
/* CSS for quantity buttons */
.wrap-num-product {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.btn-num-product-down,
.btn-num-product-up {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border: 1px solid #e6e6e6;
    border-radius: 3px;
    background-color: #f8f9fa;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-num-product-down:hover,
.btn-num-product-up:hover {
    background-color: #e9ecef;
    transform: scale(1.05);
}

.num-product {
    width: 50px;
    text-align: center;
    border: 1px solid #e6e6e6;
    border-radius: 3px;
    height: 32px;
    margin: 0 8px;
    padding: 0 5px;
}

.hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.table_row {
    transition: all 0.3s ease;
}

.btn-delete-cart:hover {
    transform: scale(1.1);
    transition: all 0.3s ease;
}
</style>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>