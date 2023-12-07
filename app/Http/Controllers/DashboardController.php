<?php

namespace App\Http\Controllers;

use App\Models\dosenwali;
use App\Models\mahasiswa;
use App\Models\users;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'mahasiswa') {
            if ($user->mahasiswa && $user->mahasiswa->no_telp == null) {
                return view('mahasiswa.dashboard');
            } else {
                return view('mahasiswa.dashboard');
            }
        } elseif ($user->role === 'operator') {
            $totalUsers = users::count();
            $totalMahasiswa = mahasiswa::count();
            $totalDosen = dosenwali::count();
            return view('operator.dashboard', compact('totalUsers', 'totalMahasiswa', 'totalDosen'));
        } elseif ($user->role === 'dosenwali') {
            return view('doswal.dashboard');
        } elseif ($user->role === 'departemen') {
            return view('departemen.dashboard');
        }
    }
}
