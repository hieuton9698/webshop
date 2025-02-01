@extends('welcome')

@section('content')
<header>
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
                    <a class="nav-link fw-bold" href="{{ route('show_cart') }}"><i class="fas fa-shopping-cart"></i></a>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="py-5">
    <div class="container">
        <h2 class="my-4 text-center fw-bold">Thông tin thanh toán</h2>

        @if(Session::has('cart') && count($cart) > 0)
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Chi tiết đơn hàng</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td><img src="{{ asset('uploads/products/' . $item['image']) }}" alt="{{ $item['name'] }}" class="img-thumbnail" width="75"></td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['size'] ?? 'Chưa chọn' }}</td>
                                    <td>${{ number_format($item['price'], 2) }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-end">
                        <h4 class="fw-bold mt-3">Tổng cộng: <span class="text-primary">${{ number_format(array_sum(array_map(function($item) {
                            return $item['price'] * $item['quantity'];
                        }, $cart)), 2) }}</span></h4>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <form action="{{ route('process_checkout') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ten_khach_hang" class="form-label">Tên khách hàng</label>
                            <input type="text" id="ten_khach_hang" name="ten_khach_hang" class="form-control" placeholder="Tên khách hàng" required>
                        </div>
                        <div class="col-md-6">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                            <input type="text" id="so_dien_thoai" name="so_dien_thoai" class="form-control" placeholder="Số điện thoại" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ giao hàng</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Địa chỉ giao hàng" required>
                    </div>

                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                        <select id="payment_method" name="payment_method" class="form-select" required>
                            <option value="cod">Thanh toán khi nhận hàng</option>
                            <option value="online">Thanh toán trực tuyến</option>
                            <option value="qr_momo">Quét mã QR Momo</option>
                            <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                            <option value="cash">Tiền mặt</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2">Xác nhận thanh toán</button>
                </form>
            </div>

        @else
            <div class="alert alert-warning text-center mt-5">
                <h5>Giỏ hàng của bạn trống!</h5>
                <p>Hãy thêm sản phẩm vào giỏ hàng để tiếp tục.</p>
            </div>
        @endif
    </div>
</section>
@endsection
