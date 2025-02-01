<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Người Dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative; /* Thêm vị trí tương đối cho thân để định vị biểu tượng đăng xuất */
        }

        .session {
            position: absolute; /* Đặt vị trí tuyệt đối cho session */
            top: 20px; /* Cách từ trên xuống */
            right: 20px; /* Cách từ bên phải */
            display: flex; /* Sử dụng flexbox để căn chỉnh chữ chào và biểu tượng */
            align-items: center; /* Căn giữa dọc */

        }

        .greeting {
            font-size: 14px; 
            color: #555; 
            margin-right: 10px; 
            padding-top: 11px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            font-weight: normal;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .logout-icon {
            font-size: 20px; /* Kích thước biểu tượng */
            color: #007bff; /* Màu sắc cho biểu tượng */
            text-decoration: none; /* Bỏ gạch chân cho liên kết */
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="session">
        @if(session('user_name'))
            <div class="greeting">Xin chào, {{ session('user_name') }}</div> <!-- Định dạng lại dòng chào mừng -->
            <a href="{{ route('logout') }}" class="logout-icon" title="Đăng xuất" id="logout-link">
                <i class="bi bi-box-arrow-right"></i> <!-- Biểu tượng đăng xuất -->
            </a>
        @endif
    </div>
   
    <div class="container">
        <h1>Chỉnh Sửa Người Dùng</h1>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/index/' . $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="username">Tên người dùng:</label>
            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>

            <button type="submit">Cập Nhật</button>
        </form>

        <a href="{{ route('index.index') }}">Quay lại danh sách</a>
    </div>
    <script>
        // Xử lý xác nhận khi người dùng muốn đăng xuất
        document.getElementById('logout-link').addEventListener('click', function(event) {
            const confirmLogout = confirm('Bạn có chắc muốn đăng xuất?');
            if (!confirmLogout) {
                event.preventDefault(); // Ngăn không cho link được thực thi
            }
        });
    </script>
</body>
</html>
