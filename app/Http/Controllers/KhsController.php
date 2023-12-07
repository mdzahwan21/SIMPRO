<?php

namespace App\Http\Controllers;

use App\Models\khs;
use App\Models\Mahasiswa;
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

        $user = Auth::user();
        $id = $user->id;
        $mahasiswa = Mahasiswa::join('users', 'mahasiswa.nim', '=', 'users.id')
            ->where('nim', $id)
            ->first();

        if ($mahasiswa) {
            $nim = $mahasiswa->nim;

            Khs::create([
                'smt_aktif' => $request->input('smt_aktif'),
                'sks' => $request->input('sks'),
                'sks_kum' => $request->input('sksk'),
                'ip' => $request->input('ip'),
                'ipk' => $request->input('ipk'),
                'file' => $filePath,
                'nim' => $nim,
            ]);

            return redirect()->route('khs')->with('success', 'Data KHS berhasil disimpan.');
        }
    }

    public function rekap(Request $request)
    {
        $user = $request->user();
        $id = $request->user()->id;

        $dataKhs = Khs::where('nim', $id)->get();

        return view('Mahasiswa.rekapKhs', compact('user', 'dataKhs'));
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
    public function hapus(khs $khs)
    {
        //
    }
}
