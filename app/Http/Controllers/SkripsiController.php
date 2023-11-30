<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkripsiController extends Controller
{
    public function viewSkripsi()
    {
        return view('Mahasiswa.skripsi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'smt_aktif' => 'required|numeric|min:1|max:14',
            'smt_lulus' => 'numeric|min:1|max:14',
            'nilai' => 'numeric|between:1,4',
            'tgl_lulus' => 'date|date_format:Y-m-d', 
            'file_input' => 'file|mimes:pdf',
        ]);

        $fileSkripsi = $request->file('file_input');
        $filePath = $fileSkripsi->store('skripsi', 'public');

        $nim = Auth::user()->mahasiswa->nim;

        Skripsi::create([
            'smt_aktif' => $request->input('smt_aktif'),
            'smt_lulus' => $request->input('smt_lulus'),
            'nilai' => $request->input('nilai'),
            'tgl_lulus' => $request->input('tgl_lulus'),
            'file' => $filePath, 
            'nim' => $nim,
        ]);
        
        return redirect()->route('skripsi')->with('success', 'Data Skripsi berhasil disimpan.');
    }

    public function rekap()
    {
        $dataSkripsi = Skripsi::all();

        return view('Mahasiswa.rekapSkripsi', compact('dataSkripsi'));
    }


    // public function verifikasi(int $id)
    // {
    //     try {
    //         $skripsi = Skripsi::where('id_skripsi', $id)->first();

    //         $skripsi->update([
    //             "statusVerif" => 'Approved'
    //         ]);

    //         return redirect()->back()->with('success', 'Berhasil memverifikasi skripsi.');
    //     } catch (\Exception $e) {

    //         return redirect()->back()->with('error', 'Gagal memverifikasi skripsi.');
    //     }
    // }


    // public function reject(int $id)
    // {
    //     try {
    //         $skripsi = Skripsi::where('id_skripsi', $id)->first();

    //         $skripsi->update([
    //             "statusVerif" => 'Rejected'
    //         ]);

    //         return redirect()->back()->with('success', 'Skripsi berhasil ditolak.');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Gagal menolak skripsi.');
    //     }
    // }
}