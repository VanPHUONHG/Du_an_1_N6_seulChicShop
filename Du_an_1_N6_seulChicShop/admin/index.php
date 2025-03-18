<?php

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDashboardController.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminProductController.php';
require_once './controllers/AdminOrderController.php';
require_once './controllers/AdminUserController.php';
require_once './controllers/AdminContactController.php';
require_once './controllers/AdminImageController.php';
// require_once './controllers/AdminPositionController.php';
// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminProduct.php';
require_once './models/AdminOrder.php';
require_once './models/AdminUser.php';
require_once './models/AdminContact.php';
require_once './models/AdminPosition.php';
require_once './models/AdminImage.php';

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
  'chi-tiet-don-hang' => (new AdminOrderController())->detailOrder(),

  // router user admin
  'tai-khoan-quan-tri' => (new AdminUserController())->listUserAdmin(),
  'chi-tiet-tai-khoan-admin' => (new AdminUserController())->detailUserAdmin(),
  'xoa-tai-khoan-admin' => (new AdminUserController())->destroyUserAdmin(),
  'form-them-tai-khoan-admin' => (new AdminUserController())->formAddUserAdmin(),
  'them-tai-khoan-admin' => (new AdminUserController())->insertUserAdmin(),
  'form-sua-tai-khoan-admin' => (new AdminUserController())->formEditUserAdmin(),
  'sua-tai-khoan-admin' => (new AdminUserController())->editUserAdmin(),
  // router user client
  'tai-khoan-khach-hang' => (new AdminUserController())->listUserClient(),
  'chi-tiet-tai-khoan-khach-hang' => (new AdminUserController())->detailUserClient(),
  'sua-tai-khoan-admin' => (new AdminUserController())->updateUserAdmin(),
  // router user client
  'tai-khoan-khach-hang' => (new AdminUserController())->listUserClient(),
  'chi-tiet-tai-khoan-khach-hang' => (new AdminUserController())->listUserClientById(),
  // router contact
  'lien-he' => (new AdminContactController())->listContact(),
  'form-chinh-sua-lien-he' => (new AdminContactController())->formEditContact(),
  'xu-ly-lien-he' => (new AdminContactController())->editStatusContact(),
  // router image admin
  'danh-sach-anh' => (new AdminImageController())->listImage(),
};
