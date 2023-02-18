<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
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



        return response()->json(['error' => 'Request data not found!' ]);
    }
}
