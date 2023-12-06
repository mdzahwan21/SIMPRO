<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa Perwalian Sudah Skripsi</title>
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
    <h2>
        <center>Daftar Mahasiswa Perwlian Sudah Skripsi</center>
    </h2>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skripsiData as $data)
                <tr>
                    <td>
                        {{ $data->nim }}
                    </td>
                    <td>
                        {{ $data->nama }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>