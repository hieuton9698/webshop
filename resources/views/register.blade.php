<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="styles.css"> <!-- Giữ nguyên hoặc thêm style tương tự -->
</head>
<body>
    <div class="container">
        <div class="heading">Đăng Ký</div>
        <form action="{{ route('register') }}" method="POST" class="form">
            @csrf
            @if (session('error'))
                <div style="color: red; text-align: center; margin-bottom: 10px;">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div style="color: green; text-align: center; margin-bottom: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            <input required class="input" type="text" name="txt_name" id="txt_name" placeholder="Nhập tên của bạn">
            <input required class="input" type="email" name="txt_email" id="txt_email" placeholder="Nhập email">
            <input required class="input" type="password" name="txt_pass" id="txt_pass" placeholder="Nhập mật khẩu">
            <input required class="input" type="password" name="txt_pass_confirm" id="txt_pass_confirm" placeholder="Xác nhận mật khẩu">
            <input class="register-button" type="submit" value="Đăng Ký">
        </form>
        <div class="form-footer">
            <p>Đã có tài khoản? <a href="{{ route('admin') }}">Đăng nhập</a></p>
        </div>
    </div>
</body>
</html>
