@extends('Mahasiswa.navbar')

@section('content')
    <div class=" w-full space-y-2">
        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                ENTRY DATA SKRIPSI
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form class="flex flex-col w-full" action="{{ route('skripsi') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="irs-smt-aktif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Semester Aktif:</label>
                        <input type="number" id="irs-smt-aktif"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="masukkan semester aktif" min="1" max="14" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">

                        <label for="status_PKL" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Skripsi:</label>
                        <select id="status_PKL"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Pilih Status Skripsi</option>
                            <option value="belum_PKL">Belum Skripsi</option>
                            <option value="sedang_PKL">Sedang Skripsi</option>
                            <option value="sudah_PKL">Sudah Skripsi</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="pkl-nilai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Nilai Skripsi:</label>
                        <input type="number" id="pkl-nilai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="masukkan jumlah sks" step="0.01" min="1" max="4">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                            Berita Acara Skripsi:</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection