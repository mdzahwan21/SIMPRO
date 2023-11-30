@extends('operator.navbar')

@section('content')
<div class="w-full">
    <div class="flex flex-col gap-8 p-4">
        <form class="flex flex-col w-full p-4 border-2 border-black border-dashed rounded-lg" id="mahasiswaForm" action="{{ route('inputmahasiswa') }}" method="POST" enctype="multipart/form-data">
            <h1 class="bg-blue-500 text-white text-center p-2 m-5 rounded">Form Input Data Mahasiswa</h1>
            @csrf
            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NIM:</label>
                    <input type="text" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan NIM" required>
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
                    <label for="angkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Angkatan:</label>
                    <input type="number" id="angkatan" name="angkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Angkatan" min="2000" max="2030" required>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>
                    <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Pilih Status</option>
                        <option value="aktif">Aktif</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="jalur_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jalur Masuk:</label>
                    <select id="jalur_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Pilih Jalur Masuk</option>
                        <option value="SNBP">SNBP</option>
                        <option value="SNBT">SNBT</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon:</label>
                    <input type="no_telp" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nomor Telepon" required>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <select type="provinsi" id="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Provinsi Asal" required>
                    <option selected disabled >Pilih Provinsi Asal</option>
                    @foreach ($provinsi as $item)
                    <option value="{{ $item->kode_provinsi }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="kota_kab" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kabupaten:</label>
                    <input type="kota_kab" id="kota_kab" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Kota/Kabupaten Asal" required>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="alamat_detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Detail:</label>
                    <textarea id="alamat_detail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat Detail" required></textarea>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <div class="w-full max-w-md">
                    <label for="nip_doswal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen Wali:</label>
                    <select id="nip_doswal" name="nip_doswal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Pilih Dosen wali</option>
                        @foreach ($dosenwali as $item)
                        <option value="{{ $item->nip }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-center items-center mb-6">
            <div class="w-full max-w-md">
                <label for="foto" class="font-semibold block">Foto:</label>
                <input type="file" id="foto" name="foto" accept=".csv, .xlsx" class="p-2">
            </div>
            </div>

            <div class="flex justify-center items-center mb-6">
                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">Generate</button>
            </div>
        </form>
    </div>
    @endsection