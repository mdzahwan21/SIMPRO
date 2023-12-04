<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\mahasiswa;
use App\Models\pkl;
use App\Models\skripsi;
use Illuminate\Support\Facades\DB;

class GeneratePDFController extends Controller
{
    function generatePDF()
    {
        $user = Auth::user();
        $latestYears = range(date('Y'), date('Y') - 6);
        $allmahasiswa = Mahasiswa::whereIn('angkatan', $latestYears)->get();

        $pdf = PDF::loadView('departemen.cetakRekapStatus', [
            'allmahasiswa' => $allmahasiswa,
            'latestYears' => $latestYears,
        ]);

        return $pdf->download('rekap-status-mahasiswa.pdf');
    }

    public function generatePDFListStatus(Request $request)
    {
        $status = $request->input('status');
        $angkatan = $request->input('angkatan');

        // Get mahasiswa based on status and angkatan
        $mhsList = mahasiswa::where('status', $status)
            ->where('angkatan', $angkatan)
            ->get();

        $pdf = PDF::loadView('departemen.cetakListStatus', [
            'mhsList' => $mhsList,
            'status' => $status,
            'angkatan' => $angkatan,
        ]);

        return $pdf->download('list-status-mahasiswa.pdf');
    }

    function generatePDFPKL()
    {
        $user = Auth::user();
        $latestYears = range(date('Y'), date('Y') - 6);

        $jumlahSudahLulusPKL = [];
        $jumlahBelumLulusPKL = [];

        // Hitung jumlah mahasiswa yang sudah dan belum lulus PKL untuk setiap tahun
        foreach ($latestYears as $year) {
            $jumlahSudahLulusPKL[$year] = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
                ->where('mahasiswa.angkatan', $year)
                ->whereNotNull('pkl.nilai')
                ->count();

            $jumlahBelumLulusPKL[$year] = Mahasiswa::whereNotExists(function ($query) use ($year) {
                $query->select(DB::raw(1))
                    ->from('pkl')
                    ->whereRaw('pkl.nim = mahasiswa.nim')
                    ->where('mahasiswa.angkatan', $year);
            })->where('angkatan', $year)->count();

        }
        $pdf = PDF::loadView('departemen.cetakRekapPKL', [
            'latestYears' => $latestYears,
            'jumlahSudahLulusPKL' => $jumlahSudahLulusPKL,
            'jumlahBelumLulusPKL' => $jumlahBelumLulusPKL,
        ]);

        return $pdf->download('rekap-pkl-mahasiswa.pdf');
    }


    public function generatePDFListPKL(Request $request)
    {
        $year = $request->input('year'); // Get the year from the request

        // Daftar mahasiswa yang sudah lulus PKL pada tahun tertentu
        $mahasiswaSudahLulus = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
            ->whereYear('mahasiswa.angkatan', $year)
            ->whereNotNull('pkl.nilai')
            ->select('mahasiswa.nama', 'mahasiswa.nim')
            ->get();

        // Daftar mahasiswa yang belum lulus PKL pada tahun tertentu
        $mahasiswaBelumLulus = Mahasiswa::whereNotExists(function ($query) use ($year) {
            $query->select(DB::raw(1))
                ->from('pkl')
                ->whereRaw('pkl.nim = mahasiswa.nim')
                ->whereYear('pkl.tgl_persetujuan', $year);
        })
            ->where('angkatan', $year) // I assume 'angkatan' here refers to the year of intake
            ->select('nama', 'nim')
            ->get();

        // Render view cetakListPKL.blade.php ke dalam PDF
        $pdf = PDF::loadView('departemen.cetakListPKL', [
            'mahasiswaSudahLulus' => $mahasiswaSudahLulus,
            'mahasiswaBelumLulus' => $mahasiswaBelumLulus,
            'year' => $year,
        ]);

        // Download file PDF dengan nama 'daftar_PKL_mahasiswa.pdf'
        return $pdf->download('daftar_PKL_mahasiswa.pdf');
    }
    // public function generatePDFListPKL($tahun)
    // {
    //     // Ambil data mahasiswa yang sudah dan belum lulus PKL berdasarkan tahun
    //     $mahasiswaSudahLulus = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
    //         ->where('mahasiswa.angkatan', $tahun)
    //         ->whereNotNull('pkl.nilai')
    //         ->get();

    //     $mahasiswaBelumLulus = Mahasiswa::whereNotExists(function ($query) use ($tahun) {
    //         $query->select(DB::raw(1))
    //             ->from('pkl')
    //             ->whereRaw('pkl.nim = mahasiswa.nim')
    //             ->where('mahasiswa.angkatan', $tahun);
    //     })->where('angkatan', $tahun)
    //         ->get();

    //     // Render view cetakListPKL.blade.php ke dalam PDF
    //     $pdf = PDF::loadView('departemen.cetakListPKL', [
    //         'mahasiswaSudahLulus' => $mahasiswaSudahLulus,
    //         'mahasiswaBelumLulus' => $mahasiswaBelumLulus,
    //     ]);

