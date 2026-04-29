<?php

namespace App\Http\Controllers;

use App\Models\hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmsHero extends Controller
{
    //
   public function index(Request $request) : View
    {
        $search = $request->input('search');

        $hero = hero::query()
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.hero.index', compact('hero'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
        return view('admin.hero.create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // Ulopad Image
        $image = $request->file('image');
        $image->storeAs('hero', $image->hashName(), 'public');

        // Create Hero
        hero::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image->hashName()
        ]);

        return redirect()->route('hero.index')->with('success', 'Hero Berhasil Ditambahkan');
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
        $hero = hero::findOrFail($id);

        //render view with product
        return view('admin.hero.edit', compact('hero'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //get product by ID
        $hero = hero::findOrFail($id);

        // Check if imahe is uploaded
        if($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/hero/' . $hero->image);

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('hero', $image->hashName(), 'public');

            // Update hero with new image
            $hero->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image->hashName()
            ]);
        } else {
            // Update hero without image
            $hero->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('hero.index')->with('success', 'Hero Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
        $hero = hero::findOrFail($id);

        //delete image
        Storage::delete('public/hero/' . $hero->image);

        //delete product
        $hero->delete();

        //redirect to index
        return redirect()->route('hero.index')->with('success', 'Hero Berhasil Dihapus');
    }
}


