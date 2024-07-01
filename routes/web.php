<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/informasi', 'informasi')->name('informasi');
Route::view('/hadiah', 'hadiah')->name('hadiah');

Route::post('post', [App\Http\Controllers\Member\PostController::class, 'store'])->name('post');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('postingan-member', App\Http\Controllers\Admin\PostController::class);
    Route::resource('daftar-member', App\Http\Controllers\Admin\MemberController::class);
    Route::get('leaderboard-member', [App\Http\Controllers\Admin\LeaderboardController::class, 'index'])->name('leaderboard-member.index');
    Route::get('leaderboard-member/reset', [App\Http\Controllers\Admin\LeaderboardController::class, 'reset'])->name('leaderboard-member.reset');
});

Route::get('/migrate', function () {
    Artisan::call('migrate:fresh', ['--seed' => true]);
    return 'Migrations with seeding completed.';
});
