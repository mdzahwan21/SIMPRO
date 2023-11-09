<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Sesuaikan dengan namespace model Anda
use App\Models\mahasiswa; // Sesuaikan dengan namespace model Anda

class UpdateProfileController extends Controller
{
    public function index() {
        return view('mahasiswa.updateProfile');
    }

    public function showProfile() {
        $user = User::find(auth()->id());
        $mahasiswa = Mahasiswa::where('nim', $user->username)->first();

        return view('profil', compact('user', 'mahasiswa'));
    }

}
