<?php
class AdminUser
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllUser()
    {
        try {
            $sql = "SELECT*FROM tai_khoans  ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
}
