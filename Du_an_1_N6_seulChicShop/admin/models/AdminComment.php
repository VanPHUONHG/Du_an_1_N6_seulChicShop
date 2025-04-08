<?php

class AdminComment{
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }
    // lấy tất cả bình luận
    public function getAllComment(){
        try{
            $sql='SELECT binh_luans.*,
                    san_phams.ten_san_pham,
                    tai_khoans.ten_tai_khoan,
                    tai_khoans.anh_dai_dien
                    FROM binh_luans 
                    INNER JOIN san_phams 
                    ON binh_luans.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans 
                    ON binh_luans.tai_khoan_id = tai_khoans.id';
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // xóa bình luận
    public function deleteComment($id){
        try{
            $sql='DELETE FROM binh_luans WHERE id=:id';
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // Sửa trạng thái bình luận
    public function updateComment($id,$trang_thai){
        try{
            $sql='UPDATE binh_luans 
            SET trang_thai=:trang_thai 
            WHERE id=:id';
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([':trang_thai'=>$trang_thai,':id'=>$id]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // lấy bình luận theo id
    public function getCommentById($id){
        try{
            $sql='SELECT binh_luans.*,
                    san_phams.ten_san_pham,
                    tai_khoans.ten_tai_khoan,
                    tai_khoans.anh_dai_dien
                    FROM binh_luans 
                    INNER JOIN san_phams 
                    ON binh_luans.san_pham_id = san_phams.id
                    INNER JOIN tai_khoans 
                    ON binh_luans.tai_khoan_id = tai_khoans.id
                    WHERE binh_luans.id=:id';
            $stmt=$this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // lấy bình luận từ sản phẩm
    public function getCommentFromProduct($id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ten_tai_khoan, tai_khoans.anh_dai_dien
                    FROM binh_luans 
                    INNER JOIN tai_khoans 
                    ON binh_luans.tai_khoan_id = tai_khoans.id
                    WHERE binh_luans.san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }
}