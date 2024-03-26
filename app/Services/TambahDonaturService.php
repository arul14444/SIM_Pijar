<?php

namespace App\Services;

use App\Repositories\DonaturRepository;
use Illuminate\Support\Facades\Auth;

class TambahDonaturService{
    protected  $donaturRepository;

    public function __construct(
        DonaturRepository $donaturRepository,

    ) {
        $this->donaturRepository = $donaturRepository;
    }

    public function setData($data){
        
            $setData = [
                'nama' => $data->nama,
                'nomor_telepon' => $data->nomor_telepon,
                'alamat' => $data->alamat,
                'user_update' => Auth::user()->nama
            ];
           return $this->donaturRepository->create($setData);
         

    }
}