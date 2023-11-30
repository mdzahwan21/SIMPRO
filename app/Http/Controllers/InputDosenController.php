<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InputDosenController extends Controller
{
    public function index(){
        $user = Auth::user();
            if ($user->role === 'operator') {
            return view('operator.inputDataDosen');
        }
    }
}