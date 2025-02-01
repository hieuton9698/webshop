<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu danh mục
        $category = DB::table('tbl_category_product')->get();

        // Lấy tất cả sản phẩm 
        $all_products = DB::table('tbl_products')->get();

        // Truyền biến sang view
        return view('pages.home')->with([
            'category' => $category,
            'all_products' => $all_products,
        ]);
    }
}
