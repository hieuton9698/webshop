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
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-primary" href="{{ URL::to('/trang-chu') }}"><i class="fas fa-home me-2"></i>Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-primary" href="#services"><i class="fas fa-concierge-bell me-2"></i>Dịch Vụ</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link fw-bold text-primary" href="#contact"><i class="fas fa-envelope me-2"></i>Liên Hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <h2 class="my-4 text-center text-primary">Liên Hệ Với Chúng Tôi</h2>

        <p class="text-center text-muted">Nếu bạn có bất kỳ câu hỏi nào về sản phẩm, đơn hàng hoặc các dịch vụ của chúng tôi, vui lòng điền thông tin dưới đây và chúng tôi sẽ trả lời bạn trong thời gian sớm nhất.</p>

        <!-- Hình ảnh sản phẩm -->
        <div class="text-center my-4">
            <img src="{{ asset('frontend/assets/img/backgrounds/mou.jpg') }}" alt="Sản phẩm" class="img-fluid rounded shadow-lg" style="max-width: 450px; transition: transform 0.3s ease;">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h4 class="text-center text-primary mb-4">Gửi Thông Tin Liên Hệ</h4>
                        <form action="{{ route('send_contact') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và Tên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Nội dung</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg w-50">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
