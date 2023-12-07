@php
    use Illuminate\Support\Facades\Request;
@endphp

@extends('Mahasiswa.navbar')

@section('content')
    <div class=" w-full p-4 space-y-2">

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
                ENTRY DATA KHS
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form class="flex flex-col w-full" method="POST" action="{{ route('khs.store') }}" enctype="multipart/form-data">
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

                        <label for="smt_aktif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester Aktif:</label>
                        <select id="smt_aktif" name="smt_aktif"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Pilih semester aktif</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
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
                        <label for="sksk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jumlah SKS Kumulatif:</label>
                        <input type="number" id="sksk" name="sksk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan jumlah sks kumulatif" min="1" max="165" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="ip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> IP:</label>
                        <input type="number" id="ip" name="ip"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan indeks penilaian (IP)" step="0.01" min="0" max="4" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="ipk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> IPK:</label>
                        <input type="number" id="ipk" name="ipk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan indeks penilaian kumulatif (IPK)" step="0.01" min="0" max="4" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                            File KHS:</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" name="file_input" type="file" required>
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
