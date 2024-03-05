<?php

namespace App\Repositories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class KegiatanRepository{
   public function getKegiatan(){
        return Kegiatan::select('*')
        ->get();
   }
   public function create($data)
   {
       return Kegiatan::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Kegiatan::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return Kegiatan::from('anak as a')->where(['a.uuid' => $uuid, 'flag_aktif' => true])->first();
   }
   public function delete($user, $uuid)
   {
       return Kegiatan::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update' => $user]);
   }
}