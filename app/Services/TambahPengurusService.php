<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class TambahPengurusService
{
    public function __construct()
    {
        // Constructor logic goes here
    }
    
    public function tambahPengurus($data)
    {
        $setDataUser=[
            'role' => config('pijar.role.pengurus.kode'),
            'id_jabatan' => $data->id_jabatan,
        ];
    }
    
    // Add more methods as needed
    
}