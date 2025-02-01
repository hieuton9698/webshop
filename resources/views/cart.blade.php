@extends('welcome')

@section('content')
<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ URL::to('/trang-chu') }}">
                <img class="card-img me-2" src="{{ asset('frontend/assets/img/gallery/lgweb.png') }}" alt="..." style="width: 50px;" />
                <span class="fs-3 fw-bold text-primary">HIẾU SPORT<span class="text-warning">S</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold text-primary dropdown-toggle" href="{{ URL::to('/trang-chu') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-home me-2"></i>Sản Phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="">Nike</a></li>
                            <li><a class="dropdown-item" href="">Puma</a></li>
                            <li><a class="dropdown-item" href="">Adidas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-primary" href="{{ URL::to('/chi-tiet-san-pham') }}"><i class="fas fa-newspaper me-2"></i>Chi Tiết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-primary" href="#services"><i class="fas fa-concierge-bell me-2"></i>Dịch Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-primary position-relative" href="{{ route('show_cart') }}">
                            <i class="fas fa-shopping-cart me-2"></i>Giỏ Hàng
                            @if(Session::has('cart') && count(Session::get('cart', [])) > 0)
                                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                                    {{ array_sum(array_column(Session::get('cart'), 'quantity')) }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-primary" href="#faqs"><i class="fas fa-envelope me-2"></i>Liên Hệ</a>
                    </li>
                </ul>

                <!-- Kiểm tra trạng thái đăng nhập -->
                @if(Auth::guard('khachhang')->check())
                    <!-- Nếu đã đăng nhập, hiển thị tên người dùng và nút đăng xuất -->
                    <span class="btn btn-outline-primary rounded-pill">Xin chào, {{ Auth::guard('khachhang')->user()->ten_khach_hang }}</span>
                    <form action="{{ route('khachhang.logout') }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger rounded-pill ms-2">Đăng Xuất</button>
                    </form>
                @else
                    <!-- Nếu chưa đăng nhập, hiển thị nút đăng nhập -->
                    <a class="btn btn-outline-primary rounded-pill" href="{{ route('khachhang.login') }}">Đăng Nhập</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="my-4 text-center">Giỏ hàng của bạn</h2>
        @if(Session::has('cart') && count($cart) > 0)
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng cộng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $key => $item)
                            <tr>
                                <td><img src="{{ asset('uploads/products/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid" style="max-width: 100px; border-radius: 8px;"></td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['size'] ?? 'Không chọn' }}</td>
                                <td>${{ number_format($item['price'], 2) }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td>
                                    <form action="{{ route('remove_cart_item', ['id' => $key]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill shadow-sm">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3 text-end">
                <h4>Tổng cộng: <span class="text-success">${{ number_format(array_sum(array_map(function($item) {
                    return $item['price'] * $item['quantity'];
                }, $cart)), 2) }}</span></h4>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('checkout') }}" class="btn btn-success btn-lg shadow-lg">Thanh toán</a>
            </div>
        @else
            <p class="text-center">Giỏ hàng của bạn trống.</p>
        @endif
    </div>
</section>
@endsection

<style>
.nav-link:hover {
    color: #ff5722 !important;
    text-decoration: underline;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

.badge {
    font-size: 0.8rem;
    padding: 0.4em 0.6em;
}
</style>
