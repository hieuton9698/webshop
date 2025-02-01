@extends('admin_layout')

@section('admin_content')

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between">
        <h3 class="mb-4">Thêm danh mục</h3>
        <div>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">', $message, '</span>';
            Session::put('message', null);
        }
        ?>
            <a href="{{ URL::to('/dashboard') }}" class="btn btn-outline-secondary rounded-0">
                <i class="far fa-long-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <form role="form" action="{{URL::to('/save-category-product')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="product_name" class="form-label">Tên danh mục</label>
                <input type="text" name="category_product_name" class="form-control rounded-0" id="Tên danh mục" required>
            </div>
            <div class="col-md-6">
                <label for="category" class="form-label">Thương Hiệu</label>
                <input type="text" name="category_product_desc" class="form-control rounded-0" id="Thương Hiệu" required>
            </div>
        </div>
        <!-- <div class="row mb-3">
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="category_product_price" class="form-control rounded-0" id="price" required>
            </div>
            <div class="col-md-6">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="category_product_stock" class="form-control rounded-0" id="stock" required>
            </div>
        </div> -->
        <!-- <div class="row mb-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Mô tả sản phẩm</label>
                <textarea class="form-control rounded-0" name="category_product_desc" id="Mô tả sản phẩm" required></textarea>
            </div> -->
            <!-- <div class="col-md-6">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="category_product_image" class="form-control rounded-0" id="image" required>
            </div> -->
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <button type="submit" class="add_category_product">Add danh mục</button>
            </div>
        </div>
    </form>
</div>

@endsection
