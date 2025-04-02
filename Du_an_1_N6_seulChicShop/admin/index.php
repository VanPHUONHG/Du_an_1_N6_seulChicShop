<?php

session_start();
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
require_once './controllers/AdminBannerController.php';
require_once './controllers/AdminKhuyenMaiController.php'; // Đã sửa tên class
require_once './controllers/AdminPostsController.php';


// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminProduct.php';
require_once './models/AdminOrder.php';
require_once './models/AdminUser.php';
require_once './models/AdminContact.php';
require_once './models/AdminPosition.php';
require_once './models/AdminBanner.php';
require_once './models/AdminKhuyenMai.php';
require_once './models/AdminPosts.php';

// Route
$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new AdminDashboardController())->trangChu(),

    // router danh muc
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->possAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // router san pham
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
    'sua-tai-khoan-admin' => (new AdminUserController())->updateUserAdmin(),

    // router user client
    'tai-khoan-khach-hang' => (new AdminUserController())->listUserClient(),
    'chi-tiet-tai-khoan-khach-hang' => (new AdminUserController())->listUserClientById(),
    'xoa-tai-khoan-khach-hang' => (new AdminUserController())->destroyUserClient(),
    'form-sua-tai-khoan-khach-hang' => (new AdminUserController())->formEditUserClient(),
    'sua-tai-khoan-khach-hang' => (new AdminUserController())->updateUserClient(),
    'form-them-tai-khoan-khach-hang' => (new AdminUserController())->formAddUserClient(),
    'them-tai-khoan-khach-hang' => (new AdminUserController())->insertUserClient(),

    // router contact
    'lien-he' => (new AdminContactController())->listContact(),
    'form-chinh-sua-lien-he' => (new AdminContactController())->formEditContact(),
    'xu-ly-lien-he' => (new AdminContactController())->editStatusContact(),
    'xoa-lien-he' => (new AdminContactController())->destroyContact(),

    // router banner admin
    'danh-sach-banner' => (new AdminBannerController())->listBanner(),
    'chi-tiet-banner' => (new AdminBannerController())->detailBanner(),
    'xoa-banner' => (new AdminBannerController())->destroyBanner(),
    'form-them-banner' => (new AdminBannerController())->formAddBanner(),
    'them-banner' => (new AdminBannerController())->insertBanner(),
    'form-sua-banner' => (new AdminBannerController())->formEditBanner(),
    'cap-nhat-banner' => (new AdminBannerController())->updateBanner(),

    // router khuyến mại admin
    'danh-sach-khuyenMai' => (new AdminKhuyenMaiController())->listKhuyenMai(),
    'chi-tiet-khuyenMai' => (new AdminKhuyenMaiController())->detailKhuyenMai(),
    'xoa-khuyenMai' => (new AdminKhuyenMaiController())->destroyKhuyenMai(),
    'form-them-khuyenMai' => (new AdminKhuyenMaiController())->formAddKhuyenMai(),
    'them-khuyenMai' => (new AdminKhuyenMaiController())->insertKhuyenMai(),
    'form-sua-khuyenMai' => (new AdminKhuyenMaiController())->formEditKhuyenMai(),
    'cap-nhat-khuyenMai' => (new AdminKhuyenMaiController())->updateKhuyenMai(),

    // router Bài viết admin
    'danh-sach-Posts' => (new AdminPostsController())->listPosts(),
    'chi-tiet-Posts' => (new AdminPostsController())->detailPosts(),
    'xoa-Posts' => (new AdminPostsController())->destroyPosts(),
    'form-them-Posts' => (new AdminPostsController())->formAddPosts(),
    'them-Posts' => (new AdminPostsController())->insertPosts(),
    'form-sua-Posts' => (new AdminPostsController())->formEditPosts(),
    'cap-nhat-Posts' => (new AdminPostsController())->updatePosts(),
    'sua-Posts' => (new AdminPostsController())->updatePosts(),

    // Trường hợp mặc định nếu không khớp với bất kỳ route nào
    default => die("Lỗi: Hành động không hợp lệ!"),
};
