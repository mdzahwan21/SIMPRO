<?php

namespace App\Http\Controllers;

use App\Models\dosenwali;
use App\Models\mahasiswa;
use App\Models\irs;
use App\Models\khs;
use App\Models\pkl;
use App\Models\skripsi;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

    if ($user->role === 'mahasiswa') {
        // return view('mahasiswa.dashboard');
        $nim = $user->id;
            return redirect()->route('progres.mahasiswa', ['nim' => $nim]);
    }
     elseif ($user->role === 'operator') {
        $totalUsers = users::count();
        $totalMahasiswa = mahasiswa::count();
        $totalDosen = dosenwali::count();
        return view('operator.dashboard');
    } elseif ($user->role === 'dosenwali') {
        return view('doswal.dashboard');
    } elseif ($user->role === 'departemen') {
        return view('departemen.dashboard');
    }
}

public function mahasiswaProgres(Request $request)
    {
        $nim = $request->input('nim');
        
        // Fetch mahasiswa data
        $mahasiswa = mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            // Handle the case where mahasiswa with the specified nim is not found
            abort(404, 'Mahasiswa not found');
        }

        // Fetch semester buttons data
        $semesters = $this->getSemesterButtons($nim);

        return view('mahasiswa.dashboard', [
            'mahasiswa' => $mahasiswa,
            'semesters' => $semesters,
        ]);
    }

private function getSemesterButtons($nim)
    {
        $semesters = range(1, 14);
        $buttons = [];

        foreach ($semesters as $smt) {
            $irs = IRS::where('nim', $nim)->where('smt_aktif', $smt)->whereNotNull('tgl_persetujuan')->first();
            $khs = KHS::where('nim', $nim)->where('smt_aktif', $smt)->whereNotNull('tgl_persetujuan')->first();
            $pkl = PKL::where('nim', $nim)->where('smt_aktif', $smt)->whereNotNull('tgl_persetujuan')->first();
            $skripsi = Skripsi::where('nim', $nim)->where('smt_aktif', $smt)->whereNotNull('tgl_persetujuan')->first();

            $irsApproved = $irs ? true : false;
            $khsApproved = $khs ? true : false;
            $pklApproved = $pkl ? true : false;
            $skripsiApproved = $skripsi ? true : false;

            if ($irs === NULL) {
                $irs = 'tidak ada progress';
            }
            if ($khs === NULL) {
                $khs = 'tidak ada progress';
            }
            if ($pkl === NULL) {
                $pkl = 'tidak ada progress';
            }
            if ($skripsi === NULL) {
                $skripsi = 'tidak ada progress';
            }


            if ($irsApproved && $khsApproved && $skripsiApproved) {
                $hasApproval = 'lulusskripsi';
            } elseif ($irsApproved && $khsApproved && $pklApproved) {
                $hasApproval = 'luluspkl';
            } elseif ($irsApproved || $khsApproved) {
                $hasApproval = 'irskhs';
            } else {
                $hasApproval = 'notprogress';
            }

            $data = [
                'irs' => $irs,
                'khs' => $khs,
                'pkl' => $pkl,
                'skripsi' => $skripsi,
            ];

            $buttons[] = [
                'smt' => $smt,
                'hasApproval' => $hasApproval,
                'data' => $data,
            ];
        }

        return $buttons;
    }

}