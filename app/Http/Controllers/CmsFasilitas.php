<?php

namespace App\Http\Controllers;

use App\Models\fasilitas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmsFasilitas extends Controller
{
    //
    public function index(Request $request) : View
    {
        $search = $request->input('search');

        $fasilitas = fasilitas::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
        return view('admin.fasilitas.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // Ulopad Image
        $image = $request->file('image');
        $image->storeAs('fasilitas', $image->hashName(), 'public');

        // Create Hero
        fasilitas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'image' => $image->hashName()
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Ditambahkan');
    }


        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */


    public function edit(string $id) : View
    {
        //get product by ID
        $fasilitas = fasilitas::findOrFail($id);

        //render view with product
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }
    
        /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */

    public function update(Request $request, $id): RedirectResponse
    {
        // validate form
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required|max:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        //get product by ID
        $fasilitas = fasilitas::findOrFail($id);

        // Check if imahe is uploaded
        if($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/fasilitas/' . $fasilitas->image);

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('fasilitas', $image->hashName(), 'public');

            // Update hero with new image
            $fasilitas->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'image' => $image->hashName()
            ]);
        } else {
            // Update hero without image
            $fasilitas->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
        $fasilitas = fasilitas::findOrFail($id);

        //delete image
        Storage::delete('public/fasilitas/' . $fasilitas->image);

        //delete product
        $fasilitas->delete();

        //redirect to index
        return redirect()->route('fasilitas.index')->with('success', 'Data Berhasil Dihapus');
    }
}
