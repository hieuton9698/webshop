<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $size = $request->input('size'); // Lấy thông tin size từ form


        // Lấy thông tin sản phẩm từ database
        $product = \App\Models\Product::find($productId);

        if (!$product) {
            return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
        }

        // Kiểm tra xem giỏ hàng có tồn tại trong session chưa
        $cart = Session::get('cart', []);

        // Nếu sản phẩm đã có trong giỏ, tăng số lượng lên
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->products_name,
                'price' => $product->products_price,
                'quantity' => $quantity,
                'image' => $product->products_image,
                'size' => $size, 
            ];
        }

        // Lưu giỏ hàng vào session
        Session::put('cart', $cart);

        return redirect()->route('show_cart');
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));

    }
    public function removeItem($id)
{
    $cart = session('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session(['cart' => $cart]);
    }
    return redirect()->route('show_cart');
}

}

