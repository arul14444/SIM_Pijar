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
                'username' => 'Admin',
                'password' => bcrypt('admin'),
                'nama' => 'Admin',
                'alamat' => 'Sleman',
                'role' => 'admin',
                'nomor_telpon' => 8734836482,
                'flag_aktif'=>true
            ],
            [
                'username' => 'Ortu',
                'password' => bcrypt('ortu'),
                'nama' => 'Ortu',
                'alamat' => 'Sleman',
                'role' => 'anggota',
                'nomor_telpon' => 8364726474, 
                'flag_aktif'=>true
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
