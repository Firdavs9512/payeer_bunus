<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
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

        dd($request);
    }
}
