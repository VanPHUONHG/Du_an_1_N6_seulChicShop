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
                <form>
                    <h4 class="p-b-30 cl2 mtext-105 txt-center">
                        Send Us A Message
                    </h4>

                    <div class="m-b-20 bor8 how-pos4-parent">
                        <input class="p-l-62 p-r-30 cl2 plh3 size-116 stext-111" type="text" name="email"
                            placeholder="Your Email Address">
                        <img class="how-pos4 pointer-none" src="assets/images/icons/icon-email.png" alt="ICON">
                    </div>

                    <div class="m-b-30 bor8">
                        <textarea class="p-lr-28 p-tb-25 cl2 plh3 size-120 stext-111" name="msg"
                            placeholder="How Can We Help?"></textarea>
                    </div>

                    <button class="flex-c-m p-lr-15 bg3 bor1 cl0 hov-btn3 pointer size-121 stext-101 trans-04">
                        Submit
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
                            Address
                        </span>

                        <p class="p-t-18 cl6 size-213 stext-115">
                            Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
                        </p>
                    </div>
                </div>

                <div class="flex-w p-b-42 w-full">
                    <span class="cl5 fs-18 size-211 txt-center">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="p-t-2 size-212">
                        <span class="cl2 mtext-110">
                            Lets Talk
                        </span>

                        <p class="p-t-18 cl1 size-213 stext-115">
                            +1 800 1236879
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="cl5 fs-18 size-211 txt-center">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="p-t-2 size-212">
                        <span class="cl2 mtext-110">
                            Sale Support
                        </span>

                        <p class="p-t-18 cl1 size-213 stext-115">
                            contact@example.com
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