    //     // Download file PDF dengan nama 'daftar_PKL_mahasiswa.pdf'
    //     return $pdf->download('daftar_PKL_mahasiswa_' . $tahun . '.pdf');
    // }


    function generatePDFSkripsi()
    {
        $user = Auth::user();
        $latestYears = range(date('Y'), date('Y') - 6);

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
        $pdf = PDF::loadView('departemen.cetakRekapSkripsi', [
            'latestYears' => $latestYears,
            'jumlahSudahLulusSkripsi' => $jumlahSudahLulusSkripsi,
            'jumlahBelumLulusSkripsi' => $jumlahBelumLulusSkripsi,
        ]);

        return $pdf->download('rekap-skripsi-mahasiswa.pdf');
    }

    function generatePDFDaftarMhs(Request $request)
    {
        $daftarMhs = Mahasiswa::all();
        $pdf = PDF::loadView('departemen.cetakDaftarMahasiswa', [
            'daftarMhs' => $daftarMhs,

        ]);

        return $pdf->download('daftar-mahasiswa.pdf');
    }

    function generatePDFStatusDoswal()
    {
        $user = Auth::user();
        $latestYears = range(date('Y'), date('Y') - 6);
        $mhsPerwalian = Mahasiswa::where('nip_doswal', $user->id)
            ->whereIn('angkatan', $latestYears)
            ->get();

        $pdf = PDF::loadView('doswal.cetakRekapStatus', [
            'mhsPerwalian' => $mhsPerwalian,
            'latestYears' => $latestYears,
        ]);

        return $pdf->download('rekapStatus-Mahasiswa.pdf');
    }

    function generatePDFPKLDoswal()
    {
        $user = Auth::user();
        $latestYears = range(date('Y'), date('Y') - 6);

        $jumlahSudahLulusPKL = [];
        $jumlahBelumLulusPKL = [];

        foreach ($latestYears as $year) {
            $sudahLulusCount = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
                ->where('mahasiswa.angkatan', $year)
                ->whereNotNull('pkl.tgl_persetujuan')
                ->where('mahasiswa.nip_doswal', $user->id)
                ->count();

            $belumLulusCount = Mahasiswa::where('angkatan', $year)
                ->where('nip_doswal', $user->id)
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('pkl')
                        ->whereColumn('pkl.nim', 'mahasiswa.nim')
                        ->whereNotNull('pkl.tgl_persetujuan');
                })
                ->count();

            $jumlahSudahLulusPKL[$year] = $sudahLulusCount;
            $jumlahBelumLulusPKL[$year] = $belumLulusCount;
        }

        $pdf = PDF::loadView('doswal.cetakRekapPKL', [
            'latestYears' => $latestYears,
            'jumlahSudahLulusPKL' => $jumlahSudahLulusPKL,
            'jumlahBelumLulusPKL' => $jumlahBelumLulusPKL,
        ]);

        return $pdf->download('rekapPKL-Mahasiswa.pdf');
    }

    function generatePDFSkripsiDoswal(){
        $user = Auth::user();
        $latestYears = range(date('Y'), date('Y') - 6);

        $jumlahSudahLulusSkripsi = [];
        $jumlahBelumLulusSkripsi = [];

        foreach ($latestYears as $year) {
            $sudahLulusCount = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
                ->where('mahasiswa.angkatan', $year)
                ->whereNotNull('skripsi.tgl_persetujuan')
                ->where('mahasiswa.nip_doswal', $user->id)
                ->count();

            $belumLulusCount = Mahasiswa::where('angkatan', $year)
                ->where('nip_doswal', $user->id) 
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

        $pdf = PDF::loadView('doswal.cetakRekapSkripsi', [
            'latestYears' => $latestYears,
            'jumlahSudahLulusSkripsi' => $jumlahSudahLulusSkripsi,
            'jumlahBelumLulusSkripsi' => $jumlahBelumLulusSkripsi,
        ]);

        return $pdf->download('rekapSkripsi-Mahasiswa.pdf');
    }

    function generatePDFListStatusDoswal(Request $request){
        $status = $request->input('status');
        $angkatan = $request->input('angkatan');

        $mhsList = Mahasiswa::where('nip_doswal', Auth::user()->id)
            ->where('status', $status)
            ->where('angkatan', $angkatan)
            ->get();

        $pdf = PDF::loadView('doswal.cetakListStatus', [
            'mhsList' => $mhsList,
            'status' => $status,
            'angkatan' => $angkatan,
        ]);

        return $pdf->download('listStatus-Mahasiswa.pdf');

    }

    function generatePDFDaftarPerwalian(Request $request)
    {
        $user = Auth::user();
        $mhsPerwalian = Mahasiswa::where('nip_doswal', $user->id)->get();
        $pdf = PDF::loadView('doswal.cetakDaftarPerwalian', [
            'mhsPerwalian' => $mhsPerwalian,
        ]);

        return $pdf->download('daftar-mahasiswa-perwalian.pdf');
    }
}

