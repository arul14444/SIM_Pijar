<?php

namespace App\Repositories;

use App\Models\Donatur;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonaturRepository{
   public function getDonatur(){
        return Donatur::select('*')->where('flag_aktif',true);
   }
   public function create($data)
   {
       return Donatur::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Donatur::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return Donatur::from('donatur as d')->where(['d.uuid' => $uuid, 'flag_aktif' => true])->first();
   }
   public function delete($uuid)
   {
       return Donatur::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update'=>Auth::user()->nama]);
   }
}