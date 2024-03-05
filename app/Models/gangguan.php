<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gangguan extends Model
{
    protected $table = 'gangguan';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'gangguan_kanan',
        'gangguan_kiri',
        'id_anak'
    ];
}
