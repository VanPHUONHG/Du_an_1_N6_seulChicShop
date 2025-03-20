<?php
class HomeController
{
    public function index()
    {
        require_once './views/index.php';
    }
    public function listProduct()
    {
        require_once './views/listProduct.php';
    }
    public function contact()
    {
        require_once './views/Contact.php';
    }
    public function about()
    {
        require_once './views/About.php';
    }
    public function singleProduct()
    {
        require_once './views/SingleProduct.php';
    }
    public function blog()
    {
        require_once './views/Blog.php';
    }
    public function blogDetail()
    {
        require_once './views/BlogDetail.php';
    }
    public function cart()
    {
        require_once './views/Cart.php';
    }
}
