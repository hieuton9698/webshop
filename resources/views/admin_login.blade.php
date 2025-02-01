<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #6dd5ed 0%, #2193b0 100%);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 400px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px 40px;
            border: 2px solid transparent;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .container:hover {
            border-color: #1B4F93;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 28px;
            color: #1B4F93;
            margin-bottom: 20px;
        }
        .form .input {
            width: 100%;
            background: #f5f5f5;
            border: 1px solid #ccc;
            padding: 12px 15px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 16px;
            transition: border 0.3s ease;
        }
        .form .input:focus {
            outline: none;
            border: 2px solid #1B4F93;
            background-color: #fff;
        }
        .form .forgot-password {
            display: block;
            margin-top: 8px;
            text-align: right;
        }
        .form .forgot-password a {
            font-size: 12px;
            color: #1B4F93;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .form .forgot-password a:hover {
            color: #f95d0f;
        }
        .form .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg, #1B4F93 0%, #3a77d2 100%);
            color: white;
            padding: 14px;
            margin-top: 20px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .form .login-button:hover {
            background: linear-gradient(45deg, #3a77d2 0%, #1B4F93 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }
        .form-footer a {
            color: #1B4F93;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .form-footer a:hover {
            color: #f95d0f;
        }
        .text-alert {
            display: block;
            color: #f95d0f;
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">Đăng Nhập</div>
        
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">', $message, '</span>';
            Session::put('message', null);
        }
        ?>

        <form action="{{URL::to('/admin-dashboard')}}" method="POST" class="form">
            {{ csrf_field() }}  
            <input required class="input" type="email" name="admin_email" id="admin_email" placeholder="Nhập email" autocomplete="email">
            <input required class="input" type="password" name="admin_password" id="admin_password" placeholder="Nhập mật khẩu" autocomplete="current-password">
            <span class="forgot-password"><a href="#">Quên mật khẩu?</a></span>
            <input class="login-button" type="submit" value="Đăng Nhập">
        </form>
</body>
</html>
