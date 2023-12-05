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
use Illuminate\Support\Facades\DB;

class RekapProgressController extends Controller
{

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

    public function viewRekapPKL()
    {
        // Get the logged-in dosen wali
        $user = Auth::user();

        // Ambil data PKL yang diperlukan untuk rekap
        $latestYears = range(date('Y'), date('Y') - 6);

        $jumlahSudahLulusPKLDoswal = [];
        $jumlahBelumLulusPKLDoswal = [];

        foreach ($latestYears as $year) {
            $sudahLulusCount = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
                ->where('mahasiswa.angkatan', $year)
                ->whereNotNull('pkl.tgl_persetujuan')
                ->where('mahasiswa.nip_doswal', $user->id) // Sesuaikan dengan dosen wali yang login
                ->count();

            $belumLulusCount = Mahasiswa::where('angkatan', $year)
                ->where('nip_doswal', $user->id) // Sesuaikan dengan dosen wali yang login
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('pkl')
                        ->whereColumn('pkl.nim', 'mahasiswa.nim')
                        ->whereNotNull('pkl.tgl_persetujuan');
                })
                ->count();


            $jumlahSudahLulusPKLDoswal[$year] = $sudahLulusCount;
            $jumlahBelumLulusPKLDoswal[$year] = $belumLulusCount;
        }

        return view('doswal.rekapPKL', [
            'latestYears' => $latestYears,
            'jumlahSudahLulusPKLDoswal' => $jumlahSudahLulusPKLDoswal,
            'jumlahBelumLulusPKLDoswal' => $jumlahBelumLulusPKLDoswal,
        ]);
    }

    public function listSudahPKLDoswal(int $angkatan)
    {
        $user = Auth::user();
        $pklData = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
            ->select('pkl.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.nip_doswal', $user->id)
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        return view('doswal.daftarSudahPKL', [
            'pklData' => $pklData,
            'angkatan' => $angkatan,
        ]);
    }

    public function listBelumPKLDoswal(int $angkatan)
    {
        $user = Auth::user();
        $pklData = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
            ->select('pkl.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.nip_doswal', $user->id)
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $pklNIM = $pklData->pluck('nim')->toArray();

        $belumPKL = Mahasiswa::where('angkatan', $angkatan)
            ->whereNotIn('nim', $pklNIM)
            ->get();

        return view('doswal.daftarBelumPKL', [
            'belumPKL' => $belumPKL,
            'angkatan' => $angkatan,
        ]);
    }

    public function viewRekapSkripsi()
    {
        // Get the logged-in dosen wali
        $user = Auth::user();

        // Ambil data PKL yang diperlukan untuk rekap
        $latestYears = range(date('Y'), date('Y') - 6);

        $jumlahSudahLulusSkripsi = [];
        $jumlahBelumLulusSkripsi = [];

        foreach ($latestYears as $year) {
            $sudahLulusCount = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
                ->where('mahasiswa.angkatan', $year)
                ->whereNotNull('skripsi.tgl_persetujuan')
                ->where('mahasiswa.nip_doswal', $user->id) // Sesuaikan dengan dosen wali yang login
                ->count();

            $belumLulusCount = Mahasiswa::where('angkatan', $year)
                ->where('nip_doswal', $user->id) // Sesuaikan dengan dosen wali yang login
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('skripsi')
                        ->whereColumn('skripsi.nim', 'mahasiswa.nim')
                        ->whereNotNull('skripsi.tgl_persetujuan');
                })
                ->count();


            $jumlahSudahLulusSkripsi[$year] = $sudahLulusCount;
            $jumlahBelumLulusSkripsi[$year] = $belumLulusCount;
        }

        return view('doswal.rekapSkripsi', [
            'latestYears' => $latestYears,
            'jumlahSudahLulusSkripsi' => $jumlahSudahLulusSkripsi,
            'jumlahBelumLulusSkripsi' => $jumlahBelumLulusSkripsi,
        ]);
    }

    public function listSudahSkripsiDoswal(int $angkatan)
    {
        $user = Auth::user();
        $skripsiData = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
            ->select('skripsi.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.nip_doswal', $user->id)
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        return view('doswal.daftarSudahSkripsi', [
            'skripsiData' => $skripsiData,
            'angkatan' => $angkatan,
        ]);
    }

    public function listBelumSkripsiDoswal(int $angkatan)
    {
        $user = Auth::user();
        $skripsiData = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
            ->select('skripsi.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.nip_doswal', $user->id)
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $skripsiNIM = $skripsiData->pluck('nim')->toArray();

        $belumSkripsi = Mahasiswa::where('angkatan', $angkatan)
            ->whereNotIn('nim', $skripsiNIM)
            ->get();

        return view('doswal.daftarBelumSkripsi', [
            'belumSkripsi' => $belumSkripsi,
            'angkatan' => $angkatan,
        ]);
    }


    public function viewListStatus()
    {
        return view('doswal.rekListStatus');
    }

    public function indexDepartemen()
    {
        // Get the logged-in dosen wali
        $user = Auth::user();

        // Get the latest 7 years
        $latestYears = range(date('Y'), date('Y') - 6);

        // Get mahasiswa perwalian for the last 7 years
        $allmahasiswa = Mahasiswa::whereIn('angkatan', $latestYears)
            ->get();

        return view('departemen.rekapStatus', [
            'allmahasiswa' => $allmahasiswa,
            'latestYears' => $latestYears,
        ]);
    }

    public function viewRekapStatusDepartemen()
    {
        // Get the logged-in dosen wali
        $user = Auth::user();

        // Get the latest 7 years
        $latestYears = range(date('Y'), date('Y') - 6);

        // Get mahasiswa perwalian for the last 7 years
        $allmahasiswa = Mahasiswa::whereIn('angkatan', $latestYears)
            ->get();
        return view('departemen.rekapStatus', [
            'allmahasiswa' => $allmahasiswa,
            'latestYears' => $latestYears,
        ]);
    }
    public function mahasiswaListDepartemen(Request $request)
    {
        $status = $request->input('status');
        $angkatan = $request->input('angkatan');

        $mhsList = Mahasiswa::where('status', $status)
            ->where('angkatan', $angkatan)
            ->get();

        return view('departemen.resultListStatus', [
            'mhsList' => $mhsList,
            'status' => $status,
            'angkatan' => $angkatan,
        ]);
    }

    public function viewRekapPKLDepartemen()
    {
        // Get the logged-in dosen wali
        $user = Auth::user();

        // Ambil data PKL yang diperlukan untuk rekap
        $latestYears = range(date('Y'), date('Y') - 6);

        $jumlahSudahLulusPKL = [];
        $jumlahBelumLulusPKL = [];

        // Hitung jumlah mahasiswa yang sudah dan belum lulus PKL untuk setiap tahun
        foreach ($latestYears as $year) {
            $jumlahSudahLulusPKL[$year] = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
                ->where('mahasiswa.angkatan', $year)
                ->whereNotNull('pkl.nilai')
                ->count();

            $jumlahBelumLulusPKL[$year] = mahasiswa::where('angkatan', $year)
                ->count() - $jumlahSudahLulusPKL[$year];
        }

        return view('departemen.rekapPKL', [
            'latestYears' => $latestYears,
            'jumlahSudahLulusPKL' => $jumlahSudahLulusPKL,
            'jumlahBelumLulusPKL' => $jumlahBelumLulusPKL,
        ]);
    }

    public function listSudahPKLDepartemen(int $angkatan)
    {
        $pklData = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
            ->select('pkl.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        return view('departemen.daftarSudahPKL', [
            'pklData' => $pklData,
            'angkatan' => $angkatan,
        ]);
    }

    public function listBelumPKLDepartemen(int $angkatan)
    {
        $pklData = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
            ->select('pkl.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $pklNIM = $pklData->pluck('nim')->toArray();

        $belumPKL = Mahasiswa::where('angkatan', $angkatan)
            ->whereNotIn('nim', $pklNIM)
            ->get();

        return view('departemen.daftarBelumPKL', [
            'belumPKL' => $belumPKL,
            'angkatan' => $angkatan,
        ]);
    }

    public function viewRekapSkripsiDepartemen()
    {
        // Get the logged-in dosen wali
        $user = Auth::user();

        // Ambil data PKL yang diperlukan untuk rekap
        $latestYears = range(date('Y'), date('Y') - 6);

        $allmahasiswa = Mahasiswa::whereIn('angkatan', $latestYears)
            ->get();

        $jumlahSudahLulusSkripsi = [];
        $jumlahBelumLulusSkripsi = [];

        // Hitung jumlah mahasiswa yang sudah dan belum lulus PKL untuk setiap tahun
        foreach ($latestYears as $year) {
            $jumlahSudahLulusSkripsi[$year] = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
                ->where('mahasiswa.angkatan', $year)
                ->whereNotNull('skripsi.nilai')
                ->count();

            $jumlahBelumLulusSkripsi[$year] = Mahasiswa::whereNotExists(function ($query) use ($year) {
                $query->select(DB::raw(1))
                    ->from('skripsi')
                    ->whereRaw('skripsi.nim = mahasiswa.nim')
                    ->where('mahasiswa.angkatan', $year);
            })->where('angkatan', $year)->count();
        }

        return view('departemen.rekapSkripsi', [
            'latestYears' => $latestYears,
            'allmahasiswa' => $allmahasiswa,
            'jumlahSudahLulusSkripsi' => $jumlahSudahLulusSkripsi,
            'jumlahBelumLulusSkripsi' => $jumlahBelumLulusSkripsi,
        ]);
    }

    public function listSudahSkripsiDepartemen(int $angkatan)
    {
        $skripsiData = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
            ->select('skripsi.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        return view('departemen.daftarSudahSkripsi', [
            'skripsiData' => $skripsiData,
            'angkatan' => $angkatan,
        ]);
    }

    public function listBelumSkripsiDepartemen(int $angkatan)
    {
        $skripsiData = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
            ->select('skripsi.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $skripsiNIM = $skripsiData->pluck('nim')->toArray();

        $belumSkripsi = Mahasiswa::where('angkatan', $angkatan)
            ->whereNotIn('nim', $skripsiNIM)
            ->get();

        return view('departemen.daftarBelumSkripsi', [
            'belumSkripsi' => $belumSkripsi,
            'angkatan' => $angkatan,
        ]);
    }


}