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
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    protected  $gangguanRepository,$suratRepository,$donaturRepository,$userRepository,$kegiatanRepository,$asetRepository,$arsipRepository,$anakRepository;
    public function __construct(
        DonaturRepository $donaturRepository,
        UserRepository $userRepository,
        KegiatanRepository $kegiatanRepository,
        AsetRepository $asetRepository,
        ArsipRepository $arsipRepository,
        AnakRepository $anakRepository,
        SuratRepository $suratRepository,
        GangguanRepository $gangguanRepository,

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

 // controller admin   
    public function dataDonatur(){
        $data = $this->donaturRepository->getDonatur();

        return view('layout.admin.ManajemenDonatur')->with('data', $data->get());
    }

    
    public function dataAnggota(){
        $data = $this->userRepository->getAnggota();
        return view('layout.admin.ManajemenAnggota')->with('data', $data->get());
    }
    
    public function dataPengurus(){
        $data = $this->userRepository->getPengurus();
        
        
        return view('layout.admin.ManajemenPengurus')->with('data', $data->get());
    }
    
    public function dataKegiatan(){
        $data = $this->kegiatanRepository->getKegiatan()->get();
        foreach ($data as $dt){
            // Ubah format tanggal dibuat
            $tgl_kegiatan = Carbon::parse($dt->tgl_kegiatan);
            $bulanIndonesia = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];
            $namaBulan = $bulanIndonesia[$tgl_kegiatan->month];
            $formatted_tgl_dibuat = $tgl_kegiatan->day . ' ' . $namaBulan . ' ' . $tgl_kegiatan->year;
            $dt->tgl_kegiatan= $formatted_tgl_dibuat;
            
            // Pisahkan nama foto dan path foto kegiatan
            $dt->nama_foto_kegiatan = explode(';', $dt->nama_foto_kegiatan);
            $dt->path_foto_kegiatan = explode(';', $dt->path_foto_kegiatan);
        }
        return view('layout.admin.ManajemenKegiatan')->with('data', $data);
    }
    
    public function dataAset(){
        $data = $this->asetRepository->getAset()->get();
        
        
        foreach ($data as $aset) {
            $aset->nama_foto_barang = explode(';', $aset->nama_foto_barang);
            $aset->path_foto_barang = explode(';', $aset->path_foto_barang);
        }
        
        return view('layout.admin.ManajemenAset')->with('data', $data);
    }

    
    
    public function dataArsip(){
        $data = $this->arsipRepository->getArsip()->get();
        
        
        foreach ($data as $aset) {
            $aset->nama_file_dokumen = explode(';', $aset->nama_file_dokumen);
            $aset->path_file_dokumen = explode(';', $aset->path_file_dokumen);
        }
        return view('layout.admin.ManajemenArsip')->with('data', $data);
    }
    public function dataAnak(){
        $data = $this->anakRepository->getAnak();
        
        
        return view('layout.admin.ManajemenAnak')->with('data', $data->get());
    }
    public function dataSurat(){
        $data = $this->suratRepository->getSurat()->get();
        
        foreach ($data as $dt){
            $tgl_dibuat = Carbon::parse($dt->tgl_dibuat);
            $bulanIndonesia = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];
            $namaBulan = $bulanIndonesia[$tgl_dibuat->month];
            $formatted_tgl_dibuat = $tgl_dibuat->day . ' ' . $namaBulan . ' ' . $tgl_dibuat->year;
            $dt->tgl_dibuat = $formatted_tgl_dibuat;
        }
        return view('layout.admin.ManajemenSurat')->with('data', $data);
    }
    public function infobox(Request $request){
        $jumlahAnak= $this->anakRepository->getAnak()->count();
        $jumlahKepemilikanAbd = $this->anakRepository->jumlahKepemilikanAbd();
        $data = [
            'anggota' => $this->userRepository->getAnggota()->count(),
            'donatur' =>$this->donaturRepository->getDonatur()->count(),
            'kegiatan' => $this->kegiatanRepository->getKegiatan()->count(),
            'arsip' => $this->arsipRepository->getArsip()->count(),
            'aset' => $this->asetRepository->getAset()->count(),
            'anak' => $this->anakRepository->getAnak()->count(),
            'surat' => $this->suratRepository->getSurat()->count(),
            'pengurus' => $this->userRepository->getPengurus()->count(),
            'dataAbd' =>[
                'tidak_punya' => $jumlahAnak - $jumlahKepemilikanAbd,
                'kepemilikan' =>$jumlahKepemilikanAbd,
            ], 'dataAset'=>[
                'tersedia'=> $this->asetRepository->getAsetStatus(config('pijar.status.tersedia.kode'))->count(),
                'tidak_tersedia'=> $this->asetRepository->getAsetStatus(config('pijar.status.tidak_tersedia.kode'))->count(),
                'rusak'=> $this->asetRepository->getAsetStatus(config('pijar.status.rusak.kode'))->count(),
                'dalam_perbaikan'=> $this->asetRepository->getAsetStatus(config('pijar.status.dalam_perbaikan.kode'))->count()
            ],
            'sumberDana'=>[
                'pemerintah'=> $this->kegiatanRepository->getTotalSumberDana('Pemerintah'),
                'kas'=> $this->kegiatanRepository->getTotalSumberDana('Kas'),
                'iuran'=> $this->kegiatanRepository->getTotalSumberDana('Iuran'),
                'sponsor'=> $this->kegiatanRepository->getTotalSumberDana('Sponsor'),
                'donatur'=> $this->kegiatanRepository->getTotalSumberDana('Donatur'),
            ],
            'totalKegiatan'=>$this->kegiatanRepository->getTotalKegiatanPerBulan(),
            'dataAnak'=> $this->anakRepository->getAnak()->get(),
        ];
        
        return view('layout.admin.Dashboard')->with('data', $data);
    }

