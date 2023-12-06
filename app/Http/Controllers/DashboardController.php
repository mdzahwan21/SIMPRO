<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();



    if ($user->role === 'mahasiswa') {
        if ($user->mahasiswa && $user->mahasiswa->no_telp == null) {
            // return redirect()->route('updateProfile')->with('success', 'Login berhasil');
            return view('mahasiswa.dashboard');
        } else {
            // return redirect()->route('dashboard')->with('success', 'Login berhasil');
            return view('mahasiswa.dashboard');
        }
    }
     elseif ($user->role === 'operator') {
        return view('operator.dashboard');
    } elseif ($user->role === 'dosenwali') {
        return view('doswal.dashboard');
    } elseif ($user->role === 'departemen') {
        return view('departemen.dashboard');
    }
}

}
