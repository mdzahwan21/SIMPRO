<!DOCTYPE html>
<html>

<head>
    <title>Daftar PKL Mahasiswa</title>
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
        <center>Daftar PKL Mahasiswa Informatika</center>
    </h2>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswaSudahLulus as $mahasiswa)
                <tr>
                    <td>
                        {{ $mahasiswa->nim }}
                    </td>
                    <td>
                        {{ $mahasiswa->nama }}
                    </td>
                </tr>
            @endforeach
            @foreach ($mahasiswaBelumLulus as $mahasiswa)
                <tr>
                    <td>
                        {{ $mahasiswa->nim }}
                    </td>
                    <td>
                        {{ $mahasiswa->nama }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
