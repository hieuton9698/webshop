@extends('admin_layout')

@section('admin_content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between">
        <h3 class="mb-4">Cập nhật sản phẩm</h3>
        <div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
            <a href="{{ URL::to('/all-category-product') }}" class="btn btn-outline-secondary rounded-0">
                <i class="far fa-long-arrow-left"></i> Back
            </a>
        </div>
    </div>
    @foreach($edit_category_product as $key => $edit_value)
    <form role="form" action="{{ URL::to('/update-category-product/' . $edit_value->category_id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
       
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="category_product_name" class="form-label">Tên Sản Phẩm</label>
                <input type="text" name="category_product_name" value="{{ $edit_value->category_name }}" class="form-control rounded-0" id="category_product_name" required>
            </div>
            <div class="col-md-6">
                <label for="category_product_desc" class="form-label">Thương Hiệu</label>
                <textarea name="category_product_desc" class="form-control rounded-0" id="category_product_desc" required>{{ $edit_value->category_desc }}</textarea>
            </div>
        </div>
        
        @endforeach
        <div class="row mb-3">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary rounded-0">Cập nhật sản phẩm</button>
            </div>
        </div>
    </form>
</div>
@endsection
