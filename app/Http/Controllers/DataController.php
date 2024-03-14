<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DataController extends Controller
{
    protected  $suratRepository,$donaturRepository,$userRepository,$kegiatanRepository,$asetRepository,$arsipRepository,$anakRepository;
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

    
    public function dataDonatur(){
        $data = $this->donaturRepository->getDonatur();
        return view('layout.admin.ManagemenDonatur')->with('data', $data);
    }

    public function dataAnggota(){
        $data = $this->userRepository->getAnggota();
        return view('layout.admin.ManagemenAnggota')->with('data', $data);
    }

    public function dataPengurus(){
        $data = $this->userRepository->getPengurus();
        return view('layout.admin.ManagemenPengurus')->with('data', $data);
    }
    

    public function dataKegiatan(){
        $data = $this->kegiatanRepository->getKegiatan();
        return view('layout.admin.ManagemenKegiatan')->with('data', $data);
    }
    
    public function dataAset(){
        $data = $this->asetRepository->getAset();
        foreach ($data as $aset) {
            $aset->nama_foto_barang = explode(';', $aset->nama_foto_barang);
            $aset->path_foto_barang = explode(';', $aset->path_foto_barang);
        }
    
        return view('layout.admin.ManagemenAset')->with('data', $data);
    }
    

    public function dataArsip(){
        $data = $this->arsipRepository->getArsip();
        return view('layout.admin.ManagemenArsip')->with('data', $data);
    }
    public function dataAnak(){
        $data = $this->anakRepository->getAnak();
        return view('layout.admin.ManagemenAnak')->with('data', $data);
    }
    public function dataSurat(){
        $data = $this->suratRepository->getSurat();
        return view('layout.admin.ManagemenSurat')->with('data', $data);
    }
    public function infobox(){
        $data = [
           'anggota' => $this->userRepository->getAnggota()->count(),
           'donatur' =>$this->donaturRepository->getDonatur()->count(),
           'kegiatan' => $this->kegiatanRepository->getKegiatan()->count(),
           'arsip' => $this->arsipRepository->getArsip()->count(),
           'aset' => $this->asetRepository->getAset()->count(),
           'anak' => $this->anakRepository->getAnak()->count(),
           'surat' => $this->suratRepository->getSurat()->count(),
           'pengurus' => $this->userRepository->getPengurus()->count()
        ];

        return view('layout.admin.Dashboard')->with('data', $data);
    }

}
