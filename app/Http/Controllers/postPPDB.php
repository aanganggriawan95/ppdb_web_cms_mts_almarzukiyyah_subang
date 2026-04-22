<?php

namespace App\Http\Controllers;

use App\Models\modelPPDB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Exports\PpdbExport;
use Maatwebsite\Excel\Facades\Excel;

class postPPDB extends Controller
{
    public function store(Request $request)
    {
        // ✅ Validasi
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_lengkap' => 'required',
            'no_wa_wali' => 'required|string|max:20',
            'asal_sekolah' => 'required',
            'wa_walikelas_asal_sekolah' => 'nullable|string|max:20',
            'wa_operator_asal_sekolah' => 'nullable|string|max:20',
            'alamat_asal_sekolah' => 'required',
        ]);

        // ✅ Simpan ke database
        modelPPDB::create([
            'nama' => $request->nama,
            'jenjang' => $request->jenjang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_lengkap' => $request->alamat_lengkap,
            'no_wa_wali' => $request->no_wa_wali,
            'asal_sekolah' => $request->asal_sekolah,
            'wa_walikelas_asal_sekolah' => $request->wa_walikelas_asal_sekolah,
            'wa_operator_asal_sekolah' => $request->wa_operator_asal_sekolah,
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah

        ]);

        // ✅ Redirect / response
        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }


    public function exportPdf()
    {
        $ppdb = modelPPDB::all();

        $pdf = Pdf::loadView('admin.ppdb.pdf', compact('ppdb'));
        return $pdf->download('data-ppdb.pdf');
    }



    public function exportExcel()
    {
        return Excel::download(new PpdbExport, 'data-ppdb.xlsx');
    }
}