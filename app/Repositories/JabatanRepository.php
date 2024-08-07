<?php

namespace App\Repositories;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JabatanRepository{
   public function getJabatan(){
        return Jabatan::select('*')
        ->where('jabatan.flag_aktif',true);
   }
   public function create($data)
   {
       return Jabatan::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Jabatan::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return Jabatan::where(['uuid'=>$uuid,'flag_aktif'=>true])->first();
   }
   public function delete($uuid)
   {
       return Jabatan::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update'=>Auth::user()->nama]);
   }
}