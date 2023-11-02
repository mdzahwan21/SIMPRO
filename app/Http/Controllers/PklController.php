<?php

namespace App\Http\Controllers;

use App\Models\pkl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorepklRequest;
use App\Http\Requests\UpdatepklRequest;
use Illuminate\Support\Facades\Storage;


class PklController extends Controller
{
    public function index()
    {
        return view("Mahasiswa.pkl");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'smt_aktif' => 'required|numeric|min:1|max:14',
            'status_PKL' => 'required',
            'nilai' => 'numeric|between:1,4',
            'file_input' => 'file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('file_input')) {
            $filePkl = $request->file('file_input');
            $filePath = $filePkl->store('pkl', 'public');
        }

        $nim = Auth::user()->mahasiswa->nim;

        pkl::create([
            'smt_aktif' => $request->input('smt_aktif'),
            'status' => $request->input('status_PKL'),
            'nilai' => $request->input('nilai'),
            'file' => $filePath, 
            //'nim' => $request->input('sks'),
            'nim' => $nim,
        ]);

        // Redirect atau kembali ke halaman yang sesuai
        return redirect()->route('pkl')->with('success', 'Data PKL berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(pkl $pkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pkl $pkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepklRequest $request, pkl $pkl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pkl $pkl)
    {
        //
    }
}
