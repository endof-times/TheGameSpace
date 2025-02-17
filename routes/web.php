<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;


Route::get('/', [GameController::class, 'home'])->name('home');
Route::get('/bestsellers', [GameController::class, 'bestsellers'])->name('bestsellers');
Route::get('/mostdiscussed', [GameController::class, 'mostdiscussed'])->name('mostdiscussed');

Route::prefix('auth/')->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('store', [AuthController::class, 'store']);
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate']);
});

Route::get('/search',[GameController::class, 'search'])->name('search');
Route::get('/game', [GameController::class, 'show'])->name('showGame');
Route::get('/platforms', [GameController::class, 'platforms'])->name('platforms');
Route::get('/platform', [GameController::class, 'platform'])->name('platform');
