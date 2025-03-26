<?php
class ClientPayController{
    public $ModelClientPay;
    public function __construct(){
        $this->ModelClientPay = new ClientPay();
    }

    // hien thi trang thanh toan
    public function listPay(){
        include_once './views/Pay.php';
    }
}
