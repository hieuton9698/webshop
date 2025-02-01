<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;


class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = session::get('admin_io');
    if($admin_id){
        return Redirect::to('dashboard');
    }else{
        return Redirect::to('admin')->send();
    }
    
    }
    public function add_category_product()  
    {

        return view('admin.add_category_product'); // Corrected the view path
    }

    // Display all category products
    public function all_category_product()
    {
       
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product); 
    }
    public function save_category_product(Request $request)
    {
       
        $data= array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_id)
    {
       
        // Fetch the category product data based on the category_id
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_id)->get();
    
        // Pass the data to the view
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
    
        // Return the admin layout view with the category manager view
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    

    public function update_category_product(Request $request, $category_id)
    {
       
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
    
        // Update the database record
        DB::table('tbl_category_product')->where('category_id', $category_id)->update($data);
    
        // Set a success message in the session
        Session::put('message', 'Cập nhật dah mục thành công');
    
        // Redirect to the list of all category products
        return Redirect::to('all-category-product');
    }
    
    public function delete_category_product($category_id)
    {
        $this->AuthLogin();
     // Update the database record
     DB::table('tbl_category_product')->where('category_id', $category_id)->delete();
    
     // Set a success message in the session
     Session::put('message', 'Xóa danh mục thành công');
 
     // Redirect to the list of all category products
     return Redirect::to('all-category-product');
    }

}
