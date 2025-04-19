<?php
class ClientProductController
{
    public $ModelClientProduct;
    public $ModelClientUser;
    public $ModelClientPay;
    public $ModelClientCart;
    public $ModelClientComment;
    public function __construct()
    {
        $this->ModelClientProduct = new ClientProduct();
        $this->ModelClientUser = new ClientUser();
        $this->ModelClientPay = new ClientPay();
        $this->ModelClientCart = new ClientCart();
        $this->ModelClientComment = new ClientComment();
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
        $id = $_GET['id'];
        $Product = $this->ModelClientProduct->getProductById($id);
        $listVariant = $this->ModelClientProduct->getProductVariantById($id);
        $listComment = $this->ModelClientComment->getCommentByProductId($id);
        $listProductSameCategory = $this->ModelClientProduct->getProductSameCategory($Product['danh_muc_id']);
        require_once './views/DetailProduct.php';
    }
    public function addComment(){
        $id = $_GET['id'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!isset($_SESSION['user_client'])) {
                $_SESSION['error'] = "Vui lòng đăng nhập để bình luận";
                header('Location:'.BASE_URL.'?act=chi-tiet-san-pham&id='.$id);
                exit;
            }

            $user = $this->ModelClientUser->getAccountByNameUser($_SESSION['user_client']);
            if(!$user) {
                $_SESSION['error'] = "Không tìm thấy thông tin người dùng";
                header('Location:'.BASE_URL.'?act=chi-tiet-san-pham&id='.$id);
                exit;
            }

            $tai_khoan_id = $user['id'];
            $noi_dung = $_POST['noi_dung'] ?? '';
            $danh_gia = $_POST['danh_gia'] ?? '';

            if(empty($noi_dung)) {
                $_SESSION['error'] = "Vui lòng nhập nội dung bình luận";
                header('Location:'.BASE_URL.'?act=chi-tiet-san-pham&id='.$id);
                exit;
            }

            if(empty($danh_gia)) {
                $_SESSION['error'] = "Vui lòng chọn đánh giá";
                header('Location:'.BASE_URL.'?act=chi-tiet-san-pham&id='.$id);
                exit;
            }

            $ngay_dang = date('Y-m-d H:i:s');
            $trang_thai = 1;
            
            $result = $this->ModelClientComment->createComment($id, $tai_khoan_id, $noi_dung, $danh_gia, $ngay_dang, $trang_thai);
            
            if($result) {
                $_SESSION['success'] = "Bình luận đã được gửi thành công";
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra khi gửi bình luận";
            }
            
            header('Location:'.BASE_URL.'?act=chi-tiet-san-pham&id='.$id);
            exit;
        }
    }
}
