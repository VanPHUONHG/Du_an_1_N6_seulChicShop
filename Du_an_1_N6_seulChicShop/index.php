<?php
// session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ



// checkLoginAdmin

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/sanPham.php';

// giỏ hàng
require_once './models/GioHang.php';


// Route
$act = $_GET['act'] ?? '/';



// Kiểm tra act và trả về nội dung phù hợp
$response = match ($act) {

    '/' => (new HomeController())->index(), // Trang chủ
    'danh-sach-san-pham' => (new HomeController())->listProduct(), // Base_URL/?act=danh-sach-san-pham
    'lien-he' => (new HomeController())->contact(), // Base_URL/?act=lien-he
    'gioi-thieu' => (new HomeController())->about(), // Base_URL/?act=gioi-thieu
    'chi-tiet-san-pham' => (new HomeController())->singleProduct(), // Base_URL/?act=chi-tiet-san-pham
    'bai-viet' => (new HomeController())->blog(), // Base_URL/?act=bai-viet
    'chi-tiet-bai-viet' => (new HomeController())->blogDetail(), // Base_URL/?act=chi-tiet-bai-viet
    'gio-hang' => (new HomeController())->cart(), // Base_URL/?act=gio-hang
// default => '404 - Trang không tồn tại'

     //route giỏ hàng
     'them-gio-hang' =>  (new HomeController())->addGioHang(),
     'gio-hang'  =>  (new HomeController())->gioHang(),
     'thanh-toan'  =>  (new HomeController())->thanhToan(),
     'xu-ly-thanh-toan'  =>  (new HomeController())->postThanhToan(),
 


};

// Hiển thị nội dung
echo $response;
