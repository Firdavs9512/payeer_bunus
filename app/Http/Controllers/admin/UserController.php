<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(2)->fragment('users');
        return view('admin.users')->with('users',$users);
    }

    // payment bulimi uchun
    public function payment()
    {
        $payments = Payment::paginate(1)->fragment('payments');
        return view('admin.payments')->with('payments',$payments);
    }
}
