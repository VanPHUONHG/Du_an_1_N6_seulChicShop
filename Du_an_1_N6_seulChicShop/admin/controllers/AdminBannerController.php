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
        require_once './views/banner/AddBanner.php';
    }
    public function insertBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ngay_tao = date('Y-m-d H:i:s');
            $tieu_de = $_POST['tieu_de'] ?? '';
            $hinh_anh_url = $_FILES['hinh_anh_url'] ?? null;
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $file_thumb = uploadFile($hinh_anh_url, './uploads/');
            $errors = [];
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $this->ModelAdminBanner->addBanner(
                    $tieu_de,
                    $file_thumb,
                    $mo_ta,
                    $trang_thai,
                    $ngay_tao
                );
                header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-banner');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=them-banner');
                exit();
            }

        }
    }
    public function formEditBanner()
    {
        $id = $_GET['id'];
        $banner = $this->ModelAdminBanner->getBannerById($id);
        require_once './views/banner/EditBanner.php';
    }
    public function updateBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $bannerOld = $this->ModelAdminBanner->getBannerById($id);
            $old_file = $bannerOld['hinh_anh_url'];
            $tieu_de = $_POST['tieu_de'] ?? '';
            $hinh_anh_url = $_FILES['hinh_anh_url'] ?? null;
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            $_SESSION['error'] = $errors;

            // Handle file upload
            if (isset($hinh_anh_url) && $hinh_anh_url['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh_url, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            if (empty($errors)) {
                $this->ModelAdminBanner->editBanner(
                    $id,
                    $tieu_de,
                    $new_file, // Pass new_file instead of hinh_anh_url
                    $mo_ta,
                    $trang_thai
                );
                header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-banner');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=sua-banner&id=' . $id);
                exit();
            }
        }
    }
}