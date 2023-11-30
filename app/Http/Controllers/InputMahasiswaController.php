<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InputMahasiswaController extends Controller
{
    public function index()
{
    $user = Auth::user();
    if ($user->role === 'operator') {
        $dosenwali = users::all();
        $provinsi = provinsi::all();
        return view('operator.inputDataMahasiswa', compact('dosenwali', 'provinsi'));
    }
}


    public function inputMhs(Request $request){

    }
}
