@extends('operator.navbar')
@section('content')
<div class="w-full">
    <div class="flex flex-col gap-8 p-4">
        <form class="flex flex-col w-full p-4 border-2 border-black border-dashed rounded-lg" id="dosenform" action="{{ route('inputdosen.store') }}" method="post">
            <h1 class="bg-blue-500 text-white text-center p-2 m-5 rounded">Form Input Data Dosen</h1>
            @csrf

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NIP:</label>
                    <input type="text" id="nip" name="nip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan NIP" required>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama:</label>
                    <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat:</label>
                    <input type="text" id="alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat" required>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="noTelepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        No Telepon:</label>
                    <input type="tel" id="noTelepon" name="no_telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan No Telepon" required>
                </div>
            </div>
            <div class="flex justify-center items-center mb-6">
                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">Generate</button>
            </div>
        </form>

    </div>
</div>
@endsection