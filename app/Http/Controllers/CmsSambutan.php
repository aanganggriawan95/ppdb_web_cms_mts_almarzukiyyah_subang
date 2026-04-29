<?php

namespace App\Http\Controllers;

use App\Models\sambutan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmsSambutan extends Controller
{
    public function index() : View
    {
        

       $sambutan = sambutan::first();
        return view('admin.sambutan.index', compact('sambutan'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
        return view('admin.sambutan.create');
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $image = $request->file('image');
        $image->storeAs('sambutan', $image->hashName(), 'public');

        // Create VIsi Misi
        sambutan::create([
          
            'title' => $request->title,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'image' => $image->hashName(),
      
        ]);

        return redirect()->route('sambutan.index')->with('success', 'Sambutan Berhasil Ditambahkan');
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
         $sambutan = sambutan::findOrFail($id);

        //render view with product
        return view('admin.sambutan.edit', compact('sambutan'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        //get product by ID
        $sambutan = sambutan::findOrFail($id);

        if($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/sambutan/' . $sambutan->image);

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('sambutan', $image->hashName(), 'public');
            // Update 
            $sambutan->update([
                'title' => $request->title,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'image' => $image->hashName(),
                
            ]);
        } else {
            // Update hero without image
            $sambutan->update([
                'title' => $request->title,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        // Check if imahe is uploaded
      

        return redirect()->route('sambutan.index')->with('success', 'Sambutan Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
         $sambutan = sambutan::findOrFail($id);

       

        //delete visi misi
        $sambutan->delete();

        //redirect to index
        return redirect()->route('sambutan.index')->with('success', 'Sambutan Berhasil Dihapus');
    }
}
