<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkripsiController extends Controller
{
    public function viewSkripsi()
    {
        // $user = Auth::user();
        // $mahasiswa = Mahasiswa::where('nama', $user->username)->first();
        // $skripsiData = $mahasiswa->skripsi;

        return view('mahasiswa.skripsi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'smt_aktif' => 'required|numeric|min:1|max:14',
            'status_Skripsi' => 'required',
            'nilai' => 'numeric|between:1,4',
            'file_input' => 'file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('file_input')) {
            $fileSkripsi = $request->file('file_input');
            $filePath = $fileSkripsi->store('skripsi', 'public');
        }

        $nim = Auth::user()->mahasiswa->nim;

        Skripsi::create([
            'smt_aktif' => $request->input('smt_aktif'),
            'status' => $request->input('status_Skripsi'),
            'nilai' => $request->input('nilai'),
            'file' => $filePath, 
            //'nim' => $request->input('sks'),
            'nim' => $nim,
        ]);

        return redirect()->route('skripsi')->with('success', 'Data Skripsi berhasil disimpan.');
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