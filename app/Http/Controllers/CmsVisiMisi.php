<?php

namespace App\Http\Controllers;

use App\Models\visi_misi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CmsVisiMisi extends Controller
{
    //
    public function index() : View
{
    

    $visiMisi = visi_misi::all();

    return view('admin.visi-misi.index', compact('visiMisi'));
}

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
        return view('admin.visi-misi.create');
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
            'visi' => 'required',
            'misi' => 'required',
        ]);

      

        // Create VIsi Misi
        visi_misi::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Visi Misi Berhasil Ditambahkan');
    }


        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */

    public function show(string $id)
    {
        $data = visi_misi::findOrFail($id);

        return response()->json([
            'visi' => $data->visi,
            'misi' => $data->misi,
        ]);

    }

    public function edit(string $id) : View
    {
        //get product by ID
         $visiMisi = visi_misi::findOrFail($id);

        //render view with product
        return view('admin.visi-misi.edit', compact('visiMisi'));
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
            'visi' => 'required',
            'misi' => 'required',
            
        ]);

        //get product by ID
        $visiMisi = visi_misi::findOrFail($id);

        // Check if imahe is uploaded
      
            // Update 
            $visiMisi->update([
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);
        

        return redirect()->route('visi-misi.index')->with('success', 'Visi Misi Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
         $visiMisi = visi_misi::findOrFail($id);

       

        //delete visi misi
        $visiMisi->delete();

        //redirect to index
        return redirect()->route('visi-misi.index')->with('success', 'Visi Misi Berhasil Dihapus');
    }
}
