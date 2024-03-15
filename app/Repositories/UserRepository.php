<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository{
   public function getAnggota(){
        return User::select('*')
        ->where(['role'=>'anggota','flag_aktif'=>1])
        ->get();
   }
   public function getPengurus(){
        return User::select('*')
        ->join('jabatan as j','j.id_user','user.id')
        ->where(['user.role'=>'admin','user.flag_aktif'=>1])
        ->get();
   }
   public function getOrangtua(){
    return User::select('*')
    ->where(['user.flag_aktif'=>1])
    ->get();
}
   public function create($data)
   {
       return User::insert($data);
   }
  public function updateByUuid($data, $uuid)
   {
       return User::where('uuid', $uuid)->update($data);
   }
   public function findByUuid($uuid)
   {
       return User::from('user')->where(['user.uuid' => $uuid, 'flag_aktif' => true])->first();
   }
   public function delete($uuid)
   {
       return User::where('uuid', $uuid)->update(['flag_aktif' => 0]);
   }
}