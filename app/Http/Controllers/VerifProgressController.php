<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifProgressController extends Controller
{
    public function viewListIRS()
    {
        // Mendapatkan dosen wali yang sedang login
        $user = Auth::user();

        // Ambil semua IRS yang terkait dengan dosen wali yang sedang login
        $irsSemua = Irs::whereHas('mahasiswa', function ($query) use ($user) {
            $query->where('nip_doswal', $user->id);
        })->get();

        return view('doswal.verListIRS', ['irsSemua' => $irsSemua]);
        
        // Ambil semua IRS yang belum disetujui oleh dosen wali yang sedang login
        // $irsBelumDisetujui = $irsSemua->whereNull('tgl_persetujuan');

        // return view('doswal.verListIRS', ['irsBelumDisetujui' => $irsBelumDisetujui, 'irsSemua' => $irsSemua]);


        // Ambil semua IRS yang belum disetujui oleh dosen wali yang sedang login
        // $irsBelumDisetujui = Irs::whereNull('tgl_persetujuan')
        //     ->whereHas('mahasiswa', function ($query) use ($user) {
        //         $query->where('nip_doswal', $user->id);
        //     })->get();

        // return view('doswal.verListIRS', ['irsBelumDisetujui' => $irsBelumDisetujui]);
    }

    public function viewListKHS()
    {
        return view('doswal.verListKHS');
    }

    public function viewListPKL()
    {
        return view('doswal.verListPKL');
    }

    public function viewListSkripsi()
    {
        return view('doswal.verListSkripsi');
    }

    // public function index()
    // {
    //     // Ambil semua IRS yang belum disetujui
    //     $irsBelumDisetujui = Irs::whereNull('tgl_persetujuan')->get();

    //     return view('doswal.verListIRS', ['irsBelumDisetujui' => $irsBelumDisetujui]);
    // }

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
