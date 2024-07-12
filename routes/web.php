<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/informasi', [App\Http\Controllers\HomeController::class, 'informasi'])->name('informasi');
Route::get('/postingan-saya', [App\Http\Controllers\HomeController::class, 'postinganSaya'])->name('postingan-saya');
Route::get('/histori-poin', [App\Http\Controllers\HomeController::class, 'historiPoin'])->name('histori-poin');
Route::view('/hadiah', 'hadiah')->name('hadiah');

Route::post('post', [App\Http\Controllers\Member\PostController::class, 'store'])->name('post');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('postingan-member', App\Http\Controllers\Admin\PostController::class);
    Route::resource('daftar-member', App\Http\Controllers\Admin\MemberController::class);
    Route::resource('informasi', App\Http\Controllers\Admin\InformasiController::class);
    Route::get('leaderboard-member', [App\Http\Controllers\Admin\LeaderboardController::class, 'index'])->name('leaderboard-member.index');
    Route::post('start-periode', [App\Http\Controllers\Admin\PeriodeController::class, 'store'])->name('periode.store');
    Route::put('stop-periode', [App\Http\Controllers\Admin\PeriodeController::class, 'stop'])->name('periode.stop');
});

Route::get('/migrate', function () {
    Artisan::call('migrate:fresh', ['--seed' => true]);
    return 'Migrations with seeding completed.';
});
