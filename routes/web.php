<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/informasi', 'informasi')->name('informasi');
Route::view('/hadiah', 'hadiah')->name('hadiah');

Route::post('post', [App\Http\Controllers\Member\PostController::class, 'store'])->name('post');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('postingan-member', App\Http\Controllers\Admin\PostController::class);
    Route::resource('daftar-member', App\Http\Controllers\Admin\MemberController::class);
});
