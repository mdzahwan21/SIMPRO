<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');

        if ($mahasiswa) {
            return view('Mahasiswa.updateProfile', compact('user', 'mahasiswa'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
    }


    public function update(Request $request)
    {
        // Validasi data yang masuk dari formulir
        $request->validate([
            'jalur_masuk' => 'required',
            'no_telp' => 'required|numeric',
            'provinsi' => 'required',
            'kota_kab' => 'required',
            'alamat_detail' => 'required'
        ]);

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        // Simpan ke dalam tabel mahasiswa
        $mahasiswa->update([
            'jalur_masuk' => $request->jalur_masuk,
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,
            'alamat_detail' => $request->alamat_detail,
        ]);

        return redirect()->route('dashboard')->with('success', 'Profil mahasiswa berhasil diperbarui.');
    }

    public function showProfileDoswal()
    {
        $user = Auth::user();
        $dosenwali = $user->dosen_wali;

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');

        if ($dosenwali) {
            return view('Doswal.updateProfile', compact('user', 'dosenwali'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Data dosen wali tidak ditemukan.');
        }
    }

    public function updateDoswal(Request $request)
    {
        // Validasi data yang masuk dari formulir
        $request->validate([
            'no_telp' => 'required|numeric',
            'provinsi' => 'required',
            'kota_kab' => 'required',
            'alamat_detail' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $foto = $request->file('foto');
        $fotoPath = $foto->store('foto', 'public');

        dd($fotoPath);

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $dosenwali = $user->dosen_wali;

        // Simpan ke dalam tabel mahasiswa
        // Simpan ke dalam tabel mahasiswa
        $dosenwali->update([
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,
            'alamat_detail' => $request->alamat_detail,
            'foto' => $fotoPath
        ]);

        return redirect()->route('dashboard')->with('success', 'Profil dosen wali berhasil diperbarui.');
    }
}
