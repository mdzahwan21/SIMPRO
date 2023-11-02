<?php

namespace App\Http\Controllers;

use App\Models\khs;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorekhsRequest;
use App\Http\Requests\UpdatekhsRequest;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekhsRequest $request)
    {
        //
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
