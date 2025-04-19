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
    public function getCouponByUser($user_id){
        try {
            $sql = "SELECT * FROM ma_giam_gias 
                    WHERE tai_khoan_id = :user_id 
                    AND trang_thai = 1
                    AND ngay_bat_dau <= CURRENT_DATE()
                    AND ngay_ket_thuc >= CURRENT_DATE()
                    AND so_lan_da_dung < so_lan_su_dung
                    ORDER BY ngay_bat_dau DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getCouponByUser: " . $e->getMessage());
            return false;
        }
    }
    // Thêm đơn hàng mới
    public function createOrder($ma_don_hang, $tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $tinh_thanhpho, $huyen_quan, $xa_phuong, $dia_chi_cu_the, $ghi_chu, $tong_tien, $ngay_dat, $phuong_thuc_thanh_toan_id, $trang_thai_don_hang_id)
    {
        try {
            $this->conn->beginTransaction();

            // Insert đơn hàng
            $sql = "INSERT INTO don_hangs (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, tinh_thanhpho, huyen_quan, xa_phuong, dia_chi_cu_the, ghi_chu, tong_tien, ngay_dat, phuong_thuc_thanh_toan_id, trang_thai_don_hang_id) 
            VALUES (:ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :tinh_thanhpho, :huyen_quan, :xa_phuong, :dia_chi_cu_the, :ghi_chu, :tong_tien, :ngay_dat, :phuong_thuc_thanh_toan_id, :trang_thai_don_hang_id)";
            
            $stmt = $this->conn->prepare($sql);
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

            if (!$stmt->execute()) {
                throw new PDOException("Không thể thêm đơn hàng");
            }

            $don_hang_id = $this->conn->lastInsertId();
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
                // Thêm chi tiết đơn hàng
                $stmt->bindParam(':don_hang_id', $don_hang_id);
                $stmt->bindParam(':san_pham_id', $san_pham_ids[$i]);
                $stmt->bindParam(':bien_the_san_pham_id', $bien_the_san_pham_ids[$i]);
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

    // Thêm chi tiết đơn hàng

    // Lấy chi tiết đơn hàng theo ID
    public function getOrderDetail($don_hang_id)
    {
        try {
            $sql = "SELECT chi_tiet_don_hangs.*,
                    san_phams.ten_san_pham,
                    san_phams.hinh_anh,
                    bien_the_san_phams.mau_sac,
                    bien_the_san_phams.kich_thuoc,
                    COALESCE(bien_the_san_phams.gia, san_phams.gia) AS gia,
                    COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_khuyen_mai) AS gia_khuyen_mai,
                    COALESCE(san_phams.hinh_anh,hinh_anh_san_phams.hinh_anh_bien_the) AS hinh_anh
                    FROM chi_tiet_don_hangs
                    JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    JOIN bien_the_san_phams ON chi_tiet_don_hangs.bien_the_san_pham_id = bien_the_san_phams.id
                    JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                    WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id";
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
            $sql = "SELECT don_hangs.*, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_don_hangs.ten_trang_thai,
                    FROM don_hangs
                    JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    JOIN trang_thai_don_hangs ON don_hangs.trang_thai_don_hang_id = trang_thai_don_hangs.id
                    WHERE don_hangs.id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':don_hang_id', $don_hang_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Lỗi getOrderById: " . $e->getMessage());
            return false;
        }
    }
    public function payWithMomo($amount)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = "MOMO";
        $accessKey = "F8BBA842ECF85";
        $secretKey = "K951B6PE1waDMi640xX08PD3vg6EkVlz";

        $orderId = time() . "";
        $orderInfo = "Thanh toán đơn hàng qua MoMo";
        $redirectUrl = "http://localhost/thankyou.php";
        $ipnUrl = "http://localhost/ipn.php";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "captureWallet";

        $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$requestId&requestType=$requestType";
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
            'lang' => 'vi'
        );

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $result = curl_exec($ch);
        curl_close($ch);

        $jsonResult = json_decode($result, true);
        if (isset($jsonResult['payUrl'])) {
            header('Location: ' . $jsonResult['payUrl']);
            exit();
        } else {
            echo "Lỗi khi tạo thanh toán MoMo:";
            var_dump($jsonResult);
        }
    }
}
