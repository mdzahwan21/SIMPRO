@extends('doswal.verifikasiProgress')

@section('progress')
    @foreach ($irsBelumDisetujui as $data)
        <tr>
            <td class="border text-center p-2">
                @if ($data->mahasiswa)
                    {{ $data->mahasiswa->nama }}
                @else
                    Mahasiswa tidak ditemukan
                @endif
            </td>
            <td class="border text-center p-2">
                @if ($data->mahasiswa)
                    {{ $data->mahasiswa->nim }}
                @else
                    -
                @endif
            </td>
            <td class="border text-center p-2">
                @if ($data->mahasiswa)
                    {{ $data->mahasiswa->angkatan }}
                @else
                    -
                @endif
            </td>
            <td class="flex border justify-center p-2">
                @if ($data->mahasiswa)
                    <button data-modal-target="verifikasi-IRS" data-modal-toggle="verifikasi-IRS"
                        data="{{ $data }}" 
                        class="text-white
                                  bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-4
                                  focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2
                                  dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700
                                  dark:border-gray-700">Verifikasi
                    </button>
                    @include('doswal.verifikasiIRS')
                @else
                    -
                @endif
            </td>
        </tr>
    @endforeach
@endsection
