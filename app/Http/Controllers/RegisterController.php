<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
            if ($user->role === 'operator') {
            return view('operator.register');
        }
    }

    public function store(Request $request)
    {
        $validatedData = request()->validate([
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:5|max:255",
        ]);
    }
}