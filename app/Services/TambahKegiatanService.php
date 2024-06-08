<?php

namespace App\Services;


use App\Repositories\KegiatanRepository;
use App\Repositories\SumberDanaRepository;
use Illuminate\Support\Facades\Auth;

class TambahKegiatanService{
    protected $kegiatanRepository, $sumberDanaRepository;

    public function __construct(
        KegiatanRepository $kegiatanRepository,
        SumberDanaRepository $sumberDanaRepository

    ) {
        $this->kegiatanRepository = $kegiatanRepository;
        $this->sumberDanaRepository = $sumberDanaRepository;

    }

    public function setData($data) {
        $sumber = $this->sumberDanaRepository->findByUuid($data->sumber_dana);
        $lampiranNames = [];
        $pathLampiran = [];
        
        if (is_array($data->file('lampiran')) || is_object($data->file('lampiran'))) {
            $lampiranFiles = $data->file('lampiran');
            foreach ($lampiranFiles as $lampiran) {
                $namaLampiranBaru = 'kegiatan_' . random_int(1,999) . '_' . $lampiran->getClientOriginalName();
                $lampiranNames[] = $namaLampiranBaru;
                $lampiran->move('dokumen/kegiatan', $namaLampiranBaru);
                $pathLampiran[] = 'dokumen/kegiatan/' . $namaLampiranBaru;
            }
        }
        $lampiran = implode(';', $lampiranNames);
        $path = implode(';', $pathLampiran);
        $setData = [
            'nama_kegiatan' => $data->nama_kegiatan,
            'deskripsi_kegiatan' => $data->deskripsi,
            'lokasi' => $data->lokasi,
            'id_sumber_dana' => $sumber->id,
            'tgl_kegiatan' => $data->tanggal,
            'nama_foto_kegiatan' => $lampiran,
            'path_foto_kegiatan' => $path,
            'user_update' => Auth::user()->nama
        ];
    
        return $this->kegiatanRepository->create($setData);
    }
    
    
    
    
}