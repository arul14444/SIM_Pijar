<?php

namespace App\Services;

use App\Repositories\DonaturRepository;
use App\Repositories\InstansiRepository;
use Illuminate\Support\Facades\Auth;

class TambahDonaturService{
    protected  $donaturRepository,$instansiRepository;

    public function __construct(
        DonaturRepository $donaturRepository,
        InstansiRepository $instansiRepository

    ) {
        $this->donaturRepository = $donaturRepository;
        $this->instansiRepository = $instansiRepository;
    }

    public function setData($data){
            $instansi = $this->instansiRepository->findByUuid($data->uuid_instansi);
            $setData = [
                'nama' => $data->nama,
                'nomor_telepon' => $data->nomor_telepon,
                'alamat' => $data->alamat,
                'id_instansi' => $instansi->id,
                'user_update' => Auth::user()->nama
            ];
           return $this->donaturRepository->create($setData);
         

    }
}