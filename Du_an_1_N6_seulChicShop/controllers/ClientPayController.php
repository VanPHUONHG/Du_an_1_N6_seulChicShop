<?php
class ClientPayController
{
    public $ModelClientPay;
    public $ModelClientCart;
    public $ModelClientUser;
    public function __construct()
    {
        $this->ModelClientPay = new ClientPay();
        $this->ModelClientCart = new ClientCart();
        $this->ModelClientUser = new ClientUser();
    }

    // hien thi trang thanh toan
    public function listPay()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            $cart = $this->ModelClientCart->getCartFromUser($user['id']);
            $payMethod = $this->ModelClientPay->getPayMethod();
            
            if (!$cart) {
                $cartId = $this->ModelClientCart->addCart($user['id']);
                $cart = ['id' => $cartId];
                $detailCart = [];
            } else {
                $detailCart = $this->ModelClientCart->getDetailCart($cart['id']);
            }
            require_once './views/Pay.php';
        } else {
            $_SESSION['error_message'] = "Vui lòng đăng nhập để tiếp tục thanh toán.";
            header('Location: ' . BASE_URL . '?act=dang-nhap');
            exit;
        }
    }
    
    public function addOder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate user is logged in
            if (!isset($_SESSION['user_client'])) {
                $_SESSION['error_message'] = "Vui lòng đăng nhập để tiếp tục thanh toán.";
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit;
            }
            
            // Get user
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // Get form data
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $tinh_thanhpho = $_POST['tinh_thanhpho'];
            $huyen_quan = $_POST['huyen_quan'];
            $xa_phuong = $_POST['xa_phuong'];
            $dia_chi_cu_the = $_POST['dia_chi_cu_the'];
            $ghi_chu = isset($_POST['ghi_chu']) ? $_POST['ghi_chu'] : '';
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            // Set order metadata
            $ngay_dat = date('Y-m-d H:i:s');
            $trang_thai_id = 1; // Initial status
            $ma_don_hang = 'DH'. rand(10000, 99999);

            // Create order
            $order_id = $this->ModelClientPay->addOder(
                $ma_don_hang,
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $tinh_thanhpho,
                $huyen_quan,
                $xa_phuong,
                $dia_chi_cu_the,
                $ghi_chu,
                $tong_tien,
                $ngay_dat,
                $phuong_thuc_thanh_toan_id,
                $trang_thai_id
            );
            
            if ($order_id) {
                // Get cart items
                $cart = $this->ModelClientCart->getCartFromUser($tai_khoan_id);
                if ($cart) {
                    $detailCart = $this->ModelClientCart->getDetailCart($cart['id']);
                    
                    // Process order details
                    if (!empty($detailCart)) {
                        // TODO: Add order details to database
                        // For each item in cart, create order detail record
                        
                        // Clear cart after successful order
                        // $this->ModelClientCart->clearCart($cart['id']);
                    }
                }
                
                // Set success message and redirect to confirmation
                $_SESSION['success_message'] = "Đặt hàng thành công! Mã đơn hàng của bạn là: " . $ma_don_hang;
                header('Location: ' . BASE_URL);
                exit;
            } else {
                // Set error message and redirect back to checkout
                $_SESSION['error_message'] = "Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại sau.";
                header('Location: ' . BASE_URL . '?act=thanh-toan');
                exit;
            }
        } else {
            header('Location: ' . BASE_URL . '?act=thanh-toan');
            exit;
        }
    }
}
