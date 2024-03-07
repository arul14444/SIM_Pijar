<?php

namespace App\Services;

use App\Repositories\AnakRepository;
use App\Repositories\UserRepository;

class TambahAnakService{
    protected  $anakRepository,$userRepository;
    public function __construct(
        AnakRepository $anakRepository,
        UserRepository $userRepository,

    ) {
        $this->anakRepository = $anakRepository;
        $this->userRepository = $userRepository;

    }

    public function setData($data){
        $ortu = $this->userRepository->findByUuid($data->uuid_orang_tua);
        $setData = [
            'nama_lengkap'=> $data->nama_lengkap,
            'nama_panggilan'=> $data->nama_panggilan,
            'tempat_lahir'=> $data->tempat_lahir,
            'tgl_lahir'=> $data->tgl_lahir,
            'nomor_telepon'=>$data->nomor_telepon,
            'gangguan_kiri'=> $data->gangguan_telinga_kiri,
            'gangguan_kanan'=> $data->gangguan_telinga_kanan,
            'penyakit_penyerta'=>$data->penyakit_penyerta,
            'id_user'=> $ortu->id,
            'bpjs'=> $data->bpjs
        ];
        return $this->anakRepository->create($setData);

    }
}