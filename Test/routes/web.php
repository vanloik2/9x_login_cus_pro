<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('home_page', function () {
    return view('home_page', ['title' => 'Home Page']);
})->name('home_page');

Route::controller(UserController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerAction')->name('register_action');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginAction')->name('login_action');
    Route::get('/change_pw', 'change_pw')->name('change_pw');
    Route::post('/change_pw', 'change_pwAction')->name('change_pw_action');
    Route::get('/logout', 'logout')->name('logout');
});

Route::resource('customer', CustomerController::class);

Route::resource('product', ProductController::class);