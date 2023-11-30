@extends('doswal.rekap')

@section('tabel')
<div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
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
                    <td class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        {{ $status }}
                    </td>
                    @foreach($latestYears as $year)
                        <td class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                            <?php
                                $count = $mhsPerwalian->where('status', $status)->where('angkatan', $year)->count();
                                echo '<a href="' . route('mahasiswa.list', ['status' => $status, 'angkatan' => $year]) . '">' . ($count > 0 ? $count : '0') . '</a>';
                            ?>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


