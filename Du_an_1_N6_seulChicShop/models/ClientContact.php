<?php

class ClientContact
{
    public $conn;

    // construct
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // hien thi trang lien he
    public function addContact($ho_ten, $email, $so_dien_thoai, $tieu_de, $trang_thai, $noi_dung, $tai_khoan_id, $thoi_gian_gui)
    {
        try {
            $thoi_gian_gui = date('Y-m-d H:i:s');
            $sql = 'INSERT INTO lien_hes(ho_ten, email, so_dien_thoai, tieu_de, trang_thai, noi_dung, thoi_gian_gui, tai_khoan_id) VALUES 
            (:ho_ten, :email, :so_dien_thoai, :tieu_de, :trang_thai, :noi_dung, :thoi_gian_gui, :tai_khoan_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':thoi_gian_gui', $thoi_gian_gui);
            if ($tai_khoan_id === null) {
                $stmt->bindValue(':tai_khoan_id', null, PDO::PARAM_NULL);
            } else {
                $stmt->bindParam(':tai_khoan_id', $tai_khoan_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
}
