<?php

namespace App\Http\Controllers;

use App\Models\guru_staf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmsGuruStaf extends Controller
{
    //
    public function index(Request $request) : View
    {
        $search = $request->input('search');

        $guru_staf = guru_staf::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.guru-staf.index', compact('guru_staf'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
        return view('admin.guru-staf.create');
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
            'jabatan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // Ulopad Image
        $image = $request->file('image');
        $image->storeAs('guru-staf', $image->hashName(), 'public');

        // Create Hero
        guru_staf::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'image' => $image->hashName()
        ]);

        return redirect()->route('guru-staf.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $guru_staf = guru_staf::findOrFail($id);

        //render view with product
        return view('admin.guru-staf.edit', compact('guru_staf'));
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
            'jabatan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        //get product by ID
        $guru_staf = guru_staf::findOrFail($id);

        // Check if imahe is uploaded
        if($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/guru-staf/' . $guru_staf->image);

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('guru-staf', $image->hashName(), 'public');

            // Update hero with new image
            $guru_staf->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'image' => $image->hashName()
            ]);
        } else {
            // Update hero without image
            $guru_staf->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
        }

        return redirect()->route('guru-staf.index')->with('success', 'Data Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
        $guru_staf = guru_staf::findOrFail($id);

        //delete image
        Storage::delete('public/guru-staf/' . $guru_staf->image);

        //delete product
        $guru_staf->delete();

        //redirect to index
        return redirect()->route('guru-staf.index')->with('success', 'Data Berhasil Dihapus');
    }
}
