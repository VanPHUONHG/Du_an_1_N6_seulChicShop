<?php

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDashboardController.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminProductController.php';
require_once './controllers/AdminOrderController.php';
// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminProduct.php';
require_once './models/AdminOrder.php';
require_once './models/AdminUser.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  '/' => (new AdminDashboardController())->trangChu(),
  //router danh muc
  'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
  'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
  'them-danh-muc' => (new AdminDanhMucController())->possAddDanhMuc(),
  'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
  'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
  'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),
  //router san pham
  'san-pham' => (new AdminProductController())->listProduct(),
  'xoa-san-pham' => (new AdminProductController())->destroyProduct(),
  'chi-tiet-san-pham' => (new AdminProductController())->detailProduct(),
  'form-them-san-pham' => (new AdminProductController())->formAddProduct(),
  'them-san-pham' => (new AdminProductController())->createProduct(),
  'form-sua-san-pham' => (new AdminProductController())->formEditProduct(),
  'sua-san-pham' => (new AdminProductController())->editProduct(),
  
  
  // router order
  'don-hang' => (new AdminOrderController())->listOrder(),
  'form-sua-don-hang' => (new AdminOrderController())->formEditOrder(),
  'sua-don-hang' => (new AdminOrderController())->possEditOrder(),
  'xoa-don-hang' => (new AdminOrderController())->deleteOrder(),
  'chi-tiet-don-hang' => (new AdminOrderController())->detailOrder()
};
