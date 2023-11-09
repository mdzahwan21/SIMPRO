<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifProgressController extends Controller
{
    public function index()
    {
        return view('Doswal.verifikasiProgress');
    }

    public function viewListIRS() {
        return view('doswal.listIRS');
    }

    public function viewListKHS() {
        return view('doswal.listKHS');
    }

    public function viewListPKL() {
        return view('doswal.listPKL');
    }

    public function viewListSkripsi() {
        return view('doswal.listSkripsi');
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
