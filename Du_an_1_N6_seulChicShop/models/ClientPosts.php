<?php

class ClientPosts
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllPost(){
        try{
            $sql ="SELECT * FROM bai_viets 
            WHERE trang_thai = 1 
            ORDER BY ngay_tao_bai_viet DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            error_log("Lỗi truy vấn: " . $e->getMessage());
            return false;
        }
    }

    // Lấy ra 3 bài viết được thêm mới nhất
    public function getPostNew(){
        try{
            $sql = "SELECT * FROM bai_viets WHERE trang_thai = 1 ORDER BY ngay_tao_bai_viet DESC LIMIT 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
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

            $sql = "SELECT * FROM bai_viets WHERE id = :id AND trang_thai = 1";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$post) {
                return null;
            }

            return $post;

        } catch (Exception $e) {
            error_log("Lỗi truy vấn: " . $e->getMessage());
            return false;
        }
    }
}