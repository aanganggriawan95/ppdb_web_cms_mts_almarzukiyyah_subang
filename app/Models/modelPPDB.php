<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelPPDB extends Model
{
    use HasFactory;

    protected $table = 'ppdbs'; 
    protected $fillable = [
    'nama',
    'email',
    'asal_sekolah',
    'nisn',
    'nik',
    'kk',
    'no_hp',
    'tempat_lahir',
    'tgl_lahir',
    'alamat_lengkap',
    'nama_ayah',
    'nama_ibu',
    'no_hp_ortu',
    'tahun_masuk',
    'pekerjaan_ayah',
    'pendidikan_ayah',
    'pekerjaan_ibu',
    'pendidikan_ibu',
    'penghasilan_ortu',
    'kelas',
    'jenis_kelamin',
    'pernah_tk',
    'pernah_paud',
    'hobi',
    'anak_ke',
    'jumlah_saudara',
    'cita_cita',
    'file_ijazah',
    'file_akte',
    'file_kartu',
    'file_ktp_ortu',
    'file_kk',
    'foto',
    'status'
];
}
