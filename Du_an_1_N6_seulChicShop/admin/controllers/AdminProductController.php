<?php

class AdminProductController
{
    public $ModelAdminProduct;
    public $ModelAdminDanhMuc;
    public $ModelAdminComment;
    public function __construct()
    {
        $this->ModelAdminProduct = new AdminProduct();
        $this->ModelAdminDanhMuc = new AdminDanhMuc();
        $this->ModelAdminComment = new AdminComment();
    }

    public function listProduct()
    {
        $listProduct = $this->ModelAdminProduct->getAllProduct();
        require_once './views/product/ListProduct.php';
    }
    public function destroyProduct()
    {
        $id = $_GET['id_san_pham'];
        $product = $this->ModelAdminProduct->getProductById($id);
        
        // Kiểm tra xem sản phẩm có trong chi tiết đơn hàng không
        $hasOrders = $this->ModelAdminProduct->checkProductHasOrders($id);

        if ($hasOrders) {
            // Nếu sản phẩm có trong chi tiết đơn hàng thì không cho xóa
            $_SESSION['error'] = "Không thể xóa sản phẩm này vì đã có trong đơn hàng!";
        } else if ($product) {
            // Nếu không có trong đơn hàng thì cho phép xóa
            deleteFile($product[0]['hinh_anh']); // Xóa file ảnh
            $this->ModelAdminProduct->deleteProduct($id); // Xóa sản phẩm
            $_SESSION['success'] = "Xóa sản phẩm thành công!";
        }

        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }
    public function detailProduct()
    {
        $id = $_GET['id_san_pham'];
        $listComment = $this->ModelAdminComment->getCommentFromProduct($id);
        $Product = $this->ModelAdminProduct->getProductById($id);
        require_once './views/product/DetailProduct.php';
    }
    public function formAddProduct()
    {
        $listCategory = $this->ModelAdminDanhMuc->getAllDanhMuc();
        require_once './views/product/AddProduct.php';
    }
    public function createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_san_pham_khuyen_mai = $_POST['gia_san_pham_khuyen_mai'] ?? null;
            $so_luong = $_POST['so_luong'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            $ngay_nhap = date('Y-m-d');
            $errors = [];

            // Validate main product
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm phải chọn';
            }

            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                // Insert main product first
                $san_pham_id = $this->ModelAdminProduct->insertProduct(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_san_pham_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                );

                if ($san_pham_id) {
                    header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                    exit();
                }
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
        if (!isset($_GET['id_san_pham'])) {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }

        $id = $_GET['id_san_pham'];
        $Product = $this->ModelAdminProduct->getProductById($id);
        
        if (!$Product || empty($Product)) {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }

        $listCategory = $this->ModelAdminDanhMuc->getAllDanhMuc();
        
        // Since getProductById returns array of results, get first item
        $Product = $Product[0];
        
