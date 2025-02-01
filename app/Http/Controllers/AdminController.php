<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    // Display the list of admins
    public function index()
    {
        $admins = Admin::all(); // Fetch all admins
        return view('admin.admins', compact('admins')); // Return the admins view with data
    }

    // Show the form to create a new admin
    public function create()
    {
        return view('admin.createadmin'); // Return the create admin view
    }

    // Store a newly created admin
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|unique:tbl_admin,admin_email',
            'admin_phone' => 'required|string|max:15',
            'admin_password' => 'required',
        ]);

        // Create a new admin
        Admin::create([
            'admin_name' => $validated['admin_name'],
            'admin_email' => $validated['admin_email'],
            'admin_phone' => $validated['admin_phone'],
            'admin_password' => bcrypt($validated['admin_password']), // Hash the password
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin đã được thêm thành công!');
    }

    // Show the admin dashboard
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    // Handle the admin login process
    public function dashboard(Request $request)
    {
        $admin_email = $request->input('admin_email');
        $admin_password = $request->input('admin_password');

        $admin = DB::table('tbl_admin')->where('admin_email', $admin_email)->first();

        if ($admin && password_verify($admin_password, $admin->admin_password)) {
            Session::put('admin_name', $admin->admin_name);
            Session::put('admin_id', $admin->admin_id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản không đúng. Vui lòng nhập lại!');
            return Redirect::to('/admin');
        }
    }

    // Handle the logout process
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin-login');
    }
}
