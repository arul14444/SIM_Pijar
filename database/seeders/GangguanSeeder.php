<?php

namespace Database\Seeders;

use App\Models\Gangguan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GangguanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kemampuan = [
            // [
            //     'id_anak' => 100927652562468937,
            //     'kemampuan_kiri' => 110.0,
            //     'kemampuan_kanan' => 110.0,
            // ],
            [
            'id_anak' => 100927652562468938,
            'kemampuan_kiri' => 115.0,
            'kemampuan_kanan' => 115.0,
            ],
            [
            'id_anak' => 100927652562468939,
            'kemampuan_kiri' => null,
            'kemampuan_kanan' => null,
            ],
            [
            'id_anak' => 100927652562468940,
            'kemampuan_kiri' => 100.0,
            'kemampuan_kanan' => 110.0,
            ],
            [
            'id_anak' => 100927652562468941,
            'kemampuan_kiri' => null,
            'kemampuan_kanan' => null,
            ],
            [
            'id_anak' => 100927652562468942,
            'kemampuan_kiri' => 110.0,
            'kemampuan_kanan' => 110.0,
            ],
            [
            'id_anak' => 100927652562468943,
            'kemampuan_kiri' => 103.0,
            'kemampuan_kanan' => 101.0,
            ],
            [
            'id_anak' => 100927652562468944,
            'kemampuan_kiri' => null,
            'kemampuan_kanan' => 95.0,
            ],
            [
            'id_anak' => 100927652562468945,
            'kemampuan_kiri' => 90.0,
            'kemampuan_kanan' => 120.0,
            ],
            [
            'id_anak' => 100927652562468946,
            'kemampuan_kiri' => 120.0,
            'kemampuan_kanan' => 115.0,
            ],
            [
            'id_anak' => 100927652562468947,
            'kemampuan_kiri' => 115.0,
            'kemampuan_kanan' => 97.0,
            ],
            [
            'id_anak' => 100927652562468948,
            'kemampuan_kiri' => 97.0,
            'kemampuan_kanan' => 110.0,
            ],
            [
            'id_anak' => 100927652562468949,
            'kemampuan_kiri' => 100.0,
            'kemampuan_kanan' => 110.0,
            ],
            [
            'id_anak' => 100927652562468950,
            'kemampuan_kiri' => 115.0,
            'kemampuan_kanan' => null,
            ],
            [
            'id_anak' => 100927652562468951,
            'kemampuan_kiri' => 115.0,
            'kemampuan_kanan' => 110.0,
            ],
            [
            'id_anak' => 100927652562468952,
            'kemampuan_kiri' => null,
            'kemampuan_kanan' => 110.0,
            ],
            [
            'id_anak' => 100927652562468953,
            'kemampuan_kiri' => 110.0,
            'kemampuan_kanan' => 115.0,
            ],
            [
            'id_anak' => 100927652562468954,
            'kemampuan_kiri' => 115.0,
            'kemampuan_kanan' => 116.0,
            ],
            [
            'id_anak' => 100927652562468955,
            'kemampuan_kiri' => 116.0,
            'kemampuan_kanan' => 105.0,
            ],
            [
            'id_anak' => 100927652562468956,
            'kemampuan_kiri' => 110.0,
            'kemampuan_kanan' => 80.0,
            ],
        ];
        

        foreach ($kemampuan as $gangguan) {
            Gangguan::create($gangguan);
        }
    }
}
