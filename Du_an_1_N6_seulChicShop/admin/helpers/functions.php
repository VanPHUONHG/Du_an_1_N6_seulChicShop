function getStatusClass($status) {
    switch ($status) {
        case 'Chờ xác nhận':
            return 'primary';
        case 'Đã xác nhận':
        case 'Đang giao hàng':
            return 'warning';
        case 'Đã giao hàng':
            return 'success';
        case 'Đã hủy':
            return 'danger';
        default:
            return 'secondary';
    }
} 