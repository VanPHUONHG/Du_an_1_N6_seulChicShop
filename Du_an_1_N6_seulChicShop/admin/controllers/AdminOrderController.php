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
        $listOrder = $this->ModelAdminOrder->getAllOrders();
        require_once './views/order/ListOrder.php';
    }

    public function detailOrder()
    {
        $don_hang_id = $_GET['id_don_hang'] ?? null;
        if (!$don_hang_id) {
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }

        $donHang = $this->ModelAdminOrder->getDetailOrder($don_hang_id);
        if (!$donHang) {
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }

        $sanPhamDonHang = $this->ModelAdminOrder->getListDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->ModelAdminOrder->getAllTrangThaiOder();
        require_once './views/order/detailOder.php';
    }

    public function formEditOrder()
    {
        $id = $_GET['id_don_hang'] ?? null;
        if (!$id) {
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }

        $donHang = $this->ModelAdminOrder->getDetailOrder($id);
        $listTrangThaiDonHang = $this->ModelAdminOrder->getAllTrangThaiOder();
        $sanPhamDonHang = $this->ModelAdminOrder->getListDonHang($id);  
        require_once './views/order/editOrder.php';
        deleteSessionError();
    }

    public function possEditOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }

        $don_hang_id = $_POST['don_hang_id'] ?? null;
        $trang_thai_id = $_POST['trang_thai_id'] ?? null;

        $errors = [];

        if (empty($don_hang_id)) {
            $errors['don_hang_id'] = 'ID đơn hàng không được bỏ trống';
        }

        if (empty($trang_thai_id)) {
            $errors['trang_thai_id'] = 'Trạng thái không được bỏ trống';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
            exit();
        }

        $donHang = $this->ModelAdminOrder->getDetailOrder($don_hang_id);
        if (!$donHang) {
            $_SESSION['errors']['don_hang_id'] = 'Đơn hàng không tồn tại';
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }

        $result = $this->ModelAdminOrder->updateOrder($don_hang_id, $trang_thai_id);
        if (!$result) {
            $_SESSION['errors']['update'] = 'Cập nhật trạng thái thất bại';
            header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
            exit();
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
        exit();
    }
}
