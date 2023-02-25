<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    // Update setting data
    public function settingupdate(Request $request)
    {
        if ($request->how == 'work_day'){
            $work = Setting::where('name','Work_day')->first();
            $work->value = $request->work_day;
            $work->save();
            return response()->json(['message' => 'Work day saved successfull!' ]);
        }   

        if ($request->how == 'day_payments'){
            $pay = Setting::where('name','Day_payments')->first();
            $pay->value_int = intval($request->day_payments);
            $pay->save();
            return response()->json(['message' => 'Payments for day saved successfull!' ]);
        }

        if ($request->how == 'new_users'){
            $nuser = Setting::where('name','New_users')->first();
            $nuser->value_int = intval($request->new_users);
            $nuser->save();
            return response()->json(['message' => 'New users saved successfull!' ]);
        }

        if ($request->how == 'header_change'){
            Setting::where('name','Header')->update(['value' => $request->header_change]);
            return response()->json(['message' => 'Header value change successfull!']);
        }

        if ($request->how == 'payment_action'){
            $payment = Setting::where('name', 'Payment_action')->first();
            $payment->value_int = $request->payment_action == 'yopiq' ? 0 : 1;
            $payment->save();
            return response()->json(['message' => 'Payment action successfull changed!' ]);
        }


        return response()->json(['error' => 'Request data not found!' ]);
    }


    // Admin holatida yangi user yaratish uchun funtion
    public function newuser()
    {
        return view('admin.newuser');
    }

    public function createuser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'ip' => 'required|unique:users'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'password' => $request['password'],
            'refer' => $request['refer'],
            'ip' => $request['ip'],
            'balanse' => $request['balanse'],
            'money' => $request['balanse'],
            'payeer' => $request['payeer'],
            'email' => $request['email'],
        ]);

        if (empty($user)){
            return redirect('/admin/new/user')->with('error','Error for create user!');
        }


        return redirect('/admin/new/user')->with('info','User created successfull!');
    }
}
