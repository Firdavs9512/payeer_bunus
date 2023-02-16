<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    
    // Index page kurinishi
    public function index()
    {
        return view('index')->with('bonuses',DB::table('bonuses')->orderBy('created_at', 'desc')->limit(50)->get());
    }
}
