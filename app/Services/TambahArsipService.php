<?php

namespace App\Services;


use App\Repositories\ArsipRepository;

class TambahArsipService{
    protected $arsipRepository;

    public function __construct(
        ArsipRepository $arsipRepository,

    ) {
        $this->arsipRepository = $arsipRepository;
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
            'nama_dokumen' => $data->nama_dokumen,
            'deskripsi_dokumen' => $data->deskripsi,
            'kode_dokumen' => $data->kode,
            'nama_file_dokumen' => $lampiran,
            'path_file_dokumen' => $path 
        ];
    
        return $this->arsipRepository->create($setData);
    }
    
    
    
    
}