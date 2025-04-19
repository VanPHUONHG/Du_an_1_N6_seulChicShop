<?php
class ClientHomeController
{
    public $ModelClientUser;
    public $ModelClientPosts;
    public $ModelClientProduct;
    public $ModelClientBanner;
    public function __construct()
    {
        $this->ModelClientUser = new ClientUser();
        $this->ModelClientProduct = new ClientProduct();
        $this->ModelClientPosts = new ClientPosts();
        $this->ModelClientBanner = new ClientBanner();
    }
    public function index()
    {
        $id_danh_muc = $_GET['id_danh_muc'] ?? null;
        $banners = $this->ModelClientBanner->getAllBanner();
        $productBestSeller = $this->ModelClientProduct->getProductBestSeller();
        $productSelling = $this->ModelClientProduct->getProductSelling();
        $productTopRating = $this->ModelClientProduct->getProductTopRating();
        $productNew = $this->ModelClientProduct->getProductNew();
        $id_danh_muc = $_GET['id_danh_muc'] ?? null;
        $postNew = $this->ModelClientPosts->getPostNew();
        $categories = $this->ModelClientProduct->getCategory();
        if ($id_danh_muc) {
            $products = $this->ModelClientProduct->getProductByCategory($id_danh_muc);
        } else {
            $products = $this->ModelClientProduct->getAllProduct();
        }
        require_once './views/Home.php';
    }
    public function About(){
        require_once './views/About.php';
    }
    public function signIn()
    {
        require_once './views/auth/SignIn.php';
        deleteSessionError();
        exit();
    }
    // kiem tra dang nhap
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
                $_SESSION['success'] = "Đăng nhập thành công!";
                header('Location: ' . BASE_URL);
                exit();
            } else {
                // hiển thị thông báo lỗi
                $_SESSION['error'] = "Tên tài khoản hoặc mật khẩu không chính xác!";
                header('Location: ' . BASE_URL . '?act=dang-nhap');
                exit();
            }
        }
    }
    // Chuyen sang trang dang ky
    public function signUp()
    {
        require_once './views/auth/SignUp.php';
    }
    // Dang ky tai khoan
    public function insertUserClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tai_khoan = $_POST['ten_tai_khoan'] ?? '';
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $chuc_vu_id = 2; // Set default role as client
            $trang_thai = 1; // Set default status as active

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
    // Dang xuat tai khoan
    public function signOut()
    {
        unset($_SESSION['user_client']);
        $_SESSION['success'] = "Đăng xuất thành công!";
        header('Location: ' . BASE_URL);
        exit();
    }
    // Chuyen sang trang sua tai khoan
    public function editUser()
    {
        $ten_tai_khoan = $_SESSION['user_client'];
        $user = $this->ModelClientUser->getAccountByNameUser($ten_tai_khoan);
        require_once './views/auth/Account Manage.php';
    }
    // Chinh sua tai khoan
    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_tai_khoan = $_POST['ten_tai_khoan'];
            // Lấy ảnh cũ để phục vụ cho sửa ảnh
            $old_file = $this->ModelClientUser->getAccountByNameUser($ten_tai_khoan);
            $email = $_POST['email'];
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $mat_khau = $_POST['mat_khau'];

            $errors = [];
            // Validate
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số điện thoại';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui lòng nhập mật khẩu';
            }

            if ($anh_dai_dien && $anh_dai_dien['error'] === UPLOAD_ERR_OK) {
                deleteFile($old_file);
                $file_thumb = uploadFile($anh_dai_dien, folderUpload: './uploads/');
            } else {
                $file_thumb = $old_file;
            }
            if (empty($errors)) {
                $this->ModelClientUser->updateUser($ten_tai_khoan, $email, $file_thumb, $so_dien_thoai, $mat_khau);
                $_SESSION['success'] = "Cập nhật tài khoản thành công!";
                header('Location: ' . BASE_URL);
                exit();
            } else {
                $_SESSION['errors'] = 'Cập nhật tài khoản thất bại!';
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            }
        }
    }
}
