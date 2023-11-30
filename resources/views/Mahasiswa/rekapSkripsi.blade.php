@extends('Mahasiswa.navbar')

@section('content')
    <div class="w-full p-4 space-y-2">
        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                REKAP DATA SKRIPSI
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="w-full">

                @if(count($dataSkripsi) > 0)
                    <table class="w-full border border-gray-300">
                        <thead>
                            <tr>
                            <th class="border border-gray-300 px-2 py-2 text-center">Semester Lulus</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Nilai</th>
                                <th class="border border-gray-300 px-2 py-2 text-center">Tanggal Lulus</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">File</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($dataSkripsi as $skripsi)
                                <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $skripsi->smt_lulus }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $skripsi->nilai }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $skripsi->tgl_lulus }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ asset('storage/' . $skripsi->file) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Lihat
                                        </a>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ route('skripsi', ['id' => $skripsi->id]) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Tidak ada data Skripsi yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
