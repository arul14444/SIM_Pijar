<?php

namespace App\Repositories;

use App\Models\Arsip;
use Illuminate\Database\Eloquent\Collection;

class ArsipRepository{
   public function getArsip(){
        return Arsip::select('*')
        ->where(['flag_aktif'=>1])
        ->get();
   }
}