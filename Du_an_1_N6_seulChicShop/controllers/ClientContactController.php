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
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $tieu_de = $_POST['tieu_de'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $noi_dung = $_POST['noi_dung'] ?? '';
            $tai_khoan_id = $_POST['tai_khoan_id'] ?? null;
            $error = [];


            // thoi gian gui
            $thoi_gian_gui = date('Y-m-d H:i:s');
            // Validate required fields
            if (empty($ho_ten)) {
                $error[] = 'Vui lòng nhập họ tên';
            }
            if (empty($email)) {
                $error[] = 'Vui lòng nhập email';
            }
            if (empty($so_dien_thoai)) {
                $error[] = 'Vui lòng nhập số điện thoại';
            }
            if (empty($tieu_de)) {
                $error[] = 'Vui lòng nhập tiêu đề';
            }
            if (empty($noi_dung)) {
                $error[] = 'Vui lòng nhập nội dung';
            }

            if (empty($error)) {
                $result = $this->ModelClientContact->addContact(
                    $ho_ten,
                    $email, 
                    $so_dien_thoai,
                    $tieu_de,
                    $trang_thai,
                    $noi_dung,
                    $tai_khoan_id,
                    $thoi_gian_gui
                );

                if ($result) {
                    $_SESSION['success'] = 'Gửi liên hệ thành công';
                    header('Location: ' . BASE_URL . '?act=lien-he');
                    exit();
                } else {
                    $error[] = 'Có lỗi xảy ra, vui lòng thử lại sau';
                }
            }

            if (!empty($error)) {
                $_SESSION['error'] = $error;
                header('Location: ' . BASE_URL . '?act=lien-he');
                exit();
            }
        } else {
            header('Location: ' . BASE_URL . '?act=lien-he');
            exit();
        }
    }
}
