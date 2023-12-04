<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Import;

class ImportData extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'operator') {
            return view('operator.import');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public');

        Import::create([
            'file' => $filePath,
        ]);

        return redirect()->route('import')->with('success', 'Import data added successfully');
    }

}
