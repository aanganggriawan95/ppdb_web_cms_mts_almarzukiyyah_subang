<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sambutan extends Model
{
    //
    use HasFactory;
    protected $fillable = ['title', 'nama', 'deskripsi', 'image'];
}
