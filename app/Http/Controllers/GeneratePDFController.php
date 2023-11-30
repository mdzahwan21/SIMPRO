<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePDFController extends Controller{
    function generatePDF()
    {
    $data = [
        'title' => 'Rekap Status Mahasiswa Aktif',
        '2017' => '20',
        '2018' => '50',
        'Status1' => 'Aktif',
        'Status2' => 'Aktif',
    ];

    view()->share('data', $data);
    $pdf = PDF::loadView('departemen.cetakRekapStatus');
    return $pdf->download('cetakRekapStatus.pdf');
    }

    function generatePDFPKL()
    {
    $data = [
        'title' => 'Rekap PKL Mahasiswa ',
        '2017' => '20',
        '2018' => '50',
        'Status1' => 'Sudah',
        'Status2' => 'Belum',
    ];

    view()->share('data', $data);
    $pdf = PDF::loadView('departemen.cetakRekapPKL');
    return $pdf->download('RekapPKL.pdf');
    }

    function generatePDFSkripsi()
    {
    $data = [
        'title' => 'Rekap Skripsi Mahasiswa ',
        '2017' => '20',
        '2018' => '50',
        'Status1' => 'Sudah',
        'Status2' => 'Belum',
    ];

    view()->share('data', $data);
    $pdf = PDF::loadView('departemen.cetakRekapSkripsi');
    return $pdf->download('RekapSkripsi.pdf');
    }
}

