<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ImageUploadController;
  

  

Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
Route::get('image/{filename}', 'HomeController@displayImage')->name('image.displayImage');

Route::resource('photos', PhotoController::class)
        ->missing(function (Request $request) {
            return Redirect::route('photos.index');
        });

Route::resource('photos', PhotoController::class);
Route::resources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
 
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
 
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

use App\Http\Controllers\PostController;
 
Route::apiResources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
use App\Http\Controllers\PhotoCommentController;
 
Route::resource('photos.comments', PhotoCommentController::class);

use App\Http\Controllers\CommentController;
 
Route::resource('photos.comments', CommentController::class)->shallow();
 
Route::resource('photos', PhotoController::class)->names([
    'create' => 'photos.build'
]);
 
Route::resource('photos.comments', PhotoCommentController::class)->scoped([
    'comment' => 'slug',
]);
 
Route::get('/photos/popular', [PhotoController::class, 'popular']);
Route::resource('photos', PhotoController::class);

Route::redirect('/', '/auth/login');
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [Auth\LoginController::class, 'index'])->name('login');
    Route::post('login', [Auth\LoginController::class, 'processLogin']);
    Route::get('register', [Auth\RegisterController::class, 'index'])->name('register');
    Route::post('register', [Auth\RegisterController::class, 'processRegister']);

    Route::get('oauth/google', [Auth\LoginController::class, 'redirectToGoogle'])->name('google');
    Route::get('oauth/google/callback', [Auth\LoginController::class, 'handleGoogleCallback']);
});
Route::get('logout', [Auth\LoginController::class, 'logout'])->name('logout');

Route::prefix('main')->middleware('auth')->group(function () {
    Route::get('dashboard', [Main\DashboardController::class, 'index'])->name('home');

    Route::prefix('ruangan')->group(function () {
        Route::get('/', [Main\SettingRuangController::class, 'index']);

    });
    Route::prefix('peminjaman-saya')->group(function () {
        Route::get('/', [Main\PeminjamanSayaController::class, 'index']);
        Route::get('/add', [Main\PeminjamanSayaController::class,'create']);
        Route::post('/add', [Main\PeminjamanSayaController::class,'store']);
    });
    Route::prefix('jadwalruang')->group(function(){
        Route::get('/', [Main\JadwalRuangController::class,'index']);
    });
    Route::prefix('approval-ruangan')->group(function(){
        Route::get('/', [Main\ApproveRuanganController::class,'index']);
        Route::get('/approve', [Main\ApproveRuanganController::class,'approve']);
    });

});

