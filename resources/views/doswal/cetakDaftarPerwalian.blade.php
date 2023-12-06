<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa Perwalian</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2><center>Daftar Mahasiswa Perwalian</center></h2>
    <table class="min-w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                    NIM
                </th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                    Nama
                </th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                    Angkatan
                </th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                    Status
                </th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                    Jalur Masuk
                </th>
                <th class="px-4 py-2 bg-gray-200 border-2 border-gray-300 text-center text-xs font-medium text-gray-500 uppercase">
                    Nomor Telepon
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($mhsPerwalian as $mahasiswa)
                <tr>
                    <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                        {{ $mahasiswa->nim }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                        {{ $mahasiswa->nama }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                        {{ $mahasiswa->angkatan }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                        {{ $mahasiswa->status }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                        {{ $mahasiswa->jalur_masuk }}
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center text-sm text-gray-500">
                        {{ $mahasiswa->no_telp }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>