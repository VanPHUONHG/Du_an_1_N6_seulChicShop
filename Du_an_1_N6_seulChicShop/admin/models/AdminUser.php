<?php
class AdminUser
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getUserOrder()
    {
        try {
            $sql = "SELECT * FROM tai_khoans";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function getAllAdminUser()
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = 2";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
}
