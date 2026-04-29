<?php

namespace App\Exports;

use App\Models\modelPPDB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PpdbExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        return modelPPDB::all();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'NISN',
            'NIK',
            'KK',
            'No HP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Asal Sekolah',
            'Kelas',
            'Tahun Masuk',

            'Nama Ayah',
            'Pekerjaan Ayah',
            'Pendidikan Ayah',

            'Nama Ibu',
            'Pekerjaan Ibu',
            'Pendidikan Ibu',

            'No HP Ortu',
            'Penghasilan Ortu',

            'Anak Ke',
            'Jumlah Saudara',
            'Hobi',
            'Cita-cita',

            'Pernah TK',
            'Pernah PAUD',

            'Status'
        ];
    }

    public function map($row): array
    {
        return [
            $row->nama,
            $row->email,

            "'" . $row->nisn, // ✅ biar tidak jadi E+
            "'" . $row->nik,
            "'" . $row->kk,
            "'" . $row->no_hp,

            $row->tempat_lahir,
            $row->tgl_lahir,
            $row->alamat_lengkap,
            $row->asal_sekolah,
            $row->kelas,
            $row->tahun_masuk,

            $row->nama_ayah,
            $row->pekerjaan_ayah,
            $row->pendidikan_ayah,

            $row->nama_ibu,
            $row->pekerjaan_ibu,
            $row->pendidikan_ibu,

            "'" . $row->no_hp_ortu,

            $row->penghasilan_ortu,

            $row->anak_ke,
            $row->jumlah_saudara,
            $row->hobi,
            $row->cita_cita,

            $row->pernah_tk,
            $row->pernah_paud,

            ucfirst($row->status),
        ];
    }
}