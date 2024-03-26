<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class TambahAnggotaService{
    protected  $userRepository;
    public function __construct(
        UserRepository $userRepository,

    ) {
        $this->userRepository = $userRepository;
    }

    public function setData($data){
            $password = bcrypt($data->password);
            $setData = [
                'nama' => $data->nama,
                'nomor_telepon' => $data->nomor_telepon,
                'username' => $data->username,
                'alamat' => $data->alamat,
                'role' => config('pijar.role.anggota.kode'),
                'password' => $password,
                'user_update' => Auth::user()->nama
            ];
            $this->userRepository->create($setData);
            return ;

    }
}