<?php
class AdminKhuyenMai
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllKhuyenMai()
    {
        try {
            $sql = "SELECT * FROM khuyen_mais";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function getKhuyenMaiById($id)
    {
        try {
            $sql = "SELECT * FROM khuyen_mais WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function deleteKhuyenMai($id)
    {
        try {
            $sql = 'DELETE FROM khuyen_mais WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function addKhuyenMai($ma_khuyen_mai, $mo_ta, $loai_giam_gia, $gia_tri_giam, $gia_tri_don_hang_toi_thieu, $so_luong_toi_da, $so_luong_da_dung, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai)
    {
        try {
            $sql = "INSERT INTO khuyen_mais (ma_khuyen_mai, mo_ta, loai_giam_gia, gia_tri_giam, gia_tri_don_hang_toi_thieu, so_luong_toi_da, so_luong_da_dung, ngay_bat_dau, ngay_ket_thuc, trang_thai) 
                    VALUES (:ma_khuyen_mai, :mo_ta, :loai_giam_gia, :gia_tri_giam, :gia_tri_don_hang_toi_thieu, :so_luong_toi_da, :so_luong_da_dung, :ngay_bat_dau, :ngay_ket_thuc, :trang_thai)";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':loai_giam_gia', $loai_giam_gia);
            $stmt->bindParam(':gia_tri_giam', $gia_tri_giam);
            $stmt->bindParam(':gia_tri_don_hang_toi_thieu', $gia_tri_don_hang_toi_thieu);
            $stmt->bindParam(':so_luong_toi_da', $so_luong_toi_da);
            $stmt->bindParam(':so_luong_da_dung', $so_luong_da_dung);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function editKhuyenMai($id, $ma_khuyen_mai, $mo_ta, $loai_giam_gia, $gia_tri_giam,
    $gia_tri_don_hang_toi_thieu, $so_luong_toi_da, $so_luong_da_dung, $ngay_bat_dau, 
    $ngay_ket_thuc, $trang_thai)
    {
        try {
            // Sửa tên bảng thành khuyen_mais để đồng nhất với các hàm khác
            $sql = "UPDATE khuyen_mais SET 
                    ma_khuyen_mai = :ma_khuyen_mai,
                    mo_ta = :mo_ta,
                    loai_giam_gia = :loai_giam_gia,
                    gia_tri_giam = :gia_tri_giam,
                    gia_tri_don_hang_toi_thieu = :gia_tri_don_hang_toi_thieu,
                    so_luong_toi_da = :so_luong_toi_da,
                    so_luong_da_dung = :so_luong_da_dung,
                    ngay_bat_dau = :ngay_bat_dau,
                    ngay_ket_thuc = :ngay_ket_thuc,
                    trang_thai = :trang_thai
                WHERE id = :id";
        
            $stmt = $this->conn->prepare($sql);

            // Bind các giá trị
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':ma_khuyen_mai', $ma_khuyen_mai, PDO::PARAM_STR);
            $stmt->bindValue(':mo_ta', $mo_ta, PDO::PARAM_STR);
            $stmt->bindValue(':loai_giam_gia', $loai_giam_gia, PDO::PARAM_STR);
            $stmt->bindValue(':gia_tri_giam', $gia_tri_giam, PDO::PARAM_INT);
            $stmt->bindValue(':gia_tri_don_hang_toi_thieu', $gia_tri_don_hang_toi_thieu, PDO::PARAM_INT);
            $stmt->bindValue(':so_luong_toi_da', $so_luong_toi_da, PDO::PARAM_INT);
            $stmt->bindValue(':so_luong_da_dung', $so_luong_da_dung, PDO::PARAM_INT);
            $stmt->bindValue(':ngay_bat_dau', $ngay_bat_dau, PDO::PARAM_STR);
            $stmt->bindValue(':ngay_ket_thuc', $ngay_ket_thuc, PDO::PARAM_STR);
            $stmt->bindValue(':trang_thai', $trang_thai, PDO::PARAM_INT);

            $result = $stmt->execute();
            
            if (!$result) {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL Error: " . implode(", ", $errorInfo));
                return false;
            }
            
            return true;

        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
            return false;
        }
    }

}