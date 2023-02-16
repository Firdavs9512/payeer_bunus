<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    // Prifile kurinishi uchun
    public function profile()
    {
        return view('profile');
    }


    //Referals bulimi kurinishi
    public function refs()
    {

        $users = User::where('refer',auth()->user()->id)->get();
        // dd($users);
        return view('refs')->with('refers',$users);
    }

    // Payeer address update function
    public function updatepayeer(Request $request)
    {
        $request->validate([
            'payeer' => 'required',
            'password' => 'required',
        ]);

        $user = auth()->user();

        if ($user->password == $request['password'])
        {
            $user->payeer = $request['payeer'];
            $user->save();

            return redirect('/profile');
        }

        return redirect('/profile')->with('error','Password not correct!');

    }
}
