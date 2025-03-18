<?php

class AdminProductController
{
    public $ModelAdminProduct;
    public $ModelAdminDanhMuc;
    public function __construct()
    {
        $this->ModelAdminProduct = new AdminProduct();
        $this->ModelAdminDanhMuc = new AdminDanhMuc();
    }

    public function listProduct()
    {
        $listProduct = $this->ModelAdminProduct->getAllProduct();
        require_once './views/product/ListProduct.php';
    }
    public function destroyProduct()
    {
        $id = $_GET['id_san_pham'];
        $product = $this->ModelAdminProduct->deleteProduct($id);
        if ($product) {
            deleteFile($product['hinh_anh']);
            $this->ModelAdminProduct->deleteProduct($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }
    public function detailProduct()
    {
        $id = $_GET['id_san_pham'];
        $Product = $this->ModelAdminProduct->getProductById($id);
        $listComment = $this->ModelAdminProduct->getCommentFromProduct($id);
        if ($Product) {
            require_once './views/product/DetailProduct.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function formAddProduct()
    {
        deleteSessionError();
        $listCategory = $this->ModelAdminDanhMuc->getAllDanhMuc();
        require_once './views/product/AddProduct.php';
    }
    public function createProduct()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? null;
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm phải chọn';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
            }

            $_SESSION['error'] = $errors;
            if (empty($errors)) {

                $san_pham_id = $this->ModelAdminProduct->insertProduct(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                );
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $listCategory = $this->ModelAdminDanhMuc->getAllDanhMuc();
                $_SESSION['flash'] = true;
                require_once './views/product/AddProduct.php';

                exit();
            }
        }
    }

    public function formEditProduct()
    {
        $id = $_GET['id_san_pham'];
        $Product = $this->ModelAdminProduct->getProductById($id);
        $listCategory = $this->ModelAdminDanhMuc->getAllDanhMuc();
        if ($Product) {
            require_once './views/product/editProduct.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function editProduct()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            $sanPhamOld = $this->ModelAdminProduct->getProductById($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'giá sản phẩm không được để trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái sản phẩm phải chọn';
            }

            $_SESSION['error'] = $errors;
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                //upload ảnhh
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }


            if (empty($errors)) {
                $this->ModelAdminProduct->updateProduct(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $new_file
                );
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }
}
