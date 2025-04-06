<?php

class ClientPosts {
    public $conn;

    // Hàm khởi tạo: Đúng cú pháp và đảm bảo kết nối DB hợp lệ
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllPosts() {
        try {
            $sql = "SELECT * FROM posts WHERE trang_thai = 1 ORDER BY ngay_tao_bai_viet DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function getPostById($id) {
        try {
            $sql = "SELECT * FROM posts WHERE id = :id AND trang_thai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function getRecentPosts($limit = 5) {
        try {
            $sql = "SELECT * FROM posts WHERE trang_thai = 1 ORDER BY ngay_tao_bai_viet DESC LIMIT :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
}
?>