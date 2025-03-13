<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/sanPham.php';

// Route
$act = $_GET['act'] ?? '/';

// Kiểm tra act và trả về nội dung phù hợp
$response = match ($act) {
    '/' => (new HomeController())->home(), // Trang chủ
    'trangchu' => (new HomeController())->trangChu(), // Base_URL/?act=trangchu
    'danh-sach-san-pham' => (new HomeController())->danhSachSanPham(), // Base_URL/?act=danh-sach-san-pham
    default => '404 - Trang không tồn tại'
};

// Hiển thị nội dung
echo $response;
