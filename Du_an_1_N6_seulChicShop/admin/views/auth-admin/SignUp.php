<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - SEULCHIC SHOP Admin</title>
    <style>
        :root {
            --primary-color: #7367F0;
            --secondary-color: #9E95F5;
            --text-color: #5E5873;
            --light-gray: #F8F8F8;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #F8F8F8 0%, #FFFFFF 100%);
            margin: 0;
            padding: 2rem 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-container {
            width: 100%;
            max-width: 900px;
            padding: 20px;
            display: flex;
            gap: 2rem;
        }

        .signup-left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 16px;
        }

        .signup-left svg {
            width: 80%;
            height: auto;
        }

        .signup-right {
            flex: 1;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08);
            padding: 2rem;
        }

        .signup-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .signup-header h1 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .signup-header p {
            color: var(--text-color);
            margin: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(115, 103, 240, 0.1);
            outline: none;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6E6B7B;
        }

        .btn-signup {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .btn-signup:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(115, 103, 240, 0.3);
        }

        .login-link {
            text-align: center;
            color: var(--text-color);
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .signup-container {
                flex-direction: column;
            }

            .signup-left {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-left">
            <svg enable-background="new 0 0 300 302.5" version="1.1" viewBox="0 0 300 302.5" xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg">
                <style type="text/css">
                    .st01 {
                        fill: #fff;
                    }
                </style>
                <path class="st01"
                    d="m126 302.2c-2.3 0.7-5.7 0.2-7.7-1.2l-105-71.6c-2-1.3-3.7-4.4-3.9-6.7l-9.4-126.7c-0.2-2.4 1.1-5.6 2.8-7.2l93.2-86.4c1.7-1.6 5.1-2.6 7.4-2.3l125.6 18.9c2.3 0.4 5.2 2.3 6.4 4.4l63.5 110.1c1.2 2 1.4 5.5 0.6 7.7l-46.4 118.3c-0.9 2.2-3.4 4.6-5.7 5.3l-121.4 37.4zm63.4-102.7c2.3-0.7 4.8-3.1 5.7-5.3l19.9-50.8c0.9-2.2 0.6-5.7-0.6-7.7l-27.3-47.3c-1.2-2-4.1-4-6.4-4.4l-53.9-8c-2.3-0.4-5.7 0.7-7.4 2.3l-40 37.1c-1.7 1.6-3 4.9-2.8 7.2l4.1 54.4c0.2 2.4 1.9 5.4 3.9 6.7l45.1 30.8c2 1.3 5.4 1.9 7.7 1.2l52-16.2z" />
            </svg>
        </div>
        <div class="signup-right">
            <div class="signup-header">
                <h1>SEULCHIC SHOP</h1>
                <p>Tạo tài khoản admin mới</p>
            </div>

            <form action="<?= BASE_URL . "?act=check-dang-ky" ?>" method="post">
                <div class="form-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" class="form-control" name="ten_tai_khoan" 
                           placeholder="Tên tài khoản" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" class="form-control" name="email" 
                           placeholder="Email" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control" name="mat_khau" 
                           placeholder="Mật khẩu" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-phone input-icon"></i>
                    <input type="tel" class="form-control" name="so_dien_thoai" 
                           pattern="[0-9]{10}" placeholder="Số điện thoại" required>
                </div>

                <input type="hidden" name="chuc_vu_id" value="2">
                <input type="hidden" name="trang_thai" value="1">

                <button type="submit" name="submit" class="btn-signup">
                    Đăng ký
                </button>

                <div class="login-link">
                    <span>Đã có tài khoản? </span>
                    <a href="<?= BASE_URL . "?act=dang-nhap" ?>">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>