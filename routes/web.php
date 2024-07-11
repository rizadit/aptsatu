<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home2');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/kemenkeu-id/login', [\App\Http\Controllers\KemenkeuID\Login::class, 'login'])
    ->name('kemenkeu-id.login');
Route::get('/kemenkeu-id/callback', [\App\Http\Controllers\KemenkeuID\Login::class, 'callback'])
    ->name('kemenkeu-id.callback');
Route::get('kemenkeu-id/logout', [\App\Http\Controllers\KemenkeuID\Logout::class, 'logout'])
    ->name('kemenkeu-id.logout');
// Route::get('/', function () {
//     return view('welcome');
// });
