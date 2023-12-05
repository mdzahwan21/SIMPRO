<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
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
        } if ($user->role === 'operator') {
            return view('operator.dashboard');
        } if ($user->role === 'dosenwali') {
            return view('doswal.dashboard');
        } if ($user->role === 'departemen') {
            return view('departemen.dashboard');
        }
    }
}