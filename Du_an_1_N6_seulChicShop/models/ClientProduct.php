<?php
class ClientProduct
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllProduct()
    {
        $sql = 'SELECT 
                san_phams.id,
                san_phams.ten_san_pham,
                COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                COALESCE(bien_the_san_phams.so_luong, san_phams.so_luong) AS so_luong,
                COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh,
                san_phams.luot_xem,
                san_phams.ngay_nhap,
                san_phams.mo_ta,
                san_phams.danh_muc_id,
                san_phams.trang_thai
                FROM san_phams
                LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                    AND bien_the_san_phams.id = (
                        SELECT MIN(id) 
                        FROM bien_the_san_phams 
                        WHERE san_pham_id = san_phams.id
                    )
                LEFT JOIN hinh_anh_san_phams ON san_phams.id = hinh_anh_san_phams.san_pham_id
                    AND hinh_anh_san_phams.id = (
                        SELECT MIN(id)
                        FROM hinh_anh_san_phams
                        WHERE san_pham_id = san_phams.id
                    )';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getCategory()
    {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getProductByCategory($id_danh_muc){
        try {
            $sql = "SELECT san_phams.*,
            danh_mucs.ten_danh_muc,
            bien_the_san_phams.id AS bien_the_id,
            COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
            COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
            COALESCE(bien_the_san_phams.so_luong, san_phams.so_luong) AS so_luong,
            COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh
            FROM san_phams
            LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                AND bien_the_san_phams.id = (
                    SELECT MIN(id) 
                    FROM bien_the_san_phams 
                    WHERE san_pham_id = san_phams.id
                )
            LEFT JOIN hinh_anh_san_phams ON san_phams.id = hinh_anh_san_phams.san_pham_id
                AND hinh_anh_san_phams.id = (
                    SELECT MIN(id)
                    FROM hinh_anh_san_phams
                    WHERE san_pham_id = san_phams.id
                )
            WHERE danh_muc_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_danh_muc]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    public function getProductById($id){
        try {
            $sql = "SELECT 
                san_phams.*,
                danh_mucs.ten_danh_muc,
                bien_the_san_phams.id AS bien_the_id,
                bien_the_san_phams.mau_sac,
                bien_the_san_phams.kich_thuoc,
                COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                COALESCE(bien_the_san_phams.so_luong, san_phams.so_luong) AS so_luong,
                COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh,
                san_phams.luot_xem,
                san_phams.ngay_nhap,
                san_phams.mo_ta,
                san_phams.danh_muc_id,
                san_phams.trang_thai
                FROM san_phams
                LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                    AND bien_the_san_phams.id = (
                        SELECT MIN(id) 
                        FROM bien_the_san_phams 
                        WHERE san_pham_id = san_phams.id
                    )
                LEFT JOIN hinh_anh_san_phams ON san_phams.id = hinh_anh_san_phams.san_pham_id
                    AND hinh_anh_san_phams.id = (
                        SELECT MIN(id)
                        FROM hinh_anh_san_phams
                        WHERE san_pham_id = san_phams.id
                    )
                WHERE san_phams.id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    public function getProductVariantById($san_pham_id) {
        try {
            $sql = "SELECT * FROM bien_the_san_phams WHERE san_pham_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$san_pham_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    
}
