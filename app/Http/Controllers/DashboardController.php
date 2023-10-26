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
            return view('mahasiswa.dashboard');
        } if ($user->role === 'user') {
            return view('mahasiswa.dashboard');
        }
    }
}
