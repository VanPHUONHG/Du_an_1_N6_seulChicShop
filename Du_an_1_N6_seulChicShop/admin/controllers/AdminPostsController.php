<?php

class AdminPostsController
{
    public $ModelAdminPosts;
    public function __construct()
    {
        $this->ModelAdminPosts = new AdminPosts();
    }
    public function listPosts()
    {
        $PostsProduct = $this->ModelAdminPosts->getAllPosts();

        require_once './views/Posts/ListPosts.php';
    }
    public function detailPosts()
    {
        $id = $_GET['id'];
        $Posts = $this->ModelAdminPosts->getPostsById($id);
        require_once './views/Posts/DetaiPosts.php';
    }
    public function destroyPosts()
    {
        $id = $_GET['id'];
        $Posts = $this->ModelAdminPosts->deletePosts($id);
        if ($Posts) {
            deleteFile($Posts['image']);
            $this->ModelAdminPosts->deletePosts($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-Posts');
        exit();
    }
    public function formAddPosts()
    {
        require_once './views/Posts/AddPosts.php';
    }
    public function insertPosts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ngay_tao_bai_viet = date('Y-m-d H:i:s');
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $tieu_de = $_POST['tieu_de'] ?? '';
            $bai_viet = $_POST['bai_viet'] ?? '';
            $tac_gia = $_POST['tac_gia'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $file_thumb = uploadFile($hinh_anh, './uploads/');
            $errors = [];
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $this->ModelAdminPosts->addPosts(
                    $file_thumb,
                    $tieu_de,
                    $bai_viet,
                    $tac_gia,
                    $ngay_tao_bai_viet,
                    $trang_thai
                );
                header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-Posts');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=them-Posts');
                exit();
            }

        }
    }
    public function formEditPosts()
    {
        $id = $_GET['id'];
        $Posts = $this->ModelAdminPosts->getPostsById($id);
        require_once './views/Posts/EditPosts.php';
    }
    public function updatePosts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $PostsOld = $this->ModelAdminPosts->getPostsById($id);
            $old_file = $PostsOld['hinh_anh'];
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $tieu_de = $_POST['tieu_de'] ?? '';
            $bai_viet = $_POST['bai_viet'] ?? '';
            $tac_gia = $_POST['tac_gia'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];
            if (empty($tieu_de)) {
                $errors['tieu_de'] = 'Tiêu đề không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }
            
            $_SESSION['error'] = $errors;

            // Xử lý upload file mới nếu có
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './uploads/');
                if ($new_file && !empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file; // Giữ nguyên file cũ nếu không upload file mới
            }

            if (empty($errors)) {
                $result = $this->ModelAdminPosts->editPosts(
                    $id,
                    $new_file, // Sử dụng đường dẫn file mới hoặc file cũ
                    $tieu_de,
                    $bai_viet, 
                    $tac_gia,
                    $trang_thai
                );

                if ($result) {
                    $_SESSION['success'] = "Cập nhật bài viết thành công";
                    header("Location: " . BASE_URL_ADMIN . '?act=danh-sach-Posts');
                    exit();
                } else {
                    $_SESSION['error']['general'] = "Có lỗi xảy ra khi cập nhật bài viết";
                }
            }
            
            $_SESSION['flash'] = true;
            header("Location: " . BASE_URL_ADMIN . '?act=sua-Posts&id=' . $id);
            exit();
        }
    }
}