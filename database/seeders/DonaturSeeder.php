<?php

namespace Database\Seeders;

use App\Models\Donatur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama' => 'Joko',
                'nomor_telpon' => 8734836482,
                'alamat' => 'Gentan',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Jaki',
                'nomor_telpon' => 8734836481,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Jaka',
                'nomor_telpon' => 8734836483,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Nana',
                'nomor_telpon' => 8734836484,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Nini',
                'nomor_telpon' => 8734836485,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Nunu',
                'nomor_telpon' => 8734836486,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Nene',
                'nomor_telpon' => 8734836487,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Dodo',
                'nomor_telpon' => 8734836488,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Didi',
                'nomor_telpon' => 8734836489,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ],
            [
                'nama' => 'Dede',
                'nomor_telpon' => 8734836490,
                'alamat' => 'Sleman',
                'flag_aktif'=>true
            ]
        ];

        foreach ($userData as $key => $val) {
            Donatur::create($val);
        }
    }
}
