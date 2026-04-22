<!DOCTYPE html>
<html>
<head>
    <title>Data PPDB</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 10px;
        }
    </style>
</head>
<body>

<h2>Data PPDB</h2>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jenjang</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>WA Wali</th>
            <th>Asal Sekolah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ppdb as $data)
        <tr>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->jenjang }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->alamat_lengkap }}</td>
            <td>{{ $data->no_wa_wali }}</td>
            <td>{{ $data->asal_sekolah }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>