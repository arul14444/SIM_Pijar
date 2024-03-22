<?php

namespace App\Http\Controllers;

use App\Repositories\AbdRepository;
use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\gangguanRepository;
use App\Repositories\JabatanRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\StatusAsetRepository;
use App\Repositories\SumberDanaRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    protected $userRepository,$statusAsetRepository, $abdRepository, $jabatanRepository, $sumberDanaRepository,
    $arsipRepository,$kegiatanRepository,$asetRepository, $suratRepository, $anakRepository, $gangguanRepository;

    public function __construct(
        UserRepository $userRepository,
        StatusAsetRepository $statusAsetRepository,
        AbdRepository $abdRepository,
        JabatanRepository $jabatanRepository,
        SumberDanaRepository  $sumberDanaRepository,
        AsetRepository $asetRepository,
        ArsipRepository $arsipRepository,
        KegiatanRepository $kegiatanRepository,
        SuratRepository $suratRepository,
        AnakRepository $anakRepository,
        gangguanRepository $gangguanRepository,
        
        ) {
            $this->userRepository = $userRepository;
            $this->statusAsetRepository = $statusAsetRepository;
            $this->abdRepository = $abdRepository;
            $this->jabatanRepository = $jabatanRepository;
            $this->sumberDanaRepository = $sumberDanaRepository;
            $this->asetRepository = $asetRepository;
            $this->arsipRepository = $arsipRepository;
            $this->kegiatanRepository = $kegiatanRepository;
            $this->suratRepository = $suratRepository;
            $this->anakRepository = $anakRepository;
            $this->gangguanRepository = $gangguanRepository;
        }

        // Ambil Data
        public function detailAnak($uuid){
            $data=[
                'listOrtu' => $this->userRepository->getOrangtua()->get(),
                'listAbd' => $this->abdRepository->getAbd()->get(),
                'detail' => $this->anakRepository->findByUuid($uuid)
            ];
            return  view('layout.admin.EditAnak')->with('data', $data);
        }
        public function detailPengurus($uuid){
            $data = $this->userRepository->findPengurusByUuid($uuid);
            return  view('layout.admin.EditPengurus')->with('data', $data);
        }
        public function detailAnggota($uuid){
            $data = $this->userRepository->findByUuid($uuid);
            return  view('layout.admin.EditAnggota')->with('data', $data);
        } 
        public function detailAset(){
            $listStatus = $this->statusAsetRepository->getStatus();
            return  view('layout.admin.EditAset')->with('listStatus', $listStatus);
        }
        public function listSumberDana(){
            $data = $this->sumberDanaRepository->getSumber();
            return  view('layout.admin.EditKegiatan')->with('data', $data);
        }
        public function listPengurus(){
            $data = [
                'pengurusInti'=>$this->jabatanRepository->getJabatan()->get(),
                'pengurus'=>$this->userRepository->getAnggota()->get()
            ];
            return  view('layout.admin.EditSurat')->with('data', $data);
        }
        // edit
        public function editAnggota(Request $request, $uuid){
            try{
                DB::beginTransaction();
                    $setData =[
                        'nama'=> $request->nama,
                        'nomor_telepon'=> $request->nomor_telepon,
                        'alamat'=>$request->alamat
                    ];
                    $this->userRepository->updateByUuid($setData,$uuid);
                DB::commit();
                    return redirect('/managemen/anggota')->with('success', 'Data anak berhasil diubah');
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Gagal mengubah data anggota: ' . $e->getMessage()]);
            }
        }

        public function editPengurus(Request $request, $uuid){
            try{
                DB::beginTransaction();
                    $setData =[
                        'nomor_telepon'=> $request->nomor_telepon,
                        'alamat'=>$request->alamat
                    ];
                    $this->userRepository->updateByUuid($setData,$uuid);
                DB::commit();
                    return redirect('/managemen/pengurus')->with('success', 'Data anak berhasil diubah');
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Gagal mengubah data anggota: ' . $e->getMessage()]);
            }
        }
        public function editAnakbyAdmin(Request $request,$uuid){
            try{
                DB::beginTransaction();
                    $ortu = $this->userRepository->findByUuid($request->uuid_orang_tua);
                    $abdKiri = $this->abdRepository->findByUuid($request->uuid_abd_kiri);
                    $abdKanan = $this->abdRepository->findByUuid($request->uuid_abd_kanan);
                    $setData = [
                        'id_abd_kiri'=> $abdKiri->id,
                        'id_abd_kanan'=>$abdKanan->id,
                        'nama_lengkap'=> $request->nama_lengkap,
                        'nama_panggilan'=> $request->nama_panggilan,
                        'tempat_lahir'=> $request->tempat_lahir,
                        'tgl_lahir'=> $request->tgl_lahir,
                        'nomor_telepon'=>$request->nomor_telepon,
                        'kemampuan_kiri'=> $request->kemampuan_telinga_kiri,
                        'kemampuan_kanan'=> $request->kemampuan_telinga_kanan,
                        'kemampuan_binaural'=>$request->kemampuan_telinga_binaural,
                        'penyakit_penyerta'=>$request->penyakit_penyerta,
                        'id_user'=> $ortu->id,
                        'bpjs'=> $request->bpjs
                    ];
                    $this->anakRepository->updateBy($setData,$uuid);

                    $anak=$this->anakRepository->findByUuid($uuid);
                    $gangguan = $this->gangguanRepository->findById_anak($anak->id);
                    $setGangguan=[
                        'kemampuan_kiri'=> $request->kemampuan_telinga_kiri,
                        'kemampuan_kanan'=> $request->kemampuan_telinga_kanan,
                        'kemampuan_binaural'=>$request->kemampuan_telinga_binaural,
                    ];
                    $this->gangguanRepository->updateBy($setGangguan,$gangguan->uuid);
                DB::commit();
                    return redirect('/managemen/anak')->with('success', 'Data anak berhasil diubah');
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Gagal mengubah data anak: ' . $e->getMessage()]);
            }
        }
        public function editDonatur(Request $request){
            try{
                DB::beginTransaction();
                
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Data donatur berhasil ditambahkan']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Gagal menambahkan data donatur: ' . $e->getMessage()]);
            }
        }
        public function editAset(Request $request){
            try{
                $request->validate([
                    'lampiran.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096', 
                ]);
    
                DB::beginTransaction();
                
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Data aset berhasil ditambahkan']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Data aset gagal ditambahkan' . $e->getMessage()]);
            }
        }
        public function editSurat(Request $request){
            try {
                DB::beginTransaction();
                
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Surat berhasil dibuat']);
                
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Gagal membuat surat: ' . $e->getMessage()]);
            } 
        }
        public function editKegiatan(Request $request){
            try {
                $request->validate([
                    'lampiran.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096', 
                ]);
                DB::beginTransaction();
               
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Data kegiatan berhasil ditambahkan']);
                
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Data kegiatan gagal ditambahkan: ' . $e->getMessage()]);
            } 
        }
        public function editArsip(Request $request){
            try {
                $request->validate([
                    'lampiran.*' => 'mimes:pdf|max:4096',
                ]);
                DB::beginTransaction();
                
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Data kegiatan berhasil ditambahkan']);
                
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Data kegiatan gagal ditambahkan: ' . $e->getMessage()]);
            } 
        }
}
