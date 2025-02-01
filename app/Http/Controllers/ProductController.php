<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller

{
    /**
     * Display a listing of the products.
     */
    public function index()  
    {
        $product = Product::all(); // Retrieve all products from the database
        return view('product_list', ['product' => $product]);
    }
    
        // Giả sử bảng products có mối quan hệ với bảng product_category qua category_id
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('create_product'); // Navigate to the product creation view
    }
    
    /**
     * Store a newly created product in the database.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required|string|max:50',
            'pro_price' => 'required|integer',
            'pro_quantity' => 'required|integer',
            'pro_img' => 'required|string', // Assuming this holds an image URL/path
            'pro_des' => 'required|string|max:50',
            'pro_detail' => 'required|integer', // Assuming it's an integer reference ID
        ]);

        Product::create([
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'pro_quantity' => $request->pro_quantity,
            'pro_img' => $request->pro_img,
            'pro_des' => $request->pro_des,
            'pro_detail' => $request->pro_detail,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }
    
    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Find product by ID
        return view('edit_product', ['product' => $product]);
    }
    
    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pro_name' => 'required|string|max:50',
            'pro_price' => 'required|integer',
            'pro_quantity' => 'required|integer',
            'pro_img' => 'required|string',
            'pro_des' => 'required|string|max:50',
            'pro_detail' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'pro_quantity' => $request->pro_quantity,
            'pro_img' => $request->pro_img,
            'pro_des' => $request->pro_des,
            'pro_detail' => $request->pro_detail,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }
    
    /**
     * Remove the specified product from the database.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id); // Find product by ID
        $product->delete(); // Delete product from the database

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }
}
