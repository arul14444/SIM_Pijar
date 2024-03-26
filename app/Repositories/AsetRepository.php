<?php

namespace App\Repositories;

use App\Models\Aset;
use Illuminate\Database\Eloquent\Collection;

class AsetRepository{
   public function getAset(){
        return Aset::select('aset.*','sa.status','sa.kd_status')
        ->join('status_aset as sa','sa.id','aset.id_status_aset')
        ->orderBy('sa.order')
        ->where(['aset.flag_aktif'=>1]);
   }
   public function getAsetStatus($kdStatus){
        return Aset::select('aset.*','sa.status')
        ->join('status_aset as sa','sa.id','aset.id_status_aset')
        ->where(['aset.flag_aktif'=>1,'sa.kd_status'=>$kdStatus]);
   }
   public function create($data)
   {
       return Aset::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Aset::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
    return Aset::select('aset.*','sa.status')
         ->join('status_aset as sa','sa.id','aset.id_status_aset')
         ->where(['aset.uuid' => $uuid, 'aset.flag_aktif' => true])->first();
   }
   public function delete($uuid)
   {
       return Aset::where('uuid', $uuid)->update(['flag_aktif' => 0]);
   }
}