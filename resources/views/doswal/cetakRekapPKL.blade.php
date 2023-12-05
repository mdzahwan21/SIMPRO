<!DOCTYPE html>
<html>
<head>
    <title>Rekap PKL Mahasiswa Informatika</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px; /* Mengurangi ukuran font secara keseluruhan */
        }
        table {
            width: 80%; /* Mengurangi lebar tabel */
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 4px; /* Mengurangi padding */
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            font-size: 24px; /* Mengurangi ukuran font untuk judul */
        }
        @media screen and (max-width: 600px) {
            table {
                width: 100%; /* Mengubah lebar tabel saat layar kecil */
            }
        }
    </style>
</head>
<body>
    <h2>Rekap PKL Mahasiswa Informatika</h2>
    <table>
        <thead>
            <tr>
                @foreach ($latestYears as $year)
                    <th colspan="2">{{ $year }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($latestYears as $year)
                    <th style="width: 50%;">Belum</th>
                    <th style="width: 50%;">Sudah</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($latestYears as $year)
                    <td>{{ $jumlahBelumLulusPKL[$year] ?? '0' }}</td>
                    <td>{{ $jumlahSudahLulusPKL[$year] ?? '0' }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>
</html>
