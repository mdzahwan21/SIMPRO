<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifProgressController extends Controller
{
    public function index()
    {
        return view('doswal.verListIRS');
    }

    public function viewListIRS() {
        return view('doswal.verListIRS');
    }

    public function viewListKHS() {
        return view('doswal.verListKHS');
    }

    public function viewListPKL() {
        return view('doswal.verListPKL');
    }

    public function viewListSkripsi() {
        return view('doswal.verListSkripsi');
    }

    // public function verifyIrs(Request $request, $id)
    // {
    //     $irs = Irs::find($id);
        
    //     if (!$irs) {
    //         return redirect()->route('verifikasiIRS')->with('error', 'IRS tidak ditemukan.');
    //     }

    //     $irs->verified = true;
    //     $irs->verified_by = Auth::user()->id;
    //     $irs->verified_at = now();
    //     $irs->save();

    //     return redirect()->route('verifikasiIRS')->with('success', 'IRS berhasil diverifikasi.');
    // }
}
