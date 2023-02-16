<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Rules\Recaptcha;


class AuthController extends Controller
{
    // Registratsiya kurinishi uchun
    public function reg(Request $request)
    {
        if ($request['ref']){
            session(['refer'=>$request['ref']]);
        }

        return view('reg');
    }

    // Regitratsiyadan kelgan surovga javob beradi
    public function register(Request $request)
    {
        if (isset(auth()->user()->email))
        {
            return redirect('/');
        }
        // dd($request);
        $request->validate([
            'g-recaptcha-response' => ['required', new Recaptcha()],
            'name'=> 'required|max:15',
            'email' => 'email|required|unique:users',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $test = User::firstWhere('ip',$_SERVER['REMOTE_ADDR']);

        if (isset($test['email'])){
            return redirect('/login')->with('error','This thread has already been registered');
        }

        $ref = $request['refer']== 'Вы сами пришли' ? 0 : $request['refer'];
        $refer_user = User::find($ref);
        if (isset($refer_user)){
            $refer_user->balanse +=0.01;
            $refer_user->money +=0.01;
            $refer_user->save();
        }
            
        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'refer'=> $ref,
            'ip' => $_SERVER['REMOTE_ADDR'],
        ]);


        // Settingsga userni qushib quyish
        $new_users = Setting::Find(3);
        $new_users['value_int'] = $new_users['value_int']+1;
        $new_users->save();

        // Bugungi qushil

        Auth::login($user);
        return redirect('/');
    }

    // Login kurinishi uchun
    public function login()
    {
        if (isset(auth()->user()->email))
        {
            return redirect('/');
        }
        return view('login');
    }


    // Login reuqest javobi
    public function loginreq(Request $request)
    {
        $request->validate([
            'email'=>'email|required',
            'password'=> 'required',
            'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);

        $user = User::firstWhere('email',$request['email']);

        if ($user==null){
            return redirect('/login')->with('error','Email not found!');
        }

        if ($request['password']!=$user['password']){
            return redirect('/login')->with('error','Password or email not correct!');
        }

        Auth::login($user);
        return redirect('/');

    }

    // Reset password kurinish
    public function reset()
    {
        if (isset(auth()->user()->email))
        {
            return redirect('/');
        }
        return view('reset-password');
    }

    // Reset password function
    public function resetreq(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        
        return $status === Password::RESET_LINK_SENT
                ? back()->with(['info' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }


    // Forgot page
    public function forgot(Request $request)
    {

        $data = [
            'email' => $request['email'],
            'token' => $request['token'],
        ];
        return view('forgot-password')->with('data',$data);
    }

    // Forgot request function
    public function forgotreq(Request $request)
    {
        $request->validate([
            'email'=> 'email|required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);


        $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ]);
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('info', __($status))
                : back()->withErrors(['password' => [__($status)]]);

    }

    // Logout function
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
