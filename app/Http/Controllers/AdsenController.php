<?php

namespace App\Http\Controllers;

use App\Models\Adsen;
use Illuminate\Http\Request;

class AdsenController extends Controller
{
    // Reklama yaratish function
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'url' => 'required',
        ]);

        $ads = Adsen::create([
            'name' => $request['name'],
            'location' => $request['location'],
            'url' => $request['url'],
        ]);

        if (empty($ads)){
            return redirect('/admin/ads')->with('error','Created add for error database!');
        }

        return redirect('/admin/ads')->with('info','Add created successfull!');
    }

    // Reklamalari kursatish uchun
    public function ads()
    {
        $ads = Adsen::all();
        return view('admin.ads')->with('ads',$ads);
    }
}
