<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index')->with('info',session('admin'));
    }


    public function settings()
    {
        return view('admin.settings');
    }

    public function ads()
    {
        return view('admin.ads');
    }


    // Admin login page view
    public function login()
    {
        return view('admin.login');
    }

    // Admin login page request reponse funtion
    public function loginreq(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Adminni bazadan qidirib kuramiz
        $admin =  Admin::where('username',$request->username)->where('password',$request->password)->first();

        if (empty($admin)){
            return redirect('/admin/login')->with('error','Username or password not correct!');
        }

        // Adminni sessionga qushib quyamiz
        session(['admin'=>true]);
        session(['admin_data'=>$admin]);

        // Login bulgan adminni index pagega yunaltirish
        return redirect('/admin')->with('info','Admin login success!');
    }

    // Admin logout function
    public function logout()
    {
        session(['admin' => false]);
        session()->forget('admin_data');

        return redirect('/admin/login')->with('info','Logout with successfull!');
    }
}
