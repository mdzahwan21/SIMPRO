{{-- @extends('departemen.rekap')
@section('tabel')
<div id="searchResult">
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
            @foreach ($mhsList as $mahasiswa)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                            {{ $mahasiswa->nim }}
                        </td>
                        <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                            {{ $mahasiswa->nama }}
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection --}}
