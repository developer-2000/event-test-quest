<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EventController;
use \App\Http\Controllers\VenueController;
use App\Http\Controllers\HomeController;
use \App\Http\Middleware\WeatherMiddleware;

//Route::middleware(['auth', WeatherMiddleware::class])->group(function () {
Route::middleware(['auth'])->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('venues', VenueController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Auth::routes();

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
});
