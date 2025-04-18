<?php
class MomoConfig {
    const PARTNER_CODE = "YOUR_PARTNER_CODE"; // Mã đối tác MOMO cấp
    const ACCESS_KEY = "YOUR_ACCESS_KEY"; // Access key MOMO cấp
    const SECRET_KEY = "YOUR_SECRET_KEY"; // Secret key MOMO cấp
    const API_ENDPOINT = "https://test-payment.momo.vn/v2/gateway/api/create"; // URL test, khi lên production thì đổi
    const RETURN_URL = BASE_URL . "?act=xu-ly-thanh-toan-momo"; // URL xử lý kết quả
    const NOTIFY_URL = BASE_URL . "?act=thong-bao-momo"; // URL nhận thông báo
    const REQUEST_TYPE = "captureWallet";
} 