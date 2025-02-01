<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Người Dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        /* Đặt cấu trúc CSS cơ bản */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f6f9;
            position: relative;
        }

        /* Phần tiêu đề */
        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Bảng hiển thị */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 8px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f5fa;
        }

        /* Nút bấm */
        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c0392b;
        }

        /* Phần chào người dùng và biểu tượng đăng xuất hoặc admin */
        .session {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            font-size: 16px;
        }

        .greeting {
            color: #555;
            margin-right: 10px;
            font-size: 16px;
        }

        .icon-admin, .logout-icon p {
            margin: 0;
            font-size: 16px;
            color: #3498db;
            cursor: pointer;
        }

        .logout-icon:hover p, .icon-admin:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="session">
        @if(session('user_name'))
            <!-- Hiển thị nếu người dùng đã đăng nhập -->
            <div class="greeting">Xin chào, {{ session('user_name') }}</div>
            <a href="{{ route('logout') }}" class="logout-icon" title="Đăng xuất" id="logout-link">
                <p>Đăng xuất</p>
            </a>
        @else
            <!-- Hiển thị nếu người dùng chưa đăng nhập -->
            <a href="{{ route('login') }}" title="Về trang đăng nhập" class="icon-admin">
                <i class="bi bi-person-circle" style="font-size: 24px;"></i> <!-- Biểu tượng admin -->
            </a>
        @endif
    </div>

    <h1>Danh Sách Người Dùng</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Tên Người Dùng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>***********</td>
                <td>{{ $user->username }}</td>
                <td class="action-buttons">
                    <a href="{{ url('/index/' . $user->id . '/edit') }}" title="Chỉnh sửa">
                        <i class="bi bi-pencil-square" style="font-size: 20px; color: #3498db;"></i>
                    </a>
                    <form action="{{ url('/index/' . $user->id) }}" method="POST" style="display:inline;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none;" title="Xóa người dùng">
                            <i class="bi bi-trash-fill" style="font-size: 20px; color: #e74c3c;"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><a href="{{ route('index.create') }}" style="font-size: 16px; color: #3498db; font-weight: bold;">Thêm Người Dùng Mới</a></p>

    <script>
        // Xác nhận khi người dùng muốn đăng xuất
        document.getElementById('logout-link')?.addEventListener('click', function(event) {
            const confirmLogout = confirm('Bạn có chắc muốn đăng xuất?');
            if (!confirmLogout) {
                event.preventDefault();
            }
        });

        document.querySelectorAll('.delete-form').forEach(form => { 
            form.addEventListener('submit', function(e) {
                if (!confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
