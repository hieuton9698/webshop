<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'txt_name' => 'required|string|max:255',
            'txt_email' => 'required|email|unique:khach_hang,email',
            'txt_pass' => 'required|min:6|confirmed',
        ]);

        DB::table('khach_hang')->insert([
            'ten_khach_hang' => $request->txt_name,
            'email' => $request->txt_email,
            'mat_khau' => Hash::make($request->txt_pass),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'txt_email' => 'required|email',
            'txt_pass' => 'required',
        ]);

        $customer = DB::table('khach_hang')->where('email', $request->txt_email)->first();

        if ($customer && Hash::check($request->txt_pass, $customer->mat_khau)) {
            // Lưu thông tin khách hàng vào session
            Session::put('customer', $customer);
            return redirect('/trang-chu');
        }

        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng!');
    }

    // Đăng xuất
    public function logout()
    {
        Session::forget('customer');
        return redirect('/login')->with('success', 'Đăng xuất thành công!');
    }
}
