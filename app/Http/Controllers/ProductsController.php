<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductsController extends Controller
{
    public function add_products()  
    {
        $cate_products = DB::table('tbl_category_product')->orderby('category_id','desc')->get();

        return view('admin.add_products')->with('cate_products',$cate_products); 
  
        
    } 

    public function showProduct($id)
{
    $product = Product::find($id); // Lấy sản phẩm theo ID

    // Lấy sản phẩm liên quan (cùng danh mục)
    $related_products = Product::where('category_id', $product->category_id)
                                ->where('products_id', '!=', $product->products_id) // Loại bỏ sản phẩm hiện tại
                                ->limit(4) // Giới hạn số lượng sản phẩm liên quan
                                ->get();

    // Trả về view với các dữ liệu cần thiết
    return view('product.details', compact('product', 'related_products'));
}

   public function all_products()
{
    // Truy vấn tất cả sản phẩm và join với bảng danh mục sản phẩm
    $all_products = DB::table('tbl_products')
        ->join('tbl_category_product', 'tbl_products.category_id', '=', 'tbl_category_product.category_id')
        ->select('tbl_products.*', 'tbl_category_product.category_name')
        ->orderby('tbl_products.products_id', 'desc')
        ->get();

    // Trả về view và truyền biến $all_products
    return view('admin.all_products')->with('all_products', $all_products);
}

    
    public function save_products(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'products_name' => 'required|string|max:255',
            'products_price' => 'required|numeric',
            'products_quantity' => 'required|string',
            'products_content' => 'required|string',
            'category_id' => 'required|integer|exists:tbl_category_product,category_id',
            'products_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Prepare data for insertion
        $data = [
            'products_name' => $request->products_name,
            'products_price' => $request->products_price,
            'products_quantity' => $request->products_quantity,
            'products_content' => $request->products_content,
            'category_id' => $request->category_id,
            'products_status' => $request->products_status ?? 1, // Default status
        ];
    
        // Handle product image upload
        if ($request->hasFile('products_image')) {
            $image = $request->file('products_image');
            $image_name = rand(0, 99) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $image_name);
            $data['products_image'] = $image_name;
        }
    
        // Insert data into the database
        DB::table('tbl_products')->insert($data);
    
        // Set success message and redirect
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/add-products');
    }
    
    public function edit_products($products_id)
    {
        $cate_products = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        // Use first() instead of get() to get a single product as an object
        $edit_products = DB::table('tbl_products')->where('products_id', $products_id)->first();
    
        // Pass the data to the view
        $manager_product = view('admin.edit_products')
            ->with('edit_products', $edit_products)
            ->with('cate_products', $cate_products);
    
        // Return the admin layout view with the category manager view
        return view('admin_layout')->with('admin.edit_products', $manager_product);
    }
    
    

    
    public function update_products(Request $request, $products_id)
    {
        
        
    // Validate the incoming request data
        $request->validate([
            'products_name' => 'required|string|max:255',
            'products_quantity' => 'required|numeric',
            'products_price' => 'required|numeric',
            'products_content' => 'nullable|string',
            'category_id' => 'required|integer',
            'products_status' => 'required|boolean',
            'products_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image type and size
        ]);
    
        // Prepare the data to be updated
        $data = array();
        $data['products_name'] = $request->products_name;
        $data['products_quantity'] = $request->products_quantity;
        $data['products_price'] = $request->products_price;
        $data['products_content'] = $request->products_content;
        $data['category_id'] = $request->category_id;
        $data['products_status'] = $request->products_status;
    
        // Check if an image is uploaded
        if ($request->hasFile('products_image')) {
            $image = $request->file('products_image');
            $image_name = Str::random(10) . '.' . $image->getClientOriginalExtension();
    
            // Save the image to the storage directory
            $path = $image->storeAs('public/uploads/products', $image_name);
            $data['products_image'] = basename($path); // Save the file name
        }
    
        // Update the product record in the database
        DB::table('tbl_products')->where('products_id', $products_id)->update($data);
    
        // Set a success message and redirect
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('/all-products'); // Redirect to the list of all products
    }
    
    public function delete_products($products_id)
    {
        // Check if the product exists
        $product = DB::table('tbl_products')->where('products_id', $products_id)->first();
    
        if ($product) {
            // Delete the product from the database
            DB::table('tbl_products')->where('products_id', $products_id)->delete();
            
            // Set a success message
            Session::put('message', 'Sản phẩm đã được xóa thành công');
        } else {
            // Set an error message if the product is not found
            Session::put('message', 'Sản phẩm không tồn tại');
        }
    
        // Redirect back to the products list
        return Redirect::to('/all-products');
    }
    public function detail_products($products_id)
{
    $product = Product::with('category')->where('products_id', $products_id)->firstOrFail();
    
    // Lấy sản phẩm liên quan (cùng danh mục)
    $related_products = Product::where('category_id', $product->category_id)
                                ->where('products_id', '!=', $product->products_id) // Loại bỏ sản phẩm hiện tại
                                ->limit(4) // Giới hạn số lượng sản phẩm liên quan
                                ->get();

    // Trả về view với các dữ liệu cần thiết
    return view('pages.detail_products', compact('product', 'related_products'));
}


}
