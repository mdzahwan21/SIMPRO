<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\mahasiswa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoredepartemenRequest;
use App\Http\Requests\UpdatedepartemenRequest;
use Illuminate\Http\Request;

class DepartemenController extends Controller
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
    public function store(StoredepartemenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(departemen $departemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedepartemenRequest $request, departemen $departemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departemen $departemen)
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

        return view('departemen.resultListStatus', ['mhsList' => $mhsList]);
    }

    public function searchDaftarMhs(Request $request){
        $search = $request->input('search');
        $status = $request->input('status');
        $angkatan = $request->input('angkatan');
        
        if ($request->has('search')) {
            $daftarMhs = Mahasiswa::where(function($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nim', 'like', '%' . $search . '%')
                    ->orWhere('angkatan', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('jalur_masuk', 'like', '%' . $search . '%');
            })->get();
        }

        return view('departemen.daftarMahasiswa', ['daftarMhs' => $daftarMhs]);
    }
}