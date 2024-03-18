<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    protected $table = 'sumber_dana';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
}
