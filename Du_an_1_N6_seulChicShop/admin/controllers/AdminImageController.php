<?php

class AdminImageController
{
    public $ModelAdminImage;
    public function __construct()
    {
        $this->ModelAdminImage = new AdminImage();
    }
    public function listImage()
    {
        $imageProduct = $this->ModelAdminImage->getAllImageProduct();
        $imageAccount = $this->ModelAdminImage->getAllImageAccount();

        require_once './views/image/ListImage.php';
    }
}