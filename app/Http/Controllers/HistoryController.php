<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    // TOP routeri kurinishi uchun
    public function top()
    {
        return view('top')->with('tops',DB::table('users')->orderBy('money', 'desc')->limit(30)->get());
    }

    // Payments bulimi kurinishi uchun
    public function payments()
    {

        return view('payments')->with('payment',DB::table('payments')->orderBy('created_at', 'desc')->limit(50)->get());
    }
}
