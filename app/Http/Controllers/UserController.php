<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Lấy danh sách người dùng
        $users = User::all();

        // Truyền dữ liệu vào view
        return view('admin.users', compact('users'));

    }  public function create()
    {
        return view('admin.createuser'); // Trả về view "users.create"
    }

    // Lưu người dùng mới vào database
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        // Tạo người dùng mới
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'], // Mã hóa mật khẩu
        ]);

        // Chuyển hướng về trang danh sách người dùng
        return redirect()->route('users.index')->with('success', 'Người dùng đã được thêm thành công!');
    }
}
