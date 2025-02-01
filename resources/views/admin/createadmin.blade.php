@extends('admin_layout')

@section('admin_content')
<div class="container mt-4">
    <h1 class="mb-4">Thêm Admin</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="admin_name">Tên</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" value="{{ old('admin_name') }}" required>
            @error('admin_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="admin_email">Email</label>
            <input type="email" class="form-control" id="admin_email" name="admin_email" value="{{ old('admin_email') }}" required>
            @error('admin_email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="admin_phone">Số điện thoại</label>
            <input type="text" class="form-control" id="admin_phone" name="admin_phone" value="{{ old('admin_phone') }}" required>
            @error('admin_phone')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="admin_password">Mật khẩu</label>
            <input type="password" class="form-control" id="admin_password" name="admin_password" required>
            @error('admin_password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Thêm Admin</button>
        <a href="{{ route('admins.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
