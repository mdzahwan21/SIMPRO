@extends('Mahasiswa.navbar')

@section('content')
    <div class=" w-full p-4 space-y-2">
        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                UPDATE PROFILE
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <form class="flex flex-col w-full" method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
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
                        <img src="https://freesvg.org/img/abstract-user-flat-4.png" class="avatar img-thumbnail" alt="avatar" style="border-radius: 50%; width: 100px; height: 100px; border: 2px solid #999; margin-left: 175px;">                     
                        <input
                            class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mt-5"
                            id="foto" name="foto" type="file">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIM:</label>
                        <input type="text" id="nim" pattern="[0-9]+ value=" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan NIM" required readonly value="{{ $mahasiswa->nim }}">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama:</label>
                        <input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required readonly value="{{ $mahasiswa->nama }}">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="angkatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Angkatan:</label>
                        <input type="number" id="angkatan" name="angkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Angkatan" min="2000" max="2030" required readonly value="{{ $mahasiswa->angkatan }}">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status:</label>
                        <input type="text" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Status" required readonly value="{{ $mahasiswa->status }}">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">

                        <label for="jalur_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jalur Masuk:</label>
                        <select id="jalur_masuk" name="jalur_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Pilih Jalur Masuk</option>
                            <option value="SNMPTN">SNMPTN</option>
                            <option value="SBMPTN">SBMPTN</option>
                            <option value="Mandiri">Mandiri</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            No Telepon:</label>
                        <input type="text" id="no_telp" name="no_telp" pattern="[0-9]+" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan No Telepon" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Provinsi:</label>
                        <input type="text" id="provinsi" name="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Provinsi" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="kota_kab" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kota/Kabupaten:</label>
                        <input type="text" id="kota_kab" name="kota_kab" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Kota/Kabupaten" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="alamat_detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat Detail:</label>
                        <textarea id="alamat_detail" name="alamat_detail"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-4 h-32 resize-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan Alamat Detail" required></textarea>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="nama_doswal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen Wali:</label>
                        <input type="text" id="nama_doswal" name="nama_doswal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $mahasiswa->dosen_wali->nama }}" readonly placeholder="Nama Dosen Wali">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">Update</button>
                </div>
            </form>
        </div>

    </div>
@endsection