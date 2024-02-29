<?php

use App\Http\Controllers\DonaturController;
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
Route::get('/', function () {
    return view('layout/Login');
});
Route::get('/dashboard/admin', function () {
    return view('layout/admin/Dashboard');
});
Route::get('/managemen/anggota', function () {
    return view('layout/admin/ManagemenAnggota');
});
Route::get('/managemen/donatur', function () {
    return view('layout/admin/ManagemenDonatur');
});
Route::get('/managemen/aset', function () {
    return view('layout/admin/ManagemenAset');
});
Route::get('/managemen/kegiatan', function () {
    return view('layout/admin/ManagemenKegiatan');
});
Route::get('/managemen/arsip', function () {
    return view('layout/admin/ManagemenArsip');
});


Route::get('/tambah/anggota', function () {
    return view('layout/admin/TambahAnggota');
});
Route::get('/tambah/donatur', function () {
    return view('layout/admin/TambahDonatur');
});
Route::get('/tambah/aset', function () {
    return view('layout/admin/TambahAset');
});
Route::get('/tambah/kegiatan', function () {
    return view('layout/admin/TambahKegiatan');
});
Route::get('/tambah/arsip', function () {
    return view('layout/admin/TambahArsip');
});
Route::get('/surat', function () {
    return view('layout/admin/TambahSurat');
});


Route::get('/managemen/donatur',[DonaturController::class,'dataDonatur']);
