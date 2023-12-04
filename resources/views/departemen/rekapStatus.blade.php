@extends('departemen.rekap')

@section('tabel')
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <a href="/generatePDF" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            Cetak PDF
        </a>
        <table class="min-w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-3 border border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    @foreach($latestYears as $year)
                        <th class="px-4 py-3 border border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $year }}
                        </th>
                    @endforeach
                </tr>
            </thead>

            <tbody class="bg-white">
                @foreach(['Aktif', 'Cuti', 'Mangkir', 'Undur Diri', 'Meninggal Dunia', 'Drop Out', 'Lulus'] as $status)
                    <tr>
                        <td class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                            {{ $status }}
                        </td>
                        @foreach($latestYears as $year)
                            <td class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500">
                                <?php
                                    $count = $allmahasiswa->where('status', $status)->where('angkatan', $year)->count();
                                    echo '<a href="' . route('mahasiswa.list.departemen', ['status' => $status, 'angkatan' => $year]) . '" class="text-indigo-600 hover:underline">' . ($count > 0 ? $count : '0') . '</a>';
                                ?>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
