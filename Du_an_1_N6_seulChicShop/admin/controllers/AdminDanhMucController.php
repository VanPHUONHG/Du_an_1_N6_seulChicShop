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
                
                $this->modelDanhMuc-> insertDanhMuc($ten_danh_muc, $mo_ta);
                header("Location: " .BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                require_once  './views/danhmuc/addDanhMuc.php';
            }
        }
    }
}
