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
            $sql = "SELECT SUM(tong_tien) AS tong_thu_nhap FROM don_hangs WHERE trang_thai_don_hang_id = 4";
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
                        san_phams.gia_san_pham,
                        san_phams.gia_san_pham_khuyen_mai,
                        bien_the_san_phams.gia,
                        bien_the_san_phams.gia_khuyen_mai,
                        bien_the_san_phams.mau_sac,
                        bien_the_san_phams.kich_thuoc,
                        don_hangs.ngay_dat,
                        don_hangs.tien_giam,
                        ma_giam_gias.ma_khuyen_mai,
                        ma_giam_gias.gia_tri,
                        COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh,
                        COUNT(DISTINCT chi_tiet_don_hangs.don_hang_id) AS so_don_dat,
                        SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong,
                        SUM(chi_tiet_don_hangs.thanh_tien) AS tong_doanh_thu
                    FROM chi_tiet_don_hangs
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id 
                    LEFT JOIN bien_the_san_phams ON chi_tiet_don_hangs.bien_the_san_pham_id = bien_the_san_phams.id
                    LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                    INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                    LEFT JOIN ma_giam_gias ON don_hangs.ma_giam_gia_id = ma_giam_gias.id
                    WHERE don_hangs.trang_thai_don_hang_id = 1
                    ORDER BY tong_so_luong DESC, tong_doanh_thu DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getAllDetailBestSellingProducts: " . $e->getMessage());
            return [];
        }
    }
    public function getAllOrders()
    {
        try {
            $sql = "SELECT 
                        don_hangs.*,
                        trang_thai_don_hangs.ten_trang_thai,
                        tai_khoans.ten_tai_khoan,
                        tai_khoans.email,
                        tai_khoans.so_dien_thoai,
                        phuong_thuc_thanh_toans.ten_phuong_thuc,
                        ma_giam_gias.ma_khuyen_mai,
                        ma_giam_gias.gia_tri,
                        ma_giam_gias.loai
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    LEFT JOIN ma_giam_gias ON don_hangs.ma_giam_gia_id = ma_giam_gias.id
                    ORDER BY don_hangs.ngay_dat DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getAllOrders: " . $e->getMessage());
            return [];
        }
    }
    public function getAllOrder()
    {
        try {
            $sql = "SELECT COUNT(*) as total_orders FROM don_hangs";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total_orders'];
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
            return 0;
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
          phuong_thuc_thanh_toans.ten_phuong_thuc,
          ma_giam_gias.ma_khuyen_mai,
          ma_giam_gias.gia_tri
           FROM don_hangs
           INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id 
           
           INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id 
           
           INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id 
           INNER JOIN ma_giam_gias ON don_hangs.ma_giam_gia_id = ma_giam_gias.id
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

    public function getProfit() {
        try {
            $sql = "SELECT 
                    SUM(chi_tiet_don_hangs.thanh_tien) as doanh_thu,
                    SUM(san_phams.gia_nhap * chi_tiet_don_hangs.so_luong) as von,
                    SUM(chi_tiet_don_hangs.thanh_tien - (san_phams.gia_nhap * chi_tiet_don_hangs.so_luong)) as loi_nhuan,
                    (
                        SELECT SUM(ctdh.thanh_tien - (sp.gia_nhap * ctdh.so_luong))
                        FROM chi_tiet_don_hangs ctdh
                        JOIN don_hangs dh ON ctdh.don_hang_id = dh.id
                        JOIN san_phams sp ON ctdh.san_pham_id = sp.id
                        WHERE MONTH(dh.ngay_dat) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                        AND YEAR(dh.ngay_dat) = YEAR(CURRENT_DATE)
                        AND dh.trang_thai_don_hang_id = 4
                    ) as loi_nhuan_thang_truoc
                    FROM chi_tiet_don_hangs
                    JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                    JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    WHERE MONTH(don_hangs.ngay_dat) = MONTH(CURRENT_DATE)
                    AND YEAR(don_hangs.ngay_dat) = YEAR(CURRENT_DATE)
                    AND don_hangs.trang_thai_don_hang_id = 4";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Tính tỷ lệ tăng trưởng lợi nhuận
            $currentProfit = $result['loi_nhuan'] ?? 0;
            $lastProfit = $result['loi_nhuan_thang_truoc'] ?? 0;
            $growthRate = 0;
            
            if ($lastProfit > 0) {
                $growthRate = (($currentProfit - $lastProfit) / $lastProfit) * 100;
            }
            
            return [
                'doanh_thu' => (float)($result['doanh_thu'] ?? 0),
                'von' => (float)($result['von'] ?? 0),
                'loi_nhuan' => (float)($result['loi_nhuan'] ?? 0),
                'tang_truong' => $growthRate
            ];
        } catch (Exception $e) {
            error_log("Lỗi getProfit: " . $e->getMessage());
            return [
                'doanh_thu' => 0,
                'von' => 0,
                'loi_nhuan' => 0,
                'tang_truong' => 0
            ];
        }
    }

    public function getMonthlyRevenue() {
        try {
            $sql = "SELECT 
                    MONTH(don_hangs.ngay_dat) as thang,
                    SUM(chi_tiet_don_hangs.thanh_tien) as doanh_thu
                    FROM don_hangs 
                    JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                    WHERE YEAR(don_hangs.ngay_dat) = YEAR(CURRENT_DATE)
                    AND don_hangs.trang_thai_don_hang_id = 4
                    GROUP BY MONTH(don_hangs.ngay_dat)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Khởi tạo mảng 12 tháng với giá trị 0
            $monthlyRevenue = array_fill(0, 12, 0);
            
            // Cập nhật doanh thu cho các tháng có dữ liệu
            foreach ($results as $row) {
                $monthlyRevenue[$row['thang'] - 1] = (float)$row['doanh_thu'];
            }
            
            return $monthlyRevenue;
        } catch (Exception $e) {
            error_log("Lỗi getMonthlyRevenue: " . $e->getMessage());
            return array_fill(0, 12, 0);
        }
    }

    public function getOrderStatistics() {
        try {
            $sql = "SELECT 
                    trang_thai_don_hang_id,
                    COUNT(*) as so_luong
                    FROM don_hangs 
                    WHERE YEAR(ngay_dat) = YEAR(CURRENT_DATE)
                    GROUP BY trang_thai_don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $stats = [
                'hoan_thanh' => 0,
                'dang_xu_ly' => 0,
                'da_huy' => 0
            ];
            
            foreach ($results as $row) {
                switch ($row['trang_thai_don_hang_id']) {
                    case 4: // Hoàn thành
                        $stats['hoan_thanh'] = (int)$row['so_luong'];
                        break;
                    case 1: // Đang xử lý
                    case 2: // Đã xác nhận
                    case 3: // Đang giao
                        $stats['dang_xu_ly'] += (int)$row['so_luong'];
                        break;
                    case 5: // Đã hủy
                        $stats['da_huy'] = (int)$row['so_luong'];
                        break;
                }
            }
            
            return $stats;
        } catch (Exception $e) {
            error_log("Lỗi getOrderStatistics: " . $e->getMessage());
            return ['hoan_thanh' => 0, 'dang_xu_ly' => 0, 'da_huy' => 0];
        }
    }

    public function getTotalIncome() {
        try {
            $sql = "SELECT 
                    SUM(chi_tiet_don_hangs.thanh_tien) as tong_thu_nhap,
                    COUNT(DISTINCT don_hangs.id) as so_don_hang,
                    COALESCE(
                        (SELECT SUM(chi_tiet_don_hangs_prev.thanh_tien)
                        FROM chi_tiet_don_hangs chi_tiet_don_hangs_prev
                        JOIN don_hangs don_hangs_prev ON chi_tiet_don_hangs_prev.don_hang_id = don_hangs_prev.id
                        WHERE MONTH(don_hangs_prev.ngay_dat) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                        AND YEAR(don_hangs_prev.ngay_dat) = YEAR(CURRENT_DATE)
                        AND don_hangs_prev.trang_thai_don_hang_id = 4), 0
                    ) as doanh_thu_thang_truoc
                    FROM chi_tiet_don_hangs
                    JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                    WHERE MONTH(don_hangs.ngay_dat) = MONTH(CURRENT_DATE)
                    AND YEAR(don_hangs.ngay_dat) = YEAR(CURRENT_DATE)
                    AND don_hangs.trang_thai_don_hang_id = 4";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Tính phần trăm tăng trưởng
            $currentRevenue = $result['tong_thu_nhap'] ?? 0;
            $lastRevenue = $result['doanh_thu_thang_truoc'] ?? 0;
            $growthRate = 0;
            
            if ($lastRevenue > 0) {
                $growthRate = (($currentRevenue - $lastRevenue) / $lastRevenue) * 100;
            }
            
            return [
                'tong_thu_nhap' => $currentRevenue,
                'tang_truong' => $growthRate
            ];
        } catch (Exception $e) {
            error_log("Lỗi getTotalIncome: " . $e->getMessage());
            return ['tong_thu_nhap' => 0, 'tang_truong' => 0];
        }
    }

    public function getTotalCustomers() {
        try {
            $sql = "SELECT 
                    COUNT(DISTINCT tai_khoan_id) as tong_khach_hang,
                    (
                        SELECT COUNT(DISTINCT tai_khoan_id)
                        FROM don_hangs
                        WHERE MONTH(ngay_dat) = MONTH(CURRENT_DATE)
                        AND YEAR(ngay_dat) = YEAR(CURRENT_DATE)
                    ) as khach_hang_moi
                    FROM don_hangs
                    WHERE trang_thai_don_hang_id = 4"; // Chỉ đếm đơn hàng đã hoàn thành
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $totalCustomers = $result['tong_khach_hang'] ?? 0;
            $newCustomers = $result['khach_hang_moi'] ?? 0;
            $growthRate = 0;
            
            if ($totalCustomers > 0) {
                $growthRate = ($newCustomers / $totalCustomers) * 100;
            }
            
            return [
                'tong_khach_hang' => $totalCustomers,
                'tang_truong' => $growthRate
            ];
        } catch (Exception $e) {
            error_log("Lỗi getTotalCustomers: " . $e->getMessage());
            return ['tong_khach_hang' => 0, 'tang_truong' => 0];
        }
    }

    public function getTotalOrders() {
        try {
            $sql = "SELECT 
                    COUNT(*) as tong_don_hang,
                    COALESCE(
                        (SELECT COUNT(*)
                        FROM don_hangs
                        WHERE MONTH(ngay_dat) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                        AND YEAR(ngay_dat) = YEAR(CURRENT_DATE)), 0
                    ) as don_hang_thang_truoc
                    FROM don_hangs
                    WHERE MONTH(ngay_dat) = MONTH(CURRENT_DATE)
                    AND YEAR(ngay_dat) = YEAR(CURRENT_DATE)";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $currentOrders = $result['tong_don_hang'] ?? 0;
            $lastOrders = $result['don_hang_thang_truoc'] ?? 0;
            $growthRate = 0;
            
            if ($lastOrders > 0) {
                $growthRate = (($currentOrders - $lastOrders) / $lastOrders) * 100;
            }
            
            return [
                'tong_don_hang' => $currentOrders,
                'tang_truong' => $growthRate
            ];
        } catch (Exception $e) {
            error_log("Lỗi getTotalOrders: " . $e->getMessage());
            return ['tong_don_hang' => 0, 'tang_truong' => 0];
        }
    }
}
