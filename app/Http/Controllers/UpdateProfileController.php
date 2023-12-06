<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\mahasiswa;
use App\Models\operator;
use App\Models\departemen;
use App\Models\dosenwali;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function showProfile()
    {
        // Mengambil user yang sedang login
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('nim', $user->id)->first();

        // Mengambil data mahasiswa terkait dengan user yang sedang login
        $mahasiswa = Mahasiswa::where('nim', $user->id)->first();

        // Memeriksa apakah data mahasiswa ditemukan
        if ($mahasiswa) {
            // Jika ditemukan, tampilkan view untuk mengupdate profil
            return view('mahasiswa.updateProfile', compact('user', 'mahasiswa'));
        } else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
            return redirect()->route('irs')->with('error', 'Data mahasiswa tidak ditemukan.');
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
            'alamat_detail' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // dd($request);

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        // Simpan ke dalam tabel mahasiswa
        $mahasiswa->where('nim', $mahasiswa->nim)->update([
            'jalur_masuk' => $request->jalur_masuk,
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,
            'alamat_detail' => $request->alamat_detail,
            'foto' => $request->foto,
        ]);

        return redirect()->route('dashboard')->with('success', 'Profil mahasiswa berhasil diperbarui.');
    }

    public function showProfileDoswal()
    {
        $user = Auth::user();
        $dosenwali = Dosenwali::where('nip', $user->id)->first();;

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');
    
        if ($dosenwali) {
            return view('Doswal.updateProfile', compact('user', 'dosenwali'));
        }
        else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data doswal tidak ditemukan.');
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
        $dosenwali = $user->dosenwalis;

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

    public function showProfileOperator()
    {
        $user = Auth::user();
        $operator = operator::where('nip', $user->id)->first();;

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');
    
        if ($operator) {
            return view('operator.updateProfile', compact('user', 'operator'));
        }
        else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data operator tidak ditemukan.');
        }
    }

    public function updateOperator(Request $request)
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
        $operator = $user->operator;

        // Simpan ke dalam tabel mahasiswa
        // Simpan ke dalam tabel mahasiswa
        $operator->update([
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,
            'alamat_detail' => $request->alamat_detail,
            'foto' => $fotoPath
        ]);

        return redirect()->route('dashboard')->with('success', 'Profil operator berhasil diperbarui.');
    }

    public function showProfileDepartemen()
    {
        $user = Auth::user();
        $departemen = departemen::where('nip', $user->id)->first();;

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');
    
        if ($departemen) {
            return view('departemen.updateProfile', compact('user', 'departemen'));
        }
        else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data departemen tidak ditemukan.');
        }
    }

    public function updateDepartemen(Request $request)
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
        $departemen = $user->departemen;

        // Simpan ke dalam tabel mahasiswa
        // Simpan ke dalam tabel mahasiswa
        $departemen->update([
            'no_telp' => $request->no_telp,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,
            'alamat_detail' => $request->alamat_detail,
            'foto' => $fotoPath
        ]);

        return redirect()->route('dashboard')->with('success', 'Profil departemen berhasil diperbarui.');
    }
}
