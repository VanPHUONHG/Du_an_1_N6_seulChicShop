<?php
require_once './models/ClientOrder.php';

class ClientOrder
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_don_hang_id)
    {
        try {
            $sql = 'INSERT INTO don_hangs (tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat, ma_don_hang, trang_thai_don_hang_id) 
                    VALUES (:tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat, :ma_don_hang, :trang_thai_don_hang_id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':tong_tien' => $tong_tien,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':ngay_dat' => $ngay_dat,
                ':ma_don_hang' => $ma_don_hang,
                ':trang_thai_don_hang_id' => $trang_thai_don_hang_id
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function addChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien)
    {
        try {
            $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien)
            VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':don_hang_id' => $don_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':don_gia' => $don_gia,
                ':so_luong' => $so_luong,
                ':thanh_tien' => $thanh_tien
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDonHangFromUser($tai_khoan_id)
    {
        try {
            $sql = "SELECT * FROM don_hangs 
                    WHERE tai_khoan_id = :tai_khoan_id
                    ORDER BY don_hangs.id DESC";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getAllPhuongThucThanhToan()
    {
        try {
            $sql = "SELECT * FROM phuong_thuc_thanh_toans";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDonHangById($don_hang_id)
    {
        try {
            $sql = "SELECT * FROM don_hangs WHERE id =:id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $don_hang_id
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function updateTrangThaiDonHang($don_hang_id, $trang_thai_don_hang_id)
    {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_don_hang_id = :trang_thai_don_hang_id WHERE id =:id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $don_hang_id,
                ':trang_thai_don_hang_id' => $trang_thai_don_hang_id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getChiTietDonHangByDonHangId($don_hang_id)
    {
        try {
            $sql = "SELECT 
                        chi_tiet_don_hangs.*,
                        san_phams.ten_san_pham,
                        san_phams.hinh_anh,
                        COALESCE(san_phams.hinh_anh, hinh_anh_san_phams.hinh_anh_bien_the) as hinh_anh,
                        bien_the_san_phams.kich_thuoc,
                        bien_the_san_phams.mau_sac
                    FROM 
                        chi_tiet_don_hangs 
                    JOIN
                        san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    LEFT JOIN
                        bien_the_san_phams ON chi_tiet_don_hangs.bien_the_san_pham_id = bien_the_san_phams.id
                    LEFT JOIN
                        hinh_anh_san_phams ON san_phams.id = hinh_anh_san_phams.san_pham_id
                    WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':don_hang_id' => $don_hang_id
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
    }
}
