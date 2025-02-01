<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart', []);

        // Kiểm tra xem giỏ hàng có sản phẩm hay không
        if (empty($cart)) {
            return redirect()->route('show_cart')->with('message', 'Giỏ hàng trống! Vui lòng thêm sản phẩm vào giỏ.');
        }

        // Truyền giỏ hàng đến trang thanh toán
        return view('checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        // Kiểm tra giỏ hàng
        $cart = Session::get('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        // Tính tổng tiền
        $tong_tien = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Lưu thông tin hóa đơn vào bảng 'hoa_don'
        $hoaDonId = DB::table('hoa_don')->insertGetId([
            'ten_khach_hang' => $request->input('ten_khach_hang', 'Khách hàng không tên'),
            'so_dien_thoai' => $request->input('so_dien_thoai'),
            'dia_chi' => $request->input('address'),
            'phuong_thuc_thanh_toan' => $request->input('payment_method'),
            'tong_tien' => $tong_tien,
            'ngay_tao' => now(),
        ]);

        // Lưu từng sản phẩm vào bảng 'carts'
        foreach ($cart as $item) {
            DB::table('carts')->insert([
                'hoa_don_id' => $hoaDonId,  // Lưu ID hóa đơn để liên kết với các sản phẩm
                'products_id' => $item['id'],
                'products_name' => $item['name'],
                'products_image' => $item['image'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'category_id' => $item['category_id'] ?? null,
                'size' => $item['size'] ?? 'N/A',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        Session::forget('cart');

        // Chuyển hướng đến trang cảm ơn
        return redirect('/thank-you')->with('success', 'Thanh toán thành công!');
    }
}
