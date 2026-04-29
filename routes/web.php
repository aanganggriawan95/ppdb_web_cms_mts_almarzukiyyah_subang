<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CmsBerita;
use App\Http\Controllers\CmsEkskul;
use App\Http\Controllers\CmsFasilitas;
use App\Http\Controllers\CmsGuruStaf;
use App\Http\Controllers\CmsHero;
use App\Http\Controllers\CmsSambutan;
use App\Http\Controllers\CmsTentang;
use App\Http\Controllers\CmsTimeline;
use App\Http\Controllers\CmsVisiMisi;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HomeGetDataCms;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\postPPDB;
use App\Http\Controllers\ppdb;
use App\Http\Controllers\viewVisiMisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeGetDataCms::class, 'index']);

Route::get('/visi-misi', [viewVisiMisi::class, 'index']);
Route::get('/berita/{id}', [HomeGetDataCms::class, 'show'])->name('berita.show');
Route::get('/ekskul', [HomeGetDataCms::class, 'ekskul']);
Route::get('/guru-staf', [HomeGetDataCms::class, 'GuruStaf']);
Route::get('/fasilitas', [HomeGetDataCms::class, 'Fasilitas']);
Route::get('/ppdb-online', [HomeGetDataCms::class, 'Timeline']);
Route::post('/ppdb-post', [postPPDB::class, 'store']);
Route::get('/ppdb-success', function () {
    return view('success');
})->name('success');


// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


// LOGOUT
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

// DASHBOARD (PROTECTED)
Route::get('/admin', [Dashboard::class, 'index'])->middleware('admin');
// Route::get('/admin/cms-hero', function () {
//     return view('admin.cms-hero');
// })->middleware('admin');
// Route::resource('/admin/cms-hero-create', CmsHero::class)->middleware('admin');
Route::resource('admin/hero', CmsHero::class)->middleware('admin');
Route::resource('admin/visi-misi', CmsVisiMisi::class)->middleware('admin');
Route::resource('admin/tentang', CmsTentang::class)->middleware('admin');
Route::resource('admin/berita', CmsBerita::class)->middleware('admin');
Route::resource('admin/ekskul', CmsEkskul::class)->middleware('admin');
Route::resource('admin/guru-staf', CmsGuruStaf::class)->middleware('admin');
Route::resource('admin/fasilitas', CmsFasilitas::class)->middleware('admin');
Route::resource('admin/ppdb', ppdb::class)->middleware('admin');
Route::resource('admin/sambutan', CmsSambutan::class)->middleware('admin');
Route::resource('admin/timeline', CmsTimeline::class)->middleware('admin');


Route::get('/ppdb-export-excel', [postPPDB::class, 'exportExcel'])->name('ppdb.export.excel');
Route::get('/ppdb-export-pdf', [postPPDB::class, 'exportPdf'])->name('ppdb.export.pdf');

Route::get('/test-email', function () {
    Mail::raw('Ini email dari Laravel', function ($msg) {
        $msg->to('aanganggriawan222@gmail.com')
            ->subject('Test Email Laravel');
    });

    return 'Email dikirim!';
});

// Route::middleware('auth')->group(function () {
//     Route::resource('/admin/penerimaan', KelulusanController::class);
// });


Route::middleware('auth')->group(function () {
    Route::get('/admin/penerimaan', [KelulusanController::class, 'index'])->name('penerimaan.index');
    Route::get('/admin/penerimaan/{id}', [KelulusanController::class, 'show'])->name('penerimaan.show');
    Route::post('/admin/penerimaan/{id}/terima', [KelulusanController::class, 'terima']);
    Route::post('/admin/penerimaan/{id}/tolak', [KelulusanController::class, 'tolak']);
});