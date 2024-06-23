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
                'nama_kegiatan' => 'Pelatihan Konten Website',
                'deskripsi_kegiatan' => 'Pelatihan pembuatan konten website',
                'lokasi' => 'UII',
                'id_sumber_dana' => 100775501668286478, // Tidak Mengeluarkan Dana
                'nama_foto_kegiatan' => 'Pelatihan Konten Website.png',
                'path_foto_kegiatan' => 'lokal/d/5',
                'tgl_kegiatan' => '2023-06-14',
            ],
            [
                'nama_kegiatan' => 'Pelatihan Konten Instagram',
                'deskripsi_kegiatan' => 'Pelatihan pembuatan konten Instagram',
                'lokasi' => 'UII',
                'id_sumber_dana' => 100775501668286478, // Tidak Mengeluarkan Dana
                'nama_foto_kegiatan' => 'Pelatihan Konten Instagram.png',
                'path_foto_kegiatan' => 'lokal/d/6',
                'tgl_kegiatan' => '2023-06-15',
            ],
            [
                'nama_kegiatan' => 'Pelatihan Konten YouTube',
                'deskripsi_kegiatan' => 'Pelatihan pembuatan konten YouTube',
                'lokasi' => 'UII',
                'id_sumber_dana' => 100775501668286478, // Tidak Mengeluarkan Dana
                'nama_foto_kegiatan' => 'Pelatihan Konten YouTube.png',
                'path_foto_kegiatan' => 'lokal/d/7',
                'tgl_kegiatan' => '2023-06-22',
            ],
        ];

        foreach ($data as $key => $val) {
            Kegiatan::create($val);
        }
    }
    
}
