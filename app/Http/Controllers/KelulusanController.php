<?php

namespace App\Http\Controllers;

use App\Mail\StatusPendaftaranMail;
use App\Models\modelPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class KelulusanController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->role !== 'top_admin') {
            abort(403);
        }

      
        $search = $request->input('search');
        $siswa = modelPPDB::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('admin.penerimaan.index', compact('siswa'));

        // return view('admin.ppdb.index', compact('ppdb'))->with('i', (request()->input('page', 1) - 1) * 5)->with('search', $search)->with('route', 'ppdb.index');
    }

    public function show(string $id) : View
    {
        $siswa = modelPPDB::findOrFail($id);
        return view('admin.penerimaan.show', compact('siswa'));
    }


    

    public function terima($id)
    {
        if (auth()->user()->role !== 'top_admin') {
            abort(403);
        }

        $siswa = modelPPDB::findOrFail($id);

        // ❗ Cegah double proses
        if ($siswa->status !== 'pending') {
            return back()->with('error', 'Siswa sudah diproses');
        }

        // ✅ update status
        $siswa->status = 'diterima';
        $siswa->save();

        // 🔥 WAJIB kirim email
        Mail::to($siswa->email)->send(new StatusPendaftaranMail($siswa));

        return redirect()->route('penerimaan.index')
            ->with('success', 'Siswa diterima & email terkirim');
    }

    public function tolak($id)
    {
        if (auth()->user()->role !== 'top_admin') {
            abort(403);
        }

        $siswa = modelPPDB::findOrFail($id);

        if ($siswa->status !== 'pending') {
            return back()->with('error', 'Siswa sudah diproses');
        }

        $siswa->status = 'ditolak';
        $siswa->save();

        Mail::to($siswa->email)->send(new StatusPendaftaranMail($siswa));

        return back()->with('success', 'Siswa ditolak & email terkirim');
    }
}