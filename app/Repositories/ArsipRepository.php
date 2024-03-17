<?php

namespace App\Repositories;

use App\Models\Arsip;
use Illuminate\Database\Eloquent\Collection;

class ArsipRepository{
   public function getArsip(){
        return Arsip::select('*')
        ->where(['flag_aktif'=>1]);
   }
   public function create($data)
    {
        return Arsip::insert($data);
    }
   public function updateByUuid($data, $uuid)
    {
        return Arsip::where('uuid', $uuid)->update($data);
    }
    public function findByUuid($uuid)
    {
        return Arsip::from('arsip as a')->where(['a.uuid' => $uuid, 'flag_aktif' => true])->first();
    }
    public function delete($uuid)
    {
        return Arsip::where('uuid', $uuid)->update(['flag_aktif' => 0]);
    }
}