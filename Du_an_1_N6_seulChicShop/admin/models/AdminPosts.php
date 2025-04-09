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

            // Validate trang_thai value (0 = ẩn, 1 = hiện)
            if (!in_array($trang_thai, [0, 1])) {
                $trang_thai = 1; // Default to visible if invalid value
                $trang_thai = 0; // Default to visible if invalid value
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
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new Exception("Không thể thêm bài viết");
            }

            return $this->conn->lastInsertId();

        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("Lỗi khi thêm bài viết: " . $e->getMessage());
        }
    }

    public function editPosts($id, $hinh_anh, $tieu_de, $bai_viet, $tac_gia, $trang_thai) {
        try {
            // Validate input data
            if (empty($tieu_de) || empty($bai_viet) || empty($tac_gia)) {
                throw new Exception("Vui lòng điền đầy đủ thông tin bắt buộc");
            }

            // Validate trang_thai value (0 = ẩn, 1 = hiện)
            if (!in_array($trang_thai, [0, 1])) {
                $trang_thai = 1; // Default to visible if invalid value
                $trang_thai = 0; // Default to visible if invalid value
            }

            // Check if post exists
            $checkSql = "SELECT id FROM posts WHERE id = :id";
            $checkStmt = $this->conn->prepare($checkSql);
            $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $checkStmt->execute();
            
            if (!$checkStmt->fetch()) {
                throw new Exception("Không tìm thấy bài viết để cập nhật");
            }

            // Update post
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
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new Exception("Không thể cập nhật bài viết");
            }

            return true;

        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("Lỗi khi cập nhật bài viết: " . $e->getMessage());
        }
    }

    public function togglePostStatus($id) {
        try {
            // Kiểm tra bài viết tồn tại
            $sql = "SELECT trang_thai FROM posts WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$post) {
                throw new Exception("Không tìm thấy bài viết");
            }

            // Chuyển đổi trạng thái
            // 0 = ẩn (không hiển thị)
            // 1 = hiện (hiển thị cho người dùng)
            $newStatus = $post['trang_thai'] == 1 ? 0 : 1;
            
            // Cập nhật trạng thái mới
            $sql = "UPDATE posts SET 
                    trang_thai = :trang_thai,
                    ngay_cap_nhat = NOW() 
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':trang_thai', $newStatus, PDO::PARAM_INT);
            
            if (!$stmt->execute()) {
                throw new Exception("Không thể cập nhật trạng thái bài viết");
            }

            // Trả về thông báo phù hợp
            $message = $newStatus == 1 ? 
                "Bài viết đã được hiển thị" : 
                "Bài viết đã được ẩn";

            return [
                'success' => true,
                'message' => $message,
                'new_status' => $newStatus
            ];

        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("Lỗi khi thay đổi trạng thái bài viết: " . $e->getMessage());
        }
    }
}
