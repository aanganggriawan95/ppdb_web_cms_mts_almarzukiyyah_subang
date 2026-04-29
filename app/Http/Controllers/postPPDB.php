<?php

namespace App\Http\Controllers;

use App\Models\modelPPDB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Exports\PpdbExport;
use Maatwebsite\Excel\Facades\Excel;

class postPPDB extends Controller
{
    public function store(Request $request)
    {
        // ✅ Validasi sesuai kolom tabel
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'asal_sekolah' => 'required|string|max:255',
            'nisn' => 'required|string|max:50',
            'nik' => 'required|string|max:50',
            'kk' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'alamat_lengkap' => 'required',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_hp_ortu' => 'required|string|max:20',
            'tahun_masuk' => 'required|string|max:10',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'penghasilan_ortu' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'pernah_tk' => 'required|string|max:10',
            'pernah_paud' => 'required|string|max:10',
            'hobi' => 'required|string|max:255',
            'anak_ke' => 'required|string|max:10',
            'jumlah_saudara' => 'required|string|max:10',
            'cita_cita' => 'required|string|max:255',

            // file (optional / required sesuai kebutuhan)
            'file_ijazah' => 'required|file|max:5120',
            'file_akte' => 'required|file|max:5120',
            'file_kartu' => 'required|file|max:5120',
            'file_ktp_ortu' => 'required|file|max:5120',
            'file_kk' => 'required|file|max:5120',
            'foto' => 'required|file|image|max:5120',
        ]);

        // ✅ Upload file
        $data = $request->all();
        $data['file_ijazah'] = $request->file('file_ijazah')->store('ppdb/ijazah', 'public');
        $data['file_akte'] = $request->file('file_akte')->store('ppdb/akte', 'public');
        $data['file_kartu'] = $request->file('file_kartu')->store('ppdb/kartu', 'public');
        $data['file_ktp_ortu'] = $request->file('file_ktp_ortu')->store('ppdb/ktp_ortu', 'public');
        $data['file_kk'] = $request->file('file_kk')->store('ppdb/kk', 'public');
        $data['foto'] = $request->file('foto')->store('ppdb/foto', 'public');

        // ✅ default status
        $data['status'] = 'pending';

        // ✅ Simpan
        modelPPDB::create($data);

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