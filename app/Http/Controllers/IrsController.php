<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Irs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreirsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class IrsController extends Controller
{
    public function index()
    {
        return view("Mahasiswa.irs");
    }

    public function store(Request $request)
    {
        $request->validate([
            'smt_aktif' => 'required|integer|min:1|max:14',
            'sks' => 'required|integer|min:1|max:24',
            'file_input' => 'required|mimes:pdf',
        ]);

        $fileIrs = $request->file('file_input');
        $filePath = $fileIrs->store('irs', 'public');
        
        $user = Auth::user();
        $id = $user->id;
        $mahasiswa = Mahasiswa::join('users', 'mahasiswa.nim', '=', 'users.id')
            ->where('nim', $id)
            ->first();

        // Periksa apakah mahasiswa tidak null sebelum mengakses nim
        if ($mahasiswa) {
            $nim = $mahasiswa->nim;

            Irs::create([
                'smt_aktif' => $request->input('smt_aktif'),
                'jumlah_sks' => $request->input('sks'),
                'file' => $filePath, 
                'nim' => $nim,
            ]);

            return redirect()->route('irs')->with('success', 'Data IRS berhasil disimpan.');
        }
        else {
            // Handle jika mahasiswa null 
            return redirect()->route('irs')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
    }


    public function rekap(Request $request)
    {
        $user = $request->user();
        $id = $request->user()->id;

        $dataIrs = IRS::where('nim', $id)->get();

        return view('Mahasiswa.rekapIrs', compact('user', 'dataIrs'));
    }

    // public function hapus($id)
    // {
    //     // Irs::destroy($id);
    //     // return redirect()->route('Mahasiswa.rekapIrs')->with('success', 'Data IRS berhasil dihapus.');
    // }

    public function update($id)
    {
        // Logika untuk memperbarui data IRS
        // Anda dapat mengarahkan ke formulir pembaruan atau melakukan pembaruan di sini
    }
}
