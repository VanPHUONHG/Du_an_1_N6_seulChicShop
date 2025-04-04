<?php

class ClientPostsController
{
    public $ModelClientPosts;
    
    public function __construct()
    {
        $this->ModelClientPosts = new ClientPosts();
    }

    public function listPosts()
    {
        // Lấy tất cả bài viết có trạng thái hiển thị
        $PostsProduct = $this->ModelClientPosts->getAllPosts();
        
        // Hiển thị view blog với dữ liệu bài viết
        require_once 'views/Blog.php';
    }

    public function postDetail()
    {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            // Lấy chi tiết bài viết theo id
            $post = $this->ModelClientPosts->getPostById($id);
            
            // Lấy các bài viết gần đây để hiển thị bên sidebar
            $recentPosts = $this->ModelClientPosts->getRecentPosts();
            
            // Hiển thị view chi tiết bài viết
            require_once 'views/BlogDetail.php';
        } else {
            header('Location: ' . BASE_URL . '?act=blog');
        }
    }
}
?>