<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Danh mục</title>
    <style>
        /* Thiết lập font và nền */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        /* Bố cục chung của form */
        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Các thẻ input, textarea */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Nút Lưu thay đổi */
        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        /* Định dạng nhãn của các trường nhập liệu */
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        /* Thêm một chút không gian cho các trường nhập liệu */
        .form-group {
            margin-bottom: 20px;
        }

        /* Thiết lập thông báo lỗi (nếu có) */
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Cải tiến cho form */
        .form-container {
            padding: 30px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Chỉnh sửa Danh mục</h1>

        <!-- Form chỉnh sửa danh mục -->
        <form action="{{ route('product.update', $product->id) }}" method="POST" class="form-container">
            @csrf
            @method('PUT') <!-- Sử dụng phương thức PUT để cập nhật -->

            <!-- Nhóm nhập liệu Tên danh mục -->
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nhóm nhập liệu Mô tả -->
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nút lưu thay đổi -->
            <button type="submit">Lưu thay đổi</button>
        </form>
    </div>

</body>
</html>
