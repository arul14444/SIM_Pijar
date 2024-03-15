<?php

namespace App\Http\Controllers;

use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    protected $suratRepository, $donaturRepository, $userRepository, $kegiatanRepository, $asetRepository, $arsipRepository, $anakRepository;

    public function __construct(
        DonaturRepository $donaturRepository,
        UserRepository $userRepository,
        KegiatanRepository $kegiatanRepository,
        AsetRepository $asetRepository,
        ArsipRepository $arsipRepository,
        AnakRepository $anakRepository,
        SuratRepository $suratRepository
    ) {
        $this->donaturRepository = $donaturRepository;
        $this->userRepository = $userRepository;
        $this->kegiatanRepository = $kegiatanRepository;
        $this->asetRepository = $asetRepository;
        $this->arsipRepository = $arsipRepository;
        $this->anakRepository = $anakRepository;
        $this->suratRepository = $suratRepository;
    }

    public function deleteAnggota($uuid)
    {
        try {
            $this->userRepository->delete($uuid);
            // Menggunakan JavaScript untuk menampilkan alert pada sisi klien
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data anggota', 'alert' => "alert('Berhasil menghapus data anggota')"]);
        } catch (\Exception $e) {
            // Menggunakan JavaScript untuk menampilkan alert pada sisi klien
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data anggota: ' . $e->getMessage(), 'alert' => "alert('Gagal menghapus data anggota: " . addslashes($e->getMessage()) . "')"]);
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
            return response()->json(['success' => true, 'message' => 'Berhasil menghapus data anggota', 'alert' => "alert('Berhasil menghapus data anggota')"]);
        } catch (\Exception $e) {
            // Menggunakan JavaScript untuk menampilkan alert pada sisi klien
            return response()->json(['success' => false, 'message' => 'Gagal menghapus data anggota: ' . $e->getMessage(), 'alert' => "alert('Gagal menghapus data anggota: " . addslashes($e->getMessage()) . "')"]);
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
}
