<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\skripsi;
use Illuminate\Http\Request;

class verifSkripsiController extends Controller
{
    public function approve(Request $request)
    {
        try {
            // Find the PKL record by ID
            $skripsi = skripsi::find($request->id);

            // Update KHS data with approval timestamp
            $skripsi->update([
                'tgl_persetujuan' => now(),
            ]);

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'Skripsi approved successfully!');
            
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error approving data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to approve Skripsi. Please try again.');
        }
    }


    public function update(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'smt_aktif' => 'required|numeric|min:1|max:14',
                'smt_lulus' => 'required|numeric|min:1|max:14',
                'tgl_lulus' => 'date|date_format:Y-m-d', 
            ]);

            // Find the PKL record by ID
            $skripsi = skripsi::findOrFail($request->id);

            // Update the PKL data based on the submitted form data
            $skripsi->update([
                'smt_aktif' => $request->smt_aktif,
                'nilai' => $request->nilai,
                'tgl_lulus' => $request->tgl_lulus,
                'smt_lulus' => $request->smt_lulus,
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Skripsi data updated successfully.');

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating Skripsi data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to update Skripsi data. Please try again.');
        }
    }
}
