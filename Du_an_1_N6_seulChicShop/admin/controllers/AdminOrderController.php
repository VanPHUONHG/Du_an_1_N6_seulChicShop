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

    public function detailOrder()
    {
        $don_hang_id = $_GET['id_don_hang'];
        // var_dump($don_hang_id);die();

        //lay thông tin đơn hàng ở bảng don_hangs
        $donHang = $this->ModelAdminOrder->getDetailDonHang($don_hang_id);
        //    var_dump($donHang);die();

        //    //lay danh sach san pham da dat cua don hang oq  trang chi_tiet_don_hangs
        $sanPhamDonHang = $this->ModelAdminOrder->getListDonHang($don_hang_id);
        //    var_dump($sanPhamDonHang); die();

        $listTrangThaiOder = $this->ModelAdminOrder->getAllTrangThaiOder();
        require_once './views/order/detailOder.php';
    }


    public function formEditOrder()
    {
        $id = $_GET['id_don_hang'] ?? null;
        
        $donHang = $this->ModelAdminOrder->getDetailDonHang($id);
        // var_dump($id);die();
        $listTrangThaiOrder = $this->ModelAdminOrder->getAllTrangThaiOder();
        
        $sanPhamDonHang = $this->ModelAdminOrder->getListDonHang($id);
        

        if ($donHang) {
            require_once './views/order/editOrder.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }


    public function possEditOrder()
    {
        // var_dump($_POST);die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'];
            $trang_thai_id = $_POST['trang_thai_id'];

            $errors = [];

            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái không được bỏ trống';
            }
            
            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $this->ModelAdminOrder->updateOrder($don_hang_id, $trang_thai_id);
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-ly-don-hang');
                exit();
            } else {
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }
}
