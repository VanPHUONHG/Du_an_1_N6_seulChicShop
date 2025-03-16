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
}
