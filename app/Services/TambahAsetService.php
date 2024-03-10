<?php

namespace App\Services;

use App\Repositories\AsetRepository;

class TambahAsetService{
    protected  $asetRepository;

    public function __construct(
        AsetRepository $asetRepository,

    ) {
        $this->asetRepository = $asetRepository;
    }

    public function setData($data){
        dd($data);
        if ($_SERVER["REQUEST_METHOD"] == isset($_FILES["files"])) {
            $uploadDir = "/path/to/upload/directory/";
        
            // Loop melalui setiap file yang di-upload
            for ($i = 0; $i < count($_FILES["files"]["name"]); $i++) {
                $fileName = $_FILES["files"]["name"][$i];
                $fileTmpName = $_FILES["files"]["tmp_name"][$i];
                $fileDest = $uploadDir . $fileName;
        
                // Pindahkan file ke direktori tujuan
                if (move_uploaded_file($fileTmpName, $fileDest)) {
                    echo "File $fileName berhasil di-upload.<br>";
                } else {
                    echo "Gagal meng-upload file $fileName.<br>";
                }
            }
        }
            $setData = [
                'nama' => $data->nama,
                'nomor_telepon' => $data->nomor_telepon,
                'alamat' => $data->alamat,
            ];
           return $this->asetRepository->create($setData);
         

    }
}