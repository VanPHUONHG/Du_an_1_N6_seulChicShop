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
        // Lấy thống kê tổng quan
        $totalIncome = $this->ModelAdminOrder->getTotalIncome();
        $totalCustomers = $this->ModelAdminOrder->getTotalCustomers();
        $totalOrders = $this->ModelAdminOrder->getTotalOrders();
        
        // Lấy các dữ liệu khác
        $listDetailOrder = $this->ModelAdminOrder->getAllDetailBestSellingProducts();
        $listUser = $this->ModelAdminUser->getUserOrder();
        
        // Lấy dữ liệu cho biểu đồ và lợi nhuận
        $monthlyRevenue = $this->ModelAdminOrder->getMonthlyRevenue();
        $orderStats = $this->ModelAdminOrder->getOrderStatistics();
        $profit = $this->ModelAdminOrder->getProfit();
        
        // Gán giá trị mặc định nếu không có dữ liệu
        if (!$monthlyRevenue) {
            $monthlyRevenue = array_fill(0, 12, 0);
        }
        if (!$orderStats) {
            $orderStats = ['hoan_thanh' => 0, 'dang_xu_ly' => 0, 'da_huy' => 0];
        }
        if (!$profit) {
            $profit = ['doanh_thu' => 0, 'von' => 0, 'loi_nhuan' => 0];
        }

        require_once './views/trangChuAdmin.php';
    }
}
