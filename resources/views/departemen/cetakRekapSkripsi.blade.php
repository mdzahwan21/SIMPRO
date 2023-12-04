<!DOCTYPE html>
<html>
<head>
    <title>Rekap Skripsi Mahasiswa Informatika</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        @media screen and (max-width: 600px) {
            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h2><center>Rekap Skripsi Mahasiswa Informatika</center></h2>
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
                    <td>{{ $jumlahBelumLulusSkripsi[$year] ?? '0' }}</td>
                    <td>{{ $jumlahSudahLulusSkripsi[$year] ?? '0' }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>
</html>
