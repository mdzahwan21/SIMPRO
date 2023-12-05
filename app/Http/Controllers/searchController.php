<?php
// SearchController.php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\YourModel; // Gantilah YourModel dengan model yang sesuai
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // public function searchMahasiswa(Request $request)
    // {
    //     $search = $request->input('search');

    //     if (!empty($search)) {
    //         $mhsList = Mahasiswa::where(function($query) use ($search) {
    //             $query->where('nama', 'like', '%' . $search . '%')
    //                 ->orWhere('nim', 'like', '%' . $search . '%');
    //         })->get();
    //     } 

    //     return view('departemen.resultListStatus', ['mhsList' => $mhsList]);
    // }
}

