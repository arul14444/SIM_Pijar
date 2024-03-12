<?php

namespace App\Repositories;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SuratRepository{
   public function getSurat(){
        return Surat::select('*')
        ->get();
   }
   public function create($data)
   {
       return Surat::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Surat::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return Surat::from('anak as a')->where(['a.uuid' => $uuid, 'flag_aktif' => true])->first();
   }
   public function delete($user, $uuid)
   {
       return Surat::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update' => $user]);
   }
}