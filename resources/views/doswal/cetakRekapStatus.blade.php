<!DOCTYPE html>
<html>
<head>
    <title>Rekap Status Mahasiswa Perwalian</title>
    <!-- Include any required CSS -->
    <style>
        /* Define your styles for PDF here */
        /* For example */
        body {
            font-family: Arial, sans-serif;
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
    </style>
</head>
<body>
    <h2><center>Rekap Status Mahasiswa Perwalian</center></h2>
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
                                $count = $mhsPerwalian->where('status', $status)->where('angkatan', $year)->count();
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
