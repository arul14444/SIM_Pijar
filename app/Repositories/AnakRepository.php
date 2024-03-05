<?php

namespace App\Repositories;

use App\Models\Anak;
use Illuminate\Database\Eloquent\Collection;

class AnakRepository{
   public function getAnak(){
        return Anak::select('*')
        ->where(['flag_aktif'=>1])
        ->get();
   }
   public function create($data)
    {
        return Anak::insert($data);
    }
   public function updateByUuid($data, $uuid)
    {
        return Anak::where('uuid', $uuid)->update($data);
    }
    public function findByUuid($uuid)
    {
        return Anak::from('anak as a')->where(['a.uuid' => $uuid, 'flag_aktif' => true])->first();
    }
    public function delete($user, $uuid)
    {
        return Anak::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update' => $user]);
    }
}