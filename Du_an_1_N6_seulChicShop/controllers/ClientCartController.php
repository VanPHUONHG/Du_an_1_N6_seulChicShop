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
            if(isset($_SESSION['user_client'])){
                // Lấy tài khoản bằng tên tài khoản
                $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
                // Lấy giỏ hàng bằng id tài khoản
                $cart = $this->ModelClientCart->getCartByUserId($user['id']);
            }else{

            }
            $san_pham_id = $_POST['san_pham_id'];   
            $so_luong = $_POST['so_luong'];
            // Lấy dữ liệu
        }
    }
    
    
}