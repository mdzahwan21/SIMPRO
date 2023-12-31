@extends('operator.navbar')

@section('content')

    <div class="w-full space-y-2">
        <div class="position-fixed flex w-full p-3 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center w-full gap-2 border-dashed border-gray-500">
                <a href="generateMhs" 
                    class="nav-link-generate">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Mahasiswa</button>
                </a>
                <a href="generateDosen" 
                    class="nav-link-generate">
                    <button class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Dosen</button>
                </a>
            </div>
        </div>

    <div class="w-full">
        <div class="flex flex-col gap-8 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form class="flex flex-col w-full p-4 border-2 border-black border-dashed rounded-lg" id="dosenWaliForm" action="{{ route('generateAkun') }}" enctype="multipart/form-data">
                <h1 class="bg-blue-500 text-white text-center p-2 m-5 rounded">Form Akun Dosen Wali</h1>
                @csrf

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIP:</label>
                        <input type="text" id="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan NIP" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama:</label>
                        <input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat:</label>
                        <input type="text" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="noTelepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            No Telepon:</label>
                        <input type="tel" id="noTelepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan No Telepon" required>
                    </div>
                </div>
                <div class="flex justify-center items-center mb-6">
                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">Generate</button>
                </div>
            </form>

        </div>
    </div>
@endsection