<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Irs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreirsRequest;
use Illuminate\Support\Facades\Storage;

class IrsController extends Controller
{
    public function index()
    {
        return view("Mahasiswa.irs");
    }

    public function store(Request $request)
    {
        $request->validate([
            'smt_aktif' => 'required|integer|min:1|max:14',
            'sks' => 'required|integer|min:1|max:24',
            'file_input' => 'required|mimes:pdf',
        ]);

        $fileIrs = $request->file('file_input');
        $filePath = $fileIrs->store('irs', 'public');

        $nim = Auth::user()->mahasiswa->nim;

        Irs::create([
            'smt_aktif' => $request->input('smt_aktif'),
            'jumlah_sks' => $request->input('sks'),
            'file' => $filePath, 
            //'nim' => $request->input('sks'),
            'nim' => $nim,
        ]);

        return redirect()->route('irs')->with('success', 'Data IRS berhasil disimpan.');
    }
}