        require_once './views/product/EditProduct.php';
        deleteSessionError();
    }
    public function editProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            // Kiểm tra sản phẩm có trong chi tiết đơn hàng không
            $productInOrder = $this->ModelAdminProduct->checkProductInOrder($san_pham_id);
            
            $sanPhamOld = $this->ModelAdminProduct->getProductById($san_pham_id);
            $old_file = $sanPhamOld[0]['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? null;
            $gia_san_pham_khuyen_mai = $_POST['gia_san_pham_khuyen_mai'] ?? null;
            $so_luong = $_POST['so_luong'] ?? null;
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
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

            // Nếu sản phẩm đã có trong đơn hàng, không cho phép sửa giá và số lượng
            if ($productInOrder) {
                if ($gia_san_pham != $sanPhamOld[0]['gia']) {
                    $errors['gia_san_pham'] = 'Không thể thay đổi giá sản phẩm đã có trong đơn hàng';
                    $gia_san_pham = $sanPhamOld[0]['gia'];
                }
                if ($so_luong != $sanPhamOld[0]['so_luong']) {
                    $errors['so_luong'] = 'Không thể thay đổi số lượng sản phẩm đã có trong đơn hàng';
                    $so_luong = $sanPhamOld[0]['so_luong'];
                }
            }

            $_SESSION['error'] = $errors;
            
            // Chỉ xử lý ảnh mới nếu có upload file
            $new_file = $old_file; // Mặc định giữ ảnh cũ
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK && !empty($hinh_anh['name'])) {
                $new_file = uploadFile($hinh_anh, './uploads/');
                if ($new_file && !empty($old_file)) {
                    deleteFile($old_file);
                }
            }

            if (empty($errors)) {
                $this->ModelAdminProduct->updateProduct(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_san_pham_khuyen_mai,
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
    public function destroyProductVariant()
    {
        $id = $_GET['id_bien_the'];
        $san_pham_id = $_GET['id_san_pham'];
        $productVariant = $this->ModelAdminProduct->getProductVariantById($id);
        if ($productVariant) {
            deleteFile($productVariant[0]['hinh_anh']);
            $this->ModelAdminProduct->deleteProductVariant($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
        exit();
    }

    public function formAddVariantProduct()
    {
        $id = $_GET['id_san_pham'];
        $Product = $this->ModelAdminProduct->getProductById($id);
        if ($Product) {
            require_once './views/product/AddVariantProduct.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function createVariantProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $mau_sac = $_POST['mau_sac'] ?? '';
            $kich_thuoc = $_POST['kich_thuoc'] ?? '';
            $gia = $_POST['gia'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $hinh_anh = $_FILES['hinh_anh_bien_the'] ?? null;
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            $errors = [];

            if (empty($mau_sac) && empty($kich_thuoc)) {
                $errors['variant'] = 'Vui lòng nhập ít nhất một trong hai: màu sắc hoặc kích thước';
            }
            if (empty($gia)) {
                $errors['gia'] = 'Giá không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $this->ModelAdminProduct->insertProductVariant(
                    $san_pham_id,
                    $mau_sac,
                    $kich_thuoc,
                    $gia,
                    $gia_khuyen_mai,
                    $so_luong,
                    $file_thumb
                );
                header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            } else {
                $Product = $this->ModelAdminProduct->getProductById($san_pham_id);
                $_SESSION['flash'] = true;
                require_once './views/product/AddVariantProduct.php';
                exit();
            }
        }
    }
    public function formEditVariantProduct()
    {
        $id = $_GET['id_bien_the'];
        $Product = $this->ModelAdminProduct->getProductVariantById($id);
        if ($Product) {
            require_once './views/product/EditVariantProduct.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function editVariantProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bien_the_id = $_POST['bien_the_id'] ?? '';
            $mau_sac = $_POST['mau_sac'] ?? '';
            $kich_thuoc = $_POST['kich_thuoc'] ?? '';
            $gia = $_POST['gia'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $hinh_anh = $_FILES['hinh_anh_bien_the'] ?? null;
            $errors = [];

            if (empty($mau_sac) && empty($kich_thuoc)) {
                $errors['variant'] = 'Vui lòng nhập ít nhất một trong hai: màu sắc hoặc kích thước';
            }
            if (empty($gia)) {
                $errors['gia'] = 'Giá không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                // Lấy hình ảnh hiện tại của biến thể
                $currentProduct = $this->ModelAdminProduct->getProductVariantById($bien_the_id);
                $file_thumb = $currentProduct[0]['hinh_anh_bien_the'];

                // Nếu có upload hình ảnh mới
                if ($hinh_anh && $hinh_anh['size'] > 0) {
                    // Xóa file ảnh cũ
                    if ($file_thumb && file_exists('./uploads/' . basename($file_thumb))) {
                        unlink('./uploads/' . basename($file_thumb));
                    }
                    // Upload file ảnh mới
                    $file_thumb = uploadFile($hinh_anh, './uploads/');
                }

                $this->ModelAdminProduct->editProductVariant(
                    $bien_the_id,
                    $mau_sac,
                    $kich_thuoc,
                    $gia,
                    $gia_khuyen_mai,
                    $so_luong,
                    $file_thumb
                );

                // Get san_pham_id from the variant to redirect back
                $variant = $this->ModelAdminProduct->getProductVariantById($bien_the_id);
                $san_pham_id = $variant[0]['san_pham_id'];

                header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            } else {
                $Product = $this->ModelAdminProduct->getProductVariantById($bien_the_id);
                $_SESSION['flash'] = true;
                require_once './views/product/EditVariantProduct.php';
                exit();
            }
        }
    }
}
