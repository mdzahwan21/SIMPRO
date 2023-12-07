@extends('Mahasiswa.navbar')
@php
    use Illuminate\Support\Facades\Request;
@endphp

@section('content')
    <div class="w-full p-4 space-y-2">

        <div class="position-fixed flex w-full p-1 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center w-full gap-2 border-dashed border-gray-500">
                <a href="/pkl" class="inputPkl {{ Request::is('pkl') ? 'active' : '' }}">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="{{ Request::is('pkl') ? 'font-bold' : '' }}">ENTRY PKL</span>
                    </button>
                </a>
                <a href="/pkl/rekapPkl" class="rekapPkl {{ Request::is('pkl/rekapPkl') ? 'active' : '' }}">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="{{ Request::is('pkl/rekapPkl') ? 'font-bold' : '' }}">REKAP PKL</span>
                    </button>
                </a>
            </div>
        </div>

        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                REKAP DATA PKL
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="w-full">

                @if(!is_null($dataPkl) && count($dataPkl) > 0)
                    <table class="w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-2 py-2 text-center">Semester</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Nilai</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">File</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($dataPkl as $pkl)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $pkl->smt_aktif }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $pkl->nilai }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ asset('storage/' . $pkl->file) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Lihat
                                        </a>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ route('pkl', ['id' => $pkl->id]) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Tidak ada data PKL yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
