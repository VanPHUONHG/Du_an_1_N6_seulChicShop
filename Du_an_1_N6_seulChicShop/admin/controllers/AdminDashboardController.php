<?php

class AdminDashboardController
{
    public $ModelAdminUser;
    public $ModelAdminOrder;
    // public $modelBinhLuan;

    public function __construct()
    {
        $this->ModelAdminUser = new AdminUser();
        $this->ModelAdminOrder = new AdminOrder();
        //     $this->modelBinhLuan = new AdminBinhLuan();
    }

    public function trangchu()
    {
        $listAllOrder = $this->ModelAdminOrder->getAllOrder();
        $listUser = $this->ModelAdminUser->getAllUser();
        $tongThuNhap = $this->ModelAdminOrder->totalPriceOrder();
        $listDetailOrder = $this->ModelAdminOrder->getAllDetailBestSellingProducts();
        require_once './views/trangChuAdmin.php';
    }
}
