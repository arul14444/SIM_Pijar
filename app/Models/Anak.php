<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'anak';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'tgl_lahir',
        'penyakit_penyerta',
        'id_user',
        'id_abd',
        'bpjs'
    ];
}
