<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RegisterController;
 use App\Http\Controllers\SkripsiController;
 use App\Http\Controllers\GenerateAkunController;
 use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('registerStore');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/generateAkun', [GenerateAkunController::class, 'index'])->middleware('auth')->name('generateAkun');

Route::get('/skripsi', [SkripsiController::class, 'viewSkripsi'])->middleware('auth')->name('skripsi');