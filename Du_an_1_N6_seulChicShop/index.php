<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ClientHomeController.php';
require_once './controllers/ClientContactController.php';
require_once './controllers/ClientCartController.php';
require_once './controllers/ClientPayController.php';

// Require toàn bộ file Models
require_once './models/ClientProduct.php';
require_once './models/ClientContact.php';
require_once './models/ClientUser.php';
require_once './models/ClientPay.php';
<<<<<<< HEAD
require_once './models/ClientCart.php';
=======
>>>>>>> 41a3a12 (update oder)
// Route
$act = $_GET['act'] ?? '/';

// Kiểm tra act và trả về nội dung phù hợp
$response = match ($act) {

    '/' => (new ClientHomeController())->index(), // Trang chủ
    'danh-sach-san-pham' => (new ClientHomeController())->listProduct(), // Base_URL/?act=danh-sach-san-pham
    // lien he
    'lien-he' => (new ClientContactController())->listContact(), // Base_URL/?act=lien-he
    'them-lien-he' => (new ClientContactController())->addContact(), // Base_URL/?act=them-lien-he
    'gioi-thieu' => (new ClientHomeController())->about(), // Base_URL/?act=gioi-thieu
<<<<<<< HEAD
    'chi-tiet-san-pham' => (new ClientHomeController())->detailProduct(), // Base_URL/?act=chi-tiet-san-pham
    'bai-viet' => (new ClientHomeController())->blog(), // Base_URL/?act=bai-viet
    'chi-tiet-bai-viet' => (new ClientHomeController())->blogDetail(), // Base_URL/?act=chi-tiet-bai-viet
=======
    'chi-tiet-san-pham' => (new ClientHomeController())->singleProduct(), // Base_URL/?act=chi-tiet-san-pham
    'bai-viet' => (new ClientHomeController())->blog(), // Base_URL/?act=bai-viet
    'chi-tiet-bai-viet' => (new ClientHomeController())->blogDetail(), // Base_URL/?act=chi-tiet-bai-viet
    'gio-hang' => (new ClientHomeController())->cart(), // Base_URL/?act=gio-hang

>>>>>>> 41a3a12 (update oder)
    // Auth
    'dang-nhap' => (new ClientHomeController())->signIn(), // Base_URL/?act=dang-nhap
    'check-dang-nhap' => (new ClientHomeController())->checkSignIn(), // Base_URL/?act=check-dang-nhap
    'dang-ky' => (new ClientHomeController())->signUp(), // Base_URL/?act=dang-ky
    'check-dang-ky' => (new ClientHomeController())->insertUserClient(), // Base_URL/?act=check-dang-ky
    'dang-xuat' => (new ClientHomeController())->signOut(), // Base_URL/?act=dang-xuat
    'quan-ly-tai-khoan' => (new ClientHomeController())->editUser(), // Base_URL/?act=quan-ly-tai-khoan
    'cap-nhat-tai-khoan' => (new ClientHomeController())->updateUser(), // Base_URL/?act=cap-nhat-tai-khoan
<<<<<<< HEAD
    // Cart
    'gio-hang' => (new ClientCartController())->listCart(), // Base_URL/?act=gio-hang
    'cap-nhat-so-luong' => (new ClientCartController())->updateQuantity(), // Base_URL/?act=cap-nhat-so-luong
    'them-san-pham-gio-hang' => (new ClientCartController())->addProductCart(), // Base_URL/?act=them-san-pham-gio-hang
    'xoa-san-pham-gio-hang' => (new ClientCartController())->deleteDetailCart(), // Base_URL/?act=xoa-san-pham-gio-hang// Base_URL/?act=xoa-gio-hang
    // Pay
    'thanh-toan' => (new ClientPayController())->listPay(), // Base_URL/?act=thanh-toan
    'dat-hang' => (new ClientPayController())->addOder(), // Base_URL/?act=dat-hang
    default => '404 - Trang không tồn tại'
=======

    // Cart
    'them-san-pham-gio-hang' => (new ClientCartController())->addProductCart(), // Base_URL/?act=them-san-pham-gio-hang
    // Pay
    'thanh-toan' => (new ClientPayController())->listPay(), // Base_URL/?act=thanh-toan
    default => '404 - Trang không tồn tại'
};


    // Thanh toán
    // 'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),
    'lich-su-mua-hang' => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new HomeController())->chiTietDonHang(),
    'huy-don-hang' => (new HomeController())->huyDonHang(),
>>>>>>> 41a3a12 (update oder)
};

// Hiển thị nội dung
echo $response;
