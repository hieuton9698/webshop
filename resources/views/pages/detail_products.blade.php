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

    <div class="container">
        <div class="row h-100">
            <div class="col-12">
                <div class="card mb-3 border-0 shadow-sm rounded-3">
                    <div class="row g-0">
                        <!-- Hình ảnh sản phẩm -->
                        <div class="col-md-6">
                            <img class="img-fluid rounded-3" src="{{ asset('uploads/products/' . $product->products_image) }}" alt="{{ $product->products_name }}">
                        </div>

                        <!-- Thông tin sản phẩm -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <h1 class="card-title">{{ $product->products_name }}</h1>
                                <p class="card-text">
                                    <strong>Nội dung chi tiết:</strong> {!! $product->products_content !!}
                                </p>
                                <p class="card-text fs-4 text-dark">
                                    <strong>Giá:</strong> ${{ number_format($product->products_price, 2) }}
                                </p>
                                <p class="card-text text-muted">
                                    <strong>Số lượng còn lại:</strong> {{ $product->products_quantity }}
                                </p>
                                <p class="card-text text-muted">
                                    <strong>Trạng thái:</strong> {{ $product->products_status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                </p>
                                <form action="{{ route('add_to_cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->products_id }}">
                                            <div class="mb-2">
                                                <label for="size" class="form-label"><strong>Chọn size:</strong></label>
                                                <select name="size" id="size" class="form-select" required>
                                                    <option value="S">Size S</option>
                                                    <option value="M">Size M</option>
                                                    <option value="L">Size L</option>
                                                </select>
                                            </div>
                                            <input type="number" name="quantity" value="1" min="1" class="form-control mb-2" style="width: 80px;">
                                            <button type="submit" class="btn btn-warning btn-lg mt-3">
                                                <i class="fas fa-shopping-cart me-2"></i> Thêm vào giỏ hàng
                                            </button>
                                        </form>
                                <div class="mt-4 d-flex justify-content-between">
                                    <a href="https://zalo.me/your_zalo_id" target="_blank" class="btn btn-success btn-lg rounded-pill">
                                        <i class="fas fa-comments me-2"></i> Chat Zalo
                                    </a>
                                    <a href="tel:0999999999" class="btn btn-info btn-lg rounded-pill">
                                        <i class="fas fa-phone me-2"></i> Liên hệ: 0999999999
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phần mở rộng: Gợi ý sản phẩm liên quan -->
                <div class="mt-5">
                    <h2 class="mb-4">Sản phẩm liên quan</h2>
                    <div class="row">
                        @foreach($related_products as $related)
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ asset('uploads/products/' . $related->products_image) }}" alt="{{ $related->products_name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $related->products_name }}</h5>
                                    <p class="card-text">${{ number_format($related->products_price, 2) }}</p>
                                    <a href="{{ route('detail_products', ['products_id' => $related->products_id]) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
