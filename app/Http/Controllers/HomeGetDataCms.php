<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\hero;
use App\Models\tentang;
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
         $berita = berita::latest()->get();
        
        return view('home', [
            'hero' => $hero,
            'tentang' => $tentang,
            'berita' => $berita
        ]);
    }

    public function show(string $id)
    {
        $berita = berita::findOrFail($id);

        return view('detail-berita', compact('berita'));
    }

}
