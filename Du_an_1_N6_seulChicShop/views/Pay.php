<!-- Header -->
<?php include_once './views/layouts/header.php'; ?>

<!-- Navbar -->
<?php include_once './views/layouts/navbar.php'; ?>

<!-- Content -->
<div class="col-lg-10 col-sm-10 col-xl-10 m-b-50 m-lr-auto">
    <form action="<?= BASE_URL ?>?act=thanh-toan" method="POST" class="m-l-63 m-lr-0-xl m-r-40 p-b-40 p-lr-15-sm p-lr-40 p-t-30 bor10">
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
                    $79.65
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
                        <label for="ho_ten" class="cl2 stext-110 m-b-6">Họ và tên</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="ho_ten" name="ho_ten"
                                placeholder="Nhập họ và tên" required>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="so_dien_thoai" class="cl2 stext-110 m-b-6">Số điện thoại</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="text" id="so_dien_thoai" name="so_dien_thoai"
                                placeholder="Nhập số điện thoại" required>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="email" class="cl2 stext-110 m-b-6">Email</label>
                        <div class="bg0 bor8">
                            <input class="p-lr-15 cl8 plh3 size-111 stext-111" type="email" id="email" name="email"
                                placeholder="Nhập email" required>
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
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="district" name="quan_huyen" required>
                                <option value="">Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-b-12">
                        <label for="ward" class="cl2 stext-110 m-b-6">Phường/Xã</label>
                        <div class="bg0 bor8">
                            <select class="p-lr-15 cl8 plh3 size-111 stext-111" id="ward" name="phuong_xa" required>
                                <option value="">Chọn phường xã</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-b-22">
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

        <div class="flex-t flex-w p-b-33 p-t-27">
            <div class="size-208">
                <span class="cl2 mtext-101">
                    Total checkout:
                </span>
            </div>

            <div class="p-t-1 size-209">
                <span class="cl2 mtext-110">
                    $79.65
                </span>
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

    // Gọi API và lấy dữ liệu
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
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
            district.length = 1;
            ward.length = 1;
            if (this.options[this.selectedIndex].dataset.id != "") {
                const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);
                for (const k of result[0].Districts) {
                    var opt = document.createElement('option');
                    opt.value = k.Name;
                    opt.text = k.Name;
                    opt.setAttribute('data-id', k.Id);
                    district.options.add(opt);
                }
            }
        };

        // Xử lý sự kiện khi thay đổi quận/huyện
        district.onchange = function() {
            ward.length = 1;
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
</script>

<!--Footer-->
<?php include_once './views/layouts/footer.php'; ?>