<?php

require_once './models/sanPham.php'; // Đảm bảo đã load model

class HomeController {
    public $modelsanPham;

    public function __construct() {
        $this->modelsanPham = new sanPham();
    }

    public function home() {
        return "Đây là trang chủ.";
    }

    public function trangChu() {
        return "Đây là trang chủ của tôi.";
    }

    public function danhSachSanPham() {
        $listProduct = $this->modelsanPham->getAllProduct();
        // Chuyển danh sách sản phẩm thành chuỗi HTML
        $html = "<ul>";
        foreach ($listProduct as $product) {
            $html .= "<li>" . htmlspecialchars($product['ten_san_pham']) . "</li>";
        }
        $html .= "</ul>";
        return $html;
    }
}
