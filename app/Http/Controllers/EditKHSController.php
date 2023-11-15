<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditKHSController extends Controller
{
    public function index()
    {
        return view('Doswal.editKHS');
    }
}
