<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CmsBerita;
use App\Http\Controllers\CmsHero;
use App\Http\Controllers\CmsTentang;
use App\Http\Controllers\CmsVisiMisi;
use App\Http\Controllers\HomeGetDataCms;
use App\Http\Controllers\viewVisiMisi;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeGetDataCms::class, 'index']);

Route::get('/visi-misi', [viewVisiMisi::class, 'index']);
Route::get('/berita/{id}', [HomeGetDataCms::class, 'show'])->name('berita.show');
Route::get('/ekstra', function () {
    return view('ekstrakulikuler');
});
Route::get('/guru-staf', function () {
    return view('staf_guru');
});
Route::get('/fasilitas', function () {
    return view('fasilitas');
});
Route::get('/ppdb', function () {
    return view('ppdb');
});



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

