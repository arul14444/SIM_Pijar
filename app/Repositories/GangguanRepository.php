<?php

namespace App\Repositories;

use App\Models\Gangguan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GangguanRepository{
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
    public function dataPendengaran($id_anak){
        return Gangguan::select('id_anak','kemampuan_kanan','kemampuan_kiri','kemampuan_binaural','tgl_pemeriksaan','uuid','path_file_hasil_test','nama_file_hasil_test')
        ->where(['id_anak'=>$id_anak, 'flag_aktif'=>true])
        ->orderBy('tgl_pemeriksaan', 'ASC')
        ->get();
    }

    public function allDataPendengaran(){
        return Gangguan::select('gangguan.*','anak.nama_lengkap')
            ->join('anak', 'anak.id', 'gangguan.id_anak')
            ->where('gangguan.flag_aktif', true)
            ->orderBy('tgl_pemeriksaan', 'ASC')
            ->orderBy('anak.nama_lengkap', 'ASC')
            ->get();
    }
    public function findByUuid($uuid)
    {
        return Gangguan::select('gangguan.*','anak.nama_lengkap','anak.uuid as uuid_anak')
            ->join('anak','anak.id','gangguan.id_anak')
            ->where(['gangguan.uuid' => $uuid, 'gangguan.flag_aktif' => true])->first();
    }
    public function delete($uuid)
    {
        return Gangguan::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update'=>Auth::user()->nama]);
    }

}