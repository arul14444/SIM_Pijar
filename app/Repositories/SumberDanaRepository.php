<?php

namespace App\Repositories;

use App\Models\SumberDana;
use Illuminate\Database\Eloquent\Collection;

class SumberDanaRepository{
   public function getSumber(){
        return SumberDana::select('*')
        ->where(['flag_aktif'=>1])
        ->get();
   }
   public function findByUuid($uuid)
   {
       return SumberDana::from('sumber_dana as sd')->where(['sd.uuid' => $uuid, 'sd.flag_aktif' => true])->first();
   }
}