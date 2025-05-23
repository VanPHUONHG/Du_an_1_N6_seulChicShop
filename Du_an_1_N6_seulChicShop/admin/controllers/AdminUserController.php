<?php
class AdminUserController
{
    public $ModelAdminUser;
    public $ModelPosition;
    public function __construct()
    {
        $this->ModelAdminUser = new AdminUser();
        $this->ModelPosition = new AdminPosition();
    }
    public function checkSignInAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu từ form
            $ten_tai_khoan = $_POST['ten_tai_khoan'];
            $mat_khau = $_POST['mat_khau'];
            // kiểm tra dữ liệu
            $user = $this->ModelAdminUser->postSignInAdmin($ten_tai_khoan, $mat_khau);
            if ($user == $ten_tai_khoan) {
                // lưu dữ liệu vào session
                $_SESSION['user_admin'] = $user;
                header('Location: ' . BASE_URL_ADMIN);
                exit();
            } else {
                // hiển thị thông báo lỗi
                $_SESSION['error'] = $user;
                header('Location: ' . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    public function loginAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tai_khoan = $_POST['ten_tai_khoan'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $errors = [];

            // Validate input
            if (empty($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Vui lòng nhập tên tài khoản';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui lòng nhập mật khẩu';
            }

            if (empty($errors)) {
                $user = $this->ModelAdminUser->postSignInAdmin($ten_tai_khoan, $mat_khau);

                if (is_array($user)) {
                    if ($user['trang_thai'] == 1) {
                        $_SESSION['user'] = $user;
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        header('Location: ' . BASE_URL_ADMIN);
                        exit();
                    } else {
                        $errors['account'] = 'Tài khoản đã bị khóa';
                    }
                } else {
                    $errors['login'] = $user; // Error message from model
                }
            }

            if (!empty($errors)) {
                $_SESSION['error'] = reset($errors);
                header('Location: ' . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }

        // Kiểm tra nếu đã đăng nhập thì chuyển hướng về trang chủ admin
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL_ADMIN);
            exit();
        }

        require_once './views/auth-admin/SignIn.php';
    }
    public function logoutAdmin()
    {
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Đăng xuất thành công';
        header('Location: ' . BASE_URL_ADMIN . '?act=login-admin');
        exit();
    }

    public function listUserAdmin()
    {
        $listUser = $this->ModelAdminUser->getAllAdminUser();
        require_once './views/user/admin/ListUserAdmin.php';
    }
    public function detailUserAdmin()
    {
        $id = $_GET['id_tai_khoan_admin'];
        $user = $this->ModelAdminUser->getAdminUserById($id);
        require_once './views/user/admin/DetailUserAdmin.php';
    }
    public function formAddUserAdmin()
    {
        $listPosition = $this->ModelPosition->getPosition();
        require_once './views/user/admin/AddUserAdmin.php';
    }
    public function insertUserAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tai_khoan = $_POST['ten_tai_khoan'] ?? '';
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $chuc_vu_id = $_POST['chuc_vu_id'] ?? '';
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            $file_thumb = uploadFile($anh_dai_dien, folderUpload: './uploads/');
            $errors = [];

            if (empty($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Vui lòng nhập tên tài khoản';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($_FILES['anh_dai_dien']['name'])) {
                $errors['anh_dai_dien'] = 'Vui lòng chọn ảnh đại diện';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui nhập mật khẩu';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số diện thoại';
            }
            if (empty($chuc_vu_id)) {
                $errors['chuc_vu_id'] = 'Vui lòng chọn chức vụ';
            }
            $_SESSION['errors'] = $errors;
            if (empty($errors)) {
                $this->ModelAdminUser->addUserAdmin(
                    $ten_tai_khoan,
                    $email,
                    $mat_khau,
                    $file_thumb,
                    $so_dien_thoai,
                    $chuc_vu_id,
                );
                header("Location: " . BASE_URL_ADMIN . '?act=tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;
                $listPosition = $this->ModelPosition->getPosition();
                require_once './views/user/admin/AddUserAdmin.php';
                exit();
            }
        }
    }
    public function formEditUserAdmin()
    {
        $id_tai_khoan_admin = $_GET['id_tai_khoan_admin'];
        $user = $this->ModelAdminUser->getAdminUserById($id_tai_khoan_admin);
        require_once './views/user/admin/EditUserAdmin.php';
    }
    public function updateUserAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_tai_khoan_admin = $_POST['id_tai_khoan_admin'] ?? '';
            $userOld = $this->ModelAdminUser->getAdminUserById($id_tai_khoan_admin);
            $old_file = $userOld['anh_dai_dien'];

            $ten_tai_khoan = $_POST['ten_tai_khoan'] ?? '';
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            $trang_thai = $_POST['trang_thai'] ?? '';
            $errors = [];
            if (empty($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Vui lòng nhập tên tài khoản';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui lòng nhập mật khẩu';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số điện thoại';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }


            $_SESSION['error'] = $errors;

            if (isset($anh_dai_dien) && $anh_dai_dien['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($anh_dai_dien, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            if (empty($errors)) {
                $this->ModelAdminUser->editUserAdmin(
                    $id_tai_khoan_admin,
                    $ten_tai_khoan,
                    $email,
                    $mat_khau,
                    $new_file,
                    $so_dien_thoai,
                    $trang_thai
                );
                header("Location: " . BASE_URL_ADMIN . '?act=tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-admin&id_tai_khoan_admin=' . $id_tai_khoan_admin);
                exit();
            }
        }
    }

    public function listUserClient()
    {
        $listUserClient = $this->ModelAdminUser->getUserClient();
        require_once './views/user/client/ListUserClient.php';
    }
    public function listUserClientById()
    {
        $id_tai_khoan_client = $_GET['id_tai_khoan_client'];
        $userClient = $this->ModelAdminUser->getUserClentById($id_tai_khoan_client);
        require_once './views/user/client/DetailUserClient.php';
    }
    public function formAddUserClient()
    {
        $listPosition = $this->ModelPosition->getPosition();
        require_once './views/user/client/AddUserClient.php';
    }
    public function insertUserClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_tai_khoan = $_POST['ten_tai_khoan'] ?? '';
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            $chuc_vu_id = $_POST['chuc_vu_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            // Validate input
            $errors = [];
            if (empty($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Vui lòng nhập tên tài khoản';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui lòng nhập mật khẩu';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số điện thoại';
            }

            $ngay_tao = date('Y-m-d H:i:s');
            
            // Handle file upload
            $file_thumb = null;
            if (isset($anh_dai_dien) && $anh_dai_dien['error'] === UPLOAD_ERR_OK) {
                $file_thumb = uploadFile($anh_dai_dien, './uploads/');
                if (!$file_thumb) {
                    $errors['anh_dai_dien'] = 'Không thể tải lên ảnh đại diện';
                }
            }

            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                $_SESSION['old'] = $_POST; // Save old input
                header("Location: " . BASE_URL_ADMIN . "?act=form-them-tai-khoan-khach-hang");
                exit();
            }

            // Attempt to add user
            $result = $this->ModelAdminUser->addUserClient(
                $ten_tai_khoan,
                $email,
                $mat_khau,
                $file_thumb,
                $ngay_tao,
                $so_dien_thoai,
                $chuc_vu_id,
                $trang_thai
            );

            if ($result) {
                $_SESSION['success'] = 'Thêm tài khoản thành công';
                header("Location: " . BASE_URL_ADMIN . '?act=tai-khoan-khach-hang');
            } else {
                if ($file_thumb) {
                    deleteFile($file_thumb); // Clean up uploaded file if DB insert failed
                }
                $_SESSION['error'] = ['db_error' => 'Không thể thêm tài khoản'];
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-tai-khoan-khach-hang');
            }
            exit();
        }
    }
    public function formEditUserClient()
    {
        $id_tai_khoan_client = $_GET['id_tai_khoan_client'];
        $user = $this->ModelAdminUser->getUserClentById($id_tai_khoan_client);
        require_once './views/user/client/EditUserClient.php';
    }

    public function updateUserClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get user ID from POST data
            $id_tai_khoan_client = $_POST['id_tai_khoan_client'] ?? '';
            
            // Get existing user data
            $userOld = $this->ModelAdminUser->getUserClentById($id_tai_khoan_client);
            $old_file = $userOld['anh_dai_dien'];

            // Get form data
            $ten_tai_khoan = $_POST['ten_tai_khoan'] ?? '';
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;

            // Validate input
            $errors = [];
            if (empty($ten_tai_khoan)) {
                $errors['ten_tai_khoan'] = 'Vui lòng nhập tên tài khoản';
            }
            if (empty($email)) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Vui lòng nhập mật khẩu';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Vui lòng nhập số điện thoại';
            }

            // Handle file upload
            $new_file = $old_file;
            if (isset($anh_dai_dien) && $anh_dai_dien['error'] === UPLOAD_ERR_OK) {
                $new_file = uploadFile($anh_dai_dien, './uploads/');
                if ($new_file && !empty($old_file)) {
                    deleteFile($old_file);
                }
            }

            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . "?act=form-sua-tai-khoan-khach-hang&id_tai_khoan_client=" . $id_tai_khoan_client);
                exit();
            }

            // Update user
            $result = $this->ModelAdminUser->editUserClient(
                $id_tai_khoan_client,
                $ten_tai_khoan,
                $email,
                $mat_khau,
                $new_file,
                $so_dien_thoai,
                $trang_thai
            );

            if ($result) {
                $_SESSION['success'] = "Cập nhật thành công";
                header("Location: " . BASE_URL_ADMIN . '?act=tai-khoan-khach-hang');
            } else {
                $_SESSION['error'] = ['update_failed' => 'Không thể cập nhật thông tin'];
                header("Location: " . BASE_URL_ADMIN . "?act=form-sua-tai-khoan-khach-hang&id_tai_khoan_client=" . $id_tai_khoan_client);
            }
            exit();
        }
    }
}
