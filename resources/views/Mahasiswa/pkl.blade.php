@extends('Mahasiswa.navbar')

@section('content')
    <div class=" w-full space-y-2">
        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                ENTRY DATA PKL
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form class="flex flex-col w-full" method="POST" action="{{ route('skripsi.store') }}" enctype="multipart/form-data">
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
                        <label for="nilai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Nilai
                            PKL:</label>
                        <input type="number" id="nilai" name="nilai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="masukkan jumlah sks" step="0.01" min="1" max="4">
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                            Berita Acara Seminar PKL:</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" name="file_input" type="file">
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
