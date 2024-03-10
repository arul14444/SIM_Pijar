<?php

namespace App\Repositories;

use App\Models\StatusAset;
use Illuminate\Database\Eloquent\Collection;

class StatusAsetRepository{
   public function getStatus(){
        return StatusAset::select('*')
        ->where(['flag_aktif'=>1])
        ->get();
   }
   public function findByUuid($uuid)
   {
       return StatusAset::from('status_aset as sa')->where(['sa.uuid' => $uuid, 'sa.flag_aktif' => true])->first();
   }
}