<?php

namespace App\Repositories;

use App\Models\Anak;
use App\Models\Gangguan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class AnakRepository{
    public function getAnak(){
            return Anak::select('anak.*','abd_kiri.jenis as jenis_abd_kiri','abd_kanan.jenis as jenis_abd_kanan','user.nama','user.alamat')
            ->join('user', 'user.id','anak.id_user')
            ->join('abd as abd_kiri','abd_kiri.id','anak.id_abd_kiri')
            ->join('abd as abd_kanan','abd_kanan.id','anak.id_abd_kanan')
            ->where(['anak.flag_aktif'=>1]);
    }
    public function getAnakbyIdOrtu($id_ortu){
            return Anak::select('anak.*','abd_kiri.jenis as jenis_abd_kiri','abd_kanan.jenis as jenis_abd_kanan','user.nama','user.alamat')
            ->join('user', 'user.id','anak.id_user')
            ->join('abd as abd_kiri','abd_kiri.id','anak.id_abd_kiri')
            ->join('abd as abd_kanan','abd_kanan.id','anak.id_abd_kanan')
            ->where(['anak.flag_aktif'=>1,'user.id'=>$id_ortu]);
    }
    public function getFirst(){
    return Anak::orderBy('created_at', 'DESC')->first();
    }
    public function jumlahKepemilikanAbd()
    {
        return Anak::select('*')
            ->join('abd as abd_kiri','abd_kiri.id','anak.id_abd_kiri')
            ->join('abd as abd_kanan','abd_kanan.id','anak.id_abd_kanan')
            ->where(['anak.flag_aktif'=>1])
            ->where(function ($query) {
                $query->whereNotIn('abd_kanan.jenis', ['Belum Punya'])
                      ->orWhereNotIn('abd_kiri.jenis', ['Belum Punya']);
            })
            ->count();
    }
    
    public function create($data)
    {
        return Anak::insert($data);
     }
   public function updateBy($data, $uuid)
    {
        return Anak::where('uuid', $uuid)->update($data);
    }
    public function findByUuid($uuid)
    {
        return Anak::from('anak as a')
            ->select('a.*','abd_kiri.jenis as jenis_abd_kiri','abd_kanan.jenis as jenis_abd_kanan','user.nama','user.alamat')
            ->join('user', 'user.id','a.id_user')
            ->join('abd as abd_kiri','abd_kiri.id','a.id_abd_kiri')
            ->join('abd as abd_kanan','abd_kanan.id','a.id_abd_kanan')
            ->where(['a.uuid' => $uuid, 'a.flag_aktif' => true])->first();
    }
    public function delete($uuid)
    {
        return Anak::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update'=>Auth::user()->nama]);
    }
}