<?php

namespace App\Services;

use App\Repositories\AbdRepository;
use App\Repositories\AnakRepository;
use App\Repositories\UserRepository;

class TambahAnakService{
    protected  $anakRepository,$userRepository,$abdRepository;
    public function __construct(
        AnakRepository $anakRepository,
        UserRepository $userRepository,
        AbdRepository $abdRepository,
    ) {
        $this->anakRepository = $anakRepository;
        $this->userRepository = $userRepository;
        $this->abdRepository = $abdRepository;

    }

    public function setFirstData($data){
        $ortu = $this->userRepository->findByUuid($data->uuid_orang_tua);
        $abdKiri = $this->abdRepository->findByUuid($data->uuid_abd_kiri);
        $abdKanan = $this->abdRepository->findByUuid($data->uuid_abd_kanan);
        $setData = [
            'id_abd_kiri'=> $abdKiri->id,
            'id_abd_kanan'=>$abdKanan->id,
            'nama_lengkap'=> $data->nama_lengkap,
            'nama_panggilan'=> $data->nama_panggilan,
            'tempat_lahir'=> $data->tempat_lahir,
            'tgl_lahir'=> $data->tgl_lahir,
            'nomor_telepon'=>$data->nomor_telepon,
            'kemampuan_kiri'=> $data->kemampuan_telinga_kiri,
            'kemampuan_kanan'=> $data->kemampuan_telinga_kanan,
            'kemampuan_binaural'=>$data->kemampuan_binaural,
            'penyakit_penyerta'=>$data->penyakit_penyerta,
            'id_user'=> $ortu->id,
            'bpjs'=> $data->bpjs
        ];
        $this->anakRepository->create($setData);

        $getAnak=$this->anakRepository->getFirst();
        $setGangguan = [
            'kemampuan_kiri'=> $data->kemampuan_telinga_kiri,
            'kemampuan_kanan'=> $data->kemampuan_telinga_kanan,
            'id_anak'=> $getAnak->id
        ];

        return $this->anakRepository->createGangguan($setGangguan);
        ;
    }

    public function setHasilTest($data){
        $nilaiTelingaKanan=[
            $data->kanan_nilai1,
            $data->kanan_nilai2,
            $data->kanan_nilai3,
            $data->kanan_nilai4,
            $data->kanan_nilai5,
        ];
        $nilaiTelingaKiri=[
            $data->kiri_nilai1,
            $data->kiri_nilai2,
            $data->kiri_nilai3,
            $data->kiri_nilai4,
            $data->kiri_nilai5,
        ];
        $gangguanTelingaKanan=collect($nilaiTelingaKanan)->avg();
        $gangguanTelingaKiri=collect($nilaiTelingaKiri)->avg(); 
    }
}