<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function index() {
        return view('mahasiswa.updateProfile');
    }
}
