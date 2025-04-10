<?php

class ClientPosts {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllPosts()
    {
        try {
            // Lấy tất cả bài viết có trạng thái = 1 (hiển thị)
            $sql = "SELECT 
                    id,
                    hinh_anh,
                    tieu_de, 
                    bai_viet,
                    tac_gia,
                    ngay_tao_bai_viet,
                    trang_thai
                    FROM posts
                    WHERE trang_thai = 1
                    ORDER BY ngay_tao_bai_viet DESC";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($result === false) {
                throw new Exception("Không thể lấy dữ liệu bài viết");
            }

            return $result;

        } catch(Exception $e) {
            error_log("Lỗi truy vấn: " . $e->getMessage());
            return false;
        }
    }

    public function getPostsById($id) 
    {
        try {
            if (!$id) {
                throw new Exception("ID bài viết không hợp lệ");
            }

            $sql = "SELECT 
                    id,
                    hinh_anh,
                    tieu_de,
                    bai_viet, 
                    tac_gia,
                    ngay_tao_bai_viet,
                    trang_thai
                FROM posts 
                WHERE id = :id AND trang_thai = 1";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$post) {
                return null;
            }

            return $post;

        } catch(Exception $e) {
            error_log("Lỗi truy vấn: " . $e->getMessage());
            return false;
        }
    }
}