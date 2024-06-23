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
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'AKBP H. Jaka Wibawa, SH',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'Arisan Amanah',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036032, // Pemerintah
                'nama' => 'Dinsos Kabupaten Klaten',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'dr. Bodro Prastowo, Sp.THT.KL.',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'dr. Dinar Rosmala, Sp.THT-KL., Mkes',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'H. Arief, ST',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'H. Puspo, ST',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'H. Sunarto, ST',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'H. Tiyok Subekti, S.E,. M.,S.E.',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'Hj. Suyud',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'Hj. Trias',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036034, // Swasta
                'nama' => 'Mami Photo Klaten',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036033, // Pribadi
                'nama' => 'Marlia Wulansari',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036034, // Swasta
                'nama' => 'Nobel Audiology Center',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036034, // Swasta
                'nama' => 'Notaris Widi Astuti. SH',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
            [
                'id_instansi' => 100820070309036034, // Swasta
                'nama' => 'Teknik Informatika UII',
                'alamat' => '', // Alamat kosong
                'nomor_telepon' => '', // Nomor telepon kosong
            ],
        ];

        foreach ($userData as $key => $val) {
            Donatur::create($val);
        }
    }
}
