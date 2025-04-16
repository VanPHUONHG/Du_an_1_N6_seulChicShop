<?php

class ClientPostsController
{
    public $ModelClientPosts;

    public function __construct()
    {
        $this->ModelClientPosts = new ClientPosts();
    }

    // Trang chủ - Hiển thị bài viết mới nhất (3 bài viết)
    public function homePosts()
    {
        try {
            // Lấy tất cả bài viết
            $allPosts = $this->ModelClientPosts->getAllPosts();

            // Nếu có dữ liệu, chỉ lấy 3 bài đầu tiên
            $PostsProduct = $allPosts ? array_slice($allPosts, 0, 3) : [];

            require_once './views/Home.php';

        } catch (Exception $e) {
            error_log($e->getMessage());
            $PostsProduct = [];
            require_once './views/Home.php';
        }
    }

    // Trang Blog - Danh sách đầy đủ bài viết
    public function listPosts()
    {
        try {
            $PostsProduct = $this->ModelClientPosts->getAllPosts();
            $PostsProduct = $PostsProduct ?: [];

            require_once './views/Blog.php';

        } catch (Exception $e) {
            error_log($e->getMessage());
            $PostsProduct = [];
            require_once './views/Blog.php';
        }
    }

    // Trang Chi tiết bài viết
    public function detailPosts()
    {
        try {
            $id = $_GET['id'] ?? null;

            if (!$id) {
                throw new Exception("Không tìm thấy ID bài viết");
            }

            $blog = $this->ModelClientPosts->getPostsById($id);

            if ($blog === false || !$blog) {
                $_SESSION['error'] = "Không tìm thấy bài viết";
                header("Location: " . BASE_URL . "?act=blog");
                exit();
            }

            require_once './views/BlogDetail.php';

        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
            header("Location: " . BASE_URL . "?act=blog");
            exit();
        }
    }
}
