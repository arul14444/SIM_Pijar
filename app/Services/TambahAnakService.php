<?php

namespace App\Services;

use App\Repositories\AbdRepository;
use App\Repositories\AnakRepository;
use App\Repositories\gangguanRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class TambahAnakService{
    protected  $anakRepository,$userRepository,$abdRepository, $gangguanRepository;
    public function __construct(
        AnakRepository $anakRepository,
        UserRepository $userRepository,
        AbdRepository $abdRepository,
        gangguanRepository $gangguanRepository,
    ) {
        $this->anakRepository = $anakRepository;
        $this->userRepository = $userRepository;
        $this->abdRepository = $abdRepository;
        $this->gangguanRepository=$gangguanRepository;

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
            'kemampuan_binaural'=>$data->kemampuan_telinga_binaural,
            'penyakit_penyerta'=>$data->penyakit_penyerta,
            'id_user'=> $ortu->id,
            'bpjs'=> $data->bpjs,
            'user_update' => Auth::user()->nama
        ];
        $this->anakRepository->create($setData);

        $getAnak=$this->anakRepository->getFirst();
        $setGangguan = [
            'kemampuan_kiri'=> $data->kemampuan_telinga_kiri,
            'kemampuan_kanan'=> $data->kemampuan_telinga_kanan,
            'kemampuan_binaural'=> $data->kemampuan_telinga_binaural,
            'tgl_pemeriksaan'=>$data->tgl_pemeriksaan,
            'id_anak'=> $getAnak->id,
            'user_update' => Auth::user()->nama
        ];

        return $this->gangguanRepository->create($setGangguan);
        ;
    }

    public function setData($data){
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
            'kemampuan_binaural'=>$data->kemampuan_telinga_binaural,
            'penyakit_penyerta'=>$data->penyakit_penyerta,
            'id_user'=> $ortu->id,
            'bpjs'=> $data->bpjs,
            'user_update' => Auth::user()->nama
        ];
        $this->anakRepository->create($setData);

        $getAnak=$this->anakRepository->getFirst();
        $setGangguan = [
            'kemampuan_kiri'=> $data->kemampuan_telinga_kiri,
            'kemampuan_kanan'=> $data->kemampuan_telinga_kanan,
            'id_anak'=> $getAnak->id,
            'user_update' => Auth::user()->nama
        ];

        return $this->gangguanRepository->create($setGangguan);
        ;
    }


    public function setHasilTest($data){
        $anak = $this->anakRepository->findByUuid($data->uuid_anak);
        $lampiranNames = [];
        $pathLampiran = [];
        if (is_array($data->file('lampiran')) || is_object($data->file('lampiran'))) {
            $lampiranFiles = $data->file('lampiran');
            foreach ($lampiranFiles as $lampiran) {
                $namaLampiranBaru = $anak->nama_lengkap . '_' . $lampiran->getClientOriginalName();
                $lampiranNames[] = $namaLampiranBaru;
                $lampiran->move('dokumen/hasilTest', $namaLampiranBaru);
                $pathLampiran[] = 'dokumen/hasilTest/' . $namaLampiranBaru;
            }
            
        }
        $lampiran = implode(';', $lampiranNames);
        $path = implode(';', $pathLampiran);

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
        $nilaiTelingaBinaural=[
            $data->binaural_nilai1,
            $data->binaural_nilai2,
            $data->binaural_nilai3,
            $data->binaural_nilai4,
            $data->binaural_nilai5,
        ];

        $kemampuanTelingaKanan=collect($nilaiTelingaKanan)->avg();
        $kemampuanTelingaKiri=collect($nilaiTelingaKiri)->avg(); 
        $kemampuanBinaural=collect($nilaiTelingaBinaural)->avg();
        $setData = [
            'kemampuan_kiri'=> $kemampuanTelingaKiri,
            'kemampuan_kanan'=> $kemampuanTelingaKanan,
            'kemampuan_binaural'=>$kemampuanBinaural,
            'id_anak'=> $anak->id,
            'path_file_hasil_test'=>$path,
            'nama_file_hasil_test'=>$lampiran,
            'tgl_pemeriksaan'=>$data->tgl_pemeriksaan,
            'user_update' => Auth::user()->nama
        ];
        $this->gangguanRepository->create($setData);
        $setUpdate = [
            'kemampuan_kiri'=> $kemampuanTelingaKiri,
            'kemampuan_kanan'=> $kemampuanTelingaKanan,
            'kemampuan_binaural'=>$kemampuanBinaural,

        ]; 
        return $this->anakRepository->updateBy($setUpdate,$data->uuid_anak);
    }
}