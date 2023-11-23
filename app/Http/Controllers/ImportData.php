<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ImportData extends Controller
{
    public function index(){
        $user = Auth::user();
            if ($user->role === 'operator') {
            return view('operator.import');
        }
    }

    public function generateMhs() {
        return view('operator.generateAkunMhs');
    }

    public function generateDosen() {
        return view('operator.generateAkunDosen');
    }
}
