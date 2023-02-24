<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adsen;
use App\Http\Resources\AdsenResource;


class AdsensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $yuqori1 = Adsen::where('location','yuqori1')->get();
        $yuqori2 = Adsen::where('location','yuqori2')->get();
        $data = [
            'yuqori1' => AdsenResource::collection($yuqori1),
            'yuqori2' => AdsenResource::collection($yuqori2),
        ];
        return response()->json($data);
    }

    public function text_reklama()
    {
        $text = Adsen::where('location','yozuvli_reklama')->get();
        return AdsenResource::collection($text);
    }

    public function getbonusbaner(){
        $baner = Adsen::where('location','bonus_olishda_ishlatiladigan_baner')->first();
        return response()->json(['url'=> $baner->url]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
