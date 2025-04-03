<?php

class ClientCart
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getCartFromUser($tai_khoan_id)
    {
        try {
            $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function deleteDetailCart($id)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function addCart($id)
    {
        try {
            $sql = "INSERT INTO gio_hangs (tai_khoan_id) VALUES (:id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailCart($id)
    {
        try {
            $sql = "SELECT chi_tiet_gio_hangs.*,
                san_phams.ten_san_pham,
                COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh,
                bien_the_san_phams.mau_sac,
                bien_the_san_phams.kich_thuoc
                FROM chi_tiet_gio_hangs 
                LEFT JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id 
                LEFT JOIN bien_the_san_phams ON chi_tiet_gio_hangs.bien_the_san_pham_id = bien_the_san_phams.id
                LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.san_pham_id = hinh_anh_san_phams.san_pham_id
                    AND hinh_anh_san_phams.id = (
                        SELECT MIN(id)
                        FROM hinh_anh_san_phams
                        WHERE san_pham_id = san_phams.id
                    )
                WHERE chi_tiet_gio_hangs.gio_hang_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    public function addDetailCart($gio_hang_id, $san_pham_id, $bien_the_san_pham_id, $so_luong)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, bien_the_san_pham_id, so_luong) 
            VALUES (:gio_hang_id, :san_pham_id, :bien_the_san_pham_id, :so_luong)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':gio_hang_id', $gio_hang_id);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->bindParam(':bien_the_san_pham_id', $bien_the_san_pham_id);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function updateQuantity($id, $san_pham_id, $so_luong)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hangs 
            SET so_luong = :so_luong 
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }


    public function clearCart($cart_id)
    {
        // Xóa các chi tiết giỏ hàng trước
        $sql_detail = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = ?";
        $stmt = $this->conn->prepare($sql_detail);
        $stmt->bindParam(1, $cart_id);
        $stmt->execute();

        // Sau đó xóa giỏ hàng
        $sql_cart = "DELETE FROM gio_hangs WHERE id = ?";
        $stmt = $this->conn->prepare($sql_cart);
        $stmt->bindParam(1, $cart_id);
        return $stmt->execute();
    }
}

