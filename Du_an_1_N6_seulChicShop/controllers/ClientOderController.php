<?php
require_once 'models/ClientOrder.php';
class ClientOderController
{
    public $ModelClientCart;
    public $ModelClientContact;
    public $ModelClientOrder;
    public $ModelClientPay;
    public $ModelClientProduct;
    public $ModelClientUser;

    public function __construct()
    {
        $this->ModelClientCart = new ClientCart();
        $this->ModelClientContact = new ClientContact();
        $this->ModelClientOrder = new ClientOrder();
        $this->ModelClientPay = new ClientPay();
        $this->ModelClientProduct = new ClientProduct();
        $this->ModelClientUser = new ClientUser();
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_don_hang_id = 1;

            $user = $this->ModelClientUser->getAccountByNameUser(['user_clinet']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang  = 'DH-' . rand(1000, 9999);

            $donHang = $this->ModelClientOrder->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_don_hang_id
            );

            //lay thong tin gio hang cua nguoi dung
            $gioHang = $this->ModelClientCart->getCartFromUser($tai_khoan_id);

            //luu chi tiet san pham vao don hag
            if ($donHang) {
                // lay ra toan bo san pham trong gio hang
                $chiTietCart = $this->ModelClientCart->getDetailCart($gioHang['id']);

                //them tung san pham vao bang chi tiet don hang
                foreach ($chiTietCart as $item) {
                    $donGia =  $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];

                    $this->ModelClientOrder->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );

                    //khi nao lam trang sp hoan thien thi chinh lại và mo commit ra
                    // $soLuongHienTai = $this->ModelsClientProduct->getSoLuong($item['san_pham_id']);
                    // if ($soLuongHienTai < $item['so_luong']) {
                    //     var_dump("Không đủ số lượng trong kho sản phẩm: " . $item['ten_san_pham']);
                    //     die();
                    // }

                    // Giảm số lượng trên database -> khi nao lam trang sp hoan thien thi chinh lại và mo commit ra
                    //  $capNhatSoLuong = $this->modelSanPham->giamSoLuong($item['san_pham_id'], $item['so_luong']);
                    //  if (!$capNhatSoLuong) {
                    //      $soLuongHienTai = $this->modelSanPham->getSoLuong($item['san_pham_id']);
                    //      var_dump("Không cập nhật được kho cho sản phẩm: " . $item['ten_san_pham']);
                    //      die();
                    //  }
                }

                // sau khi them phai tien hanh xoa san pham trong gio hang
                $this->ModelClientCart->deleteDetailCart($gioHang['id']);

                $this->ModelClientCart->clearCart($tai_khoan_id);

                header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                exit();
            } else {
                var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");
                die;
            }
        }
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            //  //lay ra danh sach trag thai don hang
            $arrTrangThaiOrder = $this->ModelClientOrder->getAllTrangThaiDonHang();
            $trangThaiOrder = array_column($arrTrangThaiOrder, 'ten_trang_thai', 'id');

            // var_dump($arrTrangThaiOrder); die;
            // echo"<pre>";
            // print_r($trangThaiOrder);die;


            //  //lay ra phuong thuc thanh toan don hang
            $arrPhuongThucThanhToan = $this->ModelClientOrder->getAllPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // var_dump($arrPhuongThucThanhToan); die;
            // echo"<pre>";
            // print_r($phuongThucThanhToan);die;


            // //  lay ra danh sach tat ca don hang cua tai khoan
            $donHang = $this->ModelClientOrder->getDonHangFromUser($tai_khoan_id);
            require_once './views/lichSuCart.php';
            // echo "<pre>";
            // print_r($donHang);
            // var_dump($donHang);
            // die();
        } else {
            var_dump('Bạn Chưa Đăng Nhập');
            exit;
        }
    }

    public function chiTietDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            //lay ra thong tin tai khoan dang nhap
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);

            if (!$user) {
                $_SESSION['error_message'] = "Tài khoản không tồn tại hoặc đã bị xóa.";
                header("Location: " . BASE_URL);
                exit;
            }

            $tai_khoan_id = $user['id'];

            //lay id don truyen tu URL
            if (!isset($_GET['id'])) {
                $_SESSION['error_message'] = "Không tìm thấy mã đơn hàng";
                header("Location: " . BASE_URL);
                exit;
            }
            $donHangId = $_GET['id'];

            //lay thong tin don hang theo id
            $donHang = $this->ModelClientOrder->getDonHangById($donHangId);
            
            if (!$donHang) {
                $_SESSION['error_message'] = "Đơn hàng không tồn tại";
                header("Location: " . BASE_URL);
                exit;
            }

            //  //lay ra danh sach trag thai don hang
            $arrTrangThaiOrder = $this->ModelClientOrder->getAllTrangThaiDonHang();
            $trangThaiOrder = array_column($arrTrangThaiOrder, 'ten_trang_thai', 'id');

            //  //lay ra phuong thuc thanh toan don hang
            $arrPhuongThucThanhToan = $this->ModelClientOrder->getAllPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            //lay thong tin san pham cua don hang trong bang chi tiet don hang
            $chiTietDonHang = $this->ModelClientOrder->getChiTietDonHangByDonHangId($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền truy cập đơn hàng này";
                exit;
            }

            // Debug để kiểm tra dữ liệu
            // echo "<pre>";
            // echo "Thông tin đơn hàng:\n";
            // print_r($donHang);
            // echo "\nChi tiết đơn hàng:\n"; 
            // print_r($chiTietDonHang);
            // echo "\nTrạng thái đơn hàng:\n";
            // print_r($trangThaiOrder);
            // echo "\nPhương thức thanh toán:\n";
            // print_r($phuongThucThanhToan);
            // echo "</pre>";
            // die();
            require_once './views/chiTietMuaHang.php';
          
        } else {
            echo "Vui lòng đăng nhập để xem chi tiết đơn hàng";
            exit;
        }
    }


    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            //lay ra thong tin tai khoan dang nhap
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            //lay id don truyen tu URL  
            $donHangId = $_GET['id'];

            //kiem tra don hang
            $donHang = $this->ModelClientOrder->getDonHangById($donHangId);
            $this->ModelClientOrder->updateTrangThaiDonHang($donHangId, 6);
            header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        } else {
            var_dump('Bạn Chưa Đăng Nhập');
            exit;
        }
    }
}
