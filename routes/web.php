<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'auth.login');
Route::view('/signup', 'auth.signup');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function () { 
    Route::view('/', 'home')->name('dashboard.index');
});