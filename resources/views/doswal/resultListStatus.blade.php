@extends('doswal.rekap')

@section('tabel')
    <div class="rekap-list m-4">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        NIM
                    </th>
                    <th
                        class="px-4 py-4 border border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Nama
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($mhsList as $mahasiswa)
                    <tr>
                        <td
                            class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                            <a href="{{ route('mahasiswa.progres', ['nim' => $mahasiswa->nim]) }}">
                                {{ $mahasiswa->nim }}
                            </a>
                        </td>
                        <td
                            class="px-2 py-3 whitespace-no-wrap border border-gray-200 text-center text-sm leading-5 text-gray-500">
                            {{ $mahasiswa->nama }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
