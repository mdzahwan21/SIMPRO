@extends('doswal.navbar')

@section('content')
<div class="w-full p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    <div class="mt-4 flex flex-col items-center">
        <div class="mt-4 flex justify-center">
            <button id="irsButton" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">IRS</button>
            <button class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">KHS</button>
            <button class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">PKL</button>
            <button class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Skripsi</button>
        </div> <br>
        <div id="irsButtonr" class="mt-4">
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
                    <tr>
                        <td class="border p-2">Mochammad Dzahwan Fadhloly</td>
                        <td class="border p-2">24060121140168</td>
                        <td class="border p-2">2021</td>
                        <td class="border p-2">
                            <a href="/verifikasi-progress/verifyIRS" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Cek IRS</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border p-2">Mochammad Dzahwan Fadhloly</td>
                        <td class="border p-2">24060121140168</td>
                        <td class="border p-2">2021</td>
                        <td class="border p-2">
                            <a href="/verifikasi-progress/verifyKHS" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Cek KHS</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
