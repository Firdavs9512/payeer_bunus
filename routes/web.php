<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[IndexController::class,'index'])->name('index');

Route::get('/rules', [ViewController::class,'rules'])->name('rules');
Route::get('/contact', [ViewController::class,'contact'])->name('contact');

Route::get('/reg', [AuthController::class,'reg'])->name('reg');
Route::post('/register',[AuthController::class,'register'])->name('registerreq');
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginreq'])->name('loginreq');
Route::get('/logout',[AuthController::class,'logout']);
Route::get('/reset-password',[AuthController::class,'reset'])->name('reset_password');
Route::post('/reset-password',[AuthController::class, 'resetreq'])->name('resetreq');
Route::get('/forgot-password',[AuthController::class,'forgot'])->name('password.reset');
Route::post('/forgot-password',[AuthController::class,'forgotreq'])->name('forgotreq');

Route::get('/profile', [ProfileController::class,'profile'])->name('profile')->middleware('auth');//
Route::get('/refs',[ProfileController::class,'refs'])->name('refs')->middleware('auth');//
Route::post('/profile',[ProfileController::class,'updatepayeer'])->name('update-payeer')->middleware('auth');//

Route::get('/top', [HistoryController::class,'top'])->name('top');
Route::get('/payments', [HistoryController::class,'payments'])->name('payments');

Route::get('/balance',[PaymentController::class,'balance'])->name('balance')->middleware('auth');//
Route::post('/withdraw',[PaymentController::class,'withdraw'])->name('withdraw')->middleware('auth');

Route::get('/bonus',[BonusController::class,'bonus'])->name('bonus')->middleware('auth');//
Route::post('/bonus',[BonusController::class,'getbonus'])->name('getbonus')->middleware('auth');//


// Admin panel routerlari

Route::prefix('admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::get('/users',[UserController::class,'index'])->name('admin.users');
    Route::get('/payments',[UserController::class,'payment'])->name('admin.payment');
    Route::get('/settings',[AdminController::class,'settings'])->name('admin.settings');
});