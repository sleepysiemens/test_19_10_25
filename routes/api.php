<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\GuideController;
use Illuminate\Support\Facades\Route;

Route::get('guides', [GuideController::class, 'getActive'])->name('api.guides.active');


Route::get('bookings', [BookingController::class, 'getAll'])->name('api.bookings.all');
Route::post('booking/create', [BookingController::class, 'create'])->name('api.bookings.create');
