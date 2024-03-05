<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'nama_dokumen',
        'deskripsi_dokumen',
        'kode_dokumen',
        'nama_foto_dokumen',
        'path_foto_dokumen'
    ];
}
