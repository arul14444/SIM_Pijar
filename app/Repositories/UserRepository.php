<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function getAnggota()
    {
        return User::select('*')
            ->whereNotIn('nama', ['admin'])
            ->orderBy('nama', 'asc')
            ->where(['role' => 'anggota', 'flag_aktif' => 1]);
    }
    public function getAll()
    {
        return User::select('*')
            ->whereNotIn('nama', ['admin'])
            ->orderBy('nama', 'asc')
            ->where(['flag_aktif' => 1]);
    }
    public function getPengurus()
    {
        return User::select('user.nama', 'user.nomor_telepon', 'user.alamat', 'j.jabatan', 'user.uuid')
            ->join('jabatan as j', 'j.id', 'user.id_jabatan')
            ->where(['user.role' => 'admin', 'user.flag_aktif' => 1]);
    }
    public function getOrangtua()
    {
        return User::select('*')
            ->where(['user.flag_aktif' => 1]);
    }
    public function create($data)
    {
        return User::insert($data);
    }
    public function findPengurusByUuid($uuid)
    {
        return User::from('user as pengurus')
            ->select('jabatan.jabatan', 'pengurus.nama', 'pengurus.alamat', 'pengurus.uuid', 'pengurus.nomor_telepon')
            ->join('jabatan', 'jabatan.id', 'pengurus.id_jabatan')
            ->where(['pengurus.uuid' => $uuid, 'pengurus.flag_aktif' => true])->first();
    }
    public function updateByUuid($data, $uuid)
    {
        return User::where('uuid', $uuid)->update($data);
    }
    public function findByUuid($uuid)
    {
        return User::from('user')->where(['user.uuid' => $uuid, 'flag_aktif' => true])->first();
    }
    public function delete($uuid)
    {
        return User::where('uuid', $uuid)->update(['flag_aktif' => 0, 'user_update' => Auth::user()->nama]);
    }
}
