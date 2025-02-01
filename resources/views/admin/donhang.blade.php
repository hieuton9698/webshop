@extends('admin_layout')

@section('admin_content')
<div class="container">
    <h1 class="mb-4">Danh sách Đơn hàng</h1>

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
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Phương thức thanh toán</th>
                <th>Tổng tiền</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->ten_khach_hang }}</td>
                <td>{{ $order->so_dien_thoai }}</td>
                <td>{{ $order->dia_chi }}</td>
                <td>{{ $order->phuong_thuc_thanh_toan }}</td>
                <td>{{ number_format($order->tong_tien, 0, ',', '.') }} VNĐ</td>
                <td>{{ \Carbon\Carbon::parse($order->ngay_tao)->format('d/m/Y H:i') }}</td>
                <td>
                    <!-- Nút xóa -->
                    <form action="{{ route('donhang.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Không có đơn hàng nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection
