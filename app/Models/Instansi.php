<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
}
