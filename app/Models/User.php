<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    protected $table = 'user';
    protected $hidden = [
        'password',
        'remember_token',
        'id',
        'username',
        'flag_aktif'
    ];
    protected $fillable = [
        'username',
        'nama',
        'alamat',
        'role',
        'nomorTelpon',
    ];
}
