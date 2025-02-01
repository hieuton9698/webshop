<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiohangController extends Controller
{
    // Hiển thị danh sách giỏ hàng
    public function index()
    {
        $cart_items = DB::table('carts')->get();
        return view('admin.giohang', compact('cart_items'));
    }

    // Xóa một sản phẩm khỏi giỏ hàng
    public function destroy($id)
    {
        // Xóa sản phẩm dựa trên ID
        DB::table('carts')->where('id', $id)->delete();

        // Redirect về danh sách giỏ hàng với thông báo
        return redirect()->route('giohang')->with('success', 'Xóa sản phẩm khỏi giỏ hàng thành công!');
    }
}
