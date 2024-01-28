<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
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
Route::middleware(['guest'])->group(function(){
    Route::get('/', [LoginController::class,'index'])->name('login');
    Route::post('/', [LoginController::class,'login']);
});

route::get('/home',function(){
    return redirect('/index');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/index', [RoleController::class,'index']);
    Route::get('/admin', [RoleController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/anggota', [RoleController::class,'anggota'])->middleware('userAkses:orang_tua');
    Route::get('/logout', [LoginController::class,'logout']);
});
