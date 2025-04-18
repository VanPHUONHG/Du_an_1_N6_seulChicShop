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
            if (!$user) {
                $_SESSION['error'] = "Không tìm thấy thông tin người dùng.";
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit;
            }

            $coupons = $this->ModelClientPay->getCouponByIdUser($user['id']);
            // Lấy giỏ hàng của người dùng
            $cart = $this->ModelClientCart->getCartFromUser($user['id']);
            
            // Lấy phương thức thanh toán
            $payMethod = $this->ModelClientPay->getPayMethod();
            if (!$payMethod) {
                $_SESSION['error'] = "Không thể tải phương thức thanh toán.";
                header('Location: ' . BASE_URL);
                exit;
            }
            
            // Kiểm tra và khởi tạo giỏ hàng nếu chưa có
            if (!$cart) {
                $cartId = $this->ModelClientCart->addCart($user['id']);
                if (!$cartId) {
                    $_SESSION['error'] = "Không thể tạo giỏ hàng mới.";
                    header('Location: ' . BASE_URL);
                    exit;
                }
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
            if (!$user) {
                $_SESSION['error'] = "Không tìm thấy thông tin người dùng.";
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit;
            }
            $tai_khoan_id = $user['id'];

            // Validate dữ liệu đầu vào
            $errors = [];
            
            if(empty(trim($_POST['ten_nguoi_nhan']))) {
                $errors[] = "Vui lòng nhập tên người nhận";
            }
            if(empty(trim($_POST['email_nguoi_nhan'])) || !filter_var($_POST['email_nguoi_nhan'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ";
            }
            if(empty(trim($_POST['sdt_nguoi_nhan'])) || !preg_match('/^[0-9]{10}$/', $_POST['sdt_nguoi_nhan'])) {
                $errors[] = "Số điện thoại không hợp lệ";
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
            if(empty(trim($_POST['dia_chi_cu_the']))) {
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
            $ten_nguoi_nhan = htmlspecialchars(trim($_POST['ten_nguoi_nhan']));
            $email_nguoi_nhan = filter_var($_POST['email_nguoi_nhan'], FILTER_SANITIZE_EMAIL);
            $sdt_nguoi_nhan = trim($_POST['sdt_nguoi_nhan']);
            $tinh_thanhpho = htmlspecialchars($_POST['tinh_thanhpho']);
            $huyen_quan = htmlspecialchars($_POST['huyen_quan']);
            $xa_phuong = htmlspecialchars($_POST['xa_phuong']);
            $dia_chi_cu_the = htmlspecialchars(trim($_POST['dia_chi_cu_the']));
            $ghi_chu = isset($_POST['ghi_chu']) ? htmlspecialchars(trim($_POST['ghi_chu'])) : '';
            $tong_tien = isset($_POST['tong_tien']) ? floatval($_POST['tong_tien']) : 0;
            $phuong_thuc_thanh_toan_id = intval($_POST['phuong_thuc_thanh_toan_id']);
            $ma_don_hang = 'DH'. rand(10000, 99999);
            $ma_giam_gia_id = isset($_POST['ma_giam_gia_id']) && !empty($_POST['ma_giam_gia_id']) ? intval($_POST['ma_giam_gia_id']) : null;
            $tien_giam = isset($_POST['tien_giam']) ? floatval($_POST['tien_giam']) : 0;

            // Lấy thông tin giỏ hàng
            $cart = $this->ModelClientCart->getCartFromUser($tai_khoan_id);
            if (!$cart || !($detailCart = $this->ModelClientCart->getDetailCart($cart['id'])) || empty($detailCart)) {
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
                    $trang_thai_don_hang_id,
                    $ma_giam_gia_id,
                    $tien_giam
                );
                
                if ($order_id) {
                    // Chuẩn bị dữ liệu cho chi tiết đơn hàng
                    $san_pham_ids = [];
                    $bien_the_san_pham_ids = [];
                    $so_luongs = [];
                    $thanh_tiens = [];
                    
                    foreach ($detailCart as $item) {
                        $san_pham_ids[] = intval($item['san_pham_id']);
                        $bien_the_san_pham_ids[] = !empty($item['bien_the_san_pham_id']) ? intval($item['bien_the_san_pham_id']) : null;
                        $so_luongs[] = intval($item['so_luong']);
                        $gia = isset($item['gia_san_pham_khuyen_mai']) && $item['gia_san_pham_khuyen_mai'] > 0 
                              ? floatval($item['gia_san_pham_khuyen_mai']) : floatval($item['gia_san_pham']);
                        $thanh_tiens[] = $gia * intval($item['so_luong']);
                    }
                    
                    // Thêm chi tiết đơn hàng
                    $result = $this->ModelClientPay->createOrderDetail(
                        $order_id,
                        $san_pham_ids,
                        $bien_the_san_pham_ids,
                        $so_luongs,
                        $thanh_tiens
                    );

                    if ($result) {
                        // Xóa giỏ hàng sau khi đặt hàng thành công
                        $this->ModelClientCart->clearCart($cart['id']);
                        $_SESSION['success'] = "Đặt hàng thành công! Mã đơn hàng của bạn là: " . $ma_don_hang;
                        header('Location: ' . BASE_URL);
                        exit;
                    }
                }
                
                throw new Exception("Không thể tạo đơn hàng");
                
            } catch (Exception $e) {
                error_log("Lỗi đặt hàng: " . $e->getMessage());
                $_SESSION['error'] = "Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại sau.";
                header('Location: ' . BASE_URL . '?act=thanh-toan');
                exit;
            }
        }
        
        header('Location: ' . BASE_URL . '?act=thanh-toan');
        exit;
    }
}
