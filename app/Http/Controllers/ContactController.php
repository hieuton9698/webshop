<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        // Xử lý và gửi thông tin liên hệ qua email hoặc lưu vào cơ sở dữ liệu
        // Gửi email hoặc lưu thông tin của khách hàng
        
        return redirect()->route('contact')->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ trả lời bạn sớm.');
    }
}
