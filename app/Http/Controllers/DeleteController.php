<?php

namespace App\Http\Controllers;

use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\GangguanRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    protected $suratRepository, $donaturRepository, $userRepository, $kegiatanRepository, $asetRepository, $arsipRepository, $anakRepository, $gangguanRepository;

    public function __construct(
        DonaturRepository $donaturRepository,
        UserRepository $userRepository,
        KegiatanRepository $kegiatanRepository,
        AsetRepository $asetRepository,
        ArsipRepository $arsipRepository,
        AnakRepository $anakRepository,
        SuratRepository $suratRepository,
        GangguanRepository $gangguanRepository
    ) {
        $this->donaturRepository = $donaturRepository;
        $this->userRepository = $userRepository;
        $this->kegiatanRepository = $kegiatanRepository;
        $this->asetRepository = $asetRepository;
        $this->arsipRepository = $arsipRepository;
        $this->anakRepository = $anakRepository;
        $this->suratRepository = $suratRepository;
        $this->gangguanRepository = $gangguanRepository;
    }

    public function deleteAnggota($uuid)
    {
        try {
            // $anak = $this->anakRepository->getAnakbyUuidOrtu($uuid)->get();
            // if ($anak!=null) {
            //     foreach ($anak as $a) {
            //         $this->anakRepository->deleteByid($a->id);
            //     }
            // }

            $this->userRepository->delete($uuid);

            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data Anggota']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data Anggota: ' . $e->getMessage()]);
        }
    }

    public function deleteDonatur($uuid)
    {
        try {
            $this->donaturRepository->delete($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data donatur']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data donatur: ' . $e->getMessage()]);
        }
    }

    public function deleteKegiatan($uuid)
    {
        try {
            $this->kegiatanRepository->delete($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data kegiatan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data kegiatan: ' . $e->getMessage()]);
        }
    }

    public function deleteAset($uuid)
    {
        try {
            $this->asetRepository->delete($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data aset']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data aset: ' . $e->getMessage()]);
        }
    }

    public function deleteArsip($uuid)
    {
        try {
            $this->arsipRepository->delete($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data arsip']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data arsip: ' . $e->getMessage()]);
        }
    }

    public function deleteAnak($uuid)
    {
        try {
            $this->anakRepository->delete($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data anak']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data anak: ' . $e->getMessage()]);
        }
    }

    public function deleteSurat($uuid)
    {
        try {
            $this->suratRepository->delete($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data surat']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data surat: ' . $e->getMessage()]);
        }
    }
    public function deleteHasilPemeriksaan($uuid)
    {
        try {
            $this->gangguanRepository->delete($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data hasil pemeriksaan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data hasil pemeriksaan: ' . $e->getMessage()]);
        }
    }

    public function deletePengurus($uuid)
    {
        try {
            $data = [
                'id_jabatan' => null,
                'role' => 'anggota',
                'user_update' => Auth::user()->nama
            ];
            $this->userRepository->updateByUuid($data, $uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data jabatan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data jabatan: ' . $e->getMessage()]);
        }
    }
    public function reactiveAnggota($uuid)
    {
        try {
            $this->userRepository->reactive($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil mengaktifkan data Anggota']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal mengaktifkan data Anggota: ' . $e->getMessage()]);
        }
    }
    public function reactiveAnak($uuid)
    {
        try {
            $this->anakRepository->reactive($uuid);
            return response()->json(['success' => true, 'message' => 'Berhasil mengaktifkan data Anak']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal mengaktifkan data Anggota: ' . $e->getMessage()]);
        }
    }
}
