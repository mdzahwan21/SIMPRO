<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class VerifIRSController extends Controller
{
    public function approve(Request $request)
    {
        try {
            // Find the IRS record by ID
            $irs = IRS::find($request->id);

            // Update IRS data with approval timestamp
            $irs->update([
                'tgl_persetujuan' => now(),
            ]);

            // Redirect or return a response as needed
            return redirect()->back()->with('success', 'IRS approved successfully!');
            
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error approving data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to approve IRS. Please try again.');
        }
    }


    public function update(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'smt_aktif' => 'required|numeric|min:1|max:14',
                'jumlah_sks' => 'required|numeric|min:1|max:24',
            ]);

            // Find the IRS record by ID
            $irs = IRS::findOrFail($request->id);

            // Update the IRS data based on the submitted form data
            $irs->update([
                'smt_aktif' => $request->smt_aktif,
                'jumlah_sks' => $request->jumlah_sks,
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'IRS data updated successfully.');

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating IRS data: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Failed to update IRS data. Please try again.');
        }
    }
}
