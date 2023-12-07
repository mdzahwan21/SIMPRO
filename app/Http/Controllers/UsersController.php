<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class UsersController extends Controller 
{
    public function index(Request $request) 
    {
        $user = Auth::user();

        // Check if the user has the 'operator' role
        if ($user && $user->role === 'operator') {
            // Render the import view for the operator
            return view('operator.import');
        }

        // If the user is not an operator, or if there's no authenticated user, redirect or handle as needed
        return redirect('/')->with('error', 'Unauthorized access');
    }

    public function store(Request $request) 
    {
        // Validate the request
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx|max:2048',
        ]);

        // Get the file from the request
        $file = $request->file('file');

        // Import the data using Maatwebsite\Excel
        Excel::import(new UsersImport, $request->file);

        return redirect()->route('dashboard')->with('success', 'User Imported Successfully');
    }
}
