<?php

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
Route::get('/managemen/donatur', function () {
    return view('layout/admin/ManagemenDonatur');
});
Route::get('/managemen/anggota', function () {
    return view('layout/admin/ManagemenAnggota');
});
Route::get('/managemen/kegiatan', function () {
    return view('layout/admin/ManagemenKegiatan');
});
Route::get('/tambah/anggota', function () {
    return view('layout/admin/TambahAnggota');
});
Route::get('/tambah/donatur', function () {
    return view('layout/admin/TambahDonatur');
});
Route::get('/surat', function () {
    return view('layout/admin/TambahSurat');
});
