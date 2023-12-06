<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\khs;
use App\Models\mahasiswa;
use App\Models\pkl;
use App\Models\skripsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarMahasiswaController extends Controller
{
    public function daftarMahasiswa(Request $request){
        $daftarMhs = Mahasiswa::all();

        return view('departemen.daftarMahasiswa', ['daftarMhs' => $daftarMhs]);
    }

    public function daftarMahasiswaDoswal(Request $request){
        $user = Auth::user();
        $mhsPerwalian = Mahasiswa::where('nip_doswal', $user->id)->get();

        return view('doswal.daftarMahasiswa', ['mhsPerwalian' => $mhsPerwalian]);
    }
}