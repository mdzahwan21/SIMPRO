<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\dosenwali;
use App\Models\users;

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
            'nip' => 'required|unique:dosenwali,nip',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'foto' => 'required',
        ]);

        $foto = $request->file('foto');
        $newFileName = Str::slug($request->nama) . '.' . $foto->getClientOriginalExtension();
        $fotoPath = $foto->storeAs('foto', $newFileName, 'public');

        // Create a new Dosenwali instance and save it to the database
        dosenwali::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'foto' => $fotoPath,
        ]);

        $name = $request->nama;
        $email = strtolower(str_replace(' ', '', $name)) . '@dosenwali.com';

        users::create([
            'id' => $request->nip,
            'name' => $name,
            'role' => "dosenwali",
            'email' => $email,
            'password' => "12345",
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Redirect back with a success message
        return redirect()->route('inputdosen')->with('success', 'Dosen data added successfully');
    }
}
