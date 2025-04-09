<?php
class KhuyenMaiController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new KhuyenMaiModel($db);
    }

    public function kiemTraMa()
    {
        header('Content-Type: application/json');

        // Kiểm tra phương thức request
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Phương thức không được hỗ trợ'
            ]);
            return;
        }

        // Kiểm tra dữ liệu đầu vào
        if (!isset($_POST['ma_khuyen_mai']) || !isset($_POST['tong_tien'])) {
            echo json_encode([
                'status' => 'error', 
                'message' => 'Vui lòng nhập mã khuyến mãi và tổng tiền.'
            ]);
            return;
        }

        $ma = trim($_POST['ma_khuyen_mai']);
        $tongTien = floatval($_POST['tong_tien']);

        // Kiểm tra mã rỗng
        if (empty($ma)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Vui lòng nhập mã khuyến mãi.'
            ]);
            return;
        }

        // Kiểm tra tổng tiền hợp lệ
        if ($tongTien <= 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Tổng tiền không hợp lệ.'
            ]);
            return;
        }

        try {
            // Kiểm tra điều kiện khuyến mãi
            $ketQua = $this->model->kiemTraDieuKienKhuyenMai($ma, $tongTien);

            if (!$ketQua['status']) {
                echo json_encode([
                    'status' => 'error',
                    'message' => $ketQua['message']
                ]);
                return;
            }

            // Nếu thỏa mãn điều kiện, lấy thông tin khuyến mãi
            $khuyenMai = $ketQua['data'];
            $giamGia = $ketQua['giam_gia'];

            // Kiểm tra session đã được khởi tạo chưa
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Lưu thông tin khuyến mãi vào session
            $_SESSION['khuyen_mai'] = [
                'ma' => $ma,
                'giam_gia' => $giamGia,
                'mo_ta' => $khuyenMai['mo_ta']
            ];

            // Tăng số lượng sử dụng của mã
            $this->model->tangSoLuongSuDung($ma);

            // Trả về kết quả thành công
            echo json_encode([
                'status' => 'success',
                'giam_gia' => $giamGia,
                'mo_ta' => $khuyenMai['mo_ta']
            ]);

        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Đã xảy ra lỗi khi xử lý mã khuyến mãi.'
            ]);
        }
    }

    public function layDanhSachKhuyenMai()
    {
        try {
            return $this->model->layTatCaKhuyenMai();
        } catch (Exception $e) {
            return [];
        }
    }
}
