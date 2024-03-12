<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'ketua',
                'password' => bcrypt('ketuayayasan'),
                'nama' => 'Puspajana, S.T',
                'alamat' => 'Jl. Ki Ageng Gringsing 8, No. 44, RT/RW: 005/001, Pondok Mulyo, Gergunung, Klaten Utara, Klaten, Jawa Tengah.',
                'role' => 'admin',
                'nomor_telepon' => 85292556909,
                 
            ],
            [
                'username' => 'wakilketua',
                'password' => bcrypt('wakilketua'),
                'nama' => 'Tri Wahyuni',
                'alamat' => 'Kaligayam, RT/RW: 09/02,Kaligayem, Wedi, Klaten, Jawa Tengah',
                'role' => 'admin',
                'nomor_telepon' => 85801786978, 
                 
            ],
            [
                'username' => 'sekretaris',
                'password' => bcrypt('sekretaris'),
                'nama' => 'Harminah',
                'alamat' => 'Dagaran, Sentono, Karangdowo, Klaten, Jawa Tengah',
                'role' => 'admin',
                'nomor_telepon' => 85727769900, 
                 
            ],
            [
                'username' => 'wakilsekretaris',
                'password' => bcrypt('wakilsekretaris'),
                'nama' => 'Niniek Kusumo Wardani',
                'alamat' => 'Gondang, Rt 06/02, Gondang, Kebonarum, Klaten, Jawa Tengah ',
                'role' => 'admin',
                'nomor_telepon' => 85726542588, 
                 
            ],
            [
                'username' => 'bendahara',
                'password' => bcrypt('bendahara'),
                'nama' => 'Nining Puji Rahayu',
                'alamat' => 'Dukuh, Keputran, Kemalang, Klaten, Jawa Tengah',
                'role' => 'admin',
                'nomor_telepon' => 82324254854, 
                 
            ],[
                'username' => 'wakilbendahara',
                'password' => bcrypt('wakilbendahara'),
                'nama' => 'Atik Nuryatin, S.E',
                'alamat' => 'Perum Griya Cempaka Indah, Kalikotes, Klaten, Jawa Tengah',
                'role' => 'admin',
                'nomor_telepon' => 82325236597, 
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
