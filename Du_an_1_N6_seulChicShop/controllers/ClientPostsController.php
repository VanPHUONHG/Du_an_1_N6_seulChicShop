<?php

class ClientPostsController
{
    public $ModelClientPosts;
    public $ModelClientProduct;
    public function __construct()
    {
        $this->ModelClientPosts = new ClientPosts();
        $this->ModelClientProduct = new ClientProduct();
    }

    // Hiển thị danh sách bài viết
    public function listPosts()
    {
        $posts = $this->ModelClientPosts->getAllPost();
        $category = $this->ModelClientProduct->getCategory();
        if ($posts === false) {
            $_SESSION['error'] = "Không thể lấy dữ liệu bài viết.";
            header("Location: " . BASE_URL . "?act=blog");
            exit();
        }
        require_once './views/Post.php';
    }

    // Hiển thị chi tiết bài viết
    public function detailPosts()
    {
        // Lấy id bài viết từ URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $_SESSION['error'] = "Không tìm thấy ID bài viết";
            header("Location: " . BASE_URL . "?act=blog");
            exit();
        }

        // Lấy thông tin chi tiết bài viết
        $blog = $this->ModelClientPosts->getPostsById($id);
        $category = $this->ModelClientProduct->getCategory();

        if ($blog === false) {
            $_SESSION['error'] = "Không thể lấy chi tiết bài viết";
            header("Location: " . BASE_URL . "?act=blog"); 
            exit();
        }

        if (!$blog) {
            $_SESSION['error'] = "Không tìm thấy bài viết";
            header("Location: " . BASE_URL . "?act=blog");
            exit();
        }

        // Lấy các bài viết mới nhất để hiển thị bên cạnh
        $recentPosts = $this->ModelClientPosts->getPostNew();

        // Hiển thị view chi tiết bài viết
        require_once './views/DetailPost.php';
    }
}