<!-- Header -->
<?php include_once './views/layouts/header.php'; ?>
<<<<<<< HEAD
<!-- Navbar -->
<?php include_once './views/layouts/navbar.php'; ?>
<!-- Mini Cart -->
<?php include_once './views/layouts/miniCart.php'; ?>


<!-- Calculate total cart value -->
<?php 
$totalCart = 0;
if (!empty($detailCart)) {
    foreach ($detailCart as $item) {
        $price = $item['gia_khuyen_mai'] > 0 ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
        $totalItem = $price * $item['so_luong'];
        $totalCart += $totalItem;
    }
} else {
    echo '<div class="container alert alert-danger text-center my-4">Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</div>';
    echo '<div class="container text-center my-4"><a href="' . BASE_URL . '?act=danh-sach-san-pham" class="btn btn-primary">Tiếp tục mua sắm</a></div>';
    exit();
}
?>
<!-- Content -->
<div class="col-lg-10 col-sm-10 col-xl-10 m-b-50 m-lr-auto">
    <!-- Hiển thị thông báo lỗi nếu có -->
    <?php if(isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger mb-4">
            <?= $_SESSION['error_message']; ?>
            <?php unset($_SESSION['error_message']); ?>
        </div>
    <?php endif; ?>
    
    <form action="<?=BASE_URL.'?act=dat-hang' ?>" method="POST" class="m-l-63 m-lr-0-xl m-r-40 p-b-40 p-lr-15-sm p-lr-40 p-t-30 bor10">
=======

<!-- Navbar -->
<?php include_once './views/layouts/navbar.php'; ?>

<!-- Content -->
<div class="col-lg-10 col-sm-10 col-xl-10 m-b-50 m-lr-auto">
    <form action="<?= BASE_URL ?>?act=thanh-toan" method="POST" class="m-l-63 m-lr-0-xl m-r-40 p-b-40 p-lr-15-sm p-lr-40 p-t-30 bor10">
>>>>>>> 41a3a12 (update oder)
        <h4 class="p-b-30 text-center cl2 mtext-109">
            Page Checkout
        </h4>

        <div class="flex-t flex-w p-b-13 bor12">
            <div class="size-208">
                <span class="cl2 stext-110">
                    Total price:
                </span>
            </div>

            <div class="size-209">
                <span class="cl2 mtext-110">
<<<<<<< HEAD
                    <?= number_format($totalCart) ?>đ
=======
                    $79.65
>>>>>>> 41a3a12 (update oder)
                </span>
            </div>
        </div>

        <div class="flex-t flex-w p-b-30 p-t-15 bor12">
            <div class="w-full-ssm size-208">
                <span class="cl2 stext-110">
                    Information of recipient:
                </span>
            </div>

            <div class="p-r-0-sm p-r-18 w-full-ssm size-209">
                <div class="p-t-15">
                    <div class="m-b-12">
<<<<<<< HEAD
                        <label for="ten_nguoi_nhan" class="cl2 stext-110 m-b-6">Họ và tên</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan"
                                placeholder="Nhập họ và tên người nhận" required>
=======
                        <label for="ho_ten" class="cl2 stext-110 m-b-6">Họ và tên</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="ho_ten" name="ho_ten"
                                placeholder="Nhập họ và tên" required>
>>>>>>> 41a3a12 (update oder)
                        </div>
                    </div>

                    <div class="m-b-12">
<<<<<<< HEAD
                        <label for="sdt_nguoi_nhan" class="cl2 stext-110 m-b-6">Số điện thoại</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan"
                                placeholder="Nhập số điện thoại người nhận" required>
=======
                        <label for="so_dien_thoai" class="cl2 stext-110 m-b-6">Số điện thoại</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="so_dien_thoai" name="so_dien_thoai"
                                placeholder="Nhập số điện thoại" required>
>>>>>>> 41a3a12 (update oder)
                        </div>
                    </div>

                    <div class="m-b-12">
<<<<<<< HEAD
                        <label for="email_nguoi_nhan" class="cl2 stext-110 m-b-6">Email</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="email" id="email_nguoi_nhan" name="email_nguoi_nhan"
                                placeholder="Nhập email người nhận" required>
=======
                        <label for="email" class="cl2 stext-110 m-b-6">Email</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="email" id="email" name="email"
                                placeholder="Nhập email" required>
>>>>>>> 41a3a12 (update oder)
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="city" class="cl2 stext-110 m-b-6">Tỉnh/Thành phố</label>
                        <div class="bg0 bor8">
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="city" name="tinh_thanhpho" required>
                                <option value="">Chọn tỉnh thành</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="district" class="cl2 stext-110 m-b-6">Quận/Huyện</label>
                        <div class="bg0 bor8">
<<<<<<< HEAD
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="district" name="huyen_quan" required>
=======
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="district" name="quan_huyen" required>
>>>>>>> 41a3a12 (update oder)
                                <option value="">Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="ward" class="cl2 stext-110 m-b-6">Phường/Xã</label>
                        <div class="bg0 bor8">
<<<<<<< HEAD
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="ward" name="xa_phuong" required>
=======
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="ward" name="phuong_xa" required>
>>>>>>> 41a3a12 (update oder)
                                <option value="">Chọn phường xã</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-b-22">
<<<<<<< HEAD
                        <label for="dia_chi_cu_the" class="cl2 stext-110 m-b-6">Địa chỉ cụ thể</label>
                        <div class="bg0 bor8">
                            <textarea class="p-lr-15 cl8 plh3 size-111 stext-111" id="dia_chi_cu_the" name="dia_chi_cu_the"
                                placeholder="Nhập địa chỉ cụ thể" required></textarea>
                        </div>
                    </div>
                    <div class="m-b-22">
                        <label for="ghi_chu" class="cl2 stext-110 m-b-6">Ghi chú đơn hàng</label>
                        <div class="bg0 bor8">
                            <textarea class="p-lr-15 cl8 plh3 size-111 stext-111" id="ghi_chu" name="ghi_chu"
                                placeholder="Nhập ghi chú đơn hàng"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="trang_thai_id" value="1">
                    <div class="m-b-12">
                        <label for="phuong_thuc_thanh_toan" class="cl2 stext-110 m-b-6">Phương thức thanh toán</label>
                        <div class="bg0 bor8">
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" name="phuong_thuc_thanh_toan_id" id="phuong_thuc_thanh_toan" required>
                                <option value="">Chọn phương thức thanh toán</option>
                                <?php foreach ($payMethod as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['ten_phuong_thuc'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-t flex-w p-b-33 p-t-27">
            <div class="size-208">
                <span class="cl2 mtext-101">
                    Shipping fee:
                </span>
            </div>
            <div class="p-t-1 size-209">
                <span class="cl2 mtext-110" id="shipping-fee">
                    30,000đ
                </span>
            </div>
        </div>
        <div class="flex-m flex-w m-r-20 m-tb-5">
            <div class="size-208">
                <span class="cl2 mtext-101">
                    Coupon Code:
                </span>
            </div>
            <div class="bg0 bor8 m-r-10 m-tb-5 size-117">
                <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="ma_giam_gia" name="ma_giam_gia">
                    <option value="">Coupon Code</option>
                </select>
            </div>
        </div>
=======
                        <label for="ghi_chu" class="cl2 stext-110 m-b-6">Địa chỉ cụ thể</label>
                        <div class="bg0 bor8">
                            <textarea class="p-lr-15 cl8 plh3 size-111 stext-111" id="ghi_chu" name="ghi_chu"
                                placeholder="Nhập địa chỉ cụ thể" required></textarea>
                        </div>
                    </div>
                    <div class="m-b-12">
                        <label for="phuong_thuc_thanh_toan_id" class="cl2 stext-110 m-b-6">Phương Thức Thanh Toán</label>
                        <div class="bg0 bor8">
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="phuong_" name="phuong_thuc_thanh_toan_id" required>
                                <option value="">Chọn phương thức thanh toán</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="trang_thai_id" value="1">

                </div>
            </div>
        </div>

>>>>>>> 41a3a12 (update oder)
        <div class="flex-t flex-w p-b-33 p-t-27">
            <div class="size-208">
                <span class="cl2 mtext-101">
                    Total checkout:
                </span>
            </div>
<<<<<<< HEAD
            <div class="p-t-1 size-209">
                <span class="cl2 mtext-110" id="total-checkout">
                    <?= number_format($totalCart + 30000) ?>đ
                </span>
                <input type="hidden" name="tong_tien" value="<?= $totalCart + 30000 ?>" id="tong-tien-input">
=======

            <div class="p-t-1 size-209">
                <span class="cl2 mtext-110">
                    $79.65
                </span>
>>>>>>> 41a3a12 (update oder)
            </div>
        </div>

        <button type="submit" class="flex-c-m p-lr-15 bg3 bor14 cl0 hov-btn3 pointer size-116 stext-101 trans-04">
            Checkout
        </button>
<<<<<<< HEAD

=======
>>>>>>> 41a3a12 (update oder)
    </form>
</div>


<!-- Axiox  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<!-- Lấy dữ liệu tỉnh thành phố -->
<script>
    // Lấy tham chiếu đến các thẻ select
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
<<<<<<< HEAD
    var shippingFee = document.getElementById("shipping-fee");
    var totalCheckout = document.getElementById("total-checkout");
    var tongTienInput = document.getElementById("tong-tien-input");
    var totalCart = <?= $totalCart ?>;
=======
>>>>>>> 41a3a12 (update oder)

    // Gọi API và lấy dữ liệu
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
<<<<<<< HEAD
    }).catch(function(error) {
        console.error("Lỗi khi tải dữ liệu địa chỉ:", error);
        alert("Không thể tải dữ liệu địa chỉ. Vui lòng làm mới trang và thử lại.");
=======
>>>>>>> 41a3a12 (update oder)
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
<<<<<<< HEAD
            districts.length = 1;
            wards.length = 1;
=======
            district.length = 1;
            ward.length = 1;
>>>>>>> 41a3a12 (update oder)
            if (this.options[this.selectedIndex].dataset.id != "") {
                const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);
                for (const k of result[0].Districts) {
                    var opt = document.createElement('option');
                    opt.value = k.Name;
                    opt.text = k.Name;
                    opt.setAttribute('data-id', k.Id);
<<<<<<< HEAD
                    districts.options.add(opt);
                }

                // Cập nhật phí ship
                updateTotalPrice();
=======
                    district.options.add(opt);
                }
>>>>>>> 41a3a12 (update oder)
            }
        };

        // Xử lý sự kiện khi thay đổi quận/huyện
<<<<<<< HEAD
        districts.onchange = function() {
            wards.length = 1;
=======
        district.onchange = function() {
            ward.length = 1;
>>>>>>> 41a3a12 (update oder)
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
<<<<<<< HEAD
    
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
        
        let finalTotal = totalCart + shippingCost;
        totalCheckout.textContent = finalTotal.toLocaleString() + "đ";
        tongTienInput.value = finalTotal;
    }
=======
>>>>>>> 41a3a12 (update oder)
</script>

<!--Footer-->
<?php include_once './views/layouts/footer.php'; ?>