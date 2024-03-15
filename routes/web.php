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


use App\Http\Controllers\DeleteController;



//dashboard
Route::get('/dashboard/admin', function () {
    return view('layout/admin/Dashboard');
});
Route::get('/dashboard/admin',[DataController::class,'infobox']);

//managemen anggota
Route::get('/managemen/anggota', function () {
    return view('layout/admin/ManagemenAnggota');
});
Route::get('/managemen/anggota',[DataController::class,'dataAnggota']);
Route::post('/anggota/print-pdf', [PrintController::class, 'printPdfAnggota']);
Route::put('/anggota/delete/{uuid}', [DeleteController::class, 'deleteAnggota']);

//managemen pengurus
Route::get('/managemen/pengurus', function () {
    return view('layout/admin/ManagemenAnggota');
});
Route::get('/managemen/pengurus',[DataController::class,'dataPengurus']);
Route::post('/pengurus/print-pdf', [PrintController::class, 'printPdfPengurus']);


//managemen anak
Route::get('/managemen/anak', function () {
    return view('layout/admin/ManagemenAnak');
});
Route::get('/managemen/anak',[DataController::class,'dataAnak']);
Route::post('/anak/print-pdf', [PrintController::class, 'printPdfAnak']);
Route::put('/anak/delete/{uuid}', [DeleteController::class, 'deleteAnak']);

//managemen donatur
Route::get('/managemen/donatur', function () {
    return view('layout/admin/ManagemenDonatur');
});
Route::get('/managemen/donatur',[DataController::class,'dataDonatur']);
Route::post('/donatur/print-pdf', [PrintController::class, 'printPdfDonatur']);
Route::put('/donatur/delete/{uuid}', [DeleteController::class, 'deleteDonatur']);

//managemen aset
Route::get('/managemen/aset', function () {
    return view('layout/admin/ManagemenAset');
});
Route::get('/managemen/aset',[DataController::class,'dataAset']);
Route::post('/aset/print-pdf', [PrintController::class, 'printPdfAset']);
Route::put('/aset/delete/{uuid}', [DeleteController::class, 'deleteAset']);

//managemen kegiatan
Route::get('/managemen/kegiatan', function () {
    return view('layout/admin/ManagemenKegiatan');
});
Route::get('/managemen/kegiatan',[DataController::class,'dataKegiatan']);
Route::post('/kegiatan/print-pdf', [PrintController::class, 'printPdfKegiatan']);
Route::put('/kegiatan/delete/{uuid}', [DeleteController::class, 'deleteKegiatan']);

//managemen arsip
Route::get('/managemen/arsip', function () {
    return view('layout/admin/ManagemenArsip');
});
Route::get('/managemen/arsip',[DataController::class,'dataArsip']);
Route::post('/arsip/print-pdf', [PrintController::class, 'printPdfArsip']);
Route::put('/arsip/delete/{uuid}', [DeleteController::class, 'deleteArsip']);

//managemen Surat
Route::get('/managemen/surat', function () {
    return view('layout/admin/ManagemenSurat');
});
Route::get('/managemen/surat',[DataController::class,'dataSurat']);
Route::post('/surat/print-pdf/{uuid}', [PrintController::class, 'printPdfSurat']);
Route::put('/surat/delete/{uuid}', [DeleteController::class, 'deleteSurat']);

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
Route::post('/tambah/kegiatan',[TambahDataController::class,'tambahKegiatan']);

//tambah arsip
Route::get('/tambah/arsip', function () {
    return view('layout/admin/TambahArsip');
});
Route::post('/tambah/arsip',[TambahDataController::class,'tambahArsip']);

//tambah surat
Route::get('/tambah/surat', function () {
    return view('layout/admin/TambahSurat');
});
Route::get('/tambah/surat',[TambahDataController::class,'listPengurus']);
Route::post('/tambah/surat',[TambahDataController::class,'tambahSurat']);


Route::get('/print/surat', function () {
    return view('print/PrintSurat');
});
Route::get('/print/surat',[TambahDataController::class,'dataSurat']);





