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
            background-image: url('img/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 350px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 40px;
            padding: 25px 35px;
            border: 5px solid rgb(255, 255, 255);
            box-shadow: rgba(133, 189, 215, 0.8) 0px 30px 30px -20px;
            animation: border-glow 5s linear infinite;
        }

        /* Keyframes for the glowing animated border */
        @keyframes border-glow {
            0% { border-color: #ff6b6b; }
            10% { border-color: #f9d423; }
            20% { border-color: #12B1D1; }
            30% { border-color: #00C9A7; }
            40% { border-color: #ff6b6b; }
            50% { border-color: #ff6b6b; }
            60% { border-color: #f9d423; }
            70% { border-color: #12B1D1; }
            80% { border-color: #00C9A7; }
            90% { border-color: #ff6b6b; }
            100% { border-color: #ff6b6b; }
        }

        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: #1B4F93;
        }

        .form {
            margin-top: 20px;
        }

        .form .input {
            width: 100%;
            background: white;
            border: 1px solid #ccc;
            padding: 15px 2px;
            border-radius: 20px;
            margin-top: 15px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
        }

        .form .input:focus {
            outline: none;
            border: 2px solid #12B1D1;
        }

        .form .forgot-password {
            display: block;
            margin-top: 10px;
            margin-left: 10px;
            
        }

        .form .forgot-password a {
            font-size: 11px;
            color: #1B4F93;
            text-decoration: none;
        }

        .form .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding: 15px;
            margin: 20px auto;
            border-radius: 20px;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .form .login-button:hover {
            background: rgb(12, 127, 200);
        }

        .form-footer {
            margin-top: 15px;
            text-align: center;
        }
        .form-footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }

        .register-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: rgb(255, 100, 100);
            color: white;
            padding: 15px;
            margin: 10px auto;
            border-radius: 20px;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .register-button:hover {
            background: rgb(255, 120, 120);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">Đăng Nhập</div>
        <form action="{{ route('login') }}" method="POST" class="form">
            @csrf
            @if (session('error'))
                <div style="color: red; text-align: center; margin-bottom: 10px;">
                    {{ session('error') }}
                </div>
            @endif
            <input required class="input" type="email" name="txt_email" id="txt_email" placeholder="Nhập email" autocomplete="email">
            <input required class="input" type="password" name="txt_pass" id="txt_pass" placeholder="Nhập mật khẩu" autocomplete="current-password">
            <span class="forgot-password"><a href="#">Quên mật khẩu?</a></span>
            <input class="login-button" type="submit" value="Đăng Nhập">
        </form>
        <div class="form-footer">
            <p>Chưa có tài khoản? <a href="{{ route('') }}">Đăng ký</a></p>
        </div>
    </div>
</body>
</html>
