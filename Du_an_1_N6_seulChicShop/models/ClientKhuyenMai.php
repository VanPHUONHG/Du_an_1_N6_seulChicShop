<?php
class KhuyenMaiModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function layKhuyenMaiTheoMa($ma)
    {
        try {
            $sql = "SELECT * FROM khuyen_mais 
                    WHERE ma_khuyen_mai = :ma 
                    AND trang_thai = 1
                    AND ngay_bat_dau <= CURRENT_DATE()
                    AND ngay_ket_thuc >= CURRENT_DATE()
                    AND so_luong_da_dung < so_luong_toi_da
                    LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma', $ma);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Lỗi truy vấn: " . $e->getMessage());
            return false;
        }
    }

    public function kiemTraDieuKienKhuyenMai($ma, $tongTien)
    {
        try {
            // Kiểm tra mã có tồn tại không
            $khuyenMai = $this->layKhuyenMaiTheoMa($ma);
            if (!$khuyenMai) {
                return [
                    'status' => false,
                    'message' => 'Mã khuyến mãi không tồn tại hoặc đã hết hạn'
                ];
            }

            // Kiểm tra giá trị đơn hàng tối thiểu
            if ($tongTien < $khuyenMai['gia_tri_don_hang_toi_thieu']) {
                return [
                    'status' => false,
                    'message' => 'Giá trị đơn hàng chưa đạt điều kiện tối thiểu ' . 
                                number_format($khuyenMai['gia_tri_don_hang_toi_thieu']) . 'đ'
                ];
            }

            // Kiểm tra số lượng còn lại
            if ($khuyenMai['so_luong_da_dung'] >= $khuyenMai['so_luong_toi_da']) {
                return [
                    'status' => false,
                    'message' => 'Mã khuyến mãi đã hết lượt sử dụng'
                ];
            }

            // Tính toán giá trị giảm giá
            $giamGia = 0;
            if ($khuyenMai['loai_giam_gia'] == 'percent') {
                $giamGia = $tongTien * ($khuyenMai['gia_tri_giam'] / 100);
                // Nếu có giới hạn giảm tối đa
                if (isset($khuyenMai['giam_toi_da']) && $khuyenMai['giam_toi_da'] > 0) {
                    $giamGia = min($giamGia, $khuyenMai['giam_toi_da']);
                }
            } else {
                $giamGia = $khuyenMai['gia_tri_giam'];
            }

            return [
                'status' => true,
                'data' => $khuyenMai,
                'giam_gia' => $giamGia
            ];

        } catch(PDOException $e) {
            error_log("Lỗi kiểm tra điều kiện: " . $e->getMessage());
            return [
                'status' => false,
                'message' => 'Có lỗi xảy ra khi kiểm tra mã'
            ];
        }
    }

    public function tangSoLuongSuDung($ma)
    {
        try {
            $sql = "UPDATE khuyen_mais 
                    SET so_luong_da_dung = so_luong_da_dung + 1 
                    WHERE ma_khuyen_mai = :ma";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma', $ma);
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log("Lỗi cập nhật: " . $e->getMessage());
            return false;
        }
    }

    public function layTatCaKhuyenMai()
    {
        try {
            $sql = "SELECT * FROM khuyen_mais 
                    WHERE trang_thai = 1
                    AND ngay_bat_dau <= CURRENT_DATE()
                    AND ngay_ket_thuc >= CURRENT_DATE()
                    AND so_luong_da_dung < so_luong_toi_da
                    ORDER BY ngay_bat_dau DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Lỗi truy vấn: " . $e->getMessage());
            return false;
        }
    }
}
