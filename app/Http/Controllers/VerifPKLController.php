<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pkl;
use Illuminate\Http\Request;

class VerifPKLController extends Controller
{
    public function approve(Request $request)
    {
        try {
            // Find the PKL record by ID
            $pkl = pkl::find($request->id);

            // Update KHS data with approval timestamp
            $pkl->update([
                'tgl_persetujuan' => now(),
            ]);

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'PKL approved successfully!');
            
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error approving data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to approve PKL. Please try again.');
        }
    }


    public function update(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'smt_aktif' => 'required|numeric|min:1|max:14',
            ]);

            // Find the PKL record by ID
            $khs = pkl::findOrFail($request->id);

            // Update the PKL data based on the submitted form data
            $khs->update([
                'smt_aktif' => $request->smt_aktif,
                'nilai' => $request->nilai,
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'PKL data updated successfully.');

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating PKL data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to update PKL data. Please try again.');
        }
    }
}
