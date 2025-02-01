@extends('admin_layout')

@section('admin_content')

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between">
        <h3 class="mb-4">Cập nhật sản phẩm</h3>
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

    <!-- Directly use $edit_products without looping -->
    <form role="form" action="{{ URL::to('/update-products/'.$edit_products->products_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="products_name" class="form-label">Tên Sản Phẩm</label>
                <input type="text" name="products_name" class="form-control rounded-0" id="products_name" 
                value="{{ $edit_products->products_name }}" required>
            </div>
            <div class="col-md-6">
                <label for="products_price" class="form-label">Giá tiền</label>
                <input type="number" name="products_price" class="form-control rounded-0" id="products_price" 
                value="{{ $edit_products->products_price }}" required>
            </div>
            <div class="col-md-6">
                <label for="products_image" class="form-label">Hình ảnh Sản Phẩm</label>
                <input type="file" name="products_image" class="form-control rounded-0" id="products_image">
                <!-- Display the current product image -->
                <img src="{{ asset('uploads/products/'.$edit_products->products_image) }}" 
                     style="width: 100px; height: 100px; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <label for="products_quantity" class="form-label">số lượng</label>
                <textarea name="products_quantity" class="form-control rounded-0" id="products_quantity" required>{{ $edit_products->products_quantity }}</textarea>
            </div>
            <div class="col-md-6">
    <label for="products_status" class="form-label">Trạng thái sản phẩm</label>
    <input type="checkbox" name="products_status" id="products_status" 
           value="1" {{ $edit_products->products_status ? 'checked' : '' }}>
    <label for="products_status">Kích hoạt</label>
</div>

            <div class="col-md-6">
                <label for="products_content" class="form-label">Nội dung sản phẩm</label>
                <textarea name="products_content" class="form-control rounded-0" id="products_content" required>{{ $edit_products->products_content }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="category_id" class="form-label">Danh mục</label>
                <select name="category_id" class="form-control rounded-0" id="category_id" required>
                    @foreach($cate_products as $cate)
                        <option value="{{ $cate->category_id }}" 
                            {{ $edit_products->category_id == $cate->category_id ? 'selected' : '' }}>
                            {{ $cate->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary rounded-0">Cập nhật sản phẩm</button>
            </div>
        </div>
    </form>
</div>

@endsection
