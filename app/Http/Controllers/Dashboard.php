<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ekstra;
use App\Models\fasilitas;
use App\Models\guru_staf;
use App\Models\hero;
use App\Models\modelPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Dashboard extends Controller
{
    //
    public function index() : View
{
    $total = [
        'berita' => berita::count(),
        'ekstra' => ekstra::count(),
        'guru' => guru_staf::count(),
        'fasilitas' => fasilitas::count(),
        'ppdb' => modelPPDB::count(),
        'hero' => hero::count()
    ];

    $jeniskelamin = modelPPDB::select('jenis_kelamin', DB::raw('count(*) as total'))
        ->groupBy('jenis_kelamin')
        ->pluck('total', 'jenis_kelamin');

    $kelas = modelPPDB::select('kelas', DB::raw('count(*) as total'))
        ->groupBy('kelas')
        ->pluck('total', 'kelas');

    return view('admin.dashboard', compact('total', 'jeniskelamin', 'kelas'));
}
}
