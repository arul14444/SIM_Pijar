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
            // [
            //     'username' => 'admin',
            //     'password' => bcrypt('admin'),
            //     'nama' => 'Admin',
            //     'alamat' => '-',
            //     'role' => 'admin',
            //     'nomor_telepon' => '08221797733',
            // ],
            // [
            //     'username' => 'ketua',
            //     'password' => bcrypt('ketuayayasan'),
            //     'nama' => 'Puspajana, S.T',
            //     'alamat' => 'Jl. Ki Ageng Gringsing 8, No. 44, RT/RW: 005/001, Pondok Mulyo, Gergunung, Klaten Utara, Klaten, Jawa Tengah.',
            //     'role' => 'admin',
            //     'nomor_telepon' => '085292556909',
                 
            // ],
            // [
            //     'username' => 'wakilketua',
            //     'password' => bcrypt('wakilketua'),
            //     'nama' => 'Tri Wahyuni',
            //     'alamat' => 'Kaligayam, RT/RW: 09/02,Kaligayem, Wedi, Klaten, Jawa Tengah',
            //     'role' => 'admin',
            //     'nomor_telepon' => '085801786978', 
                 
            // ],
            // [
            //     'username' => 'sekretaris',
            //     'password' => bcrypt('sekretaris'),
            //     'nama' => 'Harminah',
            //     'alamat' => 'Dagaran, Sentono, Karangdowo, Klaten, Jawa Tengah',
            //     'role' => 'admin',
            //     'nomor_telepon' => '085727769900', 
                 
            // ],
            // [
            //     'username' => 'wakilsekretaris',
            //     'password' => bcrypt('wakilsekretaris'),
            //     'nama' => 'Niniek Kusumo Wardani',
            //     'alamat' => 'Gondang, Rt 06/02, Gondang, Kebonarum, Klaten, Jawa Tengah ',
            //     'role' => 'admin',
            //     'nomor_telepon' => '085726542588', 
                 
            // ],
            // [
            //     'username' => 'bendahara',
            //     'password' => bcrypt('bendahara'),
            //     'nama' => 'Nining Puji Rahayu',
            //     'alamat' => 'Dukuh, Keputran, Kemalang, Klaten, Jawa Tengah',
            //     'role' => 'admin',
            //     'nomor_telepon' => '082324254854', 
                 
            // ],[
            //     'username' => 'wakilbendahara',
            //     'password' => bcrypt('wakilbendahara'),
            //     'nama' => 'Atik Nuryatin, S.E',
            //     'alamat' => 'Perum Griya Cempaka Indah, Kalikotes, Klaten, Jawa Tengah',
            //     'role' => 'admin',
            //     'nomor_telepon' => '082325236597', 
            // ]

            [
                'username' => 'tina_rochmani',
                'password' => bcrypt('password_tina'),
                'nama' => 'Tina Rochmani',
                'alamat' => 'Gombang Als, Rt 01/04, Cawas',
                'role' => 'anggota',
                'nomor_telepon' => '085865712585',
            ],
            [
                'username' => 'suwarni',
                'password' => bcrypt('password_suwarni'),
                'nama' => 'Suwarni',
                'alamat' => 'Sewan, Kahuman, Klaten Selatan',
                'role' => 'anggota',
                'nomor_telepon' => '089674023816',
            ],
            [
                'username' => 'siti_ngafifah',
                'password' => bcrypt('password_siti'),
                'nama' => 'Siti Ngafifah',
                'alamat' => 'Plosokuning IV, Minomartani, Ngaglik, Sleman, DIY',
                'role' => 'anggota',
                'nomor_telepon' => '081215056126',
            ],
            [
                'username' => 'santi_rahayu',
                'password' => bcrypt('password_santi'),
                'nama' => 'Santi Rahayu',
                'alamat' => 'Brijolor, RT/RW: 16/04, Kalikebo, Trucuk',
                'role' => 'anggota',
                'nomor_telepon' => '085391760099',
            ],
            [
                'username' => 'retno',
                'password' => bcrypt('password_retno'),
                'nama' => 'Retno',
                'alamat' => 'Mrisen, Turus, Polanharjo',
                'role' => 'anggota',
                'nomor_telepon' => '085642018201',
            ],
            [
                'username' => 'feti_fatimah',
                'password' => bcrypt('password_feti'),
                'nama' => 'Feti Fatimah',
                'alamat' => 'Perum Krapyak Permai Rt01/11, merbung, Klaten Selatan',
                'role' => 'anggota',
                'nomor_telepon' => '085786464313',
            ],
            [
                'username' => 'retna_purnama',
                'password' => bcrypt('password_retna'),
                'nama' => 'Retna Purnama S',
                'alamat' => 'Krajan, 01/09, Jomboran, Klaten Tengah',
                'role' => 'anggota',
                'nomor_telepon' => '082008858845',
            ],
            [
                'username' => 'rini_febriani',
                'password' => bcrypt('password_rini'),
                'nama' => 'Rini Febriani',
                'alamat' => 'Babad, Rt 30/14, Kradenan, Trucuk',
                'role' => 'anggota',
                'nomor_telepon' => '085646579841',
            ],
            [
                'username' => 'ratih_kusuma',
                'password' => bcrypt('password_ratih'),
                'nama' => 'Ratih Kusuma',
                'alamat' => 'Pundungan RT/RW: 02/06, Jonggrangan, Klaten Utara',
                'role' => 'anggota',
                'nomor_telepon' => '085740700730',
            ],
            [
                'username' => 'sri_mulyani',
                'password' => bcrypt('password_sri'),
                'nama' => 'Sri Mulyani',
                'alamat' => 'Telu, Kragilan, Gantiwarno',
                'role' => 'anggota',
                'nomor_telepon' => '085647508784',
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
