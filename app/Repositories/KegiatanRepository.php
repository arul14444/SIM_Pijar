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
}