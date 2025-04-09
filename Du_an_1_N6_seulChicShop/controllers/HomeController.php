<?php
class HomeController
{
    public $modelSanPham;
    public $danhMuc;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public $modelBanner;
    public $modelTinTuc;
    public $modelLienHe;

    public function index()
    {
        require_once './views/Home.php';
    }
    public function listProduct()
    {
        require_once './views/listProduct.php';
    }
    // public function contact()
    // {
    //     require_once './views/Contact.php';
    // }
    public function about()
    {
        require_once './views/About.php';
    }
    public function singleProduct()
    {
        require_once './views/SingleProduct.php';
    }
    public function blog()
    {
        require_once './views/Blog.php';
    }
    public function blogDetail()
    {
        require_once './views/BlogDetail.php';
    }
    public function cart()
    {
        require_once './views/Cart.php';
    }

  
    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);die();
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan']; 
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan']; 
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan']; 
            $ghi_chu = $_POST['ghi_chu']; 
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_clinet']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH-' . rand(1000,9999);

            // Thêm thông tin vào db
            $donHang = $this->modelDonHang->addDonHang(
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
                                                    $trang_thai_id
            );
            
            //lay thong tin gio hang cua nguoi dung
            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            
            //luu sp vao chi tiet don hang
            if($donHang){
             //lay ra toan bo danh sach trong gio hang
             $chiTietDonHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
             
             //them tung san pham tu gio hang vao bang chi tiet don hang
             foreach ($chiTietDonHang as $item){
              $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham']; //Uu tien don gia se lay gia tri khuyen mai
              
              $this->modelDonHang->addChiTietDonHang(
                $donHang,  //don hang id vua tao
                $item['san_pham_id'], //id san pham
                $donGia,  //don gia
                $item['so_luong'], //so luong
                $donGia * $item['so_luong'] //thanh tien
              );
             }
             //sau khi tien hanh them phai tien hanh xoa sp trong gio hang
             $this ->modelGioHang->deleteDetailGioHang($gioHang['id']);
             
             //xoa toan bo trong chi tiet gio hang
             $this->modelGioHang->deleteGioHang($tai_khoan_id);
             
             header("Location: ". BASE_URL .'?act=lich-su-mua-hang' );
            } else {
                var_dump("Lỗi đặt hàng. Vui lòng thử lại sau");
                die;
            }
        }
    }

  
    //don hang
    // public function lichSuMuaHang()
    // {
    //     if (isset($_SESSION['user_client'])) {
    //         $tongDonHang = $this->tongDonHang();

    //         //lấy ra thông tin tài khoản đăng nhập
    //         $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_client']);
    //         $tai_khoan_id = $user['id'];

    //         //lay ra danh sach trang thai don hang
    //         $arrTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
    //         $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

    //         //lay ra danh sach phuong thuc thanh toan
    //         $arrPhuongThucThanhToan = $this->modelDonHang->getAllPhuongThucThanhToan();
    //         $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_trang_thai', 'id');

    //         //lay ra danh sach tat ca don hang cua tai khoan
    //         $donHang = $this->modelDonHang->getAllDonHangFormUser($tai_khoan_id);
    //         //var_dump($donHang);die();
    //         require_once "./views/lichSuMuaHang.php";
    //     } else {
    //         // $_SESSION['message'] = 'Bạn chưa đăng nhập';

    //         // header('Location:' . BASE_URL . '?act=login');
    //         // exit();
    //     }
    // }

    // public function chiTietDonHang() {}
    // public function huyDonHang() {}
}
