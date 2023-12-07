@extends('doswal.navbar')

@section('content')
    <div class="w-full space-y-2">
        <div class="position-fixed flex w-full p-3 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center w-full gap-2 border-dashed border-gray-500">
                <a href="/verifikasi-progress/list-IRS" class="nav-link-verifikasi">
                    <button
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">IRS</button>
                </a>
                <a href="/verifikasi-progress/list-KHS" class="nav-link-verifikasi">
                    <button
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">KHS</button>
                </a>
                <a href="/verifikasi-progress/list-PKL" class="nav-link-verifikasi">
                    <button
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">PKL</button>
                </a>
                <a href="/verifikasi-progress/list-Skripsi" class="nav-link-verifikasi">
                    <button
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Skripsi</button>
                </a>
            </div>
        </div>

        <div class="w-full p-4">
            <div class="min-h-screen border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="flex flex-col">
                    <div class="flex justify-between m-4">
                        <section class="search-bar translate-y-1/4">
                            @include('components.searchBarVerif')
                        </section>
                        <section x-show="filterOpen" class="filter flex space-x-4">
                            @include('components.statusVerifikasiFilter')
                        </section>
                    </div>
                    <section class="tabel-verifikasi m-4">
                        <div class="flex flex-col items-center">
                            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                <table id="tabel-verifikasi" class="min-w-full mt-4 border-collapse border border-gray-300">
                                    <thead>
                                        <tr >
                                            <th class="border p-2 px-4 py-3 border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">Nama</th>
                                            <th class="border p-2 px-4 py-3 border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">NIM</th>
                                            <th class="border p-2 px-4 py-3 border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">Angkatan</th>
                                            <th class="border p-2 px-4 py-3 border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                                            <th class="border p-2 px-4 py-3 border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @yield('progress')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
