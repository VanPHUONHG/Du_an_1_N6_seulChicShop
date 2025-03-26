<?php
class ClientPay{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}
