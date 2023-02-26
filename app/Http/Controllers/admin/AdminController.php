<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Bonus;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all()->count(),
            'payments' => Payment::all()->count(),
            'bonuses' => Bonus::all()->count(),
            'newusers' => Setting::find(3)['value_int'],
            'payment_action' => Setting::where('name','Payment_action')->first()->value_int,
            'sitename' => Setting::where('name','site_name')->first()->value,
        ];
        return view('admin.index')->with('data',$data);
    }


    public function settings()
    {
        $data =[
            'sitename' => Setting::where('name', 'site_name')->first()->value,
            'header' => Setting::where('name','Header')->first()->value,
            'payment_type' => Setting::where('name','Payment_action')->first()->value_int,
        ];
        return view('admin.settings')->with('data' , $data);
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
