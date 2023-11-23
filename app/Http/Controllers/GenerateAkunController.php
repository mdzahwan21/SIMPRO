<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GenerateAkunController extends Controller
{
    public function index(){
        $user = Auth::user();
    
        // Memeriksa peran pengguna
        if ($user->role === 'operator') {
            // Tambahkan pesan log
            return view('operator.generateAkunMhs');
        }
    }

    public function generateMhs() {
        return view('operator.generateAkunMhs');
    }

    public function generateDosen() {
        return view('operator.generateAkunDosen');
    }
}
