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
            $sql = "SELECT ma_giam_gias.*,
                    tai_khoans.ten_tai_khoan
                    FROM ma_giam_gias 
                    LEFT JOIN tai_khoans ON ma_giam_gias.tai_khoan_id = tai_khoans.id";
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
            $sql = "SELECT ma_giam_gias.*,
                    tai_khoans.ten_tai_khoan
                    FROM ma_giam_gias 
                    LEFT JOIN tai_khoans ON ma_giam_gias.tai_khoan_id = tai_khoans.id
                    WHERE ma_giam_gias.id = ?";
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
            $sql = 'DELETE FROM ma_giam_gias WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
    public function addKhuyenMai($ma_khuyen_mai, $mo_ta, $loai, $gia_tri, $dieu_kien_toi_thieu, $so_lan_su_dung, $so_lan_da_dung, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $tai_khoan_id)
    {
        try {
            $sql = "INSERT INTO ma_giam_gias (ma_khuyen_mai, mo_ta, loai, gia_tri, dieu_kien_toi_thieu, so_lan_su_dung, so_lan_da_dung, ngay_bat_dau, ngay_ket_thuc, trang_thai, tai_khoan_id) 
                    VALUES (:ma_khuyen_mai, :mo_ta, :loai, :gia_tri, :dieu_kien_toi_thieu, :so_lan_su_dung, :so_lan_da_dung, :ngay_bat_dau, :ngay_ket_thuc, :trang_thai, :tai_khoan_id)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai, PDO::PARAM_STR);
            $stmt->bindParam(':mo_ta', $mo_ta, PDO::PARAM_STR);
            $stmt->bindParam(':loai', $loai, PDO::PARAM_STR);
            $stmt->bindParam(':gia_tri', $gia_tri, PDO::PARAM_INT);
            $stmt->bindParam(':dieu_kien_toi_thieu', $dieu_kien_toi_thieu, PDO::PARAM_INT);
            $stmt->bindParam(':so_lan_su_dung', $so_lan_su_dung, PDO::PARAM_INT);
            $stmt->bindParam(':so_lan_da_dung', $so_lan_da_dung, PDO::PARAM_INT);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau, PDO::PARAM_STR);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc, PDO::PARAM_STR);
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            error_log("Lỗi Truy Vấn: " . $e->getMessage());
            return false;
        }
    }

    public function editKhuyenMai($id, $ma_khuyen_mai, $mo_ta, $loai, $gia_tri, $dieu_kien_toi_thieu, $so_lan_su_dung, $so_lan_da_dung, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $tai_khoan_id) {
        try {
            // Sửa tên bảng thành khuyen_mais để đồng nhất với các hàm khác
            $sql = "UPDATE ma_giam_gias SET 
                    ma_khuyen_mai = :ma_khuyen_mai,
                    mo_ta = :mo_ta,
                    loai = :loai,
                    gia_tri = :gia_tri,
                    dieu_kien_toi_thieu = :dieu_kien_toi_thieu,
                    so_lan_su_dung = :so_lan_su_dung,
                    so_lan_da_dung = :so_lan_da_dung,
                    ngay_bat_dau = :ngay_bat_dau,
                    ngay_ket_thuc = :ngay_ket_thuc,
                    trang_thai = :trang_thai,
                    tai_khoan_id = :tai_khoan_id
                WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            // Bind các giá trị
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':ma_khuyen_mai', $ma_khuyen_mai, PDO::PARAM_STR);
            $stmt->bindValue(':mo_ta', $mo_ta, PDO::PARAM_STR);
            $stmt->bindValue(':loai', $loai, PDO::PARAM_STR);
            $stmt->bindValue(':gia_tri', $gia_tri, PDO::PARAM_INT);
            $stmt->bindValue(':dieu_kien_toi_thieu', $dieu_kien_toi_thieu, PDO::PARAM_INT);
            $stmt->bindValue(':so_lan_su_dung', $so_lan_su_dung, PDO::PARAM_INT);
            $stmt->bindValue(':so_lan_da_dung', $so_lan_da_dung, PDO::PARAM_INT);
            $stmt->bindValue(':ngay_bat_dau', $ngay_bat_dau, PDO::PARAM_STR);
            $stmt->bindValue(':ngay_ket_thuc', $ngay_ket_thuc, PDO::PARAM_STR);
            $stmt->bindValue(':trang_thai', $trang_thai, PDO::PARAM_INT);
            $stmt->bindValue(':tai_khoan_id', $tai_khoan_id, PDO::PARAM_INT);
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