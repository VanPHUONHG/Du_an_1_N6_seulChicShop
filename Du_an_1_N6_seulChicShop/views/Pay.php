<!-- Header -->
<?php include_once './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include_once './views/layouts/navbar.php'; ?>
<!-- Mini Cart -->
<?php include_once './views/layouts/miniCart.php'; ?>


<!-- Calculate total cart value -->
<?php
$totalCart = 0;
if (!empty($detailCart)) {
    foreach ($detailCart as $item) {
        $price = $item['gia_san_pham_khuyen_mai'] > 0 ? $item['gia_san_pham_khuyen_mai'] : $item['gia_san_pham'];
        $totalItem = $price * $item['so_luong'];
        $totalCart += $totalItem;
    }
} else {
    echo '<div class="container alert alert-danger text-center my-4">Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</div>';
    echo '<div class="container text-center my-4"><a href="' . BASE_URL . '?act=danh-sach-san-pham" class="btn btn-primary">Tiếp tục mua sắm</a></div>';
    exit();
}

// Generate random order code
$ma_don_hang = 'DH' . date('YmdHis') . rand(100, 999);

// Initialize discount amount
$discountAmount = 0;
?>

<!-- Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Error Messages -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <?= $_SESSION['error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <!-- Success Messages -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <?= $_SESSION['success']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <!-- Checkout Form -->
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Checkout</h3>

                    <form action="<?= BASE_URL . '?act=dat-hang' ?>" method="POST" class="needs-validation" onsubmit="return validateForm()" novalidate id="checkout-form">
                        <!-- Hidden Fields -->
                        <input type="hidden" name="ma_don_hang" value="<?= $ma_don_hang ?>">
                        <input type="hidden" name="tai_khoan_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">
                        <input type="hidden" name="ngay_dat" value="<?= date('Y-m-d H:i:s') ?>">
                        <input type="hidden" name="giam_gia" id="giam_gia" value="0">
                        <input type="hidden" name="ma_khuyen_mai_id" id="ma_khuyen_mai_id" value="">
                        <input type="hidden" name="tien_giam" id="tien_giam" value="0">

                        <!-- Order Summary -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Order Summary</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <span>Subtotal:</span>
                                    <span class="font-weight-bold" id="total-price"><?= number_format($totalCart) ?>đ</span>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Shipping Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="ten_nguoi_nhan">Full Name</label>
                                        <input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan"
                                            value="<?= isset($_SESSION['user_client']) ? $_SESSION['user_client'] : '' ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="sdt_nguoi_nhan">Phone Number</label>
                                        <input type="tel" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan"
                                            value="<?= isset($user['so_dien_thoai']) ? $user['so_dien_thoai'] : '' ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email_nguoi_nhan">Email</label>
                                    <input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan"
                                        value="<?= isset($user['email']) ? $user['email'] : '' ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="city">City/Province</label>
                                        <select class="custom-select" id="city" name="tinh_thanhpho" required>
                                            <option value="">Select city...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="district">District</label>
                                        <select class="custom-select" id="district" name="huyen_quan" required>
                                            <option value="">Select district...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="ward">Ward</label>
                                        <select class="custom-select" id="ward" name="xa_phuong" required>
                                            <option value="">Select ward...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="dia_chi_cu_the">Detailed Address</label>
                                    <textarea class="form-control" id="dia_chi_cu_the" name="dia_chi_cu_the" rows="2" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="ghi_chu">Order Notes</label>
                                    <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Payment Method</h5>
                            </div>
                            <div class="card-body">
                                <select class="custom-select" name="phuong_thuc_thanh_toan_id" id="phuong_thuc_thanh_toan" onchange="handlePaymentMethodChange()" required>
                                    <option value="">Select payment method...</option>
                                    <option value="3">Thanh toán MoMo</option>
                                    <option value="1">Thanh toán COD</option>
                                    <option value="2">Thanh toán bằng thẻ</option>
                                </select>
                            </div>
                        </div>

                        <!-- Coupon Code -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Discount Code</h5>
                            </div>
                            <div class="card-body">
                                <div class="input-group">
                                    <select class="custom-select" name="ma_giam_gia_id" id="ma_giam_gia_id" onchange="apDungMaKhuyenMai()">
                                        <option value="">Select discount code...</option>
                                        <?php
                                        if (!empty($coupons)) {
                                            foreach ($coupons as $coupon) {
                                                if ($totalCart >= $coupon["dieu_kien_toi_thieu"]) { ?>
                                                    <option value="<?= $coupon["id"] ?>"
                                                        data-type="<?= $coupon["loai"] ?>"
                                                        data-ifuse="<?= $coupon["dieu_kien_toi_thieu"] ?>"
                                                        data-discount="<?= $coupon["gia_tri"] ?>"
                                                        data-code="<?= $coupon["ma_khuyen_mai"] ?>">
                                                        <?= $coupon["ma_khuyen_mai"] ?>
                                                    </option>
                                        <?php }
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="text-success small mt-2" id="coupon-success" style="display:none;"></div>
                                <div class="text-danger small mt-2" id="coupon-error" style="display:none;"></div>
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Order Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th class="text-right">Price</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($detailCart)) :
                                                foreach ($detailCart as $item) :
                                                    $price = $item['gia_san_pham_khuyen_mai'] > 0 ? $item['gia_san_pham_khuyen_mai'] : $item['gia_san_pham'];
                                                    $totalItem = $price * $item['so_luong'];
                                            ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>" class="img-thumbnail" style="width: 50px;">
                                                            <input type="hidden" name="san_pham_id[]" value="<?= $item['san_pham_id'] ?>">
                                                            <input type="hidden" name="bien_the_san_pham_id[]" value="<?= $item['bien_the_san_pham_id'] ?>">
                                                        </td>
                                                        <td><?= $item['ten_san_pham'] ?></td>
                                                        <td class="text-right"><?= number_format($price) ?>đ</td>
                                                        <td class="text-center"><?= $item['mau_sac'] ?></td>
                                                        <td class="text-center"><?= $item['kich_thuoc'] ?></td>
                                                        <td class="text-center"><?= $item['so_luong'] ?>
                                                            <input type="hidden" name="so_luong[]" value="<?= $item['so_luong'] ?>">
                                                        </td>
                                                        <td class="text-right"><?= number_format($totalItem) ?>đ
                                                            <input type="hidden" name="thanh_tien[]" value="<?= $totalItem ?>">
                                                        </td>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Shipping Fee:</span>
                                    <span id="shipping-fee">30,000đ</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Discount Amount:</span>
                                    <span id="discount-amount">0đ</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="h5">Total Amount:</span>
                                    <span class="h5" id="total-checkout"><?= number_format($totalCart + 30000) ?>đ</span>
                                </div>
                                <input type="hidden" name="tong_tien" value="<?= $totalCart + 30000 ?>" id="tong-tien-input">
                            </div>
                        </div>

                        <div id="payment-buttons">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="normal-payment-btn">
                                Place Order
                            </button>
                        </div>
                    </form>


                    <form action="<?= BASE_URL . '?act=thanh-toan-momo' ?>" method="POST" id="momo-payment-form" style="display: none;">
                        <input type="hidden" name="payment_method" value="momo">
                        <input type="hidden" name="amount" value="<?= $totalCart + 30000 ?>" id="tong-tien-input">
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">
                            <img src="<?= BASE_URL ?>public/images/momo-logo.png" alt="MoMo" height="30">
                            Thanh toán qua MoMo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- Axiox  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<!-- Lấy dữ liệu tỉnh thành phố -->
<script>
    // Lấy tham chiếu đến các thẻ select
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var shippingFee = document.getElementById("shipping-fee");
    var totalCheckout = document.getElementById("total-checkout");
    var tongTienInput = document.getElementById("tong-tien-input");
    var totalCart = <?= $totalCart ?>;
    var discountAmount = 0;

    // Handle payment method change
    function handlePaymentMethodChange() {
        var paymentMethod = document.getElementById('phuong_thuc_thanh_toan').value;
        var momoForm = document.getElementById('momo-payment-form');
        var normalPaymentBtn = document.getElementById('normal-payment-btn');

        if (paymentMethod === '3') { // MoMo payment
            momoForm.style.display = 'block';
            normalPaymentBtn.style.display = 'none';
        } else {
            momoForm.style.display = 'none';
            normalPaymentBtn.style.display = 'block';
        }
    }

    // Gọi API và lấy dữ liệu
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        credentials: 'include',
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    }).catch(function(error) {
        console.error("Lỗi khi tải dữ liệu địa chỉ:", error);
        alert("Không thể tải dữ liệu địa chỉ. Vui lòng làm mới trang và thử lại.");
    });

    // Hàm render danh sách tỉnh/thành phố
    function renderCity(data) {
        for (const x of data) {
            var opt = document.createElement('option');
            opt.value = x.Name;
            opt.text = x.Name;
            opt.setAttribute('data-id', x.Id);
            citis.options.add(opt);
        }

        // Xử lý sự kiện khi thay đổi tỉnh/thành phố
        citis.onchange = function() {
            districts.length = 1;
            wards.length = 1;
            if (this.options[this.selectedIndex].dataset.id != "") {
                const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);
                for (const k of result[0].Districts) {
                    var opt = document.createElement('option');
                    opt.value = k.Name;
                    opt.text = k.Name;
                    opt.setAttribute('data-id', k.Id);
                    districts.options.add(opt);
                }

                // Cập nhật phí ship
                updateTotalPrice();
            }
        };

        // Xử lý sự kiện khi thay đổi quận/huyện
        districts.onchange = function() {
            wards.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
            if (this.options[this.selectedIndex].dataset.id != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;
                for (const w of dataWards) {
                    var opt = document.createElement('option');
                    opt.value = w.Name;
                    opt.text = w.Name;
                    opt.setAttribute('data-id', w.Id);
                    wards.options.add(opt);
                }
            }
        };
    }

    // Hàm cập nhật tổng tiền
    function updateTotalPrice() {
        let shippingCost = 30000;
        let selectedCity = citis.value;

        if (selectedCity === "Thành phố Hà Nội" || selectedCity === "Thành phố Hồ Chí Minh") {
            shippingCost = 0;
            shippingFee.textContent = "0đ";
        } else {
            shippingCost = 30000;
            shippingFee.textContent = "30,000đ";
        }

        let finalTotal = totalCart + shippingCost - discountAmount;
        totalCheckout.textContent = finalTotal.toLocaleString() + "đ";
        tongTienInput.value = finalTotal;
    }

    // Validate form before submission
    function validateForm() {
        var phoneNumber = document.getElementById("sdt_nguoi_nhan").value;
        var email = document.getElementById("email_nguoi_nhan").value;

        // Validate phone number (10 digits)
        var phoneRegex = /^[0-9]{10}$/;
        if (!phoneRegex.test(phoneNumber)) {
            alert("Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.");
            return false;
        }

        // Validate email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Email không hợp lệ.");
            return false;
        }

        return true;
    }

    // Xử lý khuyến mại
    function apDungMaKhuyenMai() {
        var selectedOption = document.getElementById('ma_giam_gia_id').options[document.getElementById('ma_giam_gia_id').selectedIndex];
        var shipping = document.getElementById('shipping-fee').innerText === '0đ' ? 0 : 30000;

        if (selectedOption.value === '') {
            // Reset discount if no coupon selected
            discountAmount = 0;
            document.getElementById('giam_gia').value = 0;
            document.getElementById('ma_khuyen_mai_id').value = '';
            document.getElementById('tien_giam').value = 0;
            document.getElementById('coupon-success').style.display = 'none';
            document.getElementById('coupon-error').style.display = 'none';
            document.getElementById('discount-amount').innerText = '0đ';
        } else {
            var discountValue = parseFloat(selectedOption.getAttribute('data-discount'));
            var discountType = selectedOption.getAttribute('data-type');
            var couponCode = selectedOption.getAttribute('data-code');

            // Calculate discount amount based on type
            if (discountType === 'phan_tram') {
                discountAmount = Math.floor((totalCart * discountValue) / 100);
                document.getElementById('coupon-success').innerText = `Áp dụng mã giảm giá ${discountValue}% thành công!`;
            } else { // tien_mat
                discountAmount = discountValue;
                document.getElementById('coupon-success').innerText = `Áp dụng mã giảm giá ${discountValue.toLocaleString()}đ thành công!`;
            }

            document.getElementById('giam_gia').value = discountAmount;
            document.getElementById('tien_giam').value = discountAmount;
            document.getElementById('ma_khuyen_mai_id').value = selectedOption.value;
            document.getElementById('coupon-success').style.display = 'block';
            document.getElementById('coupon-error').style.display = 'none';
            document.getElementById('discount-amount').innerText = discountAmount.toLocaleString() + 'đ';
        }

        // Update total price
        let tongTienMoi = totalCart + shipping - discountAmount;
        document.getElementById('total-checkout').innerText = tongTienMoi.toLocaleString('vi-VN') + 'đ';
        document.getElementById('tong-tien-input').value = tongTienMoi;

        // Update displayed total price
        document.getElementById('total-price').innerText = (totalCart - discountAmount).toLocaleString('vi-VN') + 'đ';
    }
</script>

<!--Footer-->
<?php include_once './views/layouts/footer.php'; ?>