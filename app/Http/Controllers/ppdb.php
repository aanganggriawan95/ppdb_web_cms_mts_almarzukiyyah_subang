<?php

namespace App\Http\Controllers;

use App\Models\modelPPDB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ppdb extends Controller
{

    //
    public function index(Request $request) : View
    {
        $search = $request->input('search');
        $ppdb = modelPPDB::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.ppdb.index', compact('ppdb'));

        // return view('admin.ppdb.index', compact('ppdb'))->with('i', (request()->input('page', 1) - 1) * 5)->with('search', $search)->with('route', 'ppdb.index');
    }

    public function show(string $id) : View
    {
        $ppdb = modelPPDB::findOrFail($id);
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function destroy($id) : RedirectResponse
    {
        $ppdb = modelPPDB::findOrFail($id);
        $ppdb->delete();
        return redirect()->route('ppdb.index')->with('success', 'Data Berhasil Dihapus');
    }
}
