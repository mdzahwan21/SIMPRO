@extends('doswal.navbar')

@section('content')
    <div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="p-4 flex justify-center w-full gap-2 items-center md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <div class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            DAFTAR MAHASISWA PERWALIAN</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="flex justify-between m-4">
                <section class="search-bar translate-y-1/4">
                    @include('components.searchBarPerwalian')
                </section>
            </div>
            <section class="rekap-list m-4">
                @yield('tabel')
            </section>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <a href="/generatePDFMhsPerwalian" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                Cetak PDF
            </a>
            <table class="min-w-full mt-4 border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                            NIM
                        </th>
                        <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                            Nama
                        </th>
                        <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                            Angkatan
                        </th>
                        <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                            Status
                        </th>
                        <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                            Jalur Masuk
                        </th>
                        <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                            Nomor Telepon
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($mhsPerwalian as $mahasiswa)
                        <tr>
                            <td 
                            class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                <a href="{{ route('mahasiswa.progres', ['nim' => $mahasiswa->nim]) }}">
                                    {{ $mahasiswa->nim }}
                                </a>
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                    {{ $mahasiswa->nama }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->angkatan }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->status }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->jalur_masuk }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->no_telp }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
