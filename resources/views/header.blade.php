@extends('welcome')

@section('header')
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
            <div class="ms-lg-4">
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
    </div>
</nav>
@endsection
