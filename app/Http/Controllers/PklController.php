<?php

namespace App\Http\Controllers;

use App\Models\pkl;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepklRequest;
use App\Http\Requests\UpdatepklRequest;

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
    public function store(StorepklRequest $request)
    {
        //
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
