<?php

use App\Http\Controllers\Admin\MajorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;

Route::prefix('admin')->as('admin.')->group(function () {


Route::middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('pages.home.dashboard');
    Route::post('/logout', LogoutController::class)->name('auth.logout');

    Route::resource('majors', MajorController::class);
});

    Route::get('/login', [LoginController::class, 'show'])->name('auth.login.show');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');


});
