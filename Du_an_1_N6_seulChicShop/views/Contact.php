<!-- Header -->
<?php include './views/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>


<!-- Title page -->
<section class="bg-img1 p-lr-15 p-tb-92 txt-center" style="background-image: url('assets/images/bg-01.jpg');">
    <h2 class="cl0 ltext-105 txt-center">
        Contact
    </h2>
</section>


<!-- Content page -->
<section class="p-b-116 p-t-104 bg0">
    <div class="container">
        <div class="flex-tr flex-w">
            <div class="p-b-70 p-lr-15-lg p-lr-70 p-t-55 w-full-md bor10 size-210">
                <form action="<?= BASE_URL . '?act=them-lien-he' ?>" method="post" enctype="multipart/form-data">
                    <h4 class="p-b-30 cl2 mtext-105 txt-center">
                        Liên hệ với chúng tôi
                    </h4>
                    <?php if (isset($_SESSION['thong_bao'])): ?>
                        <p class="text-success"><?= $_SESSION['thong_bao'] ?></p>
                    <?php endif; ?>
                    <div class="m-b-20 bor8 how-pos4-parent">
                        <input class="p-l-62 p-r-30 cl2 plh3 size-116 stext-111" type="text" name="ho_ten"
                            placeholder="Họ Và Tên" required>
                        <img class="how-pos4 pointer-none" src="assets/images/icons/icon-email.png" alt="ICON">
                    </div>
                    <div class="m-b-20 bor8 how-pos4-parent">
                        <input class="p-l-62 p-r-30 cl2 plh3 size-116 stext-111" type="text" name="email"
                            placeholder="Địa chỉ email" required>
                        <img class="how-pos4 pointer-none" src="assets/images/icons/icon-email.png" alt="ICON">
                    </div>
                    <div class="m-b-20 bor8 how-pos4-parent">
                        <input class="p-l-62 p-r-30 cl2 plh3 size-116 stext-111" type="text" name="so_dien_thoai"
                            placeholder="Số diện thoại" required>
                        <img class="how-pos4 pointer-none" src="assets/images/icons/icon-email.png" alt="ICON">
                    </div>
                    <div class="m-b-20 bor8 how-pos4-parent">
                        <input class="p-l-62 p-r-30 cl2 plh3 size-116 stext-111" type="text" name="tieu_de"
                            placeholder="Tiêu đề" required>
                        <img class="how-pos4 pointer-none" src="assets/images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="m-b-30 bor8">
                        <textarea class="p-lr-28 p-tb-25 cl2 plh3 size-120 stext-111" name="noi_dung"
                            placeholder="Tin nhắn" required></textarea>
                    </div>
                    <input type="hidden" name="trang_thai" value="0">
                    <input type="hidden" name="tai_khoan_id" value="20">

                    <button type="submit" class="flex-c-m p-lr-15 bg3 bor1 cl0 hov-btn3 pointer size-121 stext-101 trans-04">
                        Gửi liên hệ
                    </button>
                </form>
            </div>

            <div class="flex-col-m flex-w p-lr-15-lg p-lr-93 p-tb-30 w-full-md bor10 size-210">
                <div class="flex-w p-b-42 w-full">
                    <span class="cl5 fs-18 size-211 txt-center">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="p-t-2 size-212">
                        <span class="cl2 mtext-110">
                            Địa chỉ
                        </span>

                        <p class="p-t-18 cl6 size-213 stext-115">
                            Số 1, Trịnh Văn Bô, Nam Từ Liêm, Hà Nội
                        </p>
                    </div>
                </div>

                <div class="flex-w p-b-42 w-full">
                    <span class="cl5 fs-18 size-211 txt-center">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="p-t-2 size-212">
                        <span class="cl2 mtext-110">
                            Số điện thoại
                        </span>

                        <p class="p-t-18 cl1 size-213 stext-115">
                            (+84) 96 716 6879
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="cl5 fs-18 size-211 txt-center">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="p-t-2 size-212">
                        <span class="cl2 mtext-110">
                            Email Hỗ trợ
                        </span>

                        <p class="p-t-18 cl1 size-213 stext-115">
                            seulchicshop@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Map -->
<div class="map">
    <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787"
        data-pin="assets/images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>




<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>