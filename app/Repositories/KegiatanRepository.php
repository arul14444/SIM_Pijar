<?php

namespace App\Repositories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KegiatanRepository{
   public function getKegiatan(){
        return Kegiatan::select('kegiatan.*','sumber_dana.sumber')
            ->join('sumber_dana','sumber_dana.id','kegiatan.id_sumber_dana')
            ->orderBy('kegiatan.tgl_kegiatan','desc')
            ->where('kegiatan.flag_aktif',true);
   }
   public function getTotalSumberDana($sumber){
        return Kegiatan::select('kegiatan.*','sumber_dana.sumber')
                ->join('sumber_dana','sumber_dana.id','kegiatan.id_sumber_dana')
                ->where(['kegiatan.flag_aktif'=>true, 'sumber_dana.sumber'=>$sumber])
                ->count();
   }
   public function getTotalKegiatanPerBulan()
   {
        return Kegiatan::select(DB::raw('DATE_FORMAT(tgl_kegiatan, "%m-%Y") as bulan'), DB::raw('COUNT(*) as total'))
        ->groupBy('bulan')
        ->orderByRaw('MIN(tgl_kegiatan)')
        ->where('flag_aktif',true)
        ->get();
    }
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
        return Kegiatan::select('kegiatan.*','sumber_dana.sumber')
         ->join('sumber_dana','sumber_dana.id','kegiatan.id_sumber_dana')
         ->where(['kegiatan.uuid' => $uuid, 'kegiatan.flag_aktif' => true])->first();
   }
   public function delete($uuid)
   {
       return Kegiatan::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update'=>Auth::user()->nama]);
   }
}