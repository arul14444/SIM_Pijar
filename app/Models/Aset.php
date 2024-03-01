<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'aset';
    protected $hidden = [
        'id',
        'flag_aktif'
    ];
    protected $fillable = [
        'nama_barang',
        'deskripsi_barang',
        'kode_barang',
        'status_barang',
        'nama_foto_barang',
        'path_foto_barang'
    ];
}
