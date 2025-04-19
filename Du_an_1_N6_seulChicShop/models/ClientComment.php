<?php
class ClientComment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function getCommentByProductId($id)
    {
        try {
            $sql = "SELECT binh_luans.*,
            tai_khoans.ten_tai_khoan,
            tai_khoans.anh_dai_dien
            FROM binh_luans
            LEFT JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE san_pham_id = ? AND binh_luans.trang_thai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function createComment($san_pham_id, $tai_khoan_id, $noi_dung, $danh_gia, $ngay_dang, $trang_thai)
    {
        try {
            $sql = "INSERT INTO binh_luans(san_pham_id, tai_khoan_id, noi_dung, danh_gia, ngay_dang, trang_thai)
            VALUES(:san_pham_id, :tai_khoan_id, :noi_dung, :danh_gia, :ngay_dang, :trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':noi_dung' => $noi_dung,
                ':danh_gia' => $danh_gia,
                ':ngay_dang' => $ngay_dang,
                ':trang_thai' => $trang_thai
            ]);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
