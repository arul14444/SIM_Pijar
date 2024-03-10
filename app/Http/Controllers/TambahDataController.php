<?php

namespace App\Http\Controllers;

use App\Repositories\AbdRepository;
use App\Repositories\StatusAsetRepository;
use App\Repositories\UserRepository;
use App\Services\TambahAnakService;
use App\Services\TambahAnggotaService;
use App\Services\TambahAsetService;
use App\Services\TambahDonaturService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahDataController extends Controller
{
    protected $userRepository, $tambahAnggotaService, $tambahAnakService, $tambahDonaturService, 
    $tambahArsipService,$tambahAsetService, $tambahKegiatanService,$statusAsetRepository, $abdRepository;

    public function __construct(
        TambahAnggotaService $tambahAnggotaService,
        UserRepository $userRepository,
        TambahAnakService $tambahAnakService,
        TambahDonaturService $tambahDonaturService,
        TambahAsetService $tambahAsetService,
        StatusAsetRepository $statusAsetRepository,
        AbdRepository $abdRepository
        
        
        ) {
            $this->tambahAnggotaService = $tambahAnggotaService;
            $this->userRepository = $userRepository;
            $this->tambahAnakService = $tambahAnakService;
            $this->tambahDonaturService = $tambahDonaturService;
            $this->tambahAsetService = $tambahAsetService;
            $this->statusAsetRepository = $statusAsetRepository;
            $this->abdRepository = $abdRepository;
        }
        // Ambil Data
        public function listDataTambahAnak(){
            $data=[
                'listOrtu' => $this->userRepository->getAnggota(),
                'listAbd' => $this->abdRepository->getAbd(),
            ];
            return  view('layout.admin.TambahAnak')->with('data', $data);
    
        }
        public function listStatusAset(){
            $listStatus = $this->statusAsetRepository->getStatus();
            return  view('layout.admin.TambahAset')->with('listStatus', $listStatus);
    
        }

        //=========================== tambah Data =========================== 
    public function tambahAnggota(Request $request){
        try{
            DB::beginTransaction();
            $this->tambahAnggotaService->setData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data anak berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data anak: ' . $e->getMessage()]);
        }
    }
    public function tambahAnakbyAdmin(Request $request){
        try{
            DB::beginTransaction();
            $this->tambahAnakService->setFirstData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data anak berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data anak: ' . $e->getMessage()]);
        }
    }
    public function tambahDonatur(Request $request){
        DB::beginTransaction();
        $inputData = $this->tambahDonaturService->setData($request);
        DB::commit();
        return $inputData;
    }
    public function tambahAset(Request $request){
        DB::beginTransaction();
        $inputData = $this->tambahAsetService->setData($request);
        DB::commit();
        return $inputData;
    }

}
