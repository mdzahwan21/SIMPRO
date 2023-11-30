<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportData;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PklController;
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
use App\Http\Controllers\GenerateAkunController;
use App\Http\Controllers\GeneratePDFController;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/irs', [IrsController::class, 'index'])->middleware('auth')->name('irs');
Route::post('/irs/store', [IrsController::class, 'store'])->name('irs.store');
Route::get('/irs/rekapIrs', [IrsController::class, 'rekap'])->name('irs.rekap');
// Route::delete('/irs/{id}', [IrsController::class, 'hapus'])->name('irs.hapus');
// Route::get('/irs/{id}/perbarui', [IrsController::class, 'update'])->name('irs.perbarui'); // Tambahkan ini jika Anda membutuhkan formulir pembaruan


// Route::middleware(['auth'])->group(function () {
//     Route::get('/irs', 'IrsController@index')->name('irs.index');
// });

Route::get('/khs', [KhsController::class, 'index'])->middleware('auth')->name('khs');
Route::post('/khs/store', [KhsController::class, 'store'])->name('khs.store');
Route::get('/khs/rekapKhs', [KhsController::class, 'rekap'])->name('khs.rekap');

Route::get('/pkl', [PklController::class, 'index'])->middleware('auth')->name('pkl');
Route::post('/pkl/store', [PklController::class, 'store'])->name('pkl.store');
Route::get('/pkl/rekapPkl', [PklController::class, 'rekap'])->name('pkl.rekap');

Route::get('/skripsi', [SkripsiController::class, 'viewSkripsi'])->middleware('auth')->name('skripsi');
Route::post('/skripsi/store', [SkripsiController::class, 'store'])->name('skripsi.store');
Route::get('/skripsi/rekapSkripsi', [SkripsiController::class, 'rekap'])->name('skripsi.rekap');

Route::get('/inputmahasiswa', [InputMahasiswaController::class, 'index'])->middleware('auth')->name('inputmahasiswa');
Route::get('/inputdosen', [InputDosenController::class, 'index'])->middleware('auth')->name('inputdosen');
Route::get('/import', [ImportData::class, 'index'])->middleware('auth')->name('import');

Route::get('/updateProfile', [UpdateProfileController::class, 'showProfile'])->middleware('auth')->name('updateProfile');
Route::post('/updateProfile', [UpdateProfileController::class, 'update'])->name('updateProfile');

Route::get('/verifikasi-progress/list-KHS', [VerifProgressController::class, 'viewListKHS'])->middleware('auth')->name('list.KHS');
Route::get('/verifikasi-progress/list-PKL', [VerifProgressController::class, 'viewListPKL'])->middleware('auth')->name('list.PKL');
Route::get('/verifikasi-progress/list-Skripsi', [VerifProgressController::class, 'viewListSkripsi'])->middleware('auth')->name('list.Skripsi');

// Route::get('/verifikasi-progress/show-{nim}', [VerifIRSController::class, 'showDetailIRS'])->middleware('auth')->name('verifikasi.show.IRS');
// Route::get('/verifikasi-progress/show', [VerifIRSController::class, 'index'])->middleware('auth')->name('show.IRS');
Route::post('/verifikasi-progress/approv-IRS', [VerifIRSController::class, 'approve'])->middleware('auth')->name('approve.IRS');
Route::post('/verifikasi-progress/update-IRS', [VerifIRSController::class, 'update'])->middleware('auth')->name('update.IRS');
Route::get('/verifikasi-progress', [VerifProgressController::class, 'viewListIRS'])->middleware('auth')->name('verifProgress');
Route::get('/verifikasi-progress/list-IRS', [VerifProgressController::class, 'viewListIRS'])->middleware('auth')->name('list.IRS');

Route::get('/rekap-progress', [RekapProgressController::class, 'rekapStatus'])->middleware('auth')->name('rekap');
Route::get('/rekap-progress/status', [RekapProgressController::class, 'rekapStatus'])->middleware('auth')->name('rekap.status');



Route::get('/mahasiswa/list', [RekapProgressController::class, 'mahasiswaList'])->name('mahasiswa.list');
Route::get('/mahasiswa/progres/{nim}', [RekapProgressController::class, 'mahasiswaProgres'])->name('mahasiswa.progres');
Route::get('/mahasiswa/progres/{nim}/semester/{smt}', [RekapProgressController::class, 'showSemester'])->name('mahasiswa.semester');
// Route::get('/verifikasi-progress/verifyIRS/{nim}', [VerifIRSController::class, 'index'])->middleware('auth')->name('verify.IRS');



Route::get('/verifikasi-progress/verifyKHS', [VerifKHSController::class, 'index'])->middleware('auth')->name('verifyKHS');
Route::get('/verifikasi-progress/verifyIRS/editIRS', [EditIRSController::class, 'index'])->middleware('auth')->name('editIRS');
Route::get('/verifikasi-progress/verifyKHS/editKHS', [EditKHSController::class, 'index'])->middleware('auth')->name('editKHS');

Route::get('/rekap-progress/status/list', [RekapProgressController::class, 'viewListStatus'])->middleware('auth')->name('rekap.list.status');
Route::get('/rekap-progress/pkl', [RekapProgressController::class, 'viewRekapPKL'])->middleware('auth')->name('rekap.pkl');
Route::get('/rekap-progress/skripsi', [RekapProgressController::class, 'viewRekapSkripsi'])->middleware('auth')->name('rekap.skripsi');

Route::get('/rekap-progress/2', [RekapProgressController::class, 'indexDepartemen'])->middleware('auth')->name('rekap.departemen');
Route::get('/rekap-progress/status', [RekapProgressController::class, 'viewRekapStatusDepartemen'])->middleware('auth')->name('rekap.statusDepartemen');
Route::get('/rekap-progress/status/list', [RekapProgressController::class, 'viewListStatusDepartemen'])->middleware('auth')->name('rekap.list.statusDepartemen');
Route::get('/rekap-progress/pkl', [RekapProgressController::class, 'viewRekapPKLDepartemen'])->middleware('auth')->name('rekap.pklDepartemen');
Route::get('/rekap-progress/skripsi', [RekapProgressController::class, 'viewRekapSkripsiDepartemen'])->middleware('auth')->name('rekap.skripsiDepartemen');

Route::get('/generatePDF', [GeneratePDFController::class, 'generatePDF'])->middleware('auth')->name('cetak.RekapStatus');
Route::get('/generatePDFPKL', [GeneratePDFController::class, 'generatePDFPKL'])->middleware('auth')->name('cetak.RekapPKL');
Route::get('/generatePDFSkripsi', [GeneratePDFController::class, 'generatePDFSkripsi'])->middleware('auth')->name('cetak.RekapSkripsi');