<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\dosenwali;

class InputDosenController extends Controller
{
    public function index(){
        $user = Auth::user();
        
        if ($user->role === 'operator') {
            return view('operator.inputDataDosen');
        } else {
            return redirect()->route('login')->with('error', 'Unauthorized access');
        }
    }

    public function store(Request $request){
        // Validate the incoming request data
        $request->validate([
            'nip' => 'required|unique:dosenwalis,nip',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        // Create a new Dosenwali instance and save it to the database
        dosenwali::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        // Redirect back with a success message
        return redirect()->route('inputdosen')->with('success', 'Dosen data added successfully');
    }
}
