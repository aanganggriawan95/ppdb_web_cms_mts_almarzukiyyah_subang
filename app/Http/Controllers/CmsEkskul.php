<?php

namespace App\Http\Controllers;

use App\Models\ekstra;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmsEkskul extends Controller
{
    //
    public function index(Request $request) : View
    {
        $search = $request->input('search');

        $ekskul = ekstra::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.ekskul.index', compact('ekskul'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
        return view('admin.ekskul.create');
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
        $image->storeAs('ekskul', $image->hashName(), 'public');

        // Create Hero
        ekstra::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'image' => $image->hashName()
        ]);

        return redirect()->route('ekskul.index')->with('success', 'Ekskul Berhasil Ditambahkan');
    }


        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */

    public function show(string $id) : View
    {
        $hero = hero::findOrFail($id);
        return view('admin.hero.show', compact('hero'));
    }

    public function edit(string $id) : View
    {
        //get product by ID
        $ekskul = ekstra::findOrFail($id);

        //render view with product
        return view('admin.ekskul.edit', compact('ekskul'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //get product by ID
        $ekskul = ekstra::findOrFail($id);

        // Check if imahe is uploaded
        if($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/ekskul/' . $ekskul->image);

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('ekskul', $image->hashName(), 'public');

            // Update hero with new image
            $ekskul->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'image' => $image->hashName()
            ]);
        } else {
            // Update hero without image
            $ekskul->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect()->route('ekskul.index')->with('success', 'Ekskul Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
        $ekskul = ekstra::findOrFail($id);

        //delete image
        Storage::delete('public/ekskul/' . $ekskul->image);

        //delete product
        $ekskul->delete();

        //redirect to index
        return redirect()->route('ekskul.index')->with('success', 'Ekskul Berhasil Dihapus');
    }
}
