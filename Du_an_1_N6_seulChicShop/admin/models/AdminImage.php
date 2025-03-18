<?php
class AdminImage
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllImageProduct()
    {
        $sql = "SELECT san_phams.id, san_phams.ten_san_pham, san_phams.hinh_anh FROM san_phams";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllImageAccount()
    {
        $sql = "SELECT tai_khoans.id, tai_khoans.ten_tai_khoan, tai_khoans.anh_dai_dien FROM tai_khoans";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
