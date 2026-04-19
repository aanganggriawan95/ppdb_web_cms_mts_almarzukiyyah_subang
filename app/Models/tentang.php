<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentang extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'title',
        'deskripsi',
        'jml_siswa',
        'jml_guru',
        'tahun_berdiri',
        'jml_fasilitas'
    ];
}
