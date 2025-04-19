<!-- Header -->
<?php include './views/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>

<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- Notifications -->
<?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm mx-3" role="alert">
        <i class="fas fa-exclamation-circle mr-2"></i>
        <?php foreach ($_SESSION['error'] as $error): ?>
            <p class="mb-0"><?= $error ?></p>
        <?php endforeach; ?>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm mx-3" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        <p class="mb-0"><?= $_SESSION['success'] ?></p>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- Title page -->
<section class="bg-img1 p-lr-15 p-tb-92 txt-center position-relative" style="background-image: url('assets/images/bg-01.jpg'); background-position: center; background-size: cover;">
    <div class="overlay" style="background: rgba(0,0,0,0.5); position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
    <h2 class="cl0 ltext-105 txt-center position-relative" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
        Contact Us
    </h2>
</section>

<!-- Content page -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card shadow-lg border-0 rounded-lg h-100">
                    <div class="card-body p-5">
                        <h4 class="text-center text-primary font-weight-bold mb-4">
                            <i class="fas fa-envelope mr-2"></i>Send Us a Message
                        </h4>
                        <form action="<?= BASE_URL . '?act=them-lien-he' ?>" method="post" class="needs-validation">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="ho_ten" placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="tel" class="form-control" name="so_dien_thoai" placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="fas fa-heading"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="tieu_de" placeholder="Subject" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="noi_dung" rows="5" placeholder="Your Message" required></textarea>
                            </div>

                            <input type="hidden" name="trang_thai" value="0">
                            <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['tai_khoan_id'] ?? '' ?>">

                            <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold">
                                <i class="fas fa-paper-plane mr-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg h-100">
                    <div class="card-body p-5">
                        <h4 class="text-center text-primary font-weight-bold mb-4">
                            <i class="fas fa-info-circle mr-2"></i>Contact Information
                        </h4>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle p-3 mr-3">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold mb-1">Address</h5>
                                <p class="mb-0">2PQW+6JJ FPT Polytechnic Building, Gate 2, 13 Trinh Van Bo Street, Xuan Phuong, Nam Tu Liem, Hanoi 100000</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle p-3 mr-3">
                                <i class="fas fa-phone fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold mb-1">Phone</h5>
                                <p class="mb-0"><a href="tel:+84967166879" class="text-dark">(+84) 96 716 6879</a></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle p-3 mr-3">
                                <i class="fas fa-envelope fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold mb-1">Email</h5>
                                <p class="mb-0"><a href="mailto:seulchicshop@gmail.com" class="text-dark">seulchicshop@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<div class="container-fluid px-0">
    <div class="map" style="height: 450px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.455803504903!2d105.73388883199723!3d21.038128992796025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1sen!2s!4v1742630448976!5m2!1sen!2s"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>