<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'Jabatan';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'id_user',
    ];
}
