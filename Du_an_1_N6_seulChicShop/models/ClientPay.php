<?php
class ClientPay{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
<<<<<<< HEAD
    public function getPayMethod(){
        try{
            $sql = "SELECT * FROM phuong_thuc_thanh_toans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function addOder($ma_don_hang, $tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $tinh_thanhpho, $huyen_quan, $xa_phuong, $dia_chi_cu_the,$ghi_chu, $tong_tien,$ngay_dat, $phuong_thuc_thanh_toan_id, $trang_thai_id){
        try{
            $sql = "INSERT INTO don_hangs (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, tinh_thanhpho, huyen_quan, xa_phuong, dia_chi_cu_the, ghi_chu, tong_tien, ngay_dat, phuong_thuc_thanh_toan_id, trang_thai_id) 
            VALUES (:ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :tinh_thanhpho, :huyen_quan, :xa_phuong, :dia_chi_cu_the, :ghi_chu, :tong_tien, :ngay_dat, :phuong_thuc_thanh_toan_id, :trang_thai_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma_don_hang', $ma_don_hang);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id);
            $stmt->bindParam(':ten_nguoi_nhan', $ten_nguoi_nhan);
            $stmt->bindParam(':email_nguoi_nhan', $email_nguoi_nhan);
            $stmt->bindParam(':sdt_nguoi_nhan', $sdt_nguoi_nhan);
            $stmt->bindParam(':tinh_thanhpho', $tinh_thanhpho);
            $stmt->bindParam(':huyen_quan', $huyen_quan);
            $stmt->bindParam(':xa_phuong', $xa_phuong);
            $stmt->bindParam(':dia_chi_cu_the', $dia_chi_cu_the);
            $stmt->bindParam(':ghi_chu', $ghi_chu);
            $stmt->bindParam(':tong_tien', $tong_tien);
            $stmt->bindParam(':ngay_dat', $ngay_dat);
            $stmt->bindParam(':phuong_thuc_thanh_toan_id', $phuong_thuc_thanh_toan_id);
            $stmt->bindParam(':trang_thai_id', $trang_thai_id);
            
            $stmt->execute();
            return $this->conn->lastInsertId();
        }catch(PDOException $e){
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
=======
>>>>>>> 41a3a12 (update oder)
}
