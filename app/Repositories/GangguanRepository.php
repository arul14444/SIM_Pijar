<?php

namespace App\Repositories;

use App\Models\Gangguan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GangguanRepository
{
    public function getAnak()
    {
        return Gangguan::select('');
    }

    public function create($data)
    {
        return Gangguan::insert($data);
    }
    public function updateBy($data, $uuid)
    {
        return Gangguan::where('uuid', $uuid)->update($data);
    }
    public function findById_anak($id_anak)
    {
        return Gangguan::select('*')
            ->where(['id_anak' => $id_anak, 'flag_aktif' => true])
            ->orderBy('created_at', 'ASC')
            ->first();
    }
    public function dataPendengaran($id_anak)
    {
        return Gangguan::select('anak.nama_lengkap', 'pendengaran.kemampuan_kanan', 'pendengaran.kemampuan_kiri', 'pendengaran.kemampuan_binaural', 'pendengaran.tgl_pemeriksaan', 'pendengaran.uuid', 'pendengaran.path_file_hasil_test', 'pendengaran.nama_file_hasil_test')
            ->join('anak', 'anak.id', 'pendengaran.id_anak')
            ->where(['pendengaran.id_anak' => $id_anak, 'pendengaran.flag_aktif' => true])
            ->orderBy('pendengaran.tgl_pemeriksaan', 'ASC')
            ->get();
    }

    public function allDataPendengaran()
    {
        return Gangguan::select('pendengaran.*', 'anak.nama_lengkap', 'anak.flag_aktif')
            ->join('anak', 'anak.id', 'pendengaran.id_anak')
            ->where('pendengaran.flag_aktif', true)
            ->orderBy('anak.nama_lengkap', 'ASC')
            ->orderBy('tgl_pemeriksaan', 'ASC')
            ->get();
    }
    public function findByUuid($uuid)
    {
        return Gangguan::select('pendengaran.*', 'anak.nama_lengkap', 'anak.uuid as uuid_anak')
            ->join('anak', 'anak.id', 'pendengaran.id_anak')
            ->where(['pendengaran.uuid' => $uuid, 'pendengaran.flag_aktif' => true])->first();
    }
    public function delete($uuid)
    {
        return Gangguan::where('uuid', $uuid)->update(['flag_aktif' => 0, 'user_update' => Auth::user()->nama]);
    }
}
