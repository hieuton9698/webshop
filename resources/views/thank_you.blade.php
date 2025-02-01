@extends('welcome')

@section('content')
<div class="container text-center my-5">
    <h1 class="text-success">Cảm ơn bạn đã mua hàng!</h1>
    <p>Đơn hàng của bạn đã được tiếp nhận và đang được xử lý.</p>
    <a href="{{ url('/trang-chu') }}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
</div>
@endsection
