<?php

namespace App\Repositories;

use App\Models\Instansi;
use Illuminate\Database\Eloquent\Collection;


class InstansiRepository{
    public function getInstansi(){
            return Instansi::select('*')
            ->where(['flag_aktif'=>1]);
    }
    public function findByUuid($uuid)
    {
        return Instansi::where(['uuid' => $uuid, 'flag_aktif' => 1])->first();
    }
}


