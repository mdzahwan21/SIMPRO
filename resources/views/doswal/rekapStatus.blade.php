@extends('doswal.rekap')

@section('tabel')
<div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
    <br>
    <a href="/generatePDF/status" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        Cetak PDF
    </a>
    <br><br>
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                @foreach($latestYears as $year)
                    <th class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        {{ $year }}
                    </th>
                @endforeach
            </tr>
        </thead>

        <tbody class="bg-white">
            @foreach(['aktif', 'cuti', 'mangkir', 'undur diri', 'meninggal dunia', 'drop out', 'lulus'] as $status)
                <tr>
                    <td class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                        {{ $status }}
                    </td>
                    @foreach($latestYears as $year)
                        <td class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500">
                            <?php
                                $count = $mhsPerwalian->where('status', $status)->where('angkatan', $year)->count();
                                echo '<a href="' . route('mahasiswa.list', ['status' => $status, 'angkatan' => $year]) . '" class="text-indigo-600 hover:underline">' . ($count > 0 ? $count : '0') . '</a>';
                            ?>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


