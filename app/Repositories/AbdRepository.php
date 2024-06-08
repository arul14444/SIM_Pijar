<?php

namespace App\Repositories;

use App\Models\Abd;
use Illuminate\Database\Eloquent\Collection;

class AbdRepository{
   public function getAbd(){
        return Abd::select('*')
        ->where(['flag_aktif'=>1])
        ->orderBy('jenis','asc');
   }
   public function findByUuid($uuid)
   {
       return Abd::from('abd')->where(['abd.uuid' => $uuid, 'abd.flag_aktif' => true])->first();
   }
}