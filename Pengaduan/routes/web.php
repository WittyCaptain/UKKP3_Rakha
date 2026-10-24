<?php

use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/register', [AuthManualController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthManualController::class, 'register'])
    ->name('register.store');

Route::post('/sementara', [AuthManualController::class, 'sementara'])
    ->name('sementara');

Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
Route::get('/pembeli', [DashboardController::class, 'pembeli'])->name('dashboard.pembeli');
Route::get('/saya', [PengaduanController::class, 'saya'])->name('pengaduan.saya');

Route::resource('pengaduan', PengaduanController::class);

// Route::get('/dashboard', function () {
//     return view('customer/index');
// })->name('dashboard');
// Route::get('/register', [RegisterController::class, 'showRegister'])
//     ->name('register');