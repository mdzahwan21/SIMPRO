@extends('doswal.verifikasiProgress')

@section('progress')
    @foreach ($skripsiAll as $data)
        <tr>
            <td class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                @if ($data->mahasiswa)
                    {{ $data->mahasiswa->nama }}
                @else
                    Mahasiswa tidak ditemukan
                @endif
            </td>
            <td class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                @if ($data->mahasiswa)
                    {{ $data->mahasiswa->nim }}
                @else
                    -
                @endif
            </td>
            <td class="px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                @if ($data->mahasiswa)
                    {{ $data->mahasiswa->angkatan }}
                @else
                    -
                @endif
            </td>
            <td class="filter-status px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                @if ($data->mahasiswa && $data->tgl_persetujuan !== null)
                    <span 
                        class="bg-green-300 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">DISETUJUI</span>
                @elseif ($data->mahasiswa && $data->tgl_persetujuan === null)
                    <span
                        class="bg-yellow-300 text-yellow-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-700 dark:text-yellow-300">MENUNGGU</span>
                @else
                    -
                @endif
            </td>
            <td class="flex items-center justify-center px-4 py-3 border border-gray-200 text-center text-sm text-gray-500 font-medium">
                @if ($data->mahasiswa && $data->tgl_persetujuan === null)
                    <button data-modal-target="verifikasi-skripsi" data-modal-toggle="verifikasi-skripsi" data="{{ $data }}"
                        class="text-white
                                  bg-gray-800 hover:bg-gray-200 hover:text-gray-900 focus:outline-none focus:ring-4
                                  focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2
                                  dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700
                                  dark:border-gray-700">Verifikasi
                    </button>
                    @include('doswal.verifikasiSkripsi')
                @else
                    -
                @endif
            </td>
        </tr>
    @endforeach

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen select dan tabel
            var statusFilter = document.getElementById("filter-verifikasi-status");
            var verifikasiTable = document.getElementById("tabel-verifikasi");

            // Event listener untuk perubahan pada elemen select
            statusFilter.addEventListener("change", function() {
                // Ambil nilai status terpilih
                var selectedStatus = statusFilter.value;

                // Ambil semua baris (tr) dalam tabel kecuali baris pertama (thead)
                var rows = verifikasiTable.querySelectorAll("tbody tr");

                // Iterasi melalui baris dan sembunyikan/munculkan sesuai status terpilih
                rows.forEach(function(row) {

                    var statusCell = row.querySelector(
                        ".filter-status"
                    ); // Sesuaikan dengan kelas yang sesuai dengan status
                    console.log(statusCell)
                    var rowStatus = statusCell.textContent.toLowerCase().trim();
                    // console.log(rowStatus)

                    if (rowStatus === selectedStatus) {
                        row.style.display = ""; // Munculkan baris
                    } else {
                        row.style.display = "none"; // Sembunyikan baris
                    }
                });
            });
        });
    </script>
@endsection
