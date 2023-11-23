<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifIRSController extends Controller
{
    public function showDetailIRS($nim)
    {   
        // // Fetch mahasiswa data by ID
        // $mhs = mahasiswa::find($nim);

        // // Fetch IRS data by ID
        // $irs = Irs::find($irsId);

        // // Pass $irs and $mhs data to the view
        // return view('doswal.verifikasiIRS', ['irs' => $irs, 'mhs' => $mhs]);

        $mhs = Mahasiswa::with('irs')->where('nim', $nim)->first();
        
        if (!$mhs) {
            abort(404, 'Mahasiswa not found');
        }

        return view('doswal.verifikasiIRS', ['mhs' => $mhs]);
    }

    // public function approveIrs($irsId)
    // {
    //     // Update IRS data with approval timestamp
    //     $irs = Irs::find($irsId);
    //     $irs->tgl_persetujuan = now();
    //     $irs->save();

    //     // Redirect or return a response as needed
    //     return redirect()->back()->with('success', 'IRS approved successfully!');
    // }

    // public function rejectIrs($irsId)
    // {
    //     // Redirect to editIRS view with $irsId
    //     return view('doswal.editIRS', ['irsId' => $irsId]);
    // }
}
