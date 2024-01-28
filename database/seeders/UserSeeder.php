<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'username'=>'Admin',
                'password'=>bcrypt('admin'),
                'nama' => 'Admin Satu',
                'alamat' => 'Sleman',
                'role' =>'pengurus',
                'nomorTelpon'=> '08734836482'
            ],
            [
                'username'=>'Ortu',
                'password'=>bcrypt('ortu'),
                'nama' => 'ortu',
                'alamat' => 'Sleman',
                'role' =>'orang_tua',
                'nomorTelpon'=> '08364726474'
            ]

        ];

        foreach($userData as $key => $val){
             User::create($val);
        }
    }
}
