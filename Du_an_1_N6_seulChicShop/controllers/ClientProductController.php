<?php
class ClientProductController
{
    public $ModelClientProduct;
    public $ModelClientUser;
    public $ModelClientPay;
    public $ModelClientCart;
    public function __construct()
    {
        $this->ModelClientProduct = new ClientProduct();
        $this->ModelClientUser = new ClientUser();
        $this->ModelClientPay = new ClientPay();
        $this->ModelClientCart = new ClientCart();
    }
    public function listProduct()
    {
        $id_danh_muc = $_GET['id_danh_muc'] ?? null;
        $categories = $this->ModelClientProduct->getCategory();
        
        if ($id_danh_muc) {
            $products = $this->ModelClientProduct->getProductByCategory($id_danh_muc);
        } else {
            $products = $this->ModelClientProduct->getAllProduct();
        }

        require_once './views/listProduct.php';
    }
    public function detailProduct(){
        $id = $_GET['id'];;
        $Product = $this->ModelClientProduct->getProductById($id);
        $listVariant = $this->ModelClientProduct->getProductVariantById($id);
        // $listComment = $this->ModelClientProduct->getCommentFromProduct($id);
        require_once './views/DetailProduct.php';
    }
}
