<?php

class AdminPosts {
    public $conn;

    // Hàm khởi tạo: Đúng cú pháp và đảm bảo kết nối DB hợp lệ
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllPosts() {
        try {
            $sql = "SELECT * FROM posts";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function getPostsById($id) {
        try {
            $sql = "SELECT * FROM posts WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function deletePosts($id) {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }

    public function addPosts($hinh_anh, $tieu_de, $bai_viet, $tac_gia, $ngay_tao_bai_viet, $trang_thai) {
        try {
            // Validate input data
            if (empty($tieu_de) || empty($bai_viet) || empty($tac_gia)) {
                throw new Exception("Vui lòng điền đầy đủ thông tin bắt buộc");
            }

            // Prepare SQL statement
            $sql = "INSERT INTO posts (hinh_anh, tieu_de, bai_viet, tac_gia, ngay_tao_bai_viet, trang_thai) 
                    VALUES (:hinh_anh, :tieu_de, :bai_viet, :tac_gia, :ngay_tao_bai_viet, :trang_thai)";
            
            // Prepare and execute with parameters
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':bai_viet', $bai_viet); 
            $stmt->bindParam(':tac_gia', $tac_gia);
            $stmt->bindParam(':ngay_tao_bai_viet', $ngay_tao_bai_viet);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $result = $stmt->execute();

            if ($result) {
                return $this->conn->lastInsertId(); // Return ID of newly inserted post
            } else {
                throw new Exception("Không thể thêm bài viết");
            }

        } catch (Exception $e) {
            error_log("Error adding post: " . $e->getMessage());
            throw new Exception("Lỗi khi thêm bài viết: " . $e->getMessage());
        }
    }

    public function editPosts($id, $hinh_anh, $tieu_de, $bai_viet, $tac_gia, $trang_thai) {
        try {
            $sql = "UPDATE posts SET 
                        hinh_anh = :hinh_anh,
                        tieu_de = :tieu_de,
                        bai_viet = :bai_viet,
                        tac_gia = :tac_gia,
                        trang_thai = :trang_thai
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':hinh_anh', $hinh_anh);
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':bai_viet', $bai_viet);
            $stmt->bindParam(':tac_gia', $tac_gia);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
}
