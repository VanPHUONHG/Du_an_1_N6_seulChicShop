<?php
// session_start(); 
session_start();

error_reporting(E_ALL); 
ini_set('display_errors', 1);
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ



// checkLoginAdmin

// Require toàn bộ file Controllers
require_once './controllers/ClientHomeController.php';
require_once './controllers/ClientContactController.php';
require_once './controllers/ClientCartController.php';
require_once './controllers/ClientPayController.php';
require_once './controllers/ClientProductController.php';

require_once './controllers/ClientProductController.php';

require_once './controllers/ClientOderController.php';


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
    'danh-sach-san-pham' => (new ClientProductController())->listProduct(), // Base_URL/?act=danh-sach-san-pham
    // lien he
    'lien-he' => (new ClientContactController())->listContact(), // Base_URL/?act=lien-he
    'them-lien-he' => (new ClientContactController())->addContact(), // Base_URL/?act=them-lien-he
    'gioi-thieu' => (new ClientHomeController())->about(), // Base_URL/?act=gioi-thieu
    'chi-tiet-san-pham' => (new ClientProductController())->detailProduct(), // Base_URL/?act=chi-tiet-san-pham
    'bai-viet' => (new ClientHomeController())->blog(), // Base_URL/?act=bai-viet
    'chi-tiet-bai-viet' => (new ClientHomeController())->blogDetail(), // Base_URL/?act=chi-tiet-bai-viet
    // Auth
    'dang-nhap' => (new ClientHomeController())->signIn(),
    'check-dang-nhap' => (new ClientHomeController())->checkSignIn(),
    'dang-ky' => (new ClientHomeController())->signUp(),
    'check-dang-ky' => (new ClientHomeController())->insertUserClient(),
    'dang-xuat' => (new ClientHomeController())->signOut(),
    'quan-ly-tai-khoan' => (new ClientHomeController())->editUser(),
    'cap-nhat-tai-khoan' => (new ClientHomeController())->updateUser(),

    // Cart
    'gio-hang' => (new ClientCartController())->listCart(),
    'cap-nhat-so-luong' => (new ClientCartController())->updateQuantity(),
    'them-san-pham-gio-hang' => (new ClientCartController())->addProductCart(),
    'xoa-san-pham-gio-hang' => (new ClientCartController())->deleteDetailCart(),
    'them-san-pham-gio-hang' => (new ClientCartController())->addProductCart(), // Base_URL/?act=them-san-pham-gio-hang
    // Pay

    'thanh-toan' => (new ClientPayController())->listPay(), // Base_URL/?act=thanh-toan
    'dat-hang' => (new ClientPayController())->addOrderAndDetailOder(), // Base_URL/?act=dat-hang

    // Thanh toán
    // 'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new ClientOderController())->postThanhToan(),
    'lich-su-mua-hang' => (new ClientOderController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new ClientOderController())->chiTietDonHang(),
    'huy-don-hang' => (new ClientOderController())->huyDonHang(),
    default => '404 - Trang không tồn tại',

};

// Hiển thị nội dung
echo $response;
