<?php

namespace App\Repositories;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SuratRepository{
   public function getSurat(){
        return Surat::from('surat as s')
        ->select('s.nomor_surat','u1.nama as pemberi','j.jabatan as jabatan_pemberi','u1.alamat as alamat_pemberi','u2.nama as penerima','s.jabatan_penerima','u2.alamat as alamat_penerima','s.keperluan','s.tempat_dibuat','s.tgl_dibuat','s.uuid')
        ->join('jabatan as j','j.id','s.id_jabatan_pemberi')
        ->join('user as u1','u1.id','j.id_user')
        ->join('user as u2','u2.id','s.id_user_penerima')
        ->get();
   }
   public function create($data)
   {
       return Surat::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return Surat::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return Surat::from('surat as s')
       ->select('s.nomor_surat','u1.nama as pemberi','j.jabatan as jabatan_pemberi','u1.alamat as alamat_pemberi','u2.nama as penerima','s.jabatan_penerima','u2.alamat as alamat_penerima','s.keperluan','s.tempat_dibuat','s.tgl_dibuat')
       ->join('jabatan as j','j.id','s.id_jabatan_pemberi')
       ->join('user as u1','u1.id','j.id_user')
       ->join('user as u2','u2.id','s.id_user_penerima')
       ->where(['s.uuid' => $uuid, 's.flag_aktif' => true])
       ->first();
   }
   public function delete($user, $uuid)
   {
       return Surat::where('uuid', $uuid)->update(['flag_aktif' => 0,'user_update' => $user]);
   }
}