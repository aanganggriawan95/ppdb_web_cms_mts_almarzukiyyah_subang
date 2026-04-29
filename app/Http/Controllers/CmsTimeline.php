<?php

namespace App\Http\Controllers;

use App\Models\timeline;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CmsTimeline extends Controller
{
    //
    public function index() : View
    {
        

        $timeline = timeline::all();

        return view('admin.timeline.index', compact('timeline'));
    }

    /**
     * create
     *
     * @return View
     */

    public function create() : View
    {
       
        return view('admin.timeline.create');
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
            'daftar' => 'required',
            'tes' => 'required',
            'daftar_ulang' => 'required',
            'mpls' => 'required',
        ]);

      

        // Create VIsi Misi
        timeline::create([
            'daftar' => $request->daftar,
            'tes' => $request->tes,
            'daftar_ulang' => $request->daftar_ulang,
            'mpls' => $request->mpls
        ]);

        return redirect()->route('timeline.index')->with('success', 'Timeline Berhasil Ditambahkan');
    }


        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */

    public function show(string $id)
    {
        $data = timeline::findOrFail($id);

        return response()->json([
            'daftar' => $data->daftar,
            'tes' => $data->tes,
            'daftar_ulang' => $data->daftar_ulang,
            'mpls' => $data->mpls
        ]);

    }

    public function edit(string $id) : View
    {
        //get product by ID
         $timeline = timeline::findOrFail($id);

        //render view with product
        return view('admin.timeline.edit', compact('timeline'));
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
             'daftar' => 'required',
            'tes' => 'required',
            'daftar_ulang' => 'required',
            'mpls' => 'required',
            
        ]);

        //get product by ID
        $timeline = timeline::findOrFail($id);

        // Check if imahe is uploaded
      
            // Update 
            $timeline->update([
                'daftar' => $request->daftar,
                'tes' => $request->tes,
                'daftar_ulang' => $request->daftar_ulang,
                'mpls' => $request->mpls
                ]);
        

        return redirect()->route('timeline.index')->with('success', 'Timeline Berhasil Diubah');
    }


    public function destroy($id) : RedirectResponse
    {
        //get product by ID
         $timeline = timeline::findOrFail($id);

       

        //delete visi misi
        $timeline->delete();

        //redirect to index
        return redirect()->route('timeline.index')->with('success', 'Timeline Berhasil Dihapus');
    }
}
