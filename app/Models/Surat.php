<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $hidden = [
        'id',
        'flag_aktif',
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'id_jabatan_pemberi',
        'id_jabatan_penerima',
        'nomor_surat',
        'keperluan',
        'tempat_dibuat',
        'tgl_dibuat',
    ];
}
