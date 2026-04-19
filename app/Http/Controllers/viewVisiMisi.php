<?php

namespace App\Http\Controllers;

use App\Models\visi_misi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class viewVisiMisi extends Controller
{
    //
    public function index() : View
    {
        $visiMisi = visi_misi::all();

        return view('visi-misi', compact('visiMisi'));
       
    }
}
