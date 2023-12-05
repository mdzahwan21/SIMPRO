<!DOCTYPE html>
<html>
<head>
    <title>Rekap Status Mahasiswa Informatika</title>
    <!-- Include any required CSS -->
    <style>
        /* Define your styles for PDF here */
        /* For example */
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px; /* Increased padding for better readability */
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="center">Rekap Status Mahasiswa Informatika</h2>
    <table>
        <thead>
            <tr>
                <th>Status</th>
                @foreach($latestYears as $year)
                    <th>{{ $year }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach(['Aktif', 'Cuti', 'Mangkir', 'Undur Diri', 'Meninggal Dunia', 'Drop Out', 'Lulus'] as $status)
                <tr>
                    <td>{{ $status }}</td>
                    @foreach($latestYears as $year)
                        <td>
                            <?php
                                $count = $allmahasiswa->where('status', $status)->where('angkatan', $year)->count();
                                echo ($count > 0 ? $count : '0');
                            ?>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
