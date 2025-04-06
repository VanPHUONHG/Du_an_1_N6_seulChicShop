<?php
class AdminCommentController{
    public $ModelAdminComment;
    public function __construct(){
        $this->ModelAdminComment = new AdminComment();
    }
    public function listComment(){
        $listComment = $this->ModelAdminComment->getAllComment();
        require_once './views/comment/ListComment.php';
    }
    public function deleteComment(){
        $id = $_GET['id'];
        $this->ModelAdminComment->deleteComment($id);
        header("Location: " . BASE_URL_ADMIN . '?act=binh-luan');
        exit();
    }
    public function editComment(){
        $id = $_GET['id'];
        $comment = $this->ModelAdminComment->getCommentById($id);
        require_once './views/comment/EditStatusComment.php';
    }
    public function updateCommentStatus(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $trang_thai = $_POST['trang_thai'];
            $this->ModelAdminComment->updateComment($id,$trang_thai);
            header("Location: " . BASE_URL_ADMIN . '?act=binh-luan');
            exit();
        }
    }
}