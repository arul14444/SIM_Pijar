<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
               'nama_kegiatan' => 'Ayo belajar',
               'deskripsi_kegiatan' => 'Kegiatan belajar bersama',
               'lokasi' => 'Kampus Terpadu UII',
               'sumber_dana' => 'kas',
               'nama_foto_kegiatan' => 'Ayo belajar.png',
               'path_foto_kegiatan' => 'lokal/d/2'
                 
            ],
            [
               'nama_kegiatan' => 'Goes to Jakarta',
               'deskripsi_kegiatan' => 'Kegiatan rekreasi bersama kedaerah jakarta',
               'lokasi' => 'Kampus Terpadu UII',
               'sumber_dana' => 'iuran',
               'nama_foto_kegiatan' => 'bermain.png',
               'path_foto_kegiatan' => 'lokal/d/1'
            ]
        ];

        foreach ($data as $key => $val) {
            Kegiatan::create($val);
        }
    }
    
}
