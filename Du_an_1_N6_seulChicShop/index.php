<?php
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ



// checkLoginAdmin

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
require_once './models/ClientCart.php';
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
    'chi-tiet-san-pham' => (new ClientHomeController())->detailProduct(), // Base_URL/?act=chi-tiet-san-pham
    'bai-viet' => (new ClientHomeController())->blog(), // Base_URL/?act=bai-viet
    'chi-tiet-bai-viet' => (new ClientHomeController())->blogDetail(), // Base_URL/?act=chi-tiet-bai-viet
    // Auth
    'dang-nhap' => (new ClientHomeController())->signIn(), // Base_URL/?act=dang-nhap
    'check-dang-nhap' => (new ClientHomeController())->checkSignIn(), // Base_URL/?act=check-dang-nhap
    'dang-ky' => (new ClientHomeController())->signUp(), // Base_URL/?act=dang-ky
    'check-dang-ky' => (new ClientHomeController())->insertUserClient(), // Base_URL/?act=check-dang-ky
    'dang-xuat' => (new ClientHomeController())->signOut(), // Base_URL/?act=dang-xuat
    'quan-ly-tai-khoan' => (new ClientHomeController())->editUser(), // Base_URL/?act=quan-ly-tai-khoan
    'cap-nhat-tai-khoan' => (new ClientHomeController())->updateUser(), // Base_URL/?act=cap-nhat-tai-khoan
    // Cart
    'gio-hang' => (new ClientCartController())->listCart(), // Base_URL/?act=gio-hang
    'cap-nhat-so-luong' => (new ClientCartController())->updateQuantity(), // Base_URL/?act=cap-nhat-so-luong
    'them-san-pham-gio-hang' => (new ClientCartController())->addProductCart(), // Base_URL/?act=them-san-pham-gio-hang
    'xoa-san-pham-gio-hang' => (new ClientCartController())->deleteDetailCart(), // Base_URL/?act=xoa-san-pham-gio-hang// Base_URL/?act=xoa-gio-hang
    // Pay
    'thanh-toan' => (new ClientPayController())->listPay(), // Base_URL/?act=thanh-toan
    'dat-hang' => (new ClientPayController())->addOder(), // Base_URL/?act=dat-hang

    // bài viết
    'bai-viet' => (new ClientPostsController())->listPosts(), // Base_URL/?act=bai-viet
    // 'gioi-thieu' => (new ClientHomeController())->about(), // Base_URL/?act=gioi-thieu
    // 'chi-tiet-san-pham' => (new ClientHomeController())->detailProduct(), // Base_URL/?act=chi-tiet-san-pham
    // 'chi-tiet-bai-viet' => (new ClientHomeController())->blogDetail(), // Base_URL/?act=chi-tiet-bai-viet

    default => '404 - Trang không tồn tại'
};

// Hiển thị nội dung
echo $response;
