<?php

namespace App\Http\Controllers;

use App\Models\pkl;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorepklRequest;
use App\Http\Requests\UpdatepklRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PklController extends Controller
{
    public function index()
    {
        return view("Mahasiswa.pkl");
    }

    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'smt_aktif' => 'required|numeric|min:6|max:14',
            'nilai' => 'required|regex:/^[A-E]$/',
            'file_input' => 'required|mimes:pdf',
        ]);

        $filePkl = $request->file('file_input');
        $filePath = $filePkl->store('pkl', 'public');

        $user = Auth::user();
        $id = $user->id;
        $mahasiswa = Mahasiswa::join('users', 'mahasiswa.nim', '=', 'users.id')
            ->where('nim', $id)
            ->first();

        // Periksa apakah mahasiswa tidak null sebelum mengakses nim
        if ($mahasiswa) {
            $nim = $mahasiswa->nim;

            pkl::create([
                'smt_aktif' => $request->input('smt_aktif'),
                'nilai' => $request->input('nilai'),
                'file' => $filePath,
                'nim' => $nim,
            ]);

            // Redirect atau kembali ke halaman yang sesuai
            return redirect()->route('pkl')->with('success', 'Data PKL berhasil disimpan.');
        }
    }

    public function rekap(Request $request)
    {
        $user = $request->user();
        $id = $request->user()->id;

        $dataPkl = pkl::where('nim', $id)->get();

        return view('Mahasiswa.rekapPkl', compact('user', 'dataPkl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pkl $pkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepklRequest $request, pkl $pkl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pkl $pkl)
    {
        //
    }
}
