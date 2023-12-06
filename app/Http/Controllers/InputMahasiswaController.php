<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Models\mahasiswa;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            'nim' => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'jalur_masuk' => 'required',
            'no_telp' => 'required',
            'provinsi' => 'required',
            'kota_kab' => 'required',
            'alamat_detail' => 'required',
            'nip_doswal' => 'required',
            'foto' => 'required',
        ]);

        $foto = $request->file('foto');
        $newFileName = Str::slug($request->nama) . '.' . $foto->getClientOriginalExtension();
        $fotoPath = $foto->storeAs('foto', $newFileName, 'public');

        mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'status' => "aktif",
            'jalur_masuk' => $request->jalur_masuk,
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,
            'alamat_detail' => $request->alamat_detail,
            'nip_doswal' => $request->nip_doswal,
            'foto' => $fotoPath,
        ]);

        $name = $request->nama;
        $email = strtolower(str_replace(' ', '', $name)) . '@mahasiswa.com';

        users::create([
            'id' => $request->nim,
            'name' => $name,
            'role' => "mahasiswa",
            'email' => $email,
            'password' => "12345",
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        return redirect()->route('inputmahasiswa')->with('success', 'Mahasiswa data added successfully');
    }
}
