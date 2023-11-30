@extends('departemen.rekap')

@section('tabel')
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <a href="/generatePDFSkripsi" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cetak PDF</a>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th colspan="2"
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        2017</th>
                    <th colspan="2"
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        2018</th>
                    <th colspan="2"
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        2019</th>
                    <th colspan="2"
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        2020</th>
                    <th colspan="2"
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        2021</th>
                    <th colspan="2"
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        2022</th>
                    <th colspan="2"
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        2023</th>
                </tr>
                <tr>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        belum</th>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        sudah</th>

                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        belum</th>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        sudah</th>

                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        belum</th>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        sudah</th>

                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        belum</th>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        sudah</th>

                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        belum</th>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        sudah</th>

                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        belum</th>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        sudah</th>

                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        belum</th>
                    <th
                        class="px-4 py-2 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        sudah</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                <tr>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        100
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        200
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        100
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        200
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        100
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        200
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        100
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        200
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        100
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        200
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        100
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        200
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        100
                    </td>
                    <td
                        class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                        200
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
{{-- <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 overflow-y-auto sm:-my-6 sm:py-6 lg:-my-8 lg:py-8">
</div> --}}
