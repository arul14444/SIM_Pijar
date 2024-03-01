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
}