<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\TambahDataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login
Route::get('/', function () {
    return view('layout/Login');
});

//dashboard
Route::get('/dashboard/admin', function () {
    return view('layout/admin/Dashboard');
});
Route::get('/dashboard/admin',[DataController::class,'infobox']);

//namagemen anggota
Route::get('/managemen/anggota', function () {
    return view('layout/admin/ManagemenAnggota');
});
Route::get('/managemen/anggota',[DataController::class,'dataAnggota']);

//namagemen anak
Route::get('/managemen/anak', function () {
    return view('layout/admin/ManagemenAnak');
});
Route::get('/managemen/anak',[DataController::class,'dataAnak']);

//managemen donatur
Route::get('/managemen/donatur', function () {
    return view('layout/admin/ManagemenDonatur');
});
Route::get('/managemen/donatur',[DataController::class,'dataDonatur']);

//managemen aset
Route::get('/managemen/aset', function () {
    return view('layout/admin/ManagemenAset');
});
Route::get('/managemen/aset',[DataController::class,'dataAset']);

//managemen kegiatan
Route::get('/managemen/kegiatan', function () {
    return view('layout/admin/ManagemenKegiatan');
});
Route::get('/managemen/kegiatan',[DataController::class,'dataKegiatan']);

//managemen arsip
Route::get('/managemen/arsip', function () {
    return view('layout/admin/ManagemenArsip');
});
Route::get('/managemen/arsip',[DataController::class,'dataArsip']);


//tambah anggota
Route::get('/tambah/anggota', function () {
    return view('layout/admin/TambahAnggota');
});
Route::post('/tambah/anggota',[TambahDataController::class,'tambahAnggota']);

//tambah anak
Route::get('/tambah/anak', function () {
    return view('layout/admin/TambahAnak');
});
Route::get('/tambah/anak',[TambahDataController::class,'listOrtu']);
Route::post('/tambah/anak',[TambahDataController::class,'tambahAnak']);

//tambah donatur
Route::get('/tambah/donatur', function () {
    return view('layout/admin/TambahDonatur');
});
//tambah aset
Route::get('/tambah/aset', function () {
    return view('layout/admin/TambahAset');
});
//tambah kegiatan
Route::get('/tambah/kegiatan', function () {
    return view('layout/admin/TambahKegiatan');
});
//tambah arsip
Route::get('/tambah/arsip', function () {
    return view('layout/admin/TambahArsip');
});
Route::get('/surat', function () {
    return view('layout/admin/TambahSurat');
});



