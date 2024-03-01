<?php

namespace Database\Seeders;

use App\Models\Aset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_barang'=>'Meja Informa 2*4',
                'deskripsi_barang' =>'Meja kantor ukuran 2*4',
                'kode_barang'=>'MJK-2-2028',
                'status_barang'=>'Tersedia',
                'nama_foto_barang'=>'Meja.png',
                'path_foto_barang' =>'local/3/4'
                 
            ],
            [
                'nama_barang' => 'Monitor 22"',
                'deskripsi_barang' => '1',
                'kode_barang' => 'M22/20/2024',
                'status_barang' =>'Tersedia',
                'nama_foto_barang' => 'Monitor.png',
                'path_foto_barang' =>'local/12/342/2'
            ]
        ];

        foreach ($data as $key => $val) {
            Aset::create($val);
        }
    }
}
