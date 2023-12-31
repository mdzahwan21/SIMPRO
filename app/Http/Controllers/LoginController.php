<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $loginError = session('loginError');
        

        return view('login', compact('loginError'));
    }

    public function authenticate(LoginRequest $request)
{
    $credentials = $request->only('id', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Periksa apakah pengguna adalah mahasiswa
        if (Auth::user()->role === 'mahasiswa' && Auth::user()->no_telp === null) {
            // Jika mahasiswa dan no_telp kosong, arahkan ke halaman completeProfile
            return redirect()->route('completeProfile');
        }

        // Jika bukan kasus di atas, arahkan ke dashboard
        return redirect()->intended('/dashboard');
    }

    return back()
        ->withInput($request->only('id'))
        ->with('loginError', 'Login gagal!');
}




    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('logoutSuccess', 'Berhasil log out!');
    }
}