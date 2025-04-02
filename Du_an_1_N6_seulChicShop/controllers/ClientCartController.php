<?php

class ClientCartController
{
    public $ModelClientUser;
    public $ModelClientCart;
    public function __construct(){
        $this->ModelClientUser = new ClientUser();
        $this->ModelClientCart = new ClientCart();
    }
    public function addProductCart(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Check if user is logged in
            if(!isset($_SESSION['user_client'])){
                $_SESSION['error'] = "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.";
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit;
            }

            // Get user and cart info
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            $cart = $this->ModelClientCart->getCartFromUser($user['id']);

            // Create new cart if user doesn't have one
            if(!$cart){
                $cartId = $this->ModelClientCart->addCart($user['id']);
                $cart = ['id' => $cartId];
                $detailCart = [];
            } else {
                $detailCart = $this->ModelClientCart->getDetailCart($cart['id']);
            }

            // Get product details from POST
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
            $bien_the_san_pham_id = isset($_POST['bien_the_san_pham_id']) ? $_POST['bien_the_san_pham_id'] : null;

            // Check if product already exists in cart
            $productExists = false;
            foreach($detailCart as $item){
                if($item['san_pham_id'] == $san_pham_id && $item['bien_the_san_pham_id'] == $bien_the_san_pham_id){
                    // Update quantity if product exists
                    $newQuantity = $item['so_luong'] + $so_luong;
                    $this->ModelClientCart->updateQuantity($item['id'], $san_pham_id, $newQuantity);
                    $productExists = true;
                    break;
                }
            }

            // Add new product if it doesn't exist
            if(!$productExists){
                $this->ModelClientCart->addDetailCart($cart['id'], $san_pham_id, $bien_the_san_pham_id, $so_luong);
            }

            header('Location: ' . BASE_URL . '?act=gio-hang');
            exit;
        }
    }
    public function updateQuantity(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_SESSION['user_client'])){
                $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
                $cart = $this->ModelClientCart->getCartFromUser($user['id']);

                if(isset($_POST['quantity']) && isset($_POST['san_pham_id'])){
                    foreach($_POST['quantity'] as $id => $so_luong){
                        $san_pham_id = $_POST['san_pham_id'][$id];
                        
                        // Validate quantity to ensure it's a positive number
                        if($so_luong > 0){
                            // Update quantity
                            if($this->ModelClientCart->updateQuantity($id, $san_pham_id, $so_luong)){
                                $_SESSION['success'] = "Cập nhật số lượng thành công.";
                            } else {
                                $_SESSION['error_message'] = "Không thể cập nhật số lượng sản phẩm.";
                            }
                        } else {
                            $_SESSION['error_message'] = "Số lượng phải lớn hơn 0.";
                        }
                    }
                    header('Location: ' . BASE_URL . '?act=gio-hang');
                    exit;
                }
            } else {
                $_SESSION['error_message'] = "Vui lòng đăng nhập để cập nhật giỏ hàng.";
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit;
            }
        }
    }
    public function listCart(){
        if(isset($_SESSION['user_client'])){
            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            $cart = $this->ModelClientCart->getCartFromUser($user['id']);
            if(!$cart){
                $cartId = $this->ModelClientCart->addCart($user['id']);
                $cart = ['id' => $cartId];
                $detailCart = $this->ModelClientCart->getDetailCart($cart['id']);
            } else {
                $detailCart = $this->ModelClientCart->getDetailCart($cart['id']);
            }
            require_once './views/Cart.php';
        } else {
            $_SESSION['error_message'] = "Vui lòng đăng nhập để xem giỏ hàng của bạn.";
            header('Location: ' . BASE_URL . '?act=dang-nhap');
            exit;
        }
    }
    public function deleteDetailCart(){
        if(isset($_SESSION['user_client'])){
            $id = $_GET['id'];
            $this->ModelClientCart->deleteDetailCart($id);
            header('Location: ' . BASE_URL . '?act=gio-hang');
            exit;
        } else {
            $_SESSION['error_message'] = "Vui lòng đăng nhập để thực hiện thao tác này.";
            header('Location: ' . BASE_URL . '?act=dang-nhap');
            exit;
        }
    }
}