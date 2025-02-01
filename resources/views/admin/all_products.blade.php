@extends('admin_layout')

@section('admin_content')

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between">
        <h3 class="mb-4">Danh sách sản phẩm</h3>
        <div>
            <a href="#" class="btn btn-outline-success rounded-0">Manage Categories</a>
            <a href="{{ URL::to('/add-products') }}" class="btn btn-primary rounded-0">Add Product</a>
        </div>
    </div>

    <!-- Display success/error message -->
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
            {{ Session::forget('message') }}
        </div>
    @endif

    <!-- Product Table -->
    <div class="card rounded-0 border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th class="text-start">Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hình sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($all_products as $product)
    <tr>
        <td>{{ $product->products_name }}</td>
        <td>{{ number_format($product->products_price, 0, ',', '.') }} VND</td>
        <td>
        <img src="{{ asset('uploads/products/'.$product->products_image) }}" 
     style="width: 100px; height: 100px; object-fit: cover;">

        </td>
        <td>{{ $product->category_name }}</td> <!-- Đảm bảo thuộc tính này có trong kết quả truy vấn -->
        <td>
            @if($product->products_status == 1)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </td>
        <td>
            <a href="#" class="btn btn-primary btn-sm">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ URL::to('/edit-products/'.$product->products_id) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-pencil-alt"></i>
            </a>
            <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
               href="{{ URL::to('/delete-products/'.$product->products_id) }}" 
               class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
