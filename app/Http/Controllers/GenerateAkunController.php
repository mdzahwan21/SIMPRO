<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GenerateAkunController extends Controller
{
    public function index(){
        $user = Auth::user();
    
        // Memeriksa peran pengguna
        if ($user->role === 'operator') {
            // Tambahkan pesan log
            return view('operator.generateAkun');
        }
    }
}
