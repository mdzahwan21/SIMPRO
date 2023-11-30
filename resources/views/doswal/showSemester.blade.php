@extends('doswal.rekap')

@section('tabel')
    <div class="rekap-list m-4">
        <p>NIM: {{ $nim }}</p>
        <p>Semester: {{ $smt }}</p>

        <!-- Display IRS data -->
        @if ($irs)
            <p>IRS Data: {{ $irs->file }}</p>
        @else
            <p>No IRS Data</p>
        @endif

        <!-- Display KHS data -->
        @if ($khs)
            <p>KHS Data: {{ $khs->file }}</p>
        @else
            <p>No KHS Data</p>
        @endif

        <!-- Display PKL data -->
        @if ($pkl)
            <p>PKL Data: {{ $pkl->file }}</p>
        @else
            <p>No PKL Data</p>
        @endif

        <!-- Display Skripsi data -->
        @if ($skripsi)
            <p>Skripsi Data: {{ $skripsi->file }}</p>
        @else
            <p>No Skripsi Data</p>
        @endif
    </div>
@endsection
