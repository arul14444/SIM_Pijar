<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'lokasi',
        'sumber_dana',
        'nama_foto_kegiatan',
        'path_foto_kegiatan'
    ];
}
