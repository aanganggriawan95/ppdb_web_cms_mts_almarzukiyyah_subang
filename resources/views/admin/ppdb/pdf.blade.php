<!DOCTYPE html>
<html>
<head>
    <title>Data PPDB</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            background: #eee;
        }
        .section {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        .label {
            font-weight: bold;
            width: 30%;
        }
    </style>
</head>
<body>

<h2>Data PPDB Siswa</h2>

<!-- ✅ TABEL RINGKAS -->
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>NISN</th>
            <th>Kelas</th>
            <th>No HP</th>
            <th>Asal Sekolah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ppdb as $data)
        <tr>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->nisn }}</td>
            <td>{{ $data->kelas }}</td>
            <td>{{ $data->no_hp }}</td>
            <td>{{ $data->asal_sekolah }}</td>
            <td>{{ ucfirst($data->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- ✅ DETAIL PER SISWA -->
@foreach($ppdb as $data)
<div class="section">

    <table>
        <tr><td class="label">Nama</td><td>{{ $data->nama }}</td></tr>
        <tr><td class="label">Email</td><td>{{ $data->email }}</td></tr>
        <tr><td class="label">NISN / NIK</td><td>{{ $data->nisn }} / {{ $data->nik }}</td></tr>
        <tr><td class="label">Tempat, Tanggal Lahir</td><td>{{ $data->tempat_lahir }}, {{ $data->tgl_lahir }}</td></tr>
        <tr><td class="label">Alamat</td><td>{{ $data->alamat_lengkap }}</td></tr>
        <tr><td class="label">Asal Sekolah</td><td>{{ $data->asal_sekolah }}</td></tr>
        <tr><td class="label">Kelas</td><td>{{ $data->kelas }}</td></tr>
        <tr><td class="label">Tahun Masuk</td><td>{{ $data->tahun_masuk }}</td></tr>
        <tr><td class="label">Status</td><td>{{ ucfirst($data->status) }}</td></tr>
    </table>

    <table>
        <tr><td class="label">Nama Ayah</td><td>{{ $data->nama_ayah }}</td></tr>
        <tr><td class="label">Pekerjaan Ayah</td><td>{{ $data->pekerjaan_ayah }}</td></tr>
        <tr><td class="label">Pendidikan Ayah</td><td>{{ $data->pendidikan_ayah }}</td></tr>

        <tr><td class="label">Nama Ibu</td><td>{{ $data->nama_ibu }}</td></tr>
        <tr><td class="label">Pekerjaan Ibu</td><td>{{ $data->pekerjaan_ibu }}</td></tr>
        <tr><td class="label">Pendidikan Ibu</td><td>{{ $data->pendidikan_ibu }}</td></tr>

        <tr><td class="label">No HP Orang Tua</td><td>{{ $data->no_hp_ortu }}</td></tr>
        <tr><td class="label">Penghasilan</td><td>{{ $data->penghasilan_ortu }}</td></tr>
    </table>

    <table>
        <tr><td class="label">Anak ke</td><td>{{ $data->anak_ke }}</td></tr>
        <tr><td class="label">Jumlah Saudara</td><td>{{ $data->jumlah_saudara }}</td></tr>
        <tr><td class="label">Hobi</td><td>{{ $data->hobi }}</td></tr>
        <tr><td class="label">Cita-cita</td><td>{{ $data->cita_cita }}</td></tr>
        <tr><td class="label">Pernah TK</td><td>{{ $data->pernah_tk }}</td></tr>
        <tr><td class="label">Pernah PAUD</td><td>{{ $data->pernah_paud }}</td></tr>
    </table>

</div>
@endforeach

</body>
</html>