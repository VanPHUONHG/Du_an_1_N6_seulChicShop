<?php

class AdminOrderController
{
    public $ModelAdminOrder;

    public function __construct()
    {
        $this->ModelAdminOrder = new AdminOrder();
    }
    public function listOrder()
    {
        $listOrder = $this->ModelAdminOrder->getAllOrder();
        require_once './views/order/ListOrder.php';
    }
}
