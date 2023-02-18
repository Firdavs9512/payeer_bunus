<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\Bonus;
use App\Models\User;
use App\Models\Payment;

class StatistikaController extends Controller
{
    // Statistika uchun api
    public function index()
    {
        $workday = Setting::firstWhere('name','Work_day')['value']+123;
        $users = User::all()->count()+165;
        $newusers = Setting::firstWhere('name','New_users')['value_int']+5;
        $payments = User::all()->sum('money')+123;
        $allbonus = Bonus::all()->count()+1965;


        $data = [
            'workday'=>$workday,
            'users' => $users,
            'newusers' => $newusers,
            'payments' => $payments,
            'allbonus' => $allbonus,
        ];

        return response()->json($data);
    }

    // Admin panelda statistika datalarini olish
    public function adminstatistik()
    {
        $workday = Setting::firstWhere('name','Work_day')['value'];
        $newusers = Setting::firstWhere('name','New_users')['value_int'];
        $daypayments = Setting::firstWhere('name','Day_payments')['value_int'];


        $data = [
            'workday'=>$workday,
            'newusers' => $newusers,
            'daypayments' => $daypayments,
        ];

        return response()->json($data);
    }
}
