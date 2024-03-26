<?php

namespace App\Repositories;

use App\Models\Gangguan;
use Illuminate\Database\Eloquent\Collection;

class gangguanRepository{
    public function getAnak(){
            return Gangguan::select('')
            ->where(['anak.flag_aktif'=>1]);
    }
    
    public function create($data)
    {
        return Gangguan::insert($data);
     }
   public function updateBy($data, $uuid)
    {
        return Gangguan::where('uuid', $uuid)->update($data);
    }
    public function findById_anak($id_anak)
    {
        return Gangguan::select('*')
            ->where(['id_anak' => $id_anak, 'flag_aktif' => true])
            ->orderBy('created_at', 'ASC')
            ->first();
    }
    public function dataPendengaran($uuid){
        return Gangguan::select('id_anak','kemampuan_kanan','kemampuan_kiri','kemampuan_binaural','tgl_pemeriksaan')
        ->where(['uuid'=>$uuid, 'flag_aktif'=>true])
        ->orderBy('tgl_pemeriksaan', 'ASC')
        ->get();
    }
    public function findByUuid($uuid)
    {
        return Gangguan::select('*')
            ->where(['uuid' => $uuid, 'flag_aktif' => true])->first();
    }
    public function delete($uuid)
    {
        return Gangguan::where('uuid', $uuid)->update(['flag_aktif' => 0]);
    }

}