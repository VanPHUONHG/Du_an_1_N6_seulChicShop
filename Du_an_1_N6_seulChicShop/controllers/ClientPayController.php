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

    // Hiển thị trang thanh toán và chi tiết đơn hàng
    public function listPay()
    {
        if (isset($_SESSION['user_client'])) {
            // Lấy thông tin người dùng
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            
            // Lấy giỏ hàng của người dùng
            $cart = $this->ModelClientCart->getCartFromUser($user['id']);
            
            // Lấy phương thức thanh toán
            $payMethod = $this->ModelClientPay->getPayMethod();
            
            // Kiểm tra và khởi tạo giỏ hàng nếu chưa có
            if (!$cart) {
                $cartId = $this->ModelClientCart->addCart($user['id']);
                $cart = ['id' => $cartId];
                $detailCart = [];
            } else {
                // Lấy chi tiết giỏ hàng
                $detailCart = $this->ModelClientCart->getDetailCart($cart['id']);
            }
            // Hiển thị trang thanh toán
            require_once './views/Pay.php';
        } else {
            $_SESSION['error'] = "Vui lòng đăng nhập để tiếp tục thanh toán.";
            header('Location: ' . BASE_URL . '?act=dang-nhap');
            exit;
        }
    }
    
    // Thêm đơn hàng mới
    public function addOrderAndDetailOder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra đăng nhập
            if (!isset($_SESSION['user_client'])) {
                $_SESSION['error'] = "Vui lòng đăng nhập để tiếp tục thanh toán.";
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit;
            }
            
            // Lấy thông tin người dùng
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // Validate dữ liệu đầu vào
            $errors = [];
            
            if(empty($_POST['ten_nguoi_nhan'])) {
                $errors[] = "Vui lòng nhập tên người nhận";
            }
            if(empty($_POST['email_nguoi_nhan'])) {
                $errors[] = "Vui lòng nhập email người nhận";
            }
            if(empty($_POST['sdt_nguoi_nhan'])) {
                $errors[] = "Vui lòng nhập số điện thoại người nhận";
            }
            if(empty($_POST['tinh_thanhpho'])) {
                $errors[] = "Vui lòng chọn tỉnh/thành phố";
            }
            if(empty($_POST['huyen_quan'])) {
                $errors[] = "Vui lòng chọn quận/huyện";
            }
            if(empty($_POST['xa_phuong'])) {
                $errors[] = "Vui lòng chọn xã/phường";
            }
            if(empty($_POST['dia_chi_cu_the'])) {
                $errors[] = "Vui lòng nhập địa chỉ cụ thể";
            }
            if(empty($_POST['phuong_thuc_thanh_toan_id'])) {
                $errors[] = "Vui lòng chọn phương thức thanh toán";
            }

            if(!empty($errors)) {
                $_SESSION['error'] = implode("<br>", $errors);
                header('Location: ' . BASE_URL . '?act=thanh-toan');
                exit;
            }

            // Lấy dữ liệu từ form
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
            $ma_don_hang = isset($_POST['ma_don_hang']) ? $_POST['ma_don_hang'] : 'DH'. rand(10000, 99999);

            // Lấy thông tin giỏ hàng
            $cart = $this->ModelClientCart->getCartFromUser($tai_khoan_id);
            if (!$cart || !($detailCart = $this->ModelClientCart->getDetailCart($cart['id']))) {
                $_SESSION['error'] = "Giỏ hàng của bạn trống.";
                header('Location: ' . BASE_URL . '?act=thanh-toan');
                exit;
            }

            // Thiết lập thông tin đơn hàng
            $ngay_dat = date('Y-m-d H:i:s');
            $trang_thai_don_hang_id = 1; // Trạng thái ban đầu

            try {
                // Tạo đơn hàng mới
                $order_id = $this->ModelClientPay->createOrder(
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
                    $trang_thai_don_hang_id
                );
                
                if ($order_id) {
                    // Chuẩn bị dữ liệu cho chi tiết đơn hàng
                    $san_pham_ids = [];
                    $bien_the_san_pham_ids = [];
                    $so_luongs = [];
                    $thanh_tiens = [];
                    
                    foreach ($detailCart as $item) {
                        $san_pham_ids[] = $item['san_pham_id'];
                        $bien_the_san_pham_ids[] = $item['bien_the_san_pham_id'];
                        $so_luongs[] = $item['so_luong'];
                        $gia = isset($item['gia_san_pham_khuyen_mai']) && $item['gia_san_pham_khuyen_mai'] > 0 
                              ? $item['gia_san_pham_khuyen_mai'] : $item['gia_san_pham'];
                        $thanh_tiens[] = $gia * $item['so_luong'];
                    }
                    
                    // Thêm chi tiết đơn hàng
                    $this->ModelClientPay->createOrderDetail(
                        $order_id,
                        $san_pham_ids,
                        $bien_the_san_pham_ids,
                        $so_luongs,
                        $thanh_tiens
                    );

                    // Xóa giỏ hàng sau khi đặt hàng thành công
                    if ($cart) {
                        $this->ModelClientCart->clearCart($cart['id']);
                    }
                    
                    // Thông báo thành công và chuyển hướng
                    $_SESSION['success'] = "Đặt hàng thành công! Mã đơn hàng của bạn là: " . $ma_don_hang;
                    header('Location: ' . BASE_URL);
                    exit;
                } else {
                    throw new Exception("Không thể tạo đơn hàng");
                }
            } catch (Exception $e) {
                $_SESSION['error'] = "Có lỗi xảy ra khi đặt hàng: " . $e->getMessage();
                header('Location: ' . BASE_URL . '?act=thanh-toan');
                exit;
            }
        }
        
        header('Location: ' . BASE_URL . '?act=thanh-toan');
        exit;
    }
}
