<?php

namespace App\Http\Controllers;

use App\Models\khs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorekhsRequest;
use App\Http\Requests\UpdatekhsRequest;
use Illuminate\Support\Facades\Storage;


class KhsController extends Controller
{
    public function index()
    {
        return view("Mahasiswa.khs");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'smt_aktif' => 'required|integer|min:1|max:14',
            'sks' => 'required|integer|min:1|max:24',
            'sksk' => 'required|integer|min:1|max:165',
            'ip' => 'required|numeric|min:0|max:4',
            'ipk' => 'required|numeric|min:0|max:4',
            'file_input' => 'required|mimes:pdf',
        ]);

        $fileKhs = $request->file('file_input');
        $filePath = $fileKhs->store('khs', 'public');

        $nim = Auth::user()->mahasiswa->nim;

        Khs::create([
            'smt_aktif' => $request->input('smt_aktif'),
            'sks' => $request->input('sks'),
            'sks_kum' => $request->input('sksk'),
            'ip' => $request->input('ip'),
            'ipk' => $request->input('ipk'),
            'file' => $filePath,
            //'nim' => $request->input('sks'),
            'nim' => $nim,
        ]);

        return redirect()->route('khs')->with('success', 'Data KHS berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(khs $khs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(khs $khs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekhsRequest $request, khs $khs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(khs $khs)
    {
        //
    }
}
