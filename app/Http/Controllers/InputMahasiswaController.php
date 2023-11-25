<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Irs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InputMahasiswaController extends Controller
{
    public function index(){
        $user = Auth::user();
            if ($user->role === 'operator') {
                return view('operator.inputDataMahasiswa');
        }
    }

    public function inputMhs(Request $request){

    }
}
