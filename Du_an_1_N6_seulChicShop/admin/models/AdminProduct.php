<?php
class AdminProduct
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllProduct()
    {
        try {
            $sql = 'SELECT 
                san_phams.id,
                san_phams.ten_san_pham,
                danh_mucs.ten_danh_muc,
                COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_san_pham_khuyen_mai,
                COALESCE(bien_the_san_phams.so_luong, san_phams.so_luong) AS so_luong,
                COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh,
                san_phams.luot_xem,
                san_phams.ngay_nhap,
                san_phams.mo_ta,
                san_phams.danh_muc_id,
                san_phams.trang_thai
                FROM san_phams
                LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id 
                    AND bien_the_san_phams.id = (
                        SELECT MIN(id) 
                        FROM bien_the_san_phams 
                        WHERE san_pham_id = san_phams.id
                    )
                LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                WHERE san_phams.trang_thai = 1';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
        }
    }
    


    public function deleteProduct($id)
    {
        try {
            $sql = 'DELETE FROM san_phams WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
            return false;
        }
    }

    public function deleteProductVariant($id)
    {
        try {
            $sql = 'DELETE FROM bien_the_san_phams WHERE id = :id';
            $sql1 = 'DELETE FROM hinh_anh_san_phams WHERE bien_the_san_pham_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt1 = $this->conn->prepare($sql1);
            $stmt1->bindParam(':id', $id);
            $stmt1->execute();
            return true;
        } catch (Exception $e) {
            echo "loi" . $e->getMessage();
            return false;
        }
    }

    public function getProductById($id)
    {
        try {
            $sql = 'SELECT 
                san_phams.*,
                danh_mucs.ten_danh_muc,
                bien_the_san_phams.id AS bien_the_id,
                COALESCE(bien_the_san_phams.mau_sac, "") AS mau_sac,
                COALESCE(bien_the_san_phams.kich_thuoc, "") AS kich_thuoc,
                COALESCE(bien_the_san_phams.gia, san_phams.gia_san_pham) AS gia_san_pham,
                COALESCE(bien_the_san_phams.gia_khuyen_mai, san_phams.gia_san_pham_khuyen_mai) AS gia_khuyen_mai,
                COALESCE(bien_the_san_phams.so_luong, san_phams.so_luong) AS so_luong,
                COALESCE(hinh_anh_san_phams.hinh_anh_bien_the, san_phams.hinh_anh) AS hinh_anh
            FROM san_phams 
            LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            LEFT JOIN bien_the_san_phams ON san_phams.id = bien_the_san_phams.san_pham_id
            LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
            WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    

    public function insertProduct($ten_san_pham, $gia_san_pham, $gia_san_pham_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {

            // Insert main product
            $sql = 'INSERT INTO san_phams (ten_san_pham, gia_san_pham, gia_san_pham_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh_anh)
                VALUES (:ten_san_pham, :gia_san_pham, :gia_san_pham_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':gia_san_pham', $gia_san_pham, PDO::PARAM_INT);
            $stmt->bindParam(':gia_san_pham_khuyen_mai', $gia_san_pham_khuyen_mai, PDO::PARAM_INT);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':hinh_anh', $hinh_anh);

            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }

    public function insertProductVariant($san_pham_id, $mau_sac, $kich_thuoc, $gia, $gia_khuyen_mai, $so_luong, $hinh_anh_bien_the)
    {
        try {
            $sql = "INSERT INTO bien_the_san_phams(san_pham_id, mau_sac, kich_thuoc, gia, gia_khuyen_mai, so_luong)
                    VALUES (:san_pham_id, :mau_sac, :kich_thuoc, :gia, :gia_khuyen_mai, :so_luong)";
            $sql1 = "INSERT INTO hinh_anh_san_phams(bien_the_san_pham_id, hinh_anh_bien_the)
                    VALUES (:bien_the_san_pham_id, :hinh_anh_bien_the)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id);
            $stmt->bindParam(':mau_sac', $mau_sac);
            $stmt->bindParam(':kich_thuoc', $kich_thuoc);
            $stmt->bindParam(':gia', $gia);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->execute();

            $bien_the_id = $this->conn->lastInsertId();
            $stmt1 = $this->conn->prepare($sql1);

            $stmt1->bindParam(':bien_the_san_pham_id', $bien_the_id);
            $stmt1->bindParam(':hinh_anh_bien_the', $hinh_anh_bien_the);
            $stmt1->execute();
            return $bien_the_id;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }

    public function updateProduct($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_san_pham_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'UPDATE san_phams SET 
                        ten_san_pham = :ten_san_pham,
                        gia_san_pham = :gia_san_pham,
                        gia_san_pham_khuyen_mai = :gia_san_pham_khuyen_mai,
                        so_luong = :so_luong,
                        ngay_nhap = :ngay_nhap,
                        danh_muc_id = :danh_muc_id,
                        trang_thai = :trang_thai,
                        mo_ta = :mo_ta,
                        hinh_anh = :hinh_anh
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_san_pham_khuyen_mai' => $gia_san_pham_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh,
                ':id' => $san_pham_id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }

    public function getProductVariantById($id)
    {
        try {
            $sql = "SELECT bien_the_san_phams.*, hinh_anh_san_phams.hinh_anh_bien_the, san_phams.ten_san_pham,san_phams.id as san_pham_id
                    FROM bien_the_san_phams
                    LEFT JOIN hinh_anh_san_phams ON bien_the_san_phams.id = hinh_anh_san_phams.bien_the_san_pham_id
                    LEFT JOIN san_phams ON bien_the_san_phams.san_pham_id = san_phams.id
                    WHERE bien_the_san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                return false;
            }
            return $result;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }

    public function editProductVariant($bien_the_id, $mau_sac, $kich_thuoc, $gia, $gia_khuyen_mai, $so_luong, $hinh_anh_bien_the)
    {
        try {
            $sql = "UPDATE bien_the_san_phams 
            SET mau_sac = :mau_sac,
                kich_thuoc = :kich_thuoc,
                gia = :gia,
                gia_khuyen_mai = :gia_khuyen_mai,
                so_luong = :so_luong
            WHERE id = :bien_the_id";
            $sql1 = "UPDATE hinh_anh_san_phams 
            SET hinh_anh_bien_the = :hinh_anh_bien_the 
            WHERE bien_the_san_pham_id = :bien_the_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':mau_sac', $mau_sac);
            $stmt->bindParam(':kich_thuoc', $kich_thuoc);
            $stmt->bindParam(':gia', $gia);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':bien_the_id', $bien_the_id);
            $stmt->execute();
            $stmt1 = $this->conn->prepare($sql1);
            $stmt1->bindParam(':hinh_anh_bien_the', $hinh_anh_bien_the);
            $stmt1->bindParam(':bien_the_id', $bien_the_id);
            $stmt1->execute();
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }
}
