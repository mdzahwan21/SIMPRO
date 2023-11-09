<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IrsController;
 use App\Http\Controllers\KhsController;
 use App\Http\Controllers\LoginController;
// use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PklController;
 use App\Http\Controllers\RegisterController;
 use App\Http\Controllers\SkripsiController;
 use App\Http\Controllers\GenerateAkunController;
 use App\Http\Controllers\UpdateProfileController;
 use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('registerStore');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/irs', [IrsController::class, 'index'])->middleware('auth')->name('irs');
Route::post('/irs/store', [IrsController::class, 'store'])->name('irs.store');
// Route::middleware(['auth'])->group(function () {
//     Route::get('/irs', 'IrsController@index')->name('irs.index');
// });

Route::get('/khs', [KhsController::class, 'index'])->middleware('auth')->name('khs');
Route::post('/khs/store', [KhsController::class, 'store'])->name('khs.store');

Route::get('/pkl', [PklController::class, 'index'])->middleware('auth')->name('pkl');
Route::post('/pkl/store', [PklController::class, 'store'])->name('pkl.store');

Route::get('/generateAkun', [GenerateAkunController::class, 'index'])->middleware('auth')->name('generateAkun');

Route::get('/skripsi', [SkripsiController::class, 'viewSkripsi'])->middleware('auth')->name('skripsi');
Route::post('/skripsi/store', [SkripsiController::class, 'store'])->name('skripsi.store');

Route::get('/updateProfile', [UpdateProfileController::class, 'index'])->middleware('auth')->name('updateProfile');
Route::post('/updateProfile', [UpdateProfileController::class, 'updateProfile'])->middleware('auth')->name('updateProfile');
