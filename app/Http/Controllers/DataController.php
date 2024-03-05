<?php

namespace App\Http\Controllers;

use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class DataController extends Controller
{
    protected  $donaturRepository,$userRepository,$kegiatanRepository,$asetRepository,$arsipRepository;
    public function __construct(
        DonaturRepository $donaturRepository,
        UserRepository $userRepository,
        KegiatanRepository $kegiatanRepository,
        AsetRepository $asetRepository,
        ArsipRepository $arsipRepository

    ) {
        $this->donaturRepository = $donaturRepository;
        $this->userRepository = $userRepository;
        $this->kegiatanRepository = $kegiatanRepository;
        $this->asetRepository = $asetRepository;
        $this->arsipRepository = $arsipRepository;
    }
    public function dataDonatur(){
        $data = $this->donaturRepository->getDonatur();
        return view('layout.admin.ManagemenDonatur')->with('data', $data);
    }
    public function dataAnggota(){
        $data = $this->userRepository->getAnggota();
        return view('layout.admin.ManagemenAnggota')->with('data', $data);
    }

    public function dataKegiatan(){
        $data = $this->kegiatanRepository->getKegiatan();
        return view('layout.admin.ManagemenKegiatan')->with('data', $data);
    }
    
    public function dataAset(){
        $data = $this->asetRepository->getAset();
        return view('layout.admin.ManagemenAset')->with('data', $data);
    }

    public function dataArsip(){
        $data = $this->arsipRepository->getArsip();
        return view('layout.admin.ManagemenArsip')->with('data', $data);
    }
    
}
