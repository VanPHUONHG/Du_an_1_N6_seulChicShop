<?php

class AdminContact
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllContact()
    {
        try {
            $sql = "SELECT lien_hes.id, lien_hes.ho_ten, lien_hes.email, lien_hes.so_dien_thoai, lien_hes.tieu_de,
                lien_hes.noi_dung, lien_hes.thoi_gian_gui, lien_hes.trang_thai,
                tai_khoans.ten_tai_khoan
                FROM lien_hes AS lien_hes
                LEFT JOIN tai_khoans AS tai_khoans ON lien_hes.tai_khoan_id = tai_khoans.id
                ORDER BY lien_hes.thoi_gian_gui DESC;";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
    }
    public function getContactById($id)
    {
        try {
            $sql = "SELECT lien_hes.*, tai_khoans.ten_tai_khoan
                FROM lien_hes 
                LEFT JOIN tai_khoans ON lien_hes.tai_khoan_id = tai_khoans.id
                WHERE lien_hes.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
    public function updateContactStatus($contactId, $status)
    {
        try {
            $sql = "UPDATE lien_hes SET trang_thai = :status WHERE id = :contactId";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':contactId', $contactId);
            $stmt->bindParam(':status', $status);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
            return false;
        }
    }
}
