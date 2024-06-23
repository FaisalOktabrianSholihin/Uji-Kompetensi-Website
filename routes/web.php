<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('landingpage');
});
Route::get('/admin', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::resource('pegawais', PegawaiController::class);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
