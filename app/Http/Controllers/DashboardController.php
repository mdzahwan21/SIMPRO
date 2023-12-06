<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil objek pengguna saat ini
        $user = Auth::user();

        // Memeriksa peran pengguna
        if ($user->role === 'mahasiswa') {
            if ($user->mahasiswa && $user->mahasiswa->no_telp == null) {
                // return redirect()->route('updateProfile')->with('success', 'Login berhasil');
                return view('mahasiswa.dashboard');
            } else {
                // return redirect()->route('dashboard')->with('success', 'Login berhasil');
                return view('mahasiswa.dashboard');
            }
        }
        // Check for other user roles and redirect accordingly
        else if ($user->role === 'operator') {
            return view('operator.dashboard');
        } else if ($user->role === 'dosenwali') {
            return view('doswal.dashboard');
        } else if ($user->role === 'departemen') {
            return view('departemen.dashboard');
        }
    }
}
