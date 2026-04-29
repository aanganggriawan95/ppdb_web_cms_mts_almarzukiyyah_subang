<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\ekstra;
use App\Models\fasilitas;
use App\Models\guru_staf;
use App\Models\hero;
use App\Models\sambutan;
use App\Models\tentang;
use App\Models\timeline;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeGetDataCms extends Controller
{
    //
    public function index ()
    {
        $hero = hero::all()->map(function ($item) {
            return [
                'image' => asset('storage/hero/' . $item->image),
                'title' => $item->title,
                'subtitle' => '',
                'description' => strip_tags($item->description),
            ];
        });

        // $tentang = tentang::all()->map(function ($item) {
        //     return [
        //         'title' => $item->title,
        //         'deskripsi' => $item->deskripsi,
        //         'jml_siswa' => $item->jml_siswa,
        //         'jml_guru' => $item->jml_guru,
        //         'tahun_berdiri' => $item->tahun_berdiri,
        //         'jml_fasilitas' => $item->jml_fasilitas,

        //     ];
        // });
         $tentang = tentang::first();
         $sambutan = sambutan::first();
         $berita = berita::latest()->get();
        
        return view('home', [
            'hero' => $hero,
            'tentang' => $tentang,
            'berita' => $berita,
            'sambutan' => $sambutan
        ]);
    }

    public function show(string $id)
    {
        $berita = berita::findOrFail($id);

        return view('detail-berita', compact('berita'));
    }

    public function ekskul()
    {
        $ekskul = ekstra::latest()->get();

        return view('ekskul', compact('ekskul'));
    }

    public function GuruStaf()
    {
        $guru_staf = guru_staf::latest()->get();

        return view('staf_guru', compact('guru_staf'));
    }

    public function Fasilitas()
    {
        $fasilitas = fasilitas::latest()->get();

        return view('fasilitas', compact('fasilitas'));
    }

    public function Timeline()
    {
        $timeline = timeline::first();
        return view('ppdb', compact('timeline'));
    }


}
