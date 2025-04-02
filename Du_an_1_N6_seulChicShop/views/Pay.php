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
$ma_don_hang = 'DH' . date('YmdHis') . rand(100,999);
?>

<!-- Content -->
<div class="col-lg-10 col-sm-10 col-xl-10 m-b-50 m-lr-auto">
    <!-- Hiển thị thông báo lỗi nếu có -->
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger mb-4">
            <?= $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <!-- Hiển thị thông báo thành công nếu có -->
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success mb-4">
            <?= $_SESSION['success']; ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    
    <form action="<?=BASE_URL.'?act=dat-hang' ?>" method="POST" class="m-l-63 m-lr-0-xl m-r-40 p-b-40 p-lr-15-sm p-lr-40 p-t-30 bor10" onsubmit="return validateForm()">
        <input type="hidden" name="ma_don_hang" value="<?= $ma_don_hang ?>">
        <input type="hidden" name="tai_khoan_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">
        <input type="hidden" name="ngay_dat" value="<?= date('Y-m-d H:i:s') ?>">

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
                    <?= number_format($totalCart) ?>đ
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
                        <label for="ten_nguoi_nhan" class="cl2 stext-110 m-b-6">Họ và tên</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan"
                                placeholder="Nhập họ và tên người nhận" required>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="sdt_nguoi_nhan" class="cl2 stext-110 m-b-6">Số điện thoại</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan"
                                placeholder="Nhập số điện thoại người nhận" required>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="email_nguoi_nhan" class="cl2 stext-110 m-b-6">Email</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="email" id="email_nguoi_nhan" name="email_nguoi_nhan"
                                placeholder="Nhập email người nhận" required>
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
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="district" name="huyen_quan" required>
                                <option value="">Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="ward" class="cl2 stext-110 m-b-6">Phường/Xã</label>
                        <div class="bg0 bor8">
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="ward" name="xa_phuong" required>
                                <option value="">Chọn phường xã</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-b-22">
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
                    <input type="hidden" name="trang_thai_don_hang_id" value="1">
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
        
        
        <!-- Chi tiết đơn hàng -->
        <div class="p-b-30 bor12 m-tb-20">
            <h5 class="cl2 stext-110 p-b-15">Chi tiết đơn hàng</h5> 
            <div class="wrap-table-shopping-cart">
                <table class="table-shopping-cart w-100">
                    <thead>
                        <tr class="table_head">
                            <th class="column-1 text-center" style="width: 10%">Sản phẩm</th>
                            <th class="column-2" style="width: 35%">Tên sản phẩm</th>
                            <th class="column-3 text-right" style="width: 15%">Giá</th>
                            <th class="column-4 text-center" style="width: 10%">Màu sắc</th>
                            <th class="column-5 text-center" style="width: 10%">Kích thước</th>
                            <th class="column-6 text-center" style="width: 10%">Số lượng</th>
                            <th class="column-7 text-right" style="width: 10%">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!empty($detailCart)) : 
                            foreach ($detailCart as $item) : 
                                $price = $item['gia_san_pham_khuyen_mai'] > 0 ? $item['gia_san_pham_khuyen_mai'] : $item['gia_san_pham'];
                                $totalItem = $price * $item['so_luong'];
                        ?>
                        <tr class="table_row">
                            <td class="column-1 text-center">
                                <div class="how-itemcart1">
                                    <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>" style="width: 60px; height: 60px; object-fit: cover;">
                                </div>
                                <!-- Thêm hidden inputs để lưu thông tin sản phẩm -->
                                <input type="hidden" name="san_pham_id[]" value="<?= $item['san_pham_id'] ?>">
                                <input type="hidden" name="bien_the_san_pham_id[]" value="<?= $item['bien_the_san_pham_id'] ?>">
                            </td>
                            
                            <td class="column-2"><?= $item['ten_san_pham'] ?></td>
                            <td class="column-3 text-right"><?= number_format($price).' '.'đ' ?></td>
                            <td class="column-4 text-center"><?= $item['mau_sac'] ?></td>
                            <td class="column-5 text-center"><?= $item['kich_thuoc'] ?></td>
                            <td class="column-6 text-center"><?= $item['so_luong'] ?></td>
                            <input type="hidden" name="so_luong[]" value="<?= $item['so_luong'] ?>">
                            <td class="column-7 text-right"><?= number_format($totalItem).' '.'đ' ?></td>
                            <input type="hidden" name="thanh_tien[]" value="<?= $totalItem ?>">
                        </tr>
                        <?php 
                            endforeach; 
                        endif; 
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex-t flex-w p-b-33 p-t-27">
            <div class="size-208">
                <span class="cl2 mtext-101">
                    Total checkout:
                </span>
            </div>
            <div class="p-t-1 size-209">
                <span class="cl2 mtext-110" id="total-checkout">
                    <?= number_format($totalCart + 30000) ?>đ
                </span>
                <input type="hidden" name="tong_tien" value="<?= $totalCart + 30000 ?>" id="tong-tien-input">
            </div>
        </div>                           
        <button type="submit" class="flex-c-m p-lr-15 bg3 bor14 cl0 hov-btn3 pointer size-116 stext-101 trans-04">
            Checkout
        </button>

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
    var shippingFee = document.getElementById("shipping-fee");
    var totalCheckout = document.getElementById("total-checkout");
    var tongTienInput = document.getElementById("tong-tien-input");
    var totalCart = <?= $totalCart ?>;

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
        
        let finalTotal = totalCart + shippingCost;
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
</script>

<!--Footer-->
<?php include_once './views/layouts/footer.php'; ?>