<?php

namespace App\Http\Controllers;

use App\Models\tentang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CmsTentang extends Controller
{
    public function index() : View
    {
        

       $tentang = tentang::first();
        return view('admin.tentang.index', compact('tentang'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
        return view('admin.tentang.create');
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
            'deskripsi' => 'required',
            'jml_siswa' => 'required',
            'jml_guru' => 'required',
            'tahun_berdiri' => 'required',
            'jml_fasilitas' => 'required'
        ]);

      

        // Create VIsi Misi
        tentang::create([
          
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'jml_siswa' => $request->jml_siswa,
            'jml_guru' => $request->jml_guru,
            'tahun_berdiri' => $request->tahun_berdiri,
            'jml_fasilitas' => $request->jml_fasilitas
        ]);

        return redirect()->route('tentang.index')->with('success', 'Tentang Berhasil Ditambahkan');
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
         $tentang = tentang::findOrFail($id);

        //render view with product
        return view('admin.tentang.edit', compact('tentang'));
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
            'deskripsi' => 'required',
            'jml_siswa' => 'required',
            'jml_guru' => 'required',
            'tahun_berdiri' => 'required',
            'jml_fasilitas' => 'required',
        ]);

        //get product by ID
        $tentang = tentang::findOrFail($id);

        // Check if imahe is uploaded
      
            // Update 
            $tentang->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'jml_siswa' => $request->jml_siswa,
                'jml_guru' => $request->jml_guru,
                'tahun_berdiri' => $request->tahun_berdiri,
                'jml_fasilitas' => $request->jml_fasilitas,
            ]);

            
        

        return redirect()->route('tentang.index')->with('success', 'Tentang Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
         $tentang = tentang::findOrFail($id);

       

        //delete visi misi
        $tentang->delete();

        //redirect to index
        return redirect()->route('tentang.index')->with('success', 'Tentang Berhasil Dihapus');
    }
}
