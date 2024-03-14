<?php

namespace App\Services;


use App\Repositories\KegiatanRepository;

class TambahKegiatanService{
    protected $kegiatanRepository;

    public function __construct(
        KegiatanRepository $kegiatanRepository,

    ) {
        $this->kegiatanRepository = $kegiatanRepository;
    }

    public function setData($data) {
        $lampiranNames = [];
        $pathLampiran = [];
        
        if (is_array($data->file('lampiran')) || is_object($data->file('lampiran'))) {
            $lampiranFiles = $data->file('lampiran');
            foreach ($lampiranFiles as $lampiran) {
                $lampiranNames[] = $lampiran->getClientOriginalName();
                $lampiran->move('dokumen/kegiatan', $lampiran->getClientOriginalName());
                $pathLampiran[] = 'dokumen/kegiatan/' . $lampiran->getClientOriginalName();
            }
        }
        $lampiran = implode(';', $lampiranNames);
        $path = implode(';', $pathLampiran);
        $setData = [
            'nama_kegiatan' => $data->nama_kegiatan,
            'deskripsi_kegiatan' => $data->deskripsi,
            'lokasi' => $data->lokasi,
            'sumber_dana' => $data->sumber_dana,
            'tgl_kegiatan' => $data->tanggal,
            'nama_foto_kegiatan' => $lampiran,
            'path_foto_kegiatan' => $path 
        ];
    
        return $this->kegiatanRepository->create($setData);
    }
    
    
    
    
}