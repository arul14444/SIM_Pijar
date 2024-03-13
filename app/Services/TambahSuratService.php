<?php

namespace App\Services;

use App\Repositories\JabatanRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;

class TambahSuratService{
    protected  $suratRepository, $jabatanRepository, $userRepository;

    public function __construct(
        SuratRepository $suratRepository,
        JabatanRepository $jabatanRepository,
        UserRepository $userRepository

    ) {
        $this->suratRepository = $suratRepository;
        $this->userRepository = $userRepository;
        $this->jabatanRepository =$jabatanRepository;
    }

    public function setData($data){
        $pemberi = $this->jabatanRepository->findByUuid($data->uuid_jabatan_pemberi);
        $penerima = $this->userRepository->findByUuid($data->uuid_penerima);
            $setData = [
                'id_jabatan_pemberi' => $pemberi->id,
                'id_user_penerima'=> $penerima->id,
                'jabatan_penerima' => $data->jabatan_penerima,
                'nomor_surat' => $data->nomor_surat,
                'keperluan' => $data->keperluan,
                'tempat_dibuat'=> $data->tempat_dibuat,
                'tgl_dibuat' => $data->tgl_dibuat,
            ];
           return $this->suratRepository->create($setData);
    }
    public function setSurat($data){
        $pemberi = $this->jabatanRepository->findByUuid($data->uuid_jabatan_pemberi);
        $penerima = $this->userRepository->findByUuid($data->uuid_penerima);
            $setData = [
                'nama_pemberi'=> $pemberi->nama,
                'jabatan_pemberi'=> $pemberi->jabatan,
                'alamat_pemberi'=> $pemberi->alamat,
                'alamat_penerima'=> $penerima->alamat,
                'nama_penerima'=> $penerima->nama,
                'jabatan_penerima' => $data->jabatan_penerima,
                'nomor_surat' => $data->nomor_surat,
                'keperluan' => $data->keperluan,
                'tempat_dibuat'=> $data->tempat_dibuat,
                'tgl_dibuat' => $data->tgl_dibuat,
            ];
           return $setData;
    }
}