<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryIRSController extends Controller
{
    public function index()
    {
        // Mengambil objek pengguna saat ini
        $user = Auth::user();

        // Memeriksa peran pengguna
        if ($user->role === 'mahasiswa') {
            return view('mahasiswa.irs');
        // } elseif ($user->role === 'doswal') {
        //     return view('doswal.dashboard');
        }
    }
}
