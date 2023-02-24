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

    // Admin setting ads show function
    public function show($id){
        $ads = Adsen::find($id);
        if (empty($ads)){
            return redirect('/admin/ads')->with('error','This ads not found!');
        }
        return view('admin.ads-show')->with('ads',$ads);
    }

    // Admin setting ads update function
    public function update(Request $request,$id){
        $ads = Adsen::find($id);
        if (empty($ads)){
            return redirect('/admin/ads')->with('error','This page or ads not found!');
        }

        $ads->name = $request->get('name');
        $ads->location = $request->get('location');
        $ads->url = $request->get('url');
        $ads->save();
        return redirect()->back()->with('info','Ads update successfull!');
    }

    // Admin setting ads delete function
    public function delete($id){
        Adsen::destroy($id);
        return redirect('/admin/ads')->with('info','Ads success deleted!');
    }
}
