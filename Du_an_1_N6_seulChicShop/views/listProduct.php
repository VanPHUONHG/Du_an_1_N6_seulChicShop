<!-- HEADER -->
<?php include_once './views/layouts/header.php'; ?>

<!-- NAVBAR -->
<?php include_once './views/layouts/navbar.php'; ?>
<!-- Mini Cart -->
<?php include_once './views/layouts/miniCart.php'; ?>

<div class="m-t-23 p-b-140 bg0">
    <div class="container">
        <!-- Category Filter -->
        <div class="flex-sb-m flex-w p-b-52">
            <div class="flex-l-m flex-w m-tb-10 filter-tope-group">
                <a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>"
                    class="m-r-32 m-tb-5 bor3 cl6 hov1 <?= !isset($_GET['id_danh_muc']) ? 'how-active1' : '' ?> stext-106 trans-04 btn btn-outline-dark">
                    All Products
                </a>
                <?php foreach ($categories as $category): ?>
                    <a href="<?= BASE_URL . '?act=danh-sach-san-pham&id_danh_muc=' . $category['id'] ?>"
                        class="m-r-32 m-tb-5 bor3 cl6 hov1 <?= isset($_GET['id_danh_muc']) && $_GET['id_danh_muc'] == $category['id'] ? 'how-active1' : '' ?> stext-106 trans-04 btn btn-outline-dark">
                        <?= $category['ten_danh_muc'] ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Filter & Search Buttons -->
            <div class="flex-c-m flex-w m-tb-10">
                <div class="flex-c-m m-r-8 m-tb-4 bor4 cl6 hov-btn3 js-show-filter pointer size-104 stext-106 trans-04 btn btn-light">
                    <i class="m-r-6 cl2 fs-15 icon-filter trans-04 zmdi zmdi-filter-list"></i>
                    <i class="m-r-6 cl2 dis-none fs-15 icon-close-filter trans-04 zmdi zmdi-close"></i>
                    Filter
                </div>

                <div class="flex-c-m m-tb-4 bor4 cl6 hov-btn3 js-show-search pointer size-105 stext-106 trans-04 btn btn-light">
                    <i class="m-r-6 cl2 fs-15 icon-search trans-04 zmdi zmdi-search"></i>
                    <i class="m-r-6 cl2 dis-none fs-15 icon-close-search trans-04 zmdi zmdi-close"></i>
                    Search
                </div>
            </div>

            <!-- Search Panel -->
            <div class="p-b-15 p-t-10 w-full dis-none panel-search shadow-sm rounded">
                <div class="p-l-15 bor8 dis-flex">
                    <button class="flex-c-m cl2 fs-16 hov-cl1 size-113 trans-04 btn btn-light">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="p-r-15 cl2 mtext-107 plh2 size-114 form-control" type="text" id="searchInput" 
                        placeholder="Search by name">
                </div>
            </div>

            <!-- Filter Panel -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm shadow rounded">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15 font-weight-bold">
                            Sort By Price
                        </div>
                        <select id="priceFilter" class="form-control custom-select">
                            <option value="all">All Prices</option>
                            <option value="low">Price: Low to High</option>
                            <option value="high">Price: High to Low</option>
                            <option value="sale">On Sale</option>
                        </select>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15 font-weight-bold">
                            Price Range
                        </div>
                        <div class="price-range">
                            <input type="number" id="minPrice" placeholder="Min Price" class="form-control mb-2">
                            <input type="number" id="maxPrice" placeholder="Max Price" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row" id="productGrid">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3 col-sm-6 col-xs-12 mb-4 product-item" 
                    data-name="<?= strtolower($product['ten_san_pham']) ?>"
                    data-price="<?= $product['gia_san_pham_khuyen_mai'] > 0 ? $product['gia_san_pham_khuyen_mai'] : $product['gia_san_pham'] ?>"
                    data-sale="<?= $product['gia_san_pham_khuyen_mai'] > 0 ? '1' : '0' ?>">
                    <div class="block2 shadow-sm rounded hover-shadow-lg transition">
                        <div class="block2-pic hov-img0" style="height: 334px; overflow: hidden; border-radius: 8px 8px 0 0;">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>">
                                <?php if (!empty($product['hinh_anh'])): ?>
                                    <img src="<?= BASE_URL . $product['hinh_anh'] ?>" alt="IMG-PRODUCT"
                                        class="img-fluid transition"
                                        style="width: 100%; height: 100%; object-fit: cover;"
                                        onerror="this.onerror=null; this.src='<?= BASE_URL ?>assets/images/product-14.jpg'">
                                <?php else: ?>
                                    <img src="<?= BASE_URL . 'assets/images/product-14.jpg' ?>" alt="NO IMAGE"
                                        class="img-fluid transition"
                                        style="width: 100%; height: 100%; object-fit: cover;"
                                        onerror="this.onerror=null; this.src='<?= BASE_URL ?>assets/images/product-14.jpg'">
                                <?php endif; ?>
                            </a>
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 btn btn-light">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt p-t-14 p-b-14 p-lr-15">
                            <div class="block2-txt-child1">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>"
                                    class="p-b-6 cl4 hov-cl1 trans-04 js-name-b2 text-truncate d-block h5 mb-2">
                                    <?= $product['ten_san_pham'] ?>
                                </a>

                                <span class="cl3 stext-105 h6">
                                    <?php if ($product['gia_san_pham_khuyen_mai'] > 0): ?>
                                        <span class="text-decoration-line-through text-muted"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                        <span class="text-danger font-weight-bold ml-2"><?= number_format($product['gia_san_pham_khuyen_mai']) . 'đ' ?></span>
                                    <?php else: ?>
                                        <span class="font-weight-bold"><?= number_format($product['gia_san_pham']) . 'đ' ?></span>
                                    <?php endif; ?>
                                </span>
                            </div>

                            <div class="block2-txt-child2 mt-2">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative">
                                    <img class="icon-heart1 dis-block trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Load More Button -->
        <div class="flex-c-m flex-w p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04 btn btn-dark">
                Load More
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const priceFilter = document.getElementById('priceFilter');
    const minPrice = document.getElementById('minPrice');
    const maxPrice = document.getElementById('maxPrice');
    const products = document.querySelectorAll('.product-item');

    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();
        const priceSort = priceFilter.value;
        const minPriceValue = parseFloat(minPrice.value) || 0;
        const maxPriceValue = parseFloat(maxPrice.value) || Infinity;

        products.forEach(product => {
            const name = product.getAttribute('data-name');
            const price = parseFloat(product.getAttribute('data-price'));
            const isSale = product.getAttribute('data-sale') === '1';
            
            let visible = name.includes(searchTerm) && 
                         price >= minPriceValue && 
                         (maxPriceValue === Infinity || price <= maxPriceValue);

            if (priceSort === 'sale') {
                visible = visible && isSale;
            }

            product.style.display = visible ? '' : 'none';
        });

        const productArray = Array.from(products).filter(p => p.style.display !== 'none');
        
        if (priceSort === 'low') {
            productArray.sort((a, b) => 
                parseFloat(a.getAttribute('data-price')) - parseFloat(b.getAttribute('data-price'))
            );
        } else if (priceSort === 'high') {
            productArray.sort((a, b) => 
                parseFloat(b.getAttribute('data-price')) - parseFloat(a.getAttribute('data-price'))
            );
        }

        const container = document.getElementById('productGrid');
        productArray.forEach(product => container.appendChild(product));
    }

    searchInput.addEventListener('input', filterProducts);
    priceFilter.addEventListener('change', filterProducts);
    minPrice.addEventListener('input', filterProducts);
    maxPrice.addEventListener('input', filterProducts);

    filterProducts();
});
</script>

<!-- FOOTER -->
<?php include_once './views/layouts/footer.php'; ?>