<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category_product()  
    {
        return view('admin.add_category_product'); // Corrected the view path
    }

    // Display all category products
    public function all_category_product()
    {
        
    }
}
