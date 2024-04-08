<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;
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
Route::middleware(['guest'])->group(function(){
    Route::get('/', function () {
        return view('layout/Login');
    });
    Route::post('/',[LoginController::class,'masuk']);
    Route::post('/test', function(){
        return view('print/PrintSurat');
    });
});

Route::get('/home',function(){
    return redirect('/dashboard/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::post('/kegiatan/print-pdf', [PrintController::class, 'printPdfKegiatan']);
    Route::get('/get/pendengaran-anak/{uuid}',[DataController::class,'getDataPendengaran']);
    
    Route::middleware('userAkses:admin')->group(function () {
        Route::get('/dashboard/admin', function () {
            return view('layout/admin/Dashboard');
        });
        //dashboard
        Route::get('/dashboard/admin',[DataController::class,'infobox']);
        Route::get('/get/aset',[DataController::class,'getDataAset']);

        Route::get('/manajemen/anggota', function () {
            return view('layout/admin/manajemenAnggota');
        });
        Route::get('/manajemen/anggota',[DataController::class,'dataAnggota']);
        Route::post('/anggota/print-pdf', [PrintController::class, 'printPdfAnggota']);
        Route::put('/anggota/delete/{uuid}', [DeleteController::class, 'deleteAnggota']);
        Route::get('/anggota/edit/{uuid}', [EditController::class, 'detailAnggota'])->name('anggota.edit');
        Route::put('/anggota/edit/{uuid}', [EditController::class, 'editAnggota'])->name('anggota.edit');

        //manajemen pengurus
        Route::get('/manajemen/pengurus', function () {
            return view('layout/admin/manajemenAnggota');
        });
        Route::get('/manajemen/pengurus',[DataController::class,'dataPengurus']);
        Route::post('/pengurus/print-pdf', [PrintController::class, 'printPdfPengurus']);
        Route::get('/pengurus/edit/{uuid}', [EditController::class, 'detailPengurus']);
        Route::put('/pengurus/edit/{uuid}', [EditController::class, 'editPengurus']);


        //manajemen anak
        Route::get('/manajemen/anak', function () {
            return view('layout/admin/manajemenAnak');
        });
        Route::get('/manajemen/anak',[DataController::class,'dataAnak']);
        Route::post('/anak/print-pdf', [PrintController::class, 'printPdfAnak']);
        Route::put('/anak/delete/{uuid}', [DeleteController::class, 'deleteAnak']);
        Route::get('/anak/edit/{uuid}', [EditController::class, 'detailAnak'])->name('anak.edit');
        Route::put('/anak/edit/{uuid}', [EditController::class, 'editAnakbyAdmin'])->name('anak.edit');

        //manajemen donatur
        Route::get('/manajemen/donatur', function () {
            return view('layout/admin/manajemenDonatur');
        });
        Route::get('/manajemen/donatur',[DataController::class,'dataDonatur']);
        Route::post('/donatur/print-pdf', [PrintController::class, 'printPdfDonatur']);
        Route::put('/donatur/delete/{uuid}', [DeleteController::class, 'deleteDonatur']);
        Route::get('/donatur/edit/{uuid}', [EditController::class, 'detailDonatur']);
        Route::put('/donatur/edit/{uuid}', [EditController::class, 'editDonatur']);

        //manajemen aset
        Route::get('/manajemen/aset', function () {
            return view('layout/admin/manajemenAset');
        });
        Route::get('/manajemen/aset',[DataController::class,'dataAset']);
        Route::post('/aset/print-pdf', [PrintController::class, 'printPdfAset']);
        Route::put('/aset/delete/{uuid}', [DeleteController::class, 'deleteAset']);
        Route::get('/aset/edit/{uuid}', [EditController::class, 'detailAset']);
        Route::put('/aset/edit/{uuid}', [EditController::class, 'editAset']);

        //manajemen kegiatan
        Route::get('/manajemen/kegiatan', function () {
            return view('layout/admin/manajemenKegiatan');
        });
        Route::get('/manajemen/kegiatan',[DataController::class,'dataKegiatan']);
        Route::put('/kegiatan/delete/{uuid}', [DeleteController::class, 'deleteKegiatan']);
        Route::get('/kegiatan/edit/{uuid}', [EditController::class, 'detailKegiatan']);
        Route::put('/edit/kegiatan/{uuid}', [EditController::class, 'editKegiatan']);

        //manajemen arsip
        Route::get('/manajemen/arsip', function () {
            return view('layout/admin/manajemenArsip');
        });
        Route::get('/manajemen/arsip',[DataController::class,'dataArsip']);
        Route::post('/arsip/print-pdf', [PrintController::class, 'printPdfArsip']);
        Route::put('/arsip/delete/{uuid}', [DeleteController::class, 'deleteArsip']);
        Route::get('/arsip/edit/{uuid}', [EditController::class, 'detailArsip']);
        Route::put('/arsip/edit/{uuid}', [EditController::class, 'editArsip']);

        //manajemen Surat
        Route::get('/manajemen/surat', function () {
            return view('layout/admin/manajemenSurat');
        });
        Route::get('/manajemen/surat',[DataController::class,'dataSurat']);
        Route::post('/surat/print-pdf/{uuid}', [PrintController::class, 'printPdfSurat']);
        Route::put('/surat/delete/{uuid}', [DeleteController::class, 'deleteSurat']);
        Route::get('/surat/edit/{uuid}', [EditController::class, 'detailSurat']);
        Route::put('/surat/edit/{uuid}', [EditController::class, 'editSurat']);

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
        Route::get('/tambah/kegiatan',[TambahDataController::class,'listSumberDana']);

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
        });
            
    Route::middleware('userAkses:anggota')->group(function () {
        //dashboard
        Route::get('/dashboard/anggota', function () {
            return view('layout/anggota/Dashboard');
        });
        Route::get('/dashboard/anggota',[DataController::class,'dataDashboard']);
        //hasilPemeriksaan
        Route::get('/manajemen/hasil-pemeriksaan', function () {
            return view('layout/anggota/manajemenHasilPemeriksaan');
        });
        Route::get('/manajemen/hasil-pemeriksaan',[DataController::class,'hasilPemeriksaan']);
        Route::get('/tambah/hasil-pemeriksaan', function () {
            return view('layout/anggota/TambahHasilPemeriksaan');
        });
        Route::get('/tambah/hasil-pemeriksaan',[TambahDataController::class,'listAnak']);
        Route::post('/tambah/hasil-pemeriksaan',[TambahDataController::class,'tambahHasilpemeriksaan']);
        Route::get('/hasil-pemeriksaan/edit/{uuid}', [EditController::class, 'detailHasil']);
        Route::put('/hasil-pemeriksaan/delete/{uuid}', [DeleteController::class, 'deleteHasilPemeriksaan']);
        Route::put('/hasil-pemeriksaan/edit/{uuid}', [EditController::class, 'editHasilPemeriksaan']);

        

        Route::get('/kegiatan/anggota', function () {
            return view('layout/anggota/Kegiatan');
        });
        Route::get('/kegiatan/anggota',[DataController::class,'dataKegiatanAnggota']);
        });        
    });

