<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\StatistikaController;
use App\Http\Controllers\api\AdsensController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/statistika',[StatistikaController::class,'index']);
Route::post('/admin/statistika',[StatistikaController::class,'adminstatistik']);
Route::get('/ads/reklama/yuqori1',[AdsensController::class,'index1']);
Route::get('/ads/reklama/textreklama',[AdsensController::class,'text_reklama']);
Route::get('/ads/reklama/baner',[AdsensController::class,'getbonusbaner']);
