<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CmsBerita;
use App\Http\Controllers\CmsEkskul;
use App\Http\Controllers\CmsFasilitas;
use App\Http\Controllers\CmsGuruStaf;
use App\Http\Controllers\CmsHero;
use App\Http\Controllers\CmsTentang;
use App\Http\Controllers\CmsVisiMisi;
use App\Http\Controllers\HomeGetDataCms;
use App\Http\Controllers\postPPDB;
use App\Http\Controllers\ppdb;
use App\Http\Controllers\viewVisiMisi;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeGetDataCms::class, 'index']);

Route::get('/visi-misi', [viewVisiMisi::class, 'index']);
Route::get('/berita/{id}', [HomeGetDataCms::class, 'show'])->name('berita.show');
Route::get('/ekskul', [HomeGetDataCms::class, 'ekskul']);
Route::get('/guru-staf', [HomeGetDataCms::class, 'GuruStaf']);
Route::get('/fasilitas', [HomeGetDataCms::class, 'Fasilitas']);
Route::get('/ppdb-online', function () {
    return view('ppdb');
});
Route::post('/ppdb-post', [postPPDB::class, 'store']);
Route::get('/ppdb-success', function () {
    return view('success');
})->name('success');


// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// DASHBOARD (PROTECTED)
Route::get('/admin', function () {
    return view('/admin/dashboard');
})->middleware('admin');
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


Route::get('/ppdb-export-excel', [postPPDB::class, 'exportExcel'])->name('ppdb.export.excel');
Route::get('/ppdb-export-pdf', [postPPDB::class, 'exportPdf'])->name('ppdb.export.pdf');