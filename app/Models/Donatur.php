<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur';
    protected $hidden = [
        'id',
        'flag_aktif'
    ];
    protected $fillable = [
        'nama',
        'nomor_Telpon',
        'alamat'
    ];
}
