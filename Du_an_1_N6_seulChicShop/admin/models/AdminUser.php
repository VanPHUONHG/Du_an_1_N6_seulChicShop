<?php
class AdminUser
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getUserOrder()
    {
        try {
            $sql = "SELECT * FROM tai_khoans";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function getAllAdminUser()
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function getAdminUserById($id_tai_khoan_admin)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_tai_khoan_admin);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Throwable $th) {
            echo "Lỗi Truy Vấn:" . $th->getMessage();
        }
    }
    public function deleteUserAdmin($id)
    {
        try {
            $sql = "DELETE FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function addUserAdmin($ten_tai_khoan, $email, $mat_khau, $anh_dai_dien, $so_dien_thoai, $chuc_vu_id)
    {
        try {
            $ngay_tao = date('Y-m-d H:i:s'); //

            $sql = "INSERT INTO tai_khoans(ten_tai_khoan, email, mat_khau, anh_dai_dien, so_dien_thoai, ngay_tao, chuc_vu_id) 
                VALUES(:ten_tai_khoan, :email, :mat_khau, :anh_dai_dien, :so_dien_thoai, :ngay_tao, :chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_tai_khoan', $ten_tai_khoan);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }
    public function editUserAdmin($id_tai_khoan_admin, $ten_tai_khoan, $email, $mat_khau, $anh_dai_dien, $so_dien_thoai)
    {
        try {
            $sql = "UPDATE tai_khoans SET 
                ten_tai_khoan = :ten_tai_khoan,
                email = :email,
                mat_khau = :mat_khau, 
                anh_dai_dien = :anh_dai_dien,
                so_dien_thoai = :so_dien_thoai
                WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_tai_khoan_admin);
            $stmt->bindParam(':ten_tai_khoan', $ten_tai_khoan);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);

            $result = $stmt->execute();

            if ($result) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("Database error: " . print_r($errorInfo, true));
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception in editUserAdmin: " . $e->getMessage());
            return false;
        }
    }

    public function getUserClient()
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = 2";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function getUserClentById($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans 
            WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo '' . $e->getMessage();
        }
    }
}
