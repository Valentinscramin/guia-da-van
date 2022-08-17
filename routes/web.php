<?php

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


//ROTAS SITE
Route::get('/', function () {
    return view('site.home');
});

Auth::routes();

//USER
Route::middleware('auth')->group(function () {
    Route::get('/user', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user_home');
    Route::resource('/user/profile', App\Http\Controllers\User\ProfileController::class);
    Route::resource('/user/van', App\Http\Controllers\User\VanController::class);
});

//ADMIN
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/track', [App\Http\Controllers\Admin\TrackController::class, 'index'])->name('track_home');
});

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginAdminController::class, 'index'])->name('admin_login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginAdminController::class, 'login'])->name('admin_login_submit');
