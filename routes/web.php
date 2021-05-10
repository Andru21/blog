<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestRangeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

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



Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');



Route::group(['middleware' => ['AuthCheck']], function () {
    Route::resource('requests', RequestController::class);
    Route::resource('times', RequestRangeController::class);
    /*Route::get('/', function () {
        return view('home');
    })->name('home'); */
    Route::get('login', [UserAuthController::class, 'login'])->name('login');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('/', [MainController::class,'dashboard'])->name('admin.dashboard');
});
