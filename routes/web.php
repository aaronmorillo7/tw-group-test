<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'auth.login');
Route::view('/signup', 'auth.signup');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function () { 
    Route::view('/', 'home')->name('dashboard.index');
    Route::view('room/', 'admin.rooms.create')->middleware('can:create_room')->name('rooms.create.index');

    Route::group(['prefix' => '/rooms'], function () {
        Route::post('/', [RoomController::class, 'create'])->middleware('can:create_room')->name('rooms.create');
        Route::put('/{id}', [RoomController::class, 'update'])->middleware('can:update_room')->name('rooms.update');
        Route::delete('/{id}', [RoomController::class, 'delete'])->middleware('can:delete_room')->name('rooms.delete');

        Route::get('/{id}', [RoomController::class, 'getRoom'])->middleware(['can:get_room', 'can:update_room'])->name('rooms.update.index');
        Route::get('/{id}/bookings', [])->name('rooms.bookings.index');
        Route::get('/', [RoomController::class, 'getRooms'])->middleware('can:get_rooms')->name('rooms.index');
    });

    Route::get('/booking', [BookingController::class, 'createView'])->middleware('can:create_booking')->name('bookings.create.index');

    Route::group(['prefix' => 'bookings'], function () {
        Route::get('/', [BookingController::class, 'getBookings'])->name('bookings.index');  
        Route::post('/', [BookingController::class, 'create'])->name('bookings.create');
        Route::put('/{id}', [BookingController::class, 'updateStatus'])->middleware('can:update_bookings')->name('bookings.update.status');
    }); 
});