<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\mahasiswa;
use App\Models\operator;
use App\Models\departemen;
use App\Models\dosenwali;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller {
    public function completeProfile() {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Mengambil data mahasiswa terkait dengan user yang sedang login
        $mahasiswa = Mahasiswa::where('nim', $user->id)->first();

        // Memeriksa apakah data mahasiswa ditemukan
        if($mahasiswa && $mahasiswa->no_telp === null) {
            // Jika ditemukan, tampilkan view untuk mengupdate profil
            return view('mahasiswa.completeProfile', compact('user', 'mahasiswa'));
        } else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
            // return redirect()->route('irs')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
    }

    public function completedDataProfile(Request $request) {
        // Validasi data yang masuk dari formulir
        $request->validate([
            'jalur_masuk' => 'required',
            'no_telp' => 'required|numeric',
            'provinsi' => 'required',
            'kota_kab' => 'required',
            'alamat_detail' => 'required',
            'foto' => 'required|image|mimes:jpg,png',
        ]);

        $foto = $request->file('foto');
        $filePath = $foto->store('foto', 'public');

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $id = $user->id;
        $mahasiswa = Mahasiswa::join('users', 'mahasiswa.nim', '=', 'users.id')
            ->where('nim', $id)
            ->first();

            
        if($mahasiswa) {
            $nim = $mahasiswa->nim;
            $mahasiswa->update([
                'jalur_masuk' => $request->input('jalur_masuk'),
                'no_telp' => $request->input('no_telp'),
                'provinsi' => $request->input('provinsi'),
                'kota_kab' => $request->input('kota_kab'),
                'alamat_detail' => $request->input('alamat_detail'),
                'foto' => $filePath,
            ]);

            return redirect()->route('dashboard')->with('success', 'Profil mahasiswa berhasil diperbarui.');

        } 
    }
    

    public function showProfile() {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Mengambil data mahasiswa terkait dengan user yang sedang login
        $mahasiswa = Mahasiswa::where('nim', $user->id)->first();

        // Memeriksa apakah data mahasiswa ditemukan
        if($mahasiswa) {
            // Jika ditemukan, tampilkan view untuk mengupdate profil
            return view('mahasiswa.updateProfile', compact('user', 'mahasiswa'));
        } else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
            // return redirect()->route('irs')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
    }

    public function update(Request $request) {
        // Validasi data yang masuk dari formulir
        $request->validate([
            'jalur_masuk' => 'required',
            'no_telp' => 'required|numeric',
            'provinsi' => 'required',
            'kota_kab' => 'required',
            'alamat_detail' => 'required',
            'foto' => 'required|image|mimes:jpg,png',
        ]);

        $foto = $request->file('foto');
        $filePath = $foto->store('foto', 'public');

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $id = $user->id;
        $mahasiswa = Mahasiswa::join('users', 'mahasiswa.nim', '=', 'users.id')
            ->where('nim', $id)
            ->first();

        if($mahasiswa) {
            $nim = $mahasiswa->nim;

            $mahasiswa->update([
                'jalur_masuk' => $request->input('jalur_masuk'),
                'no_telp' => $request->input('no_telp'),
                'provinsi' => $request->input('provinsi'),
                'kota_kab' => $request->input('kota_kab'),
                'alamat_detail' => $request->input('alamat_detail'),
                'foto' => $filePath,
            ]);

            return redirect()->route('dashboard')->with('success', 'Profil mahasiswa berhasil diperbarui.');

        } else {
            // Handle jika mahasiswa null 
            return redirect()->route('dashboard')->with('error', 'Data mahasiswa tidak ditemukan.');
        }
    }

    public function showProfileDoswal() {
        $user = Auth::user();
        $dosenwali = Dosenwali::where('nip', $user->id)->first();
        ;

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');

        if($dosenwali) {
            return view('Doswal.updateProfile', compact('user', 'dosenwali'));
        } else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data doswal tidak ditemukan.');
        }
    }

    public function updateDoswal(Request $request) {
        // Validasi data yang masuk dari formulir
        $request->validate([
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpg,png',
        ]);

        $foto = $request->file('foto');
        $filePath = $foto->store('foto', 'public');

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $id = $user->id;
        $dosenwali = Dosenwali::join('users', 'dosenwali.nip', '=', 'users.id')
            ->where('nip', $id)
            ->first();

        if($dosenwali) {
            $nip = $dosenwali->nip;

            $dosenwali->update([
                'no_telepon' => $request->input('no_telepon'),
                'alamat' => $request->input('alamat'),
                'foto' => $filePath,
            ]);

            return redirect()->route('dashboard')->with('success', 'Profil dosenwali berhasil diperbarui.');

        } else {
            // Handle jika mahasiswa null 
            return redirect()->route('dashboard')->with('error', 'Data dosenwali tidak ditemukan.');
        }
    }

    public function showProfileOperator() {
        $user = Auth::user();
        $operator = operator::where('nip', $user->id)->first();

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');

        if($operator) {
            return view('operator.updateProfile', compact('user', 'operator'));
        } else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data operator tidak ditemukan.');
        }
    }

    public function updateOperator(Request $request) {
        $request->validate([
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpg,png',
        ]);

        $foto = $request->file('foto');
        $filePath = $foto->store('foto', 'public');

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $id = $user->id;
        $operator = Operator::join('users', 'operator.nip', '=', 'users.id')
            ->where('nip', $id)
            ->first();

        if($operator) {
            $nip = $operator->nip;

            $operator->update([
                'no_telepon' => $request->input('no_telepon'),
                'alamat' => $request->input('alamat'),
                'foto' => $filePath,
            ]);

            return redirect()->route('dashboard')->with('success', 'Profil operator berhasil diperbarui.');

        } else {
            // Handle jika mahasiswa null 
            return redirect()->route('dashboard')->with('error', 'Data operator tidak ditemukan.');
        }
    }

    public function showProfileDepartemen() {
        $user = Auth::user();
        $departemen = departemen::where('nip', $user->id)->first();
        ;

        // Menampilkan nilai variabel $user dan $mahasiswa
        // dd($user, $mahasiswa, 'After getting user and mahasiswa');

        if($departemen) {
            return view('departemen.updateProfile', compact('user', 'departemen'));
        } else {
            // Jika tidak ditemukan, kembalikan pengguna ke dashboard dengan pesan kesalahan
            return redirect()->route('dashboard')->with('error', 'Data departemen tidak ditemukan.');
        }
    }

    public function updateDepartemen(Request $request) {
        // Validasi data yang masuk dari formulir
        $request->validate([
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpg,png',
        ]);

        $foto = $request->file('foto');
        $filePath = $foto->store('foto', 'public');

        // Dapatkan mahasiswa yang sedang login
        $user = Auth::user();
        $id = $user->id;
        $departemen = Departemen::join('users', 'departemen.nip', '=', 'users.id')
            ->where('nip', $id)
            ->first();

        if($departemen) {
            $nip = $departemen->nip;

            $departemen->update([
                'no_telepon' => $request->input('no_telepon'),
                'alamat' => $request->input('alamat'),
                'foto' => $filePath,
            ]);

            return redirect()->route('dashboard')->with('success', 'Profil departemen berhasil diperbarui.');

        } else {
            // Handle jika mahasiswa null 
            return redirect()->route('dashboard')->with('error', 'Data departemen tidak ditemukan.');
        }
    }
}
