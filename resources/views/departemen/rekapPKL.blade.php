@extends('departemen.rekap')

@section('tabel')
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <a href="/generatePDFPKL"
            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            Cetak PDF
        </a>
        <table class="min-w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr>
                    @foreach ($latestYears as $year)
                        <th colspan="2"
                            class="px-4 py-3 border border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                            {{ $year }}
                        </th>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($latestYears as $year)
                        <th
                            class="px-4 py-3 border border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                            Belum
                        </th>
                        <th
                            class="px-4 py-3 border border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                            Sudah
                        </th>
                    @endforeach
                </tr>
            </thead>

            <tbody class="bg-white">
                <tr>
                    @foreach ($latestYears as $year)
                        <td
                            class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                            <a href="{{ route('belumpkl.list.departemen', ['angkatan' => $year]) }}"
                                class="text-indigo-600 hover:underline">{{ $jumlahBelumLulusPKL[$year] ?? '0' }}</a>
                        </td>
                        <td
                            class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                            <a href="{{ route('sudahpkl.list.departemen', ['angkatan' => $year]) }}"
                                class="text-indigo-600 hover:underline">{{ $jumlahSudahLulusPKL[$year] ?? '0' }}</a>
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection

