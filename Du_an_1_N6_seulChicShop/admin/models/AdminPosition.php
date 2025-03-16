<?php
class AdminPosition
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllPosition()
    {
        try {
            $sql = "SELECT * FROM chuc_vus WHERE ten_chuc_vu = 'admin'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi Truy Van:" . $e->getMessage();
        }
    }
}
