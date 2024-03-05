<?php

namespace Database\Seeders;

use App\Models\Arsip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_dokumen'=>'Akta Pendirian Yayasan',
                'deskripsi_dokumen' =>'-',
                'kode_dokumen'=>'APY-1213-123',
                'nama_foto_dokumen'=>'Akta Pendirian.png',
                'path_foto_dokumen' =>'lacal/123/1234'
                 
            ],
            [
                'nama_dokumen'=>'Sertifikat',
                'deskripsi_dokumen' =>'-',
                'kode_dokumen'=>'STF-123-432-123',
                'nama_foto_dokumen'=>'Sertifikat.png',
                'path_foto_dokumen' =>'localtest/123/1234'
            ]
        ];

        foreach ($data as $key => $val) {
            Arsip::create($val);
        }
    }
}
