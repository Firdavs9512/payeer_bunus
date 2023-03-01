<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use Spatie\LaravelIgnition\Renderers\ErrorPageRenderer;

class UserController extends Controller
{
    // Userni paginator holatida kurish uchun
    public function index(Request $request)
    {
        if (isset($request->search)){
            $users = User::where ( 'name', 'LIKE', '%' . $request->search . '%' )
                            ->orWhere ( 'email', 'LIKE', '%' . $request->search . '%' )
                            ->paginate (10)
                            ->setPath ( '' );
        }else {
            $users = User::paginate(10)->fragment('users');
        }
        return view('admin.users')->with('users',$users);
    }

    // Userni alohida kurish uchun
    public function show($id)
    {
        $user = User::find($id);
        if (empty($user)){
            abort(404,"User no found!");
        }
        return view('admin.users-show')->with("user",$user);
    }

    // Userni datalarini uzgartirish
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->refer = $request->refer;
        $user->money = $request->money;
        $user->balanse = $request->balanse;
        $user->ip = $request->ip;
        $user->payeer = $request->payeer;
        $user->active = $request->active == 1 ? true : false;
        $user->save();
        return redirect("/admin/users/".$id)->with("info","User success saved!");
    }

    // payment bulimi uchun
    public function payment()
    {
        $payments = Payment::paginate(10)->fragment('payments');
        return view('admin.payments')->with('payments',$payments);
    }
}