// fungsi untuk mengambil data yang dinamis
    public function getDataAset(Request $request){
        $kdStatus = $request->input('kd_status');
        $aset = $this->asetRepository->getAset();
        $aset->when($kdStatus, function ($query, $kdStatus) {
          $query->where('sa.kd_statUs', $kdStatus);
        });
        $aset = $aset->get();
        return response()->json($aset);
    }
    
    public function getDataPendengaran($uuid){
        $id_anak = $this->anakRepository->findByUuid($uuid)->id;
        $data = $this->gangguanRepository->dataPendengaran($id_anak);
        return response()->json($data);

    }

    // controller anggota
    public function dataKegiatanAnggota(){
        $data = $this->kegiatanRepository->getKegiatan()->get();
        foreach ($data as $dt){
            // Ubah format tanggal dibuat
            $tgl_kegiatan = Carbon::parse($dt->tgl_kegiatan);
            $bulanIndonesia = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];
            $namaBulan = $bulanIndonesia[$tgl_kegiatan->month];
            $formatted_tgl_dibuat = $tgl_kegiatan->day . ' ' . $namaBulan . ' ' . $tgl_kegiatan->year;
            $dt->tgl_kegiatan= $formatted_tgl_dibuat;
            
            // Pisahkan nama foto dan path foto kegiatan
            $dt->nama_foto_kegiatan = explode(';', $dt->nama_foto_kegiatan);
            $dt->path_foto_kegiatan = explode(';', $dt->path_foto_kegiatan);
        }
        return view('layout.anggota.Kegiatan')->with('data', $data);
    }
    public function dataDashboard(){
        $user=Auth::user()->id;
        $data=$this->anakRepository->getAnakbyIdOrtu($user)->get();
        return view('layout.anggota.Dashboard')->with('data', $data);
    }

    public function hasilPemeriksaan(){
        $user=Auth::user()->id;
        $data=$this->anakRepository->getAnakbyIdOrtu($user)->get();
        return view('layout.anggota.ManajemenHasilPemeriksaan')->with('data', $data);
    }

    public function hasilPemeriksaanbyAdmin(){
        $data=$this->anakRepository->getAnak()->get();
        return view('layout.admin.ManajemenHasil')->with('data', $data);
    }

} 