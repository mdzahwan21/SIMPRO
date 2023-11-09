<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifIRSController extends Controller
{
    public function index()
    {
        return view('Doswal.verifikasiIRS');
    }

    public function edit()
    {
        return redirect()->route('verify.IRS')->with('success', 'Data berhasil diupdate.');
    }
}
