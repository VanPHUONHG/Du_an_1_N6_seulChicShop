<?php
// ipn.php - nhận callback từ MoMo

$secretKey = "K951B6PE1waDMi640xX08PD3vg6EkVlz"; // giống với bên tạo thanh toán

$data = json_decode(file_get_contents("php://input"), true);

// Tạo signature từ dữ liệu nhận được để xác thực
$rawHash = "accessKey={$data['accessKey']}&amount={$data['amount']}&extraData={$data['extraData']}&message={$data['message']}&orderId={$data['orderId']}&orderInfo={$data['orderInfo']}&orderType={$data['orderType']}&partnerCode={$data['partnerCode']}&payType={$data['payType']}&requestId={$data['requestId']}&responseTime={$data['responseTime']}&resultCode={$data['resultCode']}&transId={$data['transId']}";
$signature = hash_hmac("sha256", $rawHash, $secretKey);

// So sánh chữ ký
if ($signature === $data['signature']) {
    if ($data['resultCode'] == 0) {
        // Thành công
        // Nếu có DB: cập nhật trạng thái đơn hàng tại đây
        http_response_code(200);
        echo "Success";
    } else {
        // Giao dịch thất bại
        http_response_code(200);
        echo "Failed";
    }
} else {
    // Chữ ký không hợp lệ
    http_response_code(400);
    echo "Invalid signature";
}
