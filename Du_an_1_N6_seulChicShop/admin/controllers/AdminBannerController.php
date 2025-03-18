<?php

class AdminBannerController
{
    public $ModelAdminBanner;
    public function __construct()
    {
        $this->ModelAdminBanner = new AdminBanner();
    }
    public function listBanner()
    {
        $BannerProduct = $this->ModelAdminBanner->getAllBanner();

        require_once './views/banner/ListBanner.php';
    }
    public function detailBanner()
    {
        $id = $_GET['id'];
        $banner = $this->ModelAdminBanner->getBannerById($id);
        require_once './views/banner/DetailBanner.php';
    }
    public function destroyBanner()
    {
        $id = $_GET['id'];
        $banner = $this->ModelAdminBanner->deleteBanner($id);
        if ($banner) {
            deleteFile($banner['image']);
            $this->ModelAdminBanner->deleteBanner($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-banner');
        exit();
    }
    public function formAddBanner()
    {
        require_once './views/banner/FormAddBanner.php';
    }
    public function addBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $tieu_de = $_POST['tieu_de'] ?? '';
            $hinh_anh_url = $_FILES['hinh_anh_url'] ?? null;
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];

            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }
            if (empty($hinh_anh_url)) {
                $errors['hinh_anh_url'] = 'Hình ảnh không được để trống';
            }
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $ngay_tao = date('Y-m-d H:i:s');
                $this->ModelAdminBanner->addBanner(
                    $id,
                    $tieu_de,
                    $hinh_anh_url,
                    $mo_ta,
                    $trang_thai,
                    $ngay_tao
                );
                header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-banner');
                exit();
            }

        }

    }
}