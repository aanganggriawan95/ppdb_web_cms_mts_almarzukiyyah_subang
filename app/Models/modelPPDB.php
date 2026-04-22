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
        'jenjang',
        'jenis_kelamin',
        'alamat_lengkap',
        'no_wa_wali',
        'asal_sekolah',
        'wa_walikelas_asal_sekolah',
        'wa_operator_asal_sekolah',
        'alamat_asal_sekolah',
    ];
}
