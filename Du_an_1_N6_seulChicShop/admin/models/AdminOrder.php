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
            $sql = "SELECT SUM(tong_tien) AS tong_thu_nhap FROM don_hangs WHERE trang_thai_don_hang_id = 7";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['tong_thu_nhap'] ?? 0;
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
                        san_phams.gia_san_pham_khuyen_mai,
                        bien_the_san_phams.gia,
                        bien_the_san_phams.gia_khuyen_mai,
                        MAX(don_hangs.ngay_dat) AS ngay_dat, 
                        COUNT(chi_tiet_don_hangs.don_hang_id) AS so_don_dat,
                        SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong
                    FROM chi_tiet_don_hangs
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id 
                    LEFT JOIN bien_the_san_phams ON chi_tiet_don_hangs.bien_the_san_pham_id = bien_the_san_phams.id
                    INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                    WHERE don_hangs.trang_thai_don_hang_id = 7
                    GROUP BY 
                        chi_tiet_don_hangs.san_pham_id,
                        san_phams.ten_san_pham,
                        san_phams.hinh_anh,
                        san_phams.gia_san_pham,
                        san_phams.gia_san_pham_khuyen_mai,
                        bien_the_san_phams.gia,
                        bien_the_san_phams.gia_khuyen_mai
                    ORDER BY 
                        tong_so_luong DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
            return [];
        }
    }
    public function getAllOrder()
    {
        try {
            $sql = "SELECT don_hangs.*,trang_thai_don_hangs.ten_trang_thai
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
            ORDER BY don_hangs.id DESC";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }


    public function getAllTrangThaiOder()
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }

    public function getDetailDonHang($id)
    {
        try {
            $sql = 'SELECT don_hangs.*,
          trang_thai_don_hangs.ten_trang_thai,
          tai_khoans.ten_tai_khoan,
          tai_khoans.email, 
          tai_khoans.so_dien_thoai,
          phuong_thuc_thanh_toans.ten_phuong_thuc
           FROM don_hangs
           INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id 
           
           INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id 
           
           INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id 
           WHERE don_hangs.id = :id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

  

    public function getListDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*,
          san_phams.ten_san_pham
          
           FROM chi_tiet_don_hangs
           INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id 
           
           WHERE chi_tiet_don_hangs.don_hang_id = :id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateOrder($id, $trang_thai_don_hang_id)
    {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_don_hang_id = :trang_thai_don_hang_id WHERE id=:id";

            $stmt = $this->conn->prepare($sql);
            //    var_dump($stmt);die;
            $stmt->execute([
                ':trang_thai_don_hang_id' => $trang_thai_don_hang_id,
                ':id' => $id

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
}
