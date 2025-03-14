<?php

class AdminDanhMucController
{

    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc()
    {

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once  './views/danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc()
    {
        //ham nay dun de hien thi form nhap
        require_once  './views/danhmuc/addDanhMuc.php';
    }

    //ham nay dun de them dl va xl dl
    public function possAddDanhMuc()
    {
        //   var_dump(($_POST)); //ham nay dung de xly csdl 

        //kiem tra dl xem co phai duoc sunmit len k
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lay ra dl
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            //tao 1 ham trong de chua dl
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được bỏ trống!';
            }

            //nếu không có lôiz thì tiến hành thêm danh mục
            if (empty($errors)) {
                //nếu không có lôiz thì tiến hành thêm danh mục
                // var_dump('ok');

                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                require_once  './views/danhmuc/addDanhMuc.php';
            }
        }
    }


    //chức năng sửa sản phẩm
    public function formEditDanhMuc()
    {
        // Kiểm tra xem có ID danh mục không
        if (!isset($_GET['id_danh_muc'])) {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit;
        }

        $id = $_GET['id_danh_muc'];

        // Lấy thông tin danh mục từ model
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        // Nếu không tìm thấy danh mục, quay lại danh sách
        if (!$danhMuc) {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit;
        }

        // Gọi view, truyền dữ liệu sang form
        require_once './views/danhmuc/EditDanhMuc.php';
    }


    //ham nay dun de them dl va xl dl
    public function possEditDanhMuc()
    {
        //   var_dump(($_POST)); //ham nay dung de xly csdl 

        //kiem tra dl xem co phai duoc sunmit len k
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lay ra dl
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            //tao 1 ham trong de chua dl
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được bỏ trống!';
            }

            //nếu không có lôiz thì tiến hành sua danh mục
            if (empty($errors)) {
                //nếu không có lôiz thì tiến hành sua danh mục
                // var_dump('ok');

                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once  './views/danhmuc/EditDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}
