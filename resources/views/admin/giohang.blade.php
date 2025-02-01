@extends('admin_layout')

@section('admin_content')
<div class="container">
    <h1 class="mb-4">Danh sách Giỏ hàng</h1>

    <!-- Hiển thị thông báo nếu có -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Kích cỡ</th>
                <th>Ngày thêm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart_items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->products_name }}</td>
                <td>
                    <img src="{{ asset('uploads/products/' . $item->products_image) }}" alt="{{ $item->products_name }}" style="width: 100px; height: 100px;">
                </td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <form action="{{ route('giohang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
