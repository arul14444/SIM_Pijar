<?php

namespace App\Repositories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class KegiatanRepository{
   public function getKegiatan(){
        return Kegiatan::select('kegiatan.*','sumber_dana.sumber')
            ->join('sumber_dana','sumber_dana.id','kegiatan.id_sumber_dana')
            ->where('kegiatan.flag_aktif',true);
   }
   public function getTotalKegiatanPerBulan()
   {
        return Kegiatan::select(DB::raw('DATE_FORMAT(tgl_kegiatan, "%Y-%m") as bulan'), DB::raw('COUNT(*) as total'))
            ->groupBy('bulan')->get();}
   public function create($data)
   {
       return Kegiatan::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Kegiatan::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return Kegiatan::from('anak as a')->where(['a.uuid' => $uuid, 'flag_aktif' => true])->first();
   }
   public function delete($uuid)
   {
       return Kegiatan::where('uuid', $uuid)->update(['flag_aktif' => 0]);
   }
}