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
    
    public function detailOrder() {
        $don_hang_id = $_GET['id_don_hang'];
        // var_dump($don_hang_id);die();
    
       //lay thông tin đơn hàng ở bảng don_hangs
       $donHang = $this->ModelAdminOrder->getDetailDonHang($don_hang_id);
       
    //    //lay danh sach san pham da dat cua don hang oq  trang chi_tiet_don_hangs
       $sanPhamDonHang = $this->ModelAdminOrder->getListDonHang($don_hang_id);
    //    var_dump($sanPhamDonHang); die();
       require_once './views/order/detailOder.php';
    }
}
