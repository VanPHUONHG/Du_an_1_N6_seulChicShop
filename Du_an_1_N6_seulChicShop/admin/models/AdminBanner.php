<?php
class AdminBanner
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBanner()
    {
        try {
            $sql = "SELECT * FROM banners";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
    public function getBannerById($id)
    {
        try {
            $sql = "SELECT * FROM banners WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
    public function deleteBanner($id)
    {
        try {
            $sql = 'DELETE FROM banners WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }
    public function addBanner($id, $tieu_de, $hinh_anh_url, $mo_ta, $trang_thai, $ngay_tao)
    {
        try {
            $ngay_tao = date('Y-m-d H:i:s');
            $sql = "INSERT INTO banners(id,tieu_de,hinh_anh_url,mo_ta,trang_thai,ngay_tao) 
            VALUES(:id,:tieu_de,:hinh_anh_url,:mo_ta,:trang_thai,:ngay_tao)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':hinh_anh_url', $hinh_anh_url);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }
    public function editBanner($id, $tieu_de, $hinh_anh_url, $mo_ta, $trang_thai)
    {
        try {
            $sql = "UPDATE banners SET 
            tieu_de = :tieu_de,
            hinh_anh_url = :hinh_anh_url,
            mo_ta = :mo_ta,
            trang_thai = :trang_thai
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':hinh_anh_url', $hinh_anh_url);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }
}
