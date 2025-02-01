<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang; // Sử dụng model KhachHang
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    // Hiển thị trang đăng nhập
    public function showLoginForm()
    {
        return view('khachhang');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Kiểm tra hợp lệ dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Dữ liệu xác thực
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Xử lý đăng nhập
        if (Auth::guard('khachhang')->attempt($credentials)) {
            return redirect()->intended('/trang-chu');
        }

        // Nếu đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    // Hiển thị trang đăng ký
    public function showRegisterForm()
    {
        return view('dangkikhachhang');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Kiểm tra hợp lệ dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:khach_hang,email',
            'password' => 'required',
        ]);

        // Tạo đối tượng khách hàng mới
        $khachhang = new KhachHang();
        $khachhang->ten_khach_hang = $request->name;
        $khachhang->email = $request->email;
        $khachhang->mat_khau = Hash::make($request->password);
        $khachhang->ngay_tao = now(); // Lưu thời gian tạo tài khoản
        $khachhang->save();

        // Đăng nhập người dùng ngay sau khi đăng ký
        Auth::guard('khachhang')->login($khachhang);

        // Chuyển hướng đến trang chủ
        return redirect('/trang-chu');
    }
    public function logout()
{
    Auth::guard('khachhang')->logout();
    return redirect('/trang-chu'); // Hoặc trang bạn muốn chuyển sau khi đăng xuất
}

}
