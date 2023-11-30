@extends('Mahasiswa.navbar')

@section('content')
    <div class="w-full p-4 space-y-2">
        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                REKAP DATA IRS
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="w-full">

                @if(count($dataIrs) > 0)
                    <table class="w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-2 py-2 text-center">Semester</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Jumlah SKS</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">File</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($dataIrs as $irs)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $irs->smt_aktif }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $irs->jumlah_sks }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ asset('storage/' . $irs->file) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Lihat
                                        </a>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ route('irs', ['id' => $irs->id]) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Tidak ada data IRS yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
@endsection