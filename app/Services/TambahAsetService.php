<?php

namespace App\Services;


use App\Repositories\AsetRepository;
use App\Repositories\StatusAsetRepository;
use Illuminate\Support\Facades\Auth;

class TambahAsetService
{
    protected  $asetRepository, $statusAsetRepository;

    public function __construct(
        AsetRepository $asetRepository,
        StatusAsetRepository $statusAsetRepository

    ) {
        $this->asetRepository = $asetRepository;
        $this->statusAsetRepository = $statusAsetRepository;
    }

    public function setData($data)
    {
        // Inisialisasi array kosong untuk menyimpan nama file dan path lampiran
        $lampiranNames = [];
        $pathLampiran = [];
        // Memeriksa apakah ada file yang diunggah
        if ($data->hasFile('lampiran')) {
            // Mendapatkan array dari file yang diunggah
            $lampiranFiles = $data->file('lampiran');

            // Iterasi melalui setiap file yang diunggah
            foreach ($lampiranFiles as $lampiran) {
                // Membuat nama baru untuk file yang diunggah
                $namaLampiranBaru = "Aset_" . random_int(1, 999) . $lampiran->getClientOriginalName();
                $lampiranNames[] = $namaLampiranBaru;
                // Menyimpan file ke dalam direktori yang ditentukan
                $lampiran->move('dokumen/aset', $namaLampiranBaru);
                // Menyimpan path file ke dalam array
                $pathLampiran[] = 'dokumen/aset/' . $namaLampiranBaru;
            }
        }

        // Menggabungkan nama-nama file menjadi satu string yang dipisahkan oleh titik koma
        $lampiran = implode(';', $lampiranNames);
        // Menggabungkan path lampiran menjadi satu string yang dipisahkan oleh titik koma
        $path = implode(';', $pathLampiran);

        $aset = $this->statusAsetRepository->findByUuid($data->uuid_status_aset);

        // Membuat data yang akan disimpan ke dalam basis data
        $setData = [
            'nama_barang' => $data->nama_barang,
            'kode_barang' => $data->kode,
            'id_status_aset' => $aset->id,
            'deskripsi_barang' => $data->deskripsi,
            'nama_foto_barang' => $lampiran,
            'path_foto_barang' => $path,
            'user_update' => Auth::user()->nama
        ];

        return $this->asetRepository->create($setData);
    }
}
