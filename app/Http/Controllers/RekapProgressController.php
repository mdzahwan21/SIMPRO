<?php

namespace App\Http\Controllers;

use App\Models\Irs;
use App\Models\khs;
use App\Models\mahasiswa;
use App\Models\pkl;
use App\Models\skripsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RekapProgressController extends Controller
{
    public function rekapStatus()
    {
        // Get the logged-in dosen wali
        $user = Auth::user();

        // Get the latest 7 years
        $latestYears = range(date('Y'), date('Y') - 6);

        // Get mahasiswa perwalian for the last 7 years
        $mhsPerwalian = Mahasiswa::where('nip_doswal', $user->id)
            ->whereIn('angkatan', $latestYears)
            ->get();

        return view('doswal.rekapStatus', [
            'mhsPerwalian' => $mhsPerwalian,
            'latestYears' => $latestYears,
        ]);
    }

    public function filter(Request $request)
    {
        $status = $request->input('status');
        $startYear = $request->input('startYear');
        $endYear = $request->input('endYear');

        // Get the logged-in dosen wali
        $user = Auth::user();

        // Get mahasiswa perwalian for the specified date range and status
        $filteredData = Mahasiswa::where('nip_doswal', $user->id)
            ->where('status', $status)
            ->whereBetween('angkatan', [$startYear, $endYear])
            ->get();

        return response()->json($filteredData);
    }


    public function mahasiswaList(Request $request)
    {
        $status = $request->input('status');
        $angkatan = $request->input('angkatan');

        $mhsList = Mahasiswa::where('nip_doswal', Auth::user()->id)
            ->where('status', $status)
            ->where('angkatan', $angkatan)
            ->get();

        return view('doswal.resultListStatus', [
            'mhsList' => $mhsList,
            'status' => $status,
            'angkatan' => $angkatan,
        ]);
    }

    public function mahasiswaProgres($nim)
    {
        // Fetch mahasiswa data
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            // Handle the case where mahasiswa with the specified nim is not found
            abort(404, 'Mahasiswa not found');
        }

        // Fetch semester buttons data
        $semesters = $this->getSemesterButtons($nim);

        return view('doswal.mahasiswaProgres', [
            'mahasiswa' => $mahasiswa,
            'semesters' => $semesters,
        ]);
    }

    public function showSemester($nim, $smt)
    {
        // Fetch data for the selected semester
        // For simplicity, I'm assuming you have separate tables for IRS, KHS, PKL, and Skripsi
        $irs = IRS::where('nim', $nim)->where('smt_aktif', $smt)->first();
        $khs = KHS::where('nim', $nim)->where('smt_aktif', $smt)->first();
        $pkl = PKL::where('nim', $nim)->where('smt_aktif', $smt)->first();
        $skripsi = Skripsi::where('nim', $nim)->where('smt_aktif', $smt)->first();

        return view('doswal.showSemester', [
            'nim' => $nim,
            'smt' => $smt,
            'irs' => $irs,
            'khs' => $khs,
            'pkl' => $pkl,
            'skripsi' => $skripsi,
        ]);
    }

    // Helper method to determine the state of semester buttons
    private function getSemesterButtons($nim)
    {
        $semesters = range(1, 14);
        $buttons = [];

        foreach ($semesters as $smt) {
            // Check if any progres data exists for the given semester
            $hasApproval = IRS::where('nim', $nim)->where('smt_aktif', $smt)->whereNotNull('tgl_persetujuan')->exists()
                || KHS::where('nim', $nim)->where('smt_aktif', $smt)->exists()
                || PKL::where('nim', $nim)->where('smt_aktif', $smt)->exists()
                || Skripsi::where('nim', $nim)->where('smt_aktif', $smt)->exists();

            $buttons[] = [
                'smt' => $smt,
                'hasApproval' => $hasApproval,
            ];
        }

        return $buttons;
    }


    public function viewRekapStatus()
    {
        return view('doswal.rekapStatus');
    }

    public function viewRekapPKL()
    {
        return view('doswal.rekapPKL');
    }

    public function viewRekapSkripsi()
    {
        return view('doswal.rekapSkripsi');
    }

    public function viewListStatus()
    {
        return view('doswal.rekListStatus');
    }
}