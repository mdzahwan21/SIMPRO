@extends('doswal.navbar')

@section('content')
    <div class="w-full space-y-2">
        <div class="position-fixed flex w-full p-3 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center w-full gap-2 border-dashed border-gray-500">
                <a href="/verifikasi-progress/list-IRS" 
                    class="nav-link-verifikasi">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">IRS</button>
                </a>
                <a href="/verifikasi-progress/list-KHS" 
                    class="nav-link-verifikasi">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">KHS</button>
                </a>
                <a href="/verifikasi-progress/list-PKL" 
                    class="nav-link-verifikasi">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">PKL</button>
                </a>
                <a href="/verifikasi-progress/list-Skripsi" 
                    class="nav-link-verifikasi">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Skripsi</button>
                </a>
            </div>
        </div>

        <div class="w-full p-4">
            <div class="min-h-screen border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="m-4 flex flex-col items-center">
                    <div class="m-4">
                        <table class="min-w-full border-2 border-gray-200">
                            <thead>
                                <tr>
                                    <th class="border p-2">Nama</th>
                                    <th class="border p-2">NIM</th>
                                    <th class="border p-2">Angkatan</th>
                                    <th class="border p-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @yield('progress')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
