<?php

use App\Http\Controllers\Site\MajorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\LogoutController;
use App\Http\Controllers\Site\Auth\RegisterController;

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

Route::as('site.')->group(function () {

    Route::get('/', HomeController::class)->name('home.index');

    Route::get('/majors', MajorController::class)->name('majors.index')->middleware('auth');

    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

    Route::get('/login', [LoginController::class, 'show'])->name('login.show');

    Route::post('/logout', LogoutController::class)->name('logout');
});



