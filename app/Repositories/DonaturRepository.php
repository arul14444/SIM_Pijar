<?php

namespace App\Repositories;

use App\Models\Donatur;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DonaturRepository{
   public function getDonatur(){
        return Donatur::from('donatur as d')
        ->select('*')
        ->get();
   }
}