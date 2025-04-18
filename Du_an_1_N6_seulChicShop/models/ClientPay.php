<?php
class ClientPay
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy phương thức thanh toán
    public function getPayMethod()
    {
        try {
            $sql = "SELECT * FROM phuong_thuc_thanh_toans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getPayMethod: " . $e->getMessage());
            return false;
        }
    }

    public function getCouponByIdUser($tai_khoan_id){
        try {
            $currentDate = date('Y-m-d H:i:s');
            $sql = "SELECT * FROM ma_giam_gias 
                    WHERE tai_khoan_id = :tai_khoan_id 
                    AND ngay_bat_dau <= :current_date 
                    AND ngay_ket_thuc >= :current_date 
                    AND trang_thai = 1 
                    AND so_lan_su_dung > so_lan_da_dung";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id);
            $stmt->bindParam(':current_date', $currentDate);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getCouponByIdUser: " . $e->getMessage());
            return false;
        }
    }

    // Thêm đơn hàng mới
    public function createOrder($ma_don_hang, $tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $tinh_thanhpho, $huyen_quan, $xa_phuong, $dia_chi_cu_the, $ghi_chu, $tong_tien, $ngay_dat, $phuong_thuc_thanh_toan_id, $trang_thai_don_hang_id, $ma_giam_gia_id = null, $tien_giam = 0)
    {
        try {
            $this->conn->beginTransaction();

            // Kiểm tra tồn tại của các khóa ngoại
            if ($tai_khoan_id) {
                $check_sql = "SELECT id FROM tai_khoans WHERE id = :tai_khoan_id";
                $check_stmt = $this->conn->prepare($check_sql);
                $check_stmt->bindParam(':tai_khoan_id', $tai_khoan_id);
                $check_stmt->execute();
                if (!$check_stmt->fetch()) {
                    throw new PDOException("Tài khoản không tồn tại");
                }
            }

            // Insert đơn hàng
            $sql = "INSERT INTO don_hangs (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, tinh_thanhpho, huyen_quan, xa_phuong, dia_chi_cu_the, ghi_chu, tong_tien, ngay_dat, phuong_thuc_thanh_toan_id, trang_thai_don_hang_id, ma_giam_gia_id, tien_giam) 
                   VALUES (:ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :tinh_thanhpho, :huyen_quan, :xa_phuong, :dia_chi_cu_the, :ghi_chu, :tong_tien, :ngay_dat, :phuong_thuc_thanh_toan_id, :trang_thai_don_hang_id, :ma_giam_gia_id, :tien_giam)";
            
            $stmt = $this->conn->prepare($sql);

            // Bind các tham số
            $stmt->bindParam(':ma_don_hang', $ma_don_hang);
            $stmt->bindParam(':tai_khoan_id', $tai_khoan_id);
            $stmt->bindParam(':ten_nguoi_nhan', $ten_nguoi_nhan);
            $stmt->bindParam(':email_nguoi_nhan', $email_nguoi_nhan);
            $stmt->bindParam(':sdt_nguoi_nhan', $sdt_nguoi_nhan);
            $stmt->bindParam(':tinh_thanhpho', $tinh_thanhpho);
            $stmt->bindParam(':huyen_quan', $huyen_quan);
            $stmt->bindParam(':xa_phuong', $xa_phuong);
            $stmt->bindParam(':dia_chi_cu_the', $dia_chi_cu_the);
            $stmt->bindParam(':ghi_chu', $ghi_chu);
            $stmt->bindParam(':tong_tien', $tong_tien);
            $stmt->bindParam(':ngay_dat', $ngay_dat);
            $stmt->bindParam(':phuong_thuc_thanh_toan_id', $phuong_thuc_thanh_toan_id);
            $stmt->bindParam(':trang_thai_don_hang_id', $trang_thai_don_hang_id);
            $stmt->bindParam(':ma_giam_gia_id', $ma_giam_gia_id, PDO::PARAM_INT);
            $stmt->bindParam(':tien_giam', $tien_giam);

            if (!$stmt->execute()) {
                throw new PDOException("Không thể thêm đơn hàng");
            }

            $don_hang_id = $this->conn->lastInsertId();

            // Cập nhật số lần sử dụng mã giảm giá nếu có
            if ($ma_giam_gia_id) {
                $update_sql = "UPDATE ma_giam_gias 
                             SET so_lan_da_dung = so_lan_da_dung + 1 
                             WHERE id = :ma_giam_gia_id";
                $update_stmt = $this->conn->prepare($update_sql);
                $update_stmt->bindParam(':ma_giam_gia_id', $ma_giam_gia_id);
                if (!$update_stmt->execute()) {
                    throw new PDOException("Không thể cập nhật số lần sử dụng mã giảm giá");
                }
            }

            $this->conn->commit();
            return $don_hang_id;

        } catch (PDOException $e) {
            $this->conn->rollBack();
            error_log("Lỗi createOrder: " . $e->getMessage());
            throw $e;
        }
    }

    public function createOrderDetail($don_hang_id, $san_pham_ids, $bien_the_san_pham_ids, $so_luongs, $thanh_tiens) 
    {
        try {
            $this->conn->beginTransaction();

            // Kiểm tra tồn tại của đơn hàng
            $check_sql = "SELECT id FROM don_hangs WHERE id = :don_hang_id";
            $check_stmt = $this->conn->prepare($check_sql);
            $check_stmt->bindParam(':don_hang_id', $don_hang_id);
            $check_stmt->execute();
            if (!$check_stmt->fetch()) {
                throw new PDOException("Đơn hàng không tồn tại");
            }

            $sql = "INSERT INTO chi_tiet_don_hangs(don_hang_id, san_pham_id, bien_the_san_pham_id, so_luong, thanh_tien)
                    VALUES (:don_hang_id, :san_pham_id, :bien_the_san_pham_id, :so_luong, :thanh_tien)";
            
            $stmt = $this->conn->prepare($sql);

            // Convert single values to arrays if needed
            if (!is_array($san_pham_ids)) {
                $san_pham_ids = [$san_pham_ids];
                $bien_the_san_pham_ids = [$bien_the_san_pham_ids];
                $so_luongs = [$so_luongs];
                $thanh_tiens = [$thanh_tiens];
            }
            
            // Thêm chi tiết đơn hàng và cập nhật số lượng cho từng sản phẩm
            for ($i = 0; $i < count($san_pham_ids); $i++) {
                // Kiểm tra số lượng tồn kho trước khi thêm
                if ($bien_the_san_pham_ids[$i]) {
                    $check_stock_sql = "SELECT so_luong FROM bien_the_san_phams WHERE id = :id";
                    $check_stock_stmt = $this->conn->prepare($check_stock_sql);
                    $check_stock_stmt->bindParam(':id', $bien_the_san_pham_ids[$i]);
                    $check_stock_stmt->execute();
                    $current_stock = $check_stock_stmt->fetchColumn();
                    
                    if ($current_stock < $so_luongs[$i]) {
                        throw new PDOException("Không đủ số lượng cho biến thể sản phẩm");
                    }
                } else {
                    $check_stock_sql = "SELECT so_luong FROM san_phams WHERE id = :id";
                    $check_stock_stmt = $this->conn->prepare($check_stock_sql);
                    $check_stock_stmt->bindParam(':id', $san_pham_ids[$i]);
                    $check_stock_stmt->execute();
                    $current_stock = $check_stock_stmt->fetchColumn();
                    
                    if ($current_stock < $so_luongs[$i]) {
                        throw new PDOException("Không đủ số lượng sản phẩm");
                    }
                }

                // Thêm chi tiết đơn hàng
                $stmt->bindParam(':don_hang_id', $don_hang_id);
                $stmt->bindParam(':san_pham_id', $san_pham_ids[$i]);
                $stmt->bindParam(':bien_the_san_pham_id', $bien_the_san_pham_ids[$i], PDO::PARAM_INT);
                $stmt->bindParam(':so_luong', $so_luongs[$i]);
                $stmt->bindParam(':thanh_tien', $thanh_tiens[$i]);
                
                if (!$stmt->execute()) {
                    throw new PDOException("Không thể thêm chi tiết đơn hàng cho sản phẩm thứ " . ($i + 1));
                }

                // Cập nhật số lượng trong bảng bien_the_san_phams
                if ($bien_the_san_pham_ids[$i]) {
                    $update_sql = "UPDATE bien_the_san_phams 
                                 SET so_luong = so_luong - :so_luong_giam
                                 WHERE id = :bien_the_id";
                    $update_stmt = $this->conn->prepare($update_sql);
                    $update_stmt->bindParam(':so_luong_giam', $so_luongs[$i]);
                    $update_stmt->bindParam(':bien_the_id', $bien_the_san_pham_ids[$i]);
                    
                    if (!$update_stmt->execute()) {
                        throw new PDOException("Không thể cập nhật số lượng cho biến thể sản phẩm thứ " . ($i + 1));
                    }
                } else {
                    // Nếu không có biến thể, cập nhật số lượng trong bảng san_phams
                    $update_sql = "UPDATE san_phams 
                                 SET so_luong = so_luong - :so_luong_giam
                                 WHERE id = :san_pham_id";
                    $update_stmt = $this->conn->prepare($update_sql);
                    $update_stmt->bindParam(':so_luong_giam', $so_luongs[$i]);
                    $update_stmt->bindParam(':san_pham_id', $san_pham_ids[$i]);
                    
                    if (!$update_stmt->execute()) {
                        throw new PDOException("Không thể cập nhật số lượng cho sản phẩm thứ " . ($i + 1));
                    }
                }
            }

            $this->conn->commit();
            return true;

        } catch (PDOException $e) {
            $this->conn->rollBack(); 
            error_log("Lỗi createOrderDetail: " . $e->getMessage());
            throw $e;
        }
    }

    // Lấy chi tiết đơn hàng theo ID
    public function getOrderDetail($don_hang_id)
    {
        try {
            $sql = "SELECT ctdh.*,
                    sp.ten_san_pham,
                    sp.hinh_anh as hinh_anh_sp,
                    btsp.mau_sac,
                    btsp.kich_thuoc,
                    COALESCE(btsp.gia, sp.gia) AS gia,
                    COALESCE(btsp.gia_khuyen_mai, sp.gia_khuyen_mai) AS gia_khuyen_mai,
                    COALESCE(hasp.hinh_anh_bien_the, sp.hinh_anh) AS hinh_anh
                    FROM chi_tiet_don_hangs ctdh
                    JOIN san_phams sp ON ctdh.san_pham_id = sp.id
                    LEFT JOIN bien_the_san_phams btsp ON ctdh.bien_the_san_pham_id = btsp.id
                    LEFT JOIN hinh_anh_san_phams hasp ON btsp.id = hasp.bien_the_san_pham_id
                    WHERE ctdh.don_hang_id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $don_hang_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getOrderDetail: " . $e->getMessage());
            return false;
        }
    }

    // Lấy thông tin đơn hàng theo ID
    public function getOrderById($don_hang_id)
    {
        try {
            $sql = "SELECT dh.*, pttt.ten_phuong_thuc, ttdh.ten_trang_thai
                    FROM don_hangs dh
                    JOIN phuong_thuc_thanh_toans pttt ON dh.phuong_thuc_thanh_toan_id = pttt.id
                    JOIN trang_thai_don_hangs ttdh ON dh.trang_thai_don_hang_id = ttdh.id
                    WHERE dh.id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $don_hang_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getOrderById: " . $e->getMessage());
            return false;
        }
    }
}
