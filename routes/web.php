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

//HOME
Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name("home");

//QUEM SOMOS
Route::get('/quem-somos', [App\Http\Controllers\SiteController::class, 'quemsomos'])->name("quem_somos");

//ANUNCIE AQUI
Route::get('/anuncie-aqui', [App\Http\Controllers\SiteController::class, 'anuncie'])->name("anuncie_aqui");

//FAQ
Route::get('/faq', [App\Http\Controllers\SiteController::class, 'faq'])->name("faq");

// CONTATO
Route::get('/contato', [App\Http\Controllers\SiteController::class, 'contato'])->name("contato");

//FILTRO
Route::get('/busca/resultado', [App\Http\Controllers\SiteController::class, 'busca'])->name('busca_resultado');

//PROFILE
Route::get('/profile/{id}', [App\Http\Controllers\User\ProfileController::class, 'show'])->name('profile_show');

//AVALIATION
Route::resource('/avaliation', App\Http\Controllers\User\AvaliationController::class);

//COMMENT
Route::post('/comment/push', [App\Http\Controllers\User\CommentController::class, 'store'])->name('comment_push');

//COMMENT WEB SITE
Route::get('/web-site-comment', [App\Http\Controllers\User\WebSiteCommentController::class, 'index'])->name('web_site_comment');
Route::post('/web-site-comment/push', [App\Http\Controllers\User\WebSiteCommentController::class, 'store'])->name('web_site_comment_push');

Auth::routes();

//USER
Route::middleware('auth')->group(function () {
    Route::get('/user', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user_home');
    Route::resource('/user/profile', App\Http\Controllers\User\ProfileController::class);
    Route::resource('/user/van', App\Http\Controllers\User\VanController::class);
    Route::resource('/user/photos', App\Http\Controllers\User\UserPhotosController::class, ['names' => 'user.photos']);
});

//ADMIN
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/track', [App\Http\Controllers\Admin\TrackController::class, 'index'])->name('track_home');

    //USER
    Route::resource('/admin/user', App\Http\Controllers\Admin\UserController::class);

    //PHOTOS ALBUM
    Route::resource('/admin/photos', App\Http\Controllers\Admin\AdminPhotosController::class, ['names' => 'admin.photos']);
    Route::get('/admin/photos/download/{id}', [App\Http\Controllers\Admin\AdminPhotosController::class, 'download'])->name('photo_download');

    //ANUNCIO
    Route::resource('/admin/announcement', App\Http\Controllers\Admin\AnnouncementController::class);
});

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginAdminController::class, 'index'])->name('admin_login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginAdminController::class, 'login'])->name('admin_login_submit');
