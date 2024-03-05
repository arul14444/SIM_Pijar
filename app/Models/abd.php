<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abd extends Model
{
    protected $table = 'abd';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'jenis_abd_kanan',
        'jenis_abd_kiri',
    ];
}
