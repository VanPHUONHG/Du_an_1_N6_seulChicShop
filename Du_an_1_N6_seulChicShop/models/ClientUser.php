<?php
class ClientUser
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function postSignIn($ten_tai_khoan, $mat_khau)
    {
        try {
            // Validate input dang nhap
            if (empty($ten_tai_khoan) || empty($mat_khau)) {
                return "Vui lòng nhập đầy đủ thông tin";
            }

            $sql = "SELECT * FROM tai_khoans WHERE ten_tai_khoan = :ten_tai_khoan";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_tai_khoan' => $ten_tai_khoan
            ]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return "Tài khoản không tồn tại";
            }

            if ($mat_khau != $user['mat_khau']) {
                return "Mật khẩu không chính xác";
            }

            if ($user['chuc_vu_id'] != 2) {
                return "Tài khoản không có quyền truy cập";
            }

            if ($user['trang_thai'] != 1) {
                return "Tài khoản đã bị khóa";
            }

            // Dang nhap thanh cong
            $_SESSION['tai_khoan_id'] = $user['id'];
            $_SESSION['user_client'] = $user;
            return $user['ten_tai_khoan'];
        } catch (PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            return "Có lỗi xảy ra, vui lòng thử lại sau";
        }
    }
    public function addUserClient($ten_tai_khoan, $email, $mat_khau, $so_dien_thoai, $chuc_vu_id, $trang_thai)
    {
        try {
            // Validate input dang ky
            if (empty($ten_tai_khoan) || empty($email) || empty($mat_khau) || empty($so_dien_thoai)) {
                return "Vui lòng nhập đầy đủ thông tin";
            }

            // kiem tra ten tai khoan da ton tai chua
            $check_sql = "SELECT COUNT(*) FROM tai_khoans WHERE ten_tai_khoan = :ten_tai_khoan";
            $check_stmt = $this->conn->prepare($check_sql);
            $check_stmt->execute([':ten_tai_khoan' => $ten_tai_khoan]);
            if ($check_stmt->fetchColumn() > 0) {
                return "Tên tài khoản đã tồn tại";
            }

            // kiem tra email da ton tai chua
            $check_sql = "SELECT COUNT(*) FROM tai_khoans WHERE email = :email";
            $check_stmt = $this->conn->prepare($check_sql);
            $check_stmt->execute([':email' => $email]);
            if ($check_stmt->fetchColumn() > 0) {
                return "Email đã tồn tại";
            }

            $ngay_tao = date('Y-m-d H:i:s');


            $sql = "INSERT INTO tai_khoans(ten_tai_khoan, email, mat_khau, so_dien_thoai, ngay_tao, chuc_vu_id, trang_thai) 
                    VALUES(:ten_tai_khoan, :email, :mat_khau, :so_dien_thoai, :ngay_tao, :chuc_vu_id, :trang_thai)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_tai_khoan' => $ten_tai_khoan,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_tao' => $ngay_tao,
                ':chuc_vu_id' => $chuc_vu_id,
                ':trang_thai' => $trang_thai
            ]);
            return true;
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }
    
     // Thay Đổi thông tin cá nhân
    // public function getUserformEmail($email)
    // {
    //     try {
    //         // Sử dụng prepared statement với dấu :email
    //         $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
    //         $stmt = $this->conn->prepare($sql);
    //         // Thực thi câu lệnh và truyền tham số
    //         $stmt->execute([':email' => $email]);
    //         // Sử dụng fetch() để lấy một bản ghi duy nhất
    //         return $stmt->fetch();
    //     } catch (Exception $e) {
    //         echo "Lỗi Truy Vấn: " . $e->getMessage();
    //     }
    // }
    
    public function getAccountByNameUser($ten_tai_khoan)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE ten_tai_khoan = :ten_tai_khoan";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':ten_tai_khoan' => $ten_tai_khoan]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function updateUser($ten_tai_khoan, $email, $anh_dai_dien, $so_dien_thoai, $mat_khau)
    {
        try {
            $sql = 'UPDATE tai_khoans SET 
            email = :email,
            anh_dai_dien = :anh_dai_dien,
            so_dien_thoai = :so_dien_thoai,
            mat_khau = :mat_khau 
            WHERE ten_tai_khoan = :ten_tai_khoan';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':anh_dai_dien' => $anh_dai_dien,
                ':so_dien_thoai' => $so_dien_thoai,
                ':mat_khau' => $mat_khau,
                ':ten_tai_khoan' => $ten_tai_khoan
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
