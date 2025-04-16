<?php

class AdminKhuyenMaiController
{
    public $ModelAdminKhuyenMai;

    public function __construct()
    {
        $this->ModelAdminKhuyenMai = new AdminKhuyenMai();
    }

    // Danh sách khuyến mãi
    public function listKhuyenMai() 
    {
        $DanhSachKhuyenMai = $this->ModelAdminKhuyenMai->getAllKhuyenMai();
        
        // Kiểm tra nếu dữ liệu NULL, gán mảng rỗng để tránh lỗi foreach()
        if (!is_array($DanhSachKhuyenMai)) {
            $DanhSachKhuyenMai = [];
        }

        require_once './views/khuyenMai/ListKhuyenMai.php';
    }

    // Chi tiết khuyến mãi
    public function detailKhuyenMai()
    {
        $id = $_GET['id'] ?? '';
        
        // Kiểm tra ID có hợp lệ không
        if (empty($id)) {
            die("ID không hợp lệ.");
        }

        $khuyenMai = $this->ModelAdminKhuyenMai->getKhuyenMaiById($id);
        require_once './views/khuyenMai/DetailKhuyenMai.php';
    }

    // Xóa khuyến mãi
    public function destroyKhuyenMai()
    {
        $id = $_GET['id'] ?? '';

        if (!empty($id)) {
            $this->ModelAdminKhuyenMai->deleteKhuyenMai($id);
        }

        header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-khuyenMai');
        exit();
    }

    // Hiển thị form thêm khuyến mãi
    public function formAddKhuyenMai()
    {
        require_once './views/khuyenMai/AddKhuyenMai.php';
    }

    // Thêm khuyến mãi mới
    public function insertKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $loai = $_POST['loai'] ?? '';
            $gia_tri = $_POST['gia_tri'] ?? '';
            $dieu_kien_toi_thieu = $_POST['dieu_kien_toi_thieu'] ?? '';
            $so_lan_su_dung = $_POST['so_lan_su_dung'] ?? '';
            $so_lan_da_dung = $_POST['so_lan_da_dung'] ?? '';
            $ngay_bat_dau = $_POST['ngay_bat_dau'] ?? '';
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $tai_khoan_id = $_POST['tai_khoan_id'] ?? '';

            $result = $this->ModelAdminKhuyenMai->addKhuyenMai(
                $ma_khuyen_mai,
                $mo_ta,
                $loai,
                $gia_tri,
                $dieu_kien_toi_thieu,
                $so_lan_su_dung,
                $so_lan_da_dung,
                $ngay_bat_dau,
                $ngay_ket_thuc,
                $trang_thai,
                $tai_khoan_id
            );
            header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-khuyenMai');
            exit();
        }
    }

    // Hiển thị form chỉnh sửa khuyến mãi
    public function formEditKhuyenMai()
    {
        $id = $_GET['id'] ?? '';
        if (empty($id) || !is_numeric($id)) {
            die("ID không hợp lệ.");
        }
        $khuyenMai = $this->ModelAdminKhuyenMai->getKhuyenMaiById($id);
        if (!$khuyenMai) {
            die("Không tìm thấy khuyến mãi.");
        }
        require_once './views/KhuyenMai/EditKhuyenMai.php';
    }

    // Cập nhật khuyến mãi
    public function updateKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ID từ form
            $id = $_POST['id'] ?? '';

            if (empty($id) || !is_numeric($id)) {
                die("ID không hợp lệ.");
            }

            // Kiểm tra xem khuyến mãi có tồn tại không
            $existingKhuyenMai = $this->ModelAdminKhuyenMai->getKhuyenMaiById($id);
            if (!$existingKhuyenMai) {
                die("Không tìm thấy khuyến mãi cần cập nhật.");
            }

            // Lấy và kiểm tra dữ liệu từ form
            $ma_khuyen_mai = trim($_POST['ma_khuyen_mai'] ?? '');
            $mo_ta = trim($_POST['mo_ta'] ?? '');
            $loai = trim($_POST['loai'] ?? '');
            $gia_tri = filter_var($_POST['gia_tri'] ?? 0, FILTER_VALIDATE_INT);
            $dieu_kien_toi_thieu = filter_var($_POST['dieu_kien_toi_thieu'] ?? 0, FILTER_VALIDATE_INT);
            $so_lan_su_dung = filter_var($_POST['so_lan_su_dung'] ?? 0, FILTER_VALIDATE_INT);
            $so_lan_da_dung = filter_var($_POST['so_lan_da_dung'] ?? 0, FILTER_VALIDATE_INT);
            $ngay_bat_dau = trim($_POST['ngay_bat_dau'] ?? '');
            $ngay_ket_thuc = trim($_POST['ngay_ket_thuc'] ?? '');
            $trang_thai = filter_var($_POST['trang_thai'] ?? 0, FILTER_VALIDATE_INT);
            $tai_khoan_id = filter_var($_POST['tai_khoan_id'] ?? 0, FILTER_VALIDATE_INT);
            // Kiểm tra dữ liệu hợp lệ
            if (empty($ma_khuyen_mai) || empty($mo_ta) || empty($loai)) {
                die("Vui lòng điền đầy đủ thông tin bắt buộc.");
            }

            if ($gia_tri < 0 || $dieu_kien_toi_thieu < 0 || $so_lan_su_dung < 0 || $so_lan_da_dung < 0) {
                die("Các giá trị số không được âm.");
            }

            // Gọi model để cập nhật dữ liệu
            $result = $this->ModelAdminKhuyenMai->editKhuyenMai(
                (int)$id,
                $ma_khuyen_mai,
                $mo_ta,
                $loai,
                $gia_tri,
                $dieu_kien_toi_thieu,
                $so_lan_su_dung,
                $so_lan_da_dung,
                $ngay_bat_dau,
                $ngay_ket_thuc,
                $trang_thai,
                $tai_khoan_id
            );

            if ($result) {
                header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-khuyenMai');
                exit();
            } else {
                die("Có lỗi xảy ra khi cập nhật khuyến mãi.");
            }
        }
    }
}
