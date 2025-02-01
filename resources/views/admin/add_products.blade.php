@extends('admin_layout')

@section('admin_content')

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between">
        <h3 class="mb-4">Thêm sản phẩm</h3>
        <div>
            @if(Session::has('message'))
                <span class="text-alert">{{ Session::get('message') }}</span>
                {{ Session::forget('message') }}
            @endif
            <a href="{{ URL::to('/all-products') }}" class="btn btn-outline-secondary rounded-0">
                <i class="fas fa-long-arrow-alt-left"></i> Back
            </a>
        </div>
    </div>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form role="form" action="{{ URL::to('/save-products') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="products_name" class="form-label">Tên Sản Phẩm</label>
                <input type="text" name="products_name" class="form-control rounded-0" id="products_name" required>
            </div>
            <div class="col-md-6">
                <label for="products_price" class="form-label">Giá tiền</label>
                <input type="number" name="products_price" class="form-control rounded-0" id="products_price" required>
            </div>
            <div class="col-md-6">
                <label for="products_image" class="form-label">Hình ảnh Sản Phẩm</label>
                <input type="file" name="products_image" class="form-control rounded-0" id="products_image" required>
            </div>
            <div class="col-md-6">
                <label for="products_quantity" class="form-label">Số lượng</label>
                <input type="number" name="products_quantity" class="form-control rounded-0" id="products_quantity" required>
            </div>

            <div class="col-md-6">
                <label for="products_content" class="form-label">Nội dung sản phẩm</label>
                <textarea name="products_content" class="form-control rounded-0" id="products_content" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="category_id" class="form-label">Danh mục</label>
                <select name="category_id" class="form-control rounded-0" id="category_id" required>
                    @foreach($cate_products as $cate)
                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary rounded-0">Thêm sản phẩm</button>
            </div>
        </div>
    </form>
</div>

@endsection
