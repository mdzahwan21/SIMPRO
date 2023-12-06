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

    public function generatePDFSudahPKLDepartemen(int $angkatan)
    {
        $pklData = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
            ->select('pkl.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $pdf = PDF::loadView('departemen.cetakSudahPKL', [
            'pklData' => $pklData,
            'angkatan' => $angkatan,
        ]);

        return $pdf->download('list-mahasiswa-sudah-pkl.pdf');
    }

    public function generatePDFBelumPKLDepartemen(int $angkatan)
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
        $pdf = PDF::loadView('departemen.cetakBelumPKL', [
            'belumPKL' => $belumPKL,
            'angkatan' => $angkatan,
        ]);

        return $pdf->download('list-mahasiswa-belum-pkl.pdf');
    }


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

    public function generatePDFSudahSkripsiDepartemen(int $angkatan)
    {
        $skripsiData = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
            ->select('skripsi.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $pdf = PDF::loadView('departemen.cetakSudahSkripsi', [
            'skripsiData' => $skripsiData,
        ]);

        return $pdf->download('list-mahasiswa-sudah-skripsi.pdf');
    }

    public function generatePDFBelumSkripsiDepartemen(int $angkatan)
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
        $pdf = PDF::loadView('departemen.cetakBelumSkripsi', [
            'belumSkripsi' => $belumSkripsi,
        ]);

        return $pdf->download('list-mahasiswa-belum-skripsi.pdf');
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

    public function generatePDFSudahPKLDoswal(int $angkatan)
    {
        $pklData = PKL::join('mahasiswa', 'pkl.nim', '=', 'mahasiswa.nim')
            ->select('pkl.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $pdf = PDF::loadView('doswal.cetakSudahPKL', [
            'pklData' => $pklData,
        ]);

        return $pdf->download('list-mhs-perwalian-sudah-pkl.pdf');
    }

    public function generatePDFBelumPKLDoswal(int $angkatan)
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
        $pdf = PDF::loadView('doswal.cetakBelumPKL', [
            'belumPKL' => $belumPKL,
        ]);

        return $pdf->download('list-mhs-perwalian-belum-pkl.pdf');
    }

    function generatePDFSkripsiDoswal()
    {
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

    public function generatePDFSudahSkripsiDoswal(int $angkatan)
    {
        $skripsiData = Skripsi::join('mahasiswa', 'skripsi.nim', '=', 'mahasiswa.nim')
            ->select('skripsi.*', 'mahasiswa.angkatan', 'mahasiswa.nama')
            ->whereNotNull('tgl_persetujuan')
            ->where('mahasiswa.angkatan', $angkatan)
            ->get();

        $pdf = PDF::loadView('doswal.cetakSudahSkripsi', [
            'skripsiData' => $skripsiData,
        ]);

        return $pdf->download('list-mhs-perwalian-sudah-skripsi.pdf');
    }

    public function generatePDFBelumSkripsiDoswal(int $angkatan)
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
        $pdf = PDF::loadView('doswal.cetakBelumSkripsi', [
            'belumSkripsi' => $belumSkripsi,
        ]);

        return $pdf->download('list-mhs-perwalian-belum-skripsi.pdf');
    }

    function generatePDFListStatusDoswal(Request $request)
    {
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

    function generatePDFListPKLDoswal(Request $request)
    {


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

