<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function rules()
    {
        return view('rules');
    }


    public function contact()
    {
        return view('contact');
    }
}
