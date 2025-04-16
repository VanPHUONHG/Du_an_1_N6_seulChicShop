<!-- Header -->
<?php include './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- Mini Cart -->
<?php include './views/layouts/miniCart.php'; ?>

<!-- Google Font (nếu muốn chữ đẹp hơn) -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    .blog-content {
        font-size: 20px;         /* Chữ to rõ */
        line-height: 1.9;        /* Dòng giãn ra dễ đọc */
        color: #444;             /* Màu chữ dịu hơn đen */
        letter-spacing: 0.3px;   /* Nhẹ nhàng, không sát quá */
    }

    .blog-title {
        font-size: 38px;
        font-weight: 700;
        color: #222;
    }

    .blog-date {
        font-size: 18px;
        color: #888;
    }
</style>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">

                <!-- Ảnh -->
                <img src="<?= $blog['hinh_anh'] ?>" alt="Ảnh bài viết" 
                     class="card-img-top img-fluid rounded-top" 
                     style="object-fit: cover; height: 400px;">

                <!-- Nội dung -->
                <div class="card-body p-5">
                    <!-- Tiêu đề -->
                    <h1 class="blog-title mb-3"><?= $blog['tieu_de'] ?></h1>

                    <!-- Ngày đăng -->
                    <p class="blog-date mb-4">
                        <i class="bi bi-calendar-event me-2"></i>
                        Ngày đăng: <?= date('d M Y', strtotime($blog['ngay_tao_bai_viet'])) ?>
                    </p>

                    <!-- Nội dung bài viết -->
                    <div class="blog-content">
                        <?= nl2br($blog['bai_viet']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include './views/layouts/footer.php'; ?>
