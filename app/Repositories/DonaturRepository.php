<?php

namespace App\Repositories;

use App\Models\Donatur;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonaturRepository{
   public function getDonatur(){
        return Donatur::select('donatur.nama','donatur.alamat','donatur.nomor_telepon','i.instansi','donatur.uuid')
        ->join('instansi as i','i.id','=','donatur.id_instansi')
        ->where('donatur.flag_aktif',true);
   }
   public function create($data)
   {
       return Donatur::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Donatur::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return Donatur::from('donatur as d')
       ->join('instansi as i','i.id','=','d.id_instansi')
       ->select('d.nama','d.alamat','d.nomor_telepon','i.instansi','d.uuid')
       ->orderBy('d.nama','asc')
       ->where(['d.uuid' => $uuid, 'd.flag_aktif' => true])->first();
   }
   public function delete($uuid)
   {
       return Donatur::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update'=>Auth::user()->nama]);
   }
}