<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonhangController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $orders = DB::table('hoa_don')->paginate(10); // Phân trang, 10 đơn hàng mỗi trang
        return view('admin.donhang', compact('orders'));
    }

    // Xóa một đơn hàng
    public function destroy($id)
    {
        $order = DB::table('hoa_don')->where('id', $id)->first();
        if (!$order) {
            return redirect()->route('donhang')->with('error', 'Đơn hàng không tồn tại!');
        }

        DB::table('hoa_don')->where('id', $id)->delete();

        return redirect()->route('donhang')->with('success', 'Xóa đơn hàng thành công!');
    }
}
