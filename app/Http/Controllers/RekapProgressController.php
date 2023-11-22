<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapProgressController extends Controller
{
    public function index()
    {
        return view('doswal.rekapStatus');
    }

    public function viewRekapStatus() {
        return view('doswal.rekapStatus');
    }

    public function viewRekapPKL() {
        return view('doswal.rekapPKL');
    }

    public function viewRekapSkripsi() {
        return view('doswal.rekapSkripsi');
    }

    public function viewListStatus() {
        return view('doswal.rekListStatus');
    }
}