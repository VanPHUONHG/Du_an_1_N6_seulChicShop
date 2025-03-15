<?php
class AdminOrder
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function totalPriceOrder()
    {
        try {
            $sql = "SELECT SUM(tong_tien) AS tong_thu_nhap FROM don_hangs WHERE trang_thai_id = 7";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['tong_thu_nhap'] ?? 0;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function getAllOrder()
    {
        try {
            $sql = "SELECT don_hangs.*,trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            ORDER BY don_hangs.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }

    public function getAllDetailBestSellingProducts()
    {
        try {
            $sql = "SELECT 
                        chi_tiet_don_hangs.san_pham_id,
                        san_phams.ten_san_pham,
                        san_phams.hinh_anh,
                        san_phams.gia_san_pham,
                        san_phams.gia_khuyen_mai,
                        MAX(don_hangs.ngay_dat) AS ngay_dat, 
                        COUNT(chi_tiet_don_hangs.don_hang_id) AS so_don_dat,
                        SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong
                    FROM chi_tiet_don_hangs
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id 
                    INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                    GROUP BY 
                        chi_tiet_don_hangs.san_pham_id
                    ORDER BY 
                        tong_so_luong DESC";


            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
}
