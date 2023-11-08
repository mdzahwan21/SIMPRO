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
use App\Http\Controllers\VerifProgressController;
use App\Http\Controllers\VerifIRSController;
use App\Http\Controllers\VerifKHSController;
use App\Http\Controllers\EditIRSController;
use App\Http\Controllers\EditKHSController;
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

Route::get('/verifikasi-progress', [VerifProgressController::class, 'index'])->middleware('auth')->name('verifProgress');

Route::get('/verifikasi-progress/verifyIRS', [VerifIRSController::class, 'index'])->middleware('auth')->name('verifyIRS');
Route::get('/verifikasi-progress/verifyKHS', [VerifKHSController::class, 'index'])->middleware('auth')->name('verifyKHS');

Route::get('/verifikasi-progress/verifyIRS/editIRS', [EditIRSController::class, 'index'])->middleware('auth')->name('editIRS');
Route::get('/verifikasi-progress/verifyKHS/editKHS', [EditKHSController::class, 'index'])->middleware('auth')->name('editKHS');
