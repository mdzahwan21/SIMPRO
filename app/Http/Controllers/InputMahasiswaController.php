<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\dosenwali;
use Illuminate\Support\Facades\Auth;

class InputMahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'operator') {
            $dosenwali = dosenwali::all();
            $provinsi = provinsi::all();
            return view('operator.inputDataMahasiswa', compact('dosenwali', 'provinsi'));
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|integer|min:1|max:99999999999999',
            'nama' => 'required|string|min:1|max:255',
            'angkatan' => 'required|integer|min:1|max:9999',
            'status' => 'required|in:Aktif,Non-Aktif',
            'jalur_masuk' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'provinsi' => 'required|string|max:255',
            'kota_kab' => 'required|string|max:255',
            'alamat_detail' => 'required|string|max:255',
            'nip_doswal' => 'required|string|max:20',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = $request->file('foto');
        $filePath = $foto->store('foto', 'public');

        mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'status' => $request->status,
            'jalur_masuk' => $request->jalur_masuk,
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,
            'alamat_detail' => $request->alamat_detail,
            'nip_doswal' => $request->nip_doswal,
            'foto' => $filePath,
        ]);

        return redirect()->route('operator.dashboard')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
}
