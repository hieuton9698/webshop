@extends('admin_layout') <!-- Hoặc template layout của bạn -->

@section('admin_content')
<div class="container mt-4">
    <h1 class="mb-4">Quản Lý Admin</h1>
    <div>
        <a href="{{ route('createadmin') }}" class="btn btn-primary rounded-0">Add Admin</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->admin_id }}</td>
                <td>{{ $admin->admin_name }}</td>
                <td>{{ $admin->admin_email }}</td>
                <td>{{ $admin->admin_phone }}</td>
                <td>{{ $admin->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Sửa</a>
                    <a href="#" class="btn btn-danger btn-sm">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
