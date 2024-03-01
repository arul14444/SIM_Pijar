<?php

namespace App\Repositories;

use App\Models\Aset;
use Illuminate\Database\Eloquent\Collection;

class AsetRepository{
   public function getAset(){
        return Aset::select('*')
        ->where(['flag_aktif'=>1])
        ->get();
   }
}