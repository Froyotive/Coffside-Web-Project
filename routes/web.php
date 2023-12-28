<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::get('/menu', function () {
    return view('menu');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/promo', function () {
    return view('promo');
});

Route::get('/banner-1', function (){
    return view('banner.banner-1');
});

Route::get('/banner-2', function (){
    return view('banner.banner-2');
});

Route::get('/banner-3', function (){
    return view('banner.banner-3');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
    });

    Route::prefix('customer')->middleware('role:customer')->group(function () {
        Route::get('dashboard', function () {
            return view('customer.dashboard');
        })->name('customer.dashboard');
    });
});

Route::resource('menus', MenuController::class);
Route::get('/users', [UserController::class, 'index'])->name('users.index');