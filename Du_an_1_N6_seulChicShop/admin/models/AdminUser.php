<?php
class AdminUser
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function postSignInAdmin($ten_tai_khoan, $mat_khau)
    {
        try {
            // Validate input dang nhap
            if (empty($ten_tai_khoan) || empty($mat_khau)) {
                return "Vui lòng nhập đầy đủ thông tin";
            }

            $sql = "SELECT * FROM tai_khoans WHERE ten_tai_khoan = :ten_tai_khoan AND chuc_vu_id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_tai_khoan' => $ten_tai_khoan
            ]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return "Tài khoản không tồn tại hoặc không có quyền truy cập";
            }

            if ($mat_khau != $user['mat_khau']) {
                return "Mật khẩu không chính xác";
            }

            if ($user['trang_thai'] != 1) {
                return "Tài khoản đã bị khóa";
            }

            // Return user data on success
            return $user;
        } catch (PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            return "Có lỗi xảy ra, vui lòng thử lại sau";
        }
    }
    public function getUserOrder()
    {
        try {
            $sql = "SELECT * FROM tai_khoans
            WHERE trang_thai = 2";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function getAdminUserByUsername($ten_tai_khoan){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE ten_tai_khoan = :ten_tai_khoan";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_tai_khoan', $ten_tai_khoan);
            $stmt->execute();
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }
    public function getAllAdminUser() // lấy danh sách id
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
    public function getAdminUserById($id_tai_khoan_admin) // lấy danh sách id
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
    public function addUserAdmin($ten_tai_khoan, $email, $mat_khau, $anh_dai_dien, $so_dien_thoai, $chuc_vu_id) // thêm
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
    public function editUserAdmin($id_tai_khoan_admin, $ten_tai_khoan, $email, $mat_khau, $anh_dai_dien, $so_dien_thoai, $trang_thai)
    {
        try {
            $sql = "UPDATE tai_khoans SET 
                ten_tai_khoan = :ten_tai_khoan,
                email = :email,
                mat_khau = :mat_khau, 
                anh_dai_dien = :anh_dai_dien,
                so_dien_thoai = :so_dien_thoai,
                trang_thai = :trang_thai
                WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_tai_khoan_admin);
            $stmt->bindParam(':ten_tai_khoan', $ten_tai_khoan);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':trang_thai', $trang_thai);
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
    public function getUserClentById($id_tai_khoan_client)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans 
            WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_tai_khoan_client);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo '' . $e->getMessage();
        }
    }
    public function deleteUserClient($id)
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
    public function addUserClient($ten_tai_khoan, $email, $mat_khau, $anh_dai_dien, $ngay_tao, $so_dien_thoai, $chuc_vu_id, $trang_thai)
    {
        try {
            // Validate required fields
            if (empty($ten_tai_khoan) || empty($email) || empty($mat_khau)) {
                throw new Exception("Missing required fields");
            }

            $sql = "INSERT INTO tai_khoans(ten_tai_khoan, email, mat_khau, anh_dai_dien, so_dien_thoai, ngay_tao, chuc_vu_id, trang_thai) 
                VALUES(:ten_tai_khoan, :email, :mat_khau, :anh_dai_dien, :so_dien_thoai, :ngay_tao, :chuc_vu_id, :trang_thai)";
            
            $stmt = $this->conn->prepare($sql);
            
            $params = [
                ':ten_tai_khoan' => $ten_tai_khoan,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':anh_dai_dien' => $anh_dai_dien,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_tao' => $ngay_tao,
                ':chuc_vu_id' => $chuc_vu_id,
                ':trang_thai' => $trang_thai
            ];
            
            $result = $stmt->execute($params);

            if (!$result) {
                $errorInfo = $stmt->errorInfo();
                error_log("Database error in addUserClient: " . print_r($errorInfo, true));
                return false;
            }

            return true;

        } catch (Exception $e) {
            error_log("Error in addUserClient: " . $e->getMessage());
            return false;
        }
    }
    public function editUserClient($id_tai_khoan_client, $ten_tai_khoan, $email, $mat_khau, $anh_dai_dien, $so_dien_thoai, $trang_thai)
    {
        try {
            // Validate input parameters
            if (empty($id_tai_khoan_client) || empty($ten_tai_khoan) || empty($email)) {
                throw new Exception("Missing required parameters");
            }

            $sql = "UPDATE tai_khoans SET 
                ten_tai_khoan = :ten_tai_khoan,
                email = :email,
                mat_khau = :mat_khau,
                anh_dai_dien = :anh_dai_dien,
                so_dien_thoai = :so_dien_thoai,
                trang_thai = :trang_thai
                WHERE id = :id";
            
            $stmt = $this->conn->prepare($sql);
            
            $params = [
                ':id' => $id_tai_khoan_client,
                ':ten_tai_khoan' => $ten_tai_khoan,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':anh_dai_dien' => $anh_dai_dien,
                ':so_dien_thoai' => $so_dien_thoai,
                ':trang_thai' => $trang_thai
            ];
            
            $result = $stmt->execute($params);
            
            if (!$result) {
                error_log("Database error: " . print_r($stmt->errorInfo(), true));
                return false;
            }
            
            return true;
        } catch (Exception $e) {
            error_log("Error in editUserClient: " . $e->getMessage());
            return false;
        }
    }
}
