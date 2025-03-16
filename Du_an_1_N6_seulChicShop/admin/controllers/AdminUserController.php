<?php
class AdminUserController
{
    public $ModelAdminUser;
    public $ModelPosition;
    public function __construct()
    {
        $this->ModelAdminUser = new AdminUser();
        $this->ModelPosition = new AdminPosition();
    }

    public function listUserAdmin()
    {
        $listUser = $this->ModelAdminUser->getAllAdminUser();
        require_once './views/user/admin/ListUserAdmin.php';
    }
    public function detailUserAdmin()
    {
        $id = $_GET['id_tai_khoan_admin'];
        $user = $this->ModelAdminUser->getAdminUserById($id);
        require_once './views/user/admin/DetailUserAdmin.php';
    }
    public function destroyUserAdmin()
    {
        $id = $_GET['id_tai_khoan_admin'];
        $user = $this->ModelAdminUser->deleteUser($id);
        if ($user) {
            $this->ModelAdminUser->deleteUser($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=tai-khoan-quan-tri');
        exit();
    }
    public function formAddUserAdmin()
    {
        $listPosition = $this->ModelPosition->getAllPosition();
        require_once './views/user/admin/AddUserAdmin.php';
    }
    public function insertUserAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tai_khoan = $_POST['ten_tai_khoan'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $chuc_vu_id = $_POST['chuc_vu_id'];
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            $file_thumb = uploadFile($anh_dai_dien, folderUpload: './uploads/');
            $errors = [];

            if (empty($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Vui lòng nhập tên tài khoản';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($_FILES['anh_dai_dien']['name'])) {
                $errors['anh_dai_dien'] = 'Vui lòng chọn ảnh đại diện';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui nhập mật khẩu';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số diện thoại';
            }
            if (empty($chuc_vu_id)) {
                $errors['chuc_vu_id'] = 'Vui lòng chọn chức vụ';
            }
            $_SESSION['errors'] = $errors;
            if (empty($errors)) {
                $this->ModelAdminUser->addUserAdmin(
                    $ten_tai_khoan,
                    $email,
                    $mat_khau,
                    $file_thumb,
                    $so_dien_thoai,
                    $chuc_vu_id
                );
                header("Location: " . BASE_URL_ADMIN . '?act=tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;
                $listPosition = $this->ModelPosition->getAllPosition();
                require_once './views/user/admin/AddUserAdmin.php';
                exit();
            }
        }
    }
}
