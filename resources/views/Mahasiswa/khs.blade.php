@extends('Mahasiswa.navbar')

@section('content')
    <div class=" w-full space-y-2">
        <div class="flex items-center justify-center p-4 bg-blue-800 rounded-lg">
            <p class="text-sm font-large text-white truncate dark:text-gray-300" role="none">
                ENTRY DATA KHS
            </p>
        </div>

        <div class="flex p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form class="flex flex-col w-full" action="{{ route('khs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="khs-smt-aktif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Semester Aktif:</label>
                        <input type="number" id="khs-smt-aktif"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan semester aktif" min="1" max="14" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="khs-sks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Jumlah
                            SKS:</label>
                        <input type="number" id="khs-sks"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan jumlah sks" min="0" max="100" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="khs-sksk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jumlah SKS Kumulatif:</label>
                        <input type="number" id="khs-sksk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan jumlah sks kumulatif" min="1" max="14" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="khs-ip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> IP:</label>
                        <input type="number" id="khs-ip"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan indeks penilaian (IP)" step="0.01" min="0" max="4" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label for="khs-ipk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> IPK:</label>
                        <input type="number" id="khs-ipk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-800 dark:focus:border-blue-800"
                            placeholder="masukkan indeks penilaian kumulatif (IPK)" step="0.01" min="0" max="4" required>
                    </div>
                </div>

                <div class="flex justify-center items-center mb-6">
                    <div class="w-full max-w-md">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                            file KHS:</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file" required>
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
