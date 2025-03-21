<?php

class ClientContactController
{
    public $ModelClientContact;
    // construct
    public function __construct()
    {
        $this->ModelClientContact = new ClientContact();
    }
    // list trang lien he
    public function listContact()
    {
        require_once 'views/Contact.php';
    }
    // them lien he
    public function addContact()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $thoi_gian_gui = date('Y-m-d H:i:s');
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $tieu_de = $_POST['tieu_de'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $noi_dung = $_POST['noi_dung'] ?? '';
            $tai_khoan_id = $_SESSION['tai_khoan_id'] ?? '';
            $error = [];
            $thong_bao = '';
            
            $_SESSION['error'] = $error;
            if (empty($error)) {
                $this->ModelClientContact->addContact(
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $tieu_de,
                    $trang_thai,
                    $noi_dung,
                    $thoi_gian_gui,
                    $tai_khoan_id
                );
                $thong_bao = 'Gửi liên hệ thành công';
                header('Location: ' . BASE_URL . '?act=lien-he');
            }else{
                // $thong_bao = 'Gửi liên hệ thất bại';
                $_SESSION['error'] = $error;
                require_once 'views/Contact.php';
            }
        }
    }
}
