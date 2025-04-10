<?php

class ClientPostsController
{
    public $ModelClientPosts;
    public function __construct()
    {
        $this->ModelClientPosts = new ClientPosts();
    }

    // Hiển thị danh sách bài viết
    public function listPosts()
    {
        try {
            // Lấy tất cả bài viết từ model
            $PostsProduct = $this->ModelClientPosts->getAllPosts();

            
            if ($PostsProduct === false) {
                throw new Exception("Không thể lấy dữ liệu bài viết");
            }

            // Truyền dữ liệu sang view để hiển thị
            require_once './views/Blog.php';

        } catch (Exception $e) {
            error_log($e->getMessage());
            // Nếu có lỗi thì trả về mảng rỗng
            $PostsProduct = [];
            require_once './views/Blog.php';
        }
    }

    // Hiển thị chi tiết bài viết
    public function detailPosts()
    {
        try {
            // Lấy id bài viết từ URL
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            
            if (!$id) {
                throw new Exception("Không tìm thấy ID bài viết");
            }

            // Lấy thông tin chi tiết bài viết
            $blog = $this->ModelClientPosts->getPostsById($id);

            if ($blog === false) {
                throw new Exception("Không thể lấy chi tiết bài viết");
            }

            // Nếu không tìm thấy bài viết, chuyển hướng về trang blog
            if (!$blog) {
                $_SESSION['error'] = "Không tìm thấy bài viết";
                header("Location: " . BASE_URL . "?act=blog");
                exit();
            }

            // Hiển thị view chi tiết bài viết
            require_once './views/BlogDetail.php';

        } catch (Exception $e) {
            error_log($e->getMessage());
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
            header("Location: " . BASE_URL . "?act=blog");
            exit();
        }
    }
}