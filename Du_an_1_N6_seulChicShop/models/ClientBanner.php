<?php
class ClientBanner
{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllBanner(){
        $sql = "SELECT * FROM banners WHERE trang_thai = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}