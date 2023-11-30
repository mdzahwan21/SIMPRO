<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RekapProgressController extends Controller
{
    public function index()
    {
        return view('doswal.rekapStatus');
    }

    public function viewRekapStatus() {
        $jumlahAktif = [];
        $jumlahCuti = [];
        $jumlahMangkir = [];
        $jumlahDO = [];
        $jumlahUndurDiri = [];
        $jumlahLulus = [];
        $jumlahMeninggalDunia = [];

        // Hitung jumlah mahasiswa yang sudah dan belum lulus Skripsi untuk setiap tahun
        for ($year = Carbon::now()->year; $year >= Carbon::now()->subYears(6)->year; $year--) {
            $jumlahAktif[$year] = Mahasiswa::where('angkatan', $year)->where('status', '=', 'Aktif')
                ->count();
    
            $jumlahCuti[$year] = Mahasiswa::where('angkatan', $year)->where('status', '=', 'Cuti')
                ->count();

            $jumlahMangkir[$year] = Mahasiswa::where('angkatan', $year)->where('status', '=', 'Mangkir')
                ->count();
    
            $jumlahDO[$year] = Mahasiswa::where('angkatan', $year)->where('status', '=', 'Do')
                ->count();

            $jumlahUndurDiri[$year] = Mahasiswa::where('angkatan', $year)->where('status', '=', 'Undur Diri')
                ->count();
    
            $jumlahLulus[$year] = Mahasiswa::where('angkatan', $year)->where('status', '=', 'Lulus')
                ->count();
            
            $jumlahMeninggalDunia[$year] = Mahasiswa::where('angkatan', $year)->where('status', '=', 'Meninggal Dunia')
                ->count();
        }
    
        // Mengirim data ke view
        return view('doswal.rekapStatus', compact('jumlahAktif', 'jumlahCuti', 'jumlahMangkir', 'jumlahDO', 'jumlahUndurDiri', 'jumlahLulus', 'jumlahMeninggalDunia'));
    }   

    public function viewRekapPKL() {
        return view('doswal.rekapPKL');
    }

    public function viewRekapSkripsi() {
        return view('doswal.rekapSkripsi');
    }

    public function viewListStatus() {
        return view('doswal.rekListStatus');
    }

    public function indexDepartemen()
    {
        return view('departemen.rekapStatus');
    }

    public function viewRekapStatusDepartemen() {
        return view('departemen.rekapStatus');
    }

    public function viewRekapPKLDepartemen() {
        return view('departemen.rekapPKL');
    }

    public function viewRekapSkripsiDepartemen() {
        return view('departemen.rekapSkripsi');
    }

    public function viewListStatusDepartemen() {
        return view('departemen.rekListStatus');
    }
}