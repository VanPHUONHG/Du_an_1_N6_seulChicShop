<?php
class AdminUserController
{
    public $ModelAdminUser;
    public function __construct()
    {
        $this->ModelAdminUser = new AdminUser();
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
}
