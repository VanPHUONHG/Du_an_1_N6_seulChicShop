<?php
class ClientProduct
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getProductBestSeller()
    {
        try {
            $sql = "SELECT 
                    san_phams.*,
                    danh_mucs.ten_danh_muc,
                    bien_the_san_phams.id AS bien_the_id,
                    COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                    COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                    COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh,
                    COUNT(DISTINCT chi_tiet_don_hangs.don_hang_id) AS so_don_dat,
                    SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong,
                    SUM(chi_tiet_don_hangs.thanh_tien) AS tong_doanh_thu
                FROM san_phams
                LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                LEFT JOIN chi_tiet_don_hangs ON san_phams.id = chi_tiet_don_hangs.san_pham_id
                LEFT JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                    AND bien_the_san_phams.id = (
                        SELECT MIN(id) 
                        FROM bien_the_san_phams 
                        WHERE san_pham_id = san_phams.id
                    )
                LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                WHERE san_phams.trang_thai = 1
                AND don_hangs.trang_thai_don_hang_id = 4
                GROUP BY 
                    san_phams.id,
                    danh_mucs.ten_danh_muc,
                    bien_the_san_phams.id,
                    bien_the_san_phams.gia,
                    bien_the_san_phams.gia_khuyen_mai,
                    hinh_anh_san_phams.hinh_anh_bien_the
                ORDER BY tong_so_luong DESC, tong_doanh_thu DESC
                LIMIT 8";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getProductBestSeller: " . $e->getMessage());
            return [];
        }
    }
    public function getProductSelling()
    {
        try {
            $sql = "SELECT 
                    san_phams.*,
                    danh_mucs.ten_danh_muc,
                    bien_the_san_phams.id AS bien_the_id,
                    COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                    COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                    COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh
                FROM san_phams
                LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                    AND bien_the_san_phams.id = (
                        SELECT MIN(id) 
                        FROM bien_the_san_phams 
                        WHERE san_pham_id = san_phams.id
                    )
                LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                WHERE san_phams.trang_thai = 1
                AND (san_phams.gia_san_pham_khuyen_mai > 0 OR bien_the_san_phams.gia_khuyen_mai > 0)
                LIMIT 8";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getProductSell: " . $e->getMessage());
            return [];
        }
    }
    public function getProductNew()
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE trang_thai = 1 ORDER BY ngay_nhap DESC LIMIT 8";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getProductNew: " . $e->getMessage());
            return [];
        }
    }
    // Top Ratting
    public function getProductTopRating()
    {
        try {
            $sql = "SELECT 
                    san_phams.*,
                    danh_mucs.ten_danh_muc,
                    bien_the_san_phams.id AS bien_the_id,
                    COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                    COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                    COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh,
                    AVG(binh_luans.danh_gia) as danh_gia
                FROM san_phams
                LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                    AND bien_the_san_phams.id = (
                        SELECT MIN(id) 
                        FROM bien_the_san_phams 
                        WHERE san_pham_id = san_phams.id
                    )
                LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                LEFT JOIN binh_luans ON san_phams.id = binh_luans.san_pham_id
                WHERE san_phams.trang_thai = 1
                GROUP BY 
                    san_phams.id,
                    san_phams.ten_san_pham,
                    san_phams.gia_san_pham,
                    san_phams.gia_san_pham_khuyen_mai,
                    san_phams.hinh_anh,
                    san_phams.trang_thai,
                    danh_mucs.ten_danh_muc,
                    bien_the_san_phams.id,
                    bien_the_san_phams.gia,
                    bien_the_san_phams.gia_khuyen_mai,
                    hinh_anh_san_phams.hinh_anh_bien_the
                HAVING danh_gia > 4
                ORDER BY danh_gia DESC
                LIMIT 8";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getProductTopRating: " . $e->getMessage());
            return [];
        }
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
                LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                WHERE san_phams.trang_thai = 1';
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
    public function getProductByCategory($id_danh_muc)
    {
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
            LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
            WHERE danh_muc_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_danh_muc]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    public function getProductById($id)
    {
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
                LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                WHERE san_phams.id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    public function getProductVariantById($san_pham_id)
    {
        try {
            $sql = "SELECT * FROM bien_the_san_phams WHERE san_pham_id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$san_pham_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    public function getProductSameCategory($danh_muc_id)
    {
        try {
            $sql = "SELECT 
                san_phams.*,
                danh_mucs.ten_danh_muc,
                bien_the_san_phams.id AS bien_the_id,
                COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh
            FROM san_phams
            LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                AND bien_the_san_phams.id = (
                    SELECT MIN(id) 
                    FROM bien_the_san_phams 
                    WHERE san_pham_id = san_phams.id
                )
            LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
            WHERE san_phams.danh_muc_id = ? AND san_phams.trang_thai = 1
            LIMIT 4";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$danh_muc_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

}
