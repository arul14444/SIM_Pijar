<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PrintController;
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
Route::post('/anggota/print-pdf', [PrintController::class, 'printPdfAnggota']);


//namagemen anak
Route::get('/managemen/anak', function () {
    return view('layout/admin/ManagemenAnak');
});
Route::get('/managemen/anak',[DataController::class,'dataAnak']);
Route::post('/anak/print-pdf', [PrintController::class, 'printPdfAnak']);

//managemen donatur
Route::get('/managemen/donatur', function () {
    return view('layout/admin/ManagemenDonatur');
});
Route::get('/managemen/donatur',[DataController::class,'dataDonatur']);
Route::post('/donatur/print-pdf', [PrintController::class, 'printPdfDonatur']);

//managemen aset
Route::get('/managemen/aset', function () {
    return view('layout/admin/ManagemenAset');
});
Route::get('/managemen/aset',[DataController::class,'dataAset']);
Route::post('/aset/print-pdf', [PrintController::class, 'printPdfAset']);

//managemen kegiatan
Route::get('/managemen/kegiatan', function () {
    return view('layout/admin/ManagemenKegiatan');
});
Route::get('/managemen/kegiatan',[DataController::class,'dataKegiatan']);
Route::post('/kegiatan/print-pdf', [PrintController::class, 'printPdfKegiatan']);

//managemen arsip
Route::get('/managemen/arsip', function () {
    return view('layout/admin/ManagemenArsip');
});
Route::get('/managemen/arsip',[DataController::class,'dataArsip']);
Route::post('/arsip/print-pdf', [PrintController::class, 'printPdfArsip']);
//managemen Surat
Route::get('/managemen/surat', function () {
    return view('layout/admin/ManagemenSurat');
});


//tambah anggota
Route::get('/tambah/anggota', function () {
    return view('layout/admin/TambahAnggota');
});
Route::post('/tambah/anggota',[TambahDataController::class,'tambahAnggota']);

//tambah anak
Route::get('/tambah/anak', function () {
    return view('layout/admin/TambahAnak');
});
Route::get('/tambah/anak',[TambahDataController::class,'listDataTambahAnak']);
Route::post('/tambah/anak',[TambahDataController::class,'tambahAnakbyAdmin']);

//tambah donatur
Route::get('/tambah/donatur', function () {
    return view('layout/admin/TambahDonatur');
});
Route::post('/tambah/donatur',[TambahDataController::class,'tambahDonatur']);
//tambah aset
Route::get('/tambah/aset', function () {
    return view('layout/admin/TambahAset');
});
Route::post('/tambah/aset',[TambahDataController::class,'tambahAset']);
Route::get('/tambah/aset',[TambahDataController::class,'listStatusAset']);
//tambah kegiatan
Route::get('/tambah/kegiatan', function () {
    return view('layout/admin/TambahKegiatan');
});
//tambah arsip
Route::get('/tambah/arsip', function () {
    return view('layout/admin/TambahArsip');
});
Route::get('/tambah/surat', function () {
    return view('layout/admin/TambahSurat');
});




Route::get('/print/surat', function () {
    return view('print/PrintSurat');
});





