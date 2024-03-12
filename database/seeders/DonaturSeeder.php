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
                'nomor_telepon' => 8734836482,
                'alamat' => 'Gentan',
                 
            ],
            [
                'nama' => 'Jaki',
                'nomor_telepon' => 8734836481,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Jaka',
                'nomor_telepon' => 8734836483,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Nana',
                'nomor_telepon' => 8734836484,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Nini',
                'nomor_telepon' => 8734836485,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Nunu',
                'nomor_telepon' => 8734836486,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Nene',
                'nomor_telepon' => 8734836487,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Dodo',
                'nomor_telepon' => 8734836488,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Didi',
                'nomor_telepon' => 8734836489,
                'alamat' => 'Sleman',
                 
            ],
            [
                'nama' => 'Dede',
                'nomor_telepon' => 8734836490,
                'alamat' => 'Sleman',
                 
            ]
        ];

        foreach ($userData as $key => $val) {
            Donatur::create($val);
        }
    }
}
