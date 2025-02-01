@extends('header')

@section('content')
<section>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ URL::to('/trang-chu') }}">
            <img class="me-2" src="{{ asset('frontend/assets/img/gallery/lgweb.png') }}" alt="Logo" style="width: 50px;" />
            <span class="fs-4 fw-bold text-primary">HIẾU SPORT<span class="text-warning">S</span></span>
        </a>

        <!-- Search Bar -->
        <form class="d-flex ms-3 flex-grow-1" action="" method="GET" style="max-width: 400px;">
            <div class="input-group">
                <input type="search" class="form-control form-control-sm rounded-start-pill border-primary" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" name="query" />
                <button class="btn btn-primary btn-sm rounded-end-pill" type="submit">Tìm</button>
            </div>
        </form>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <!-- Sản Phẩm -->
                <li class="nav-item dropdown">
                    <a class="nav-link fw-bold text-primary dropdown-toggle d-inline-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản Phẩm
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Nike</a></li>
                        <li><a class="dropdown-item" href="#">Puma</a></li>
                        <li><a class="dropdown-item" href="#">Adidas</a></li>
                    </ul>
                </li>
                <!-- Chi Tiết -->
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary d-inline-flex align-items-center" href="{{ URL::to('/chi-tiet-san-pham/4') }}">Chi Tiết</a>
                </li>
                <!-- Dịch Vụ -->
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary d-inline-flex align-items-center" href="#services">Dịch Vụ</a>
                </li>
                <!-- Giỏ Hàng -->
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary position-relative d-inline-flex align-items-center" href="{{ route('show_cart') }}">
                        <i class="fas fa-shopping-cart me-2"></i>Giỏ Hàng
                        @if(Session::has('cart') && count(Session::get('cart', [])) > 0)
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill">
                                {{ array_sum(array_column(Session::get('cart'), 'quantity')) }}
                            </span>
                        @endif
                    </a>
                </li>
                <!-- Liên Hệ -->
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary d-inline-flex align-items-center" href="{{ URL::to('/contact') }}">Liên Hệ</a>
                </li>
                <!-- Kiểm tra đăng nhập -->
                @if(Auth::guard('khachhang')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold text-primary dropdown-toggle d-inline-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Xin chào, {{ Auth::guard('khachhang')->user()->ten_khach_hang }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form action="{{ route('khachhang.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Đăng Xuất</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary rounded-pill" href="{{ route('khachhang.login') }}">Đăng Nhập</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>






    <div class="container mt-5 pt-5">
        <div class="row h-100">
            <div class="col-12">
                <div class="nav nav-tabs clickr-tabs mb-4 justify-content-center" id="nav-tab" role="tablist">
                    @foreach($category as $cat)
                        <button class="nav-link {{ $loop->first ? 'active' : '' }} text-uppercase fw-bold text-primary" id="nav-{{ $cat->category_id }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $cat->category_id }}" type="button" role="tab" aria-controls="nav-{{ $cat->category_id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $cat->category_name }}
                        </button>
                    @endforeach
                </div>

                <div class="tab-content" id="nav-tabContent">
                    @foreach($category as $cat)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{ $cat->category_id }}" role="tabpanel" aria-labelledby="nav-{{ $cat->category_id }}-tab">
                            <div class="row g-4">
                                @foreach($all_products as $product)
                                    @if($product->category_id == $cat->category_id)
                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <div class="card shadow h-100">
                                                <img class="card-img-top rounded-3" src="{{ asset('uploads/products/' . $product->products_image) }}" alt="{{ $product->products_name }}">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-dark">{{ $product->products_name }}</h5>
                                                    <p class="card-text text-muted">Giá: ${{ number_format($product->products_price, 2) }}</p>
                                                    <a href="{{ route('detail_products', $product->products_id) }}" class="btn btn-warning btn-sm rounded-pill">
                                                        Xem Chi Tiết
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<style>
 
.clickr-tabs .nav-link {
    color: black !important; /* Sử dụng !important nếu cần ưu tiên áp dụng */
}

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
.nav-link {
    white-space: nowrap; /* Giữ nội dung trên cùng một dòng */
}

.navbar .nav-item .nav-link {
    display: inline-flex;
    align-items: center;
}

.navbar .fa-shopping-cart {
    font-size: 1rem; /* Điều chỉnh kích thước icon giỏ hàng */
    margin-right: 5px; /* Khoảng cách giữa icon và chữ */
}

.navbar-brand img {
    max-height: 50px;
    object-fit: contain; /* Giữ hình logo không bị méo */
}

.badge {
    font-size: 0.75rem;
}



</style>
