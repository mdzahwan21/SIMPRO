@extends('departemen.rekap')

@section('tabel')
    <div class="rekap-list m-4">
        <a href="{{ route('cetak.ListPKL', ['status_pkl' => 'sudah', 'year' => $year]) }}" 
            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            Cetak PDF
        </a>
        <br>
        <table class="min-w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                        NIM
                    </th>
                    <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                        Nama
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <!-- Menampilkan daftar mahasiswa yang sudah lulus PKL -->
                    @foreach ($mahasiswaSudahLulus as $mahasiswa)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->nim }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->nama }}
                            </td>
                        </tr>
                    @endforeach
                <!-- Menampilkan daftar mahasiswa yang belum lulus PKL -->
                @if($mahasiswaBelumLulus->isNotEmpty())
                    @foreach ($mahasiswaBelumLulus as $mahasiswa)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->nim }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                                {{ $mahasiswa->nama }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
