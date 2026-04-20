<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmsBerita extends Controller
{
    //
    public function index(Request $request) : View
    {
        
        $search = $request->input('search');
        
        $berita = berita::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view('admin.berita.index', compact('berita'));
    }

    public function create() : View
    {
        return view('admin.berita.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('berita', $image->hashName(), 'public');

        berita::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'image' => $request->image->hashName(),
            'date' => $request->date
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    public function show(string $id) : View
    {
        $berita = berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(string $id) : View
    {
        $berita = berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'date' => 'required',
        ]);

        $berita = berita::findOrFail($id);
        if($request->hasFile('image')) {
            Storage::delete('public/berita/' . $berita->image);

            $image = $request->file('image');
            $image->storeAs('berita', $image->hashName(), 'public');

            $berita->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'image' => $image->hashName(),
                'date' => $request->date
            ]);
        } else {
            $berita->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'date' => $request->date
            ]);
        }

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Diubah');
    }

    public function destroy($id) : RedirectResponse
    {
        $berita = berita::findOrFail($id);
        Storage::delete('public/berita/' . $berita->image);
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Dihapus');
    }

}


