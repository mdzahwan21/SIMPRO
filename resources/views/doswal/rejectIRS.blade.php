@extends('doswal.verifikasiProgress')

@section('content')
<div class="w-full space-y-2">
    <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
        <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
            EDIT DATA IRS
        </p>
    </div>
    <div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mt-4 flex flex-col items-center">
            <div class="mb-4 flex items-center">
                <img src="https://freesvg.org/img/abstract-user-flat-4.png" alt="Foto Profil" class="w-16 h-16 rounded-full mr-4 ml-2">
                <div class="text-gray-900">
                    <div class="font-medium">Nama: Mochammad Dzahwan Fadhloly</div>
                    <div class="font-medium">NIM: 24060121140168</div>
                    <div class="font-medium">Angkatan: 2021</div>
                </div>
            </div>
        </div>
        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form class="flex flex-col w-full" method="POST" action="{{ route('irs.store') }}" enctype="multipart/form-data">
                @csrf

                @if (session('success'))
                    <div class="p-4 bg-green-100 text-green-800 rounded-lg mb-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-4 bg-red-100 text-red-800 rounded-lg mb-4 text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="smt_aktif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Semester Aktif:</label>
                        <input type="number" id="smt_aktif" name="smt_aktif"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan semester aktif" min="1" max="14" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Jumlah
                            SKS:</label>
                        <input type="number" id="sks" name="sks"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan jumlah sks" min="1" max="24" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">File IRS:</label>
                        {{-- @if($uploadedFile) <!-- Jika file telah diunggah --> --}}
                            {{-- <a href="{{ asset('path/to/your/uploaded/file/' . $uploadedFile->filename) }}" target="_blank" class="block w-full text-sm text-blue-500 hover:underline">{{ $uploadedFile->filename }}</a> --}}
                            <a href="#" target="_blank" class="block w-full text-sm text-blue-500 hover:underline">IRS_Dzahwan</a>
                            {{-- @else <!-- Jika belum ada file diunggah -->
                            <span class="block w-full text-sm text-gray-500">Tidak ada file yang diunggah</span>
                        @endif --}}
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <a href="/verifikasi-progress/verifyIRS" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</a>
                    
                </div>
            </form>
@endsection
