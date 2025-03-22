<?php
class ClientHomeController
{
    public $ModelClientUser;
    public function __construct()
    {
        $this->ModelClientUser = new ClientUser();
    }
    public function index()
    {
        require_once './views/Home.php';
    }
    public function listProduct()
    {
        require_once './views/listProduct.php';
    }
    // public function contact()
    // {
    //     require_once './views/Contact.php';
    // }
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
    public function signIn()
    {
        require_once './views/auth/SignIn.php';
        deleteSessionError();
        exit();
    }
    public function checkSignIn()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu từ form
            $ten_tai_khoan = $_POST['ten_tai_khoan'];
            $mat_khau = $_POST['mat_khau'];
            // kiểm tra dữ liệu
            $user = $this->ModelClientUser->postSignIn($ten_tai_khoan, $mat_khau);
            if ($user == $ten_tai_khoan) {
                // lưu dữ liệu vào session
                $_SESSION['user_client'] = $user;
                header('Location: ' . BASE_URL);
                exit();
            } else {
                // hiển thị thông báo lỗi
                $_SESSION['error'] = $user;
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit();
            }
        }
    }
    public function signUp()
    {
        require_once './views/auth/SignUp.php';
    }
    public function insertUserClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tai_khoan = $_POST['ten_tai_khoan'] ?? '';
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $chuc_vu_id = 2; // Set default role as client
            $trang_thai = 1; // Set default status as active
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            $thong_bao = '';
            $file_thumb = null;

            if ($anh_dai_dien && $anh_dai_dien['error'] === UPLOAD_ERR_OK) {
                $file_thumb = uploadFile($anh_dai_dien, folderUpload: './uploads/');
            }

            $errors = [];

            if (empty($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Vui lòng nhập tên tài khoản';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui nhập mật khẩu';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số diện thoại';
            }

            if (empty($errors)) {
                try {

                    $result = $this->ModelClientUser->addUserClient(
                        $ten_tai_khoan,
                        $email,
                        $mat_khau,
                        $file_thumb,
                        $so_dien_thoai,
                        $chuc_vu_id,
                        $trang_thai
                    );

                    if ($result) {
                        $_SESSION['success'] = "Đăng ký tài khoản thành công!";
                        header("Location: " . BASE_URL . '?act=dang-nhap');
                        exit();
                    } else {
                        $errors['general'] = 'Không thể tạo tài khoản. Vui lòng thử lại.';
                    }
                } catch (Exception $e) {
                    $errors['general'] = 'Đã xảy ra lỗi. Vui lòng thử lại sau.';
                }
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old_input'] = $_POST;
                header('Location: ' . BASE_URL . '?act=dang-ky');
                exit();
            }
        }
    }
    public function signOut()
    {
        unset($_SESSION['user_client']);
        header('Location: ' . BASE_URL);
        exit();
    }

}
