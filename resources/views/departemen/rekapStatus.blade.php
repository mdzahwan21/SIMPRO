@extends('departemen.rekap')

@section('tabel')
<div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
    <a href="/generatePDF">Cetak PDF</a>
    <table class="min-w-full">
        <thead>
            <tr>
                @php
                $currentYear = date('Y');
                @endphp
                @for ($year = $currentYear - 6; $year <= $currentYear; $year++)
                    <th colspan="7">{{ $year }}</th>
                @endfor
            </tr>
            <tr>
                @for ($year = $currentYear - 6; $year <= $currentYear; $year++)
                    <th>Aktif</th>
                    <th>Cuti</th>
                    <th>Mangkir</th>
                    <th>DO</th>
                    <th>Undur Diri</th>
                    <th>Lulus</th>
                    <th>Meninggal Dunia</th>
                @endfor
            </tr>
        </thead>
        {{-- <tbody>
            <td>
                @if($jumlahAktif[$year] >= 0)
                    <div class="btn btn-primary">
                        {{ $jumlahAktif[$year] }}
                    </div>
                @endif
            </td>
        </tbody> --}}
    </table>
</div>
@endsection
{{-- <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 overflow-y-auto sm:-my-6 sm:py-6 lg:-my-8 lg:py-8">
</div> --}}
