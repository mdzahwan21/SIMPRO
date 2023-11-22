<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportData;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PklController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekapProgressController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\InputMahasiswaController;
use App\Http\Controllers\InputDosenController;
use App\Http\Controllers\UpdateProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifProgressController;
use App\Http\Controllers\VerifIRSController;
use App\Http\Controllers\VerifKHSController;
use App\Http\Controllers\EditIRSController;
use App\Http\Controllers\EditKHSController;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('auth')->name('register');
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

Route::get('/inputmahasiswa', [InputMahasiswaController::class, 'index'])->middleware('auth')->name('inputmahasiswa');
Route::get('/inputdosen', [InputDosenController::class, 'index'])->middleware('auth')->name('inputdosen');
Route::get('/import', [ImportData::class, 'index'])->middleware('auth')->name('import');

Route::get('/skripsi', [SkripsiController::class, 'viewSkripsi'])->middleware('auth')->name('skripsi');
Route::post('/skripsi/store', [SkripsiController::class, 'store'])->name('skripsi.store');

Route::get('/updateProfile', [UpdateProfileController::class, 'index'])->middleware('auth')->name('updateProfile');
Route::post('/updateProfile', [UpdateProfileController::class, 'updateProfile'])->middleware('auth')->name('updateProfile');

Route::get('/verifikasi-progress', [VerifProgressController::class, 'index'])->middleware('auth')->name('verifProgress');
Route::get('/verifikasi-progress/list-IRS', [VerifProgressController::class, 'viewListIRS'])->middleware('auth')->name('list.IRS');
Route::get('/verifikasi-progress/list-KHS', [VerifProgressController::class, 'viewListKHS'])->middleware('auth')->name('list.KHS');
Route::get('/verifikasi-progress/list-PKL', [VerifProgressController::class, 'viewListPKL'])->middleware('auth')->name('list.PKL');
Route::get('/verifikasi-progress/list-Skripsi', [VerifProgressController::class, 'viewListSkripsi'])->middleware('auth')->name('list.Skripsi');

Route::get('/verifikasi-progress/verifyIRS', [VerifIRSController::class, 'index'])->middleware('auth')->name('verify.IRS');
Route::get('/verifikasi-progress/verifyIRS', [VerifIRSController::class, 'edit'])->middleware('auth')->name('edit.IRS');
Route::get('/verifikasi-progress/verifyKHS', [VerifKHSController::class, 'index'])->middleware('auth')->name('verifyKHS');

Route::get('/verifikasi-progress/verifyIRS/editIRS', [EditIRSController::class, 'index'])->middleware('auth')->name('editIRS');
Route::get('/verifikasi-progress/verifyKHS/editKHS', [EditKHSController::class, 'index'])->middleware('auth')->name('editKHS');

Route::get('/rekap-progress', [RekapProgressController::class, 'index'])->middleware('auth')->name('rekap');
Route::get('/rekap-progress/status', [RekapProgressController::class, 'viewRekapStatus'])->middleware('auth')->name('rekap.status');
Route::get('/rekap-progress/status/list', [RekapProgressController::class, 'viewListStatus'])->middleware('auth')->name('rekap.list.status');
Route::get('/rekap-progress/pkl', [RekapProgressController::class, 'viewRekapPKL'])->middleware('auth')->name('rekap.pkl');
Route::get('/rekap-progress/skripsi', [RekapProgressController::class, 'viewRekapSkripsi'])->middleware('auth')->name('rekap.skripsi');

