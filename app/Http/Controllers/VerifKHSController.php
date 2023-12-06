<?php

namespace App\Http\Controllers;

use App\Models\khs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifKHSController extends Controller
{
    public function approve(Request $request)
    {
        try {
            // Find the KHS record by ID
            $khs = khs::find($request->id);

            // Update KHS data with approval timestamp
            $khs->update([
                'tgl_persetujuan' => now(),
            ]);

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'KHS approved successfully!');

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error approving data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to approve KHS. Please try again.');
        }
    }


    public function update(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'smt_aktif' => 'required|numeric|min:1|max:14',
                'sks' => 'required|integer|min:1|max:24',
                'sks_kum' => 'required|integer|min:1|max:165',
                'ip' => 'required|numeric|min:0|max:4',
                'ipk' => 'required|numeric|min:0|max:4',
            ]);

            // Find the KHS record by ID
            $khs = khs::findOrFail($request->id);

            // Update the KHS data based on the submitted form data
            $khs->update([
                'smt_aktif' => $request->smt_aktif,
                'sks' => $request->sks,
                'sks_kum' => $request->sks_kum,
                'ip' => $request->ip,
                'ipk' => $request->ipk,
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'KHS data updated successfully.');

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating KHS data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to update KHS data. Please try again.');
        }
    }
}
