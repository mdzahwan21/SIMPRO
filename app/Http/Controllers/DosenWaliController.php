<?php

namespace App\Http\Controllers;

use App\Models\dosenwali;
use App\Models\mahasiswa;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storedosen_waliRequest;
use App\Http\Requests\Updatedosen_waliRequest;
use Illuminate\Http\Request;

class DosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storedosen_waliRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dosenwali $dosen_wali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dosenwali $dosen_wali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedosen_waliRequest $request, dosenwali $dosen_wali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dosenwali $dosen_wali)
    {
        //
    }

    public function search(Request $request){
        $search = $request->input('search');
        $status = $request->input('status');
        $angkatan = $request->input('angkatan');
        
        if ($request->has('search')) {
            $mhsList = Mahasiswa::where(function($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nim', 'like', '%' . $search . '%');
            })->get();
        }
        // else {
        //     $mhsList = Mahasiswa::where('status', $status)
        //     ->where('angkatan', $angkatan)
        //     ->get();
        // }

        return view('doswal.resultListStatus', ['mhsList' => $mhsList]);
    }

    public function searchDaftarMhsPerwalian(Request $request){
        $search = $request->input('search');
        $status = $request->input('status');
        $angkatan = $request->input('angkatan');
        
        if ($request->has('search')) {
            $mhsPerwalian = Mahasiswa::where(function($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nim', 'like', '%' . $search . '%')
                    ->orWhere('angkatan', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('jalur_masuk', 'like', '%' . $search . '%');
            })->get();
        }

        return view('doswal.daftarMahasiswa', ['mhsPerwalian' => $mhsPerwalian]);
    }
}
