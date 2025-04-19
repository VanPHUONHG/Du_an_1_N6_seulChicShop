<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - SEULCHIC SHOP Admin</title>
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
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 2rem;
            text-align: center;
        }

        .login-header h1 {
            color: white;
            font-size: 1.5rem;
            margin: 0;
            font-weight: 600;
        }

        .login-body {
            padding: 2rem;
        }

        .welcome-text {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .input-group {
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
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

        .btn-login {
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
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(115, 103, 240, 0.3);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .alert-success {
            background-color: #E8F5E9;
            color: #2E7D32;
            border: 1px solid #A5D6A7;
        }

        .alert-danger {
            background-color: #FFEBEE;
            color: #C62828;
            border: 1px solid #FFCDD2;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'] ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <div class="login-card">
            <div class="login-header">
                <h1>SEULCHIC SHOP</h1>
            </div>
            <div class="login-body">
                <div class="welcome-text">
                    <p>Chào mừng trở lại! Vui lòng đăng nhập để tiếp tục.</p>
                </div>

                <form action="<?= BASE_URL_ADMIN . "?act=login-admin" ?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Tên tài khoản</label>
                        <div class="input-group">
                            <i class="fas fa-user input-icon"></i>
                            <input type="text" name="ten_tai_khoan" placeholder="Nhập tên tài khoản" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="mat_khau" placeholder="Nhập mật khẩu" required>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn-login">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>