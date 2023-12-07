@php
    use Illuminate\Support\Facades\Request;
@endphp

@extends('Mahasiswa.navbar')

@section('content')
    <div class="w-full p-4 space-y-2">

        <div class="position-fixed flex w-full p-1 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center w-full gap-2 border-dashed border-gray-500">
                <a href="/khs" class="inputKhs {{ Request::is('khs') ? 'active' : '' }}">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="{{ Request::is('khs') ? 'font-bold' : '' }}">ENTRY KHS</span>
                    </button>
                </a>
                <a href="/khs/rekapKhs" class="rekapKhs {{ Request::is('khs/rekapKhs') ? 'active' : '' }}">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="{{ Request::is('khs/rekapKhs') ? 'font-bold' : '' }}">REKAP KHS</span>
                    </button>
                </a>
            </div>
        </div>

        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                REKAP DATA KHS
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="w-full">

                @if(!is_null($dataKhs) && count($dataKhs) > 0)
                    <table class="w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-2 py-2 text-center">Semester</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Jumlah SKS</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Jumlah SKS Kumulatif</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">IP</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">IPK</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">File</th>
                                <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($dataKhs as $khs)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $khs->smt_aktif }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $khs->sks }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $khs->sks_kum }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $khs->ip }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $khs->ipk }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ asset('storage/' . $khs->file) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Lihat
                                        </a>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ route('khs', ['id' => $khs->id]) }}" style="color: blue; text-decoration: underline; display: inline-block;">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Tidak ada data KHS yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
