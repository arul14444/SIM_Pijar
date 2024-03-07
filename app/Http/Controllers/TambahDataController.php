<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Services\TambahAnakService;
use App\Services\TambahAnggotaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TambahDataController extends Controller
{
    protected $userRepository, $tambahAnggotaService, $tambahAnakService;

    public function __construct(
        TambahAnggotaService $tambahAnggotaService,
        UserRepository $userRepository,
        TambahAnakService $tambahAnakService
        

    ) {
        $this->tambahAnggotaService = $tambahAnggotaService;
        $this->userRepository = $userRepository;
        $this->tambahAnakService = $tambahAnakService;
    }

    public function tambahAnggota(Request $request){
        DB::beginTransaction();
        $inputData = $this->tambahAnggotaService->setData($request);
        DB::commit();
        return $inputData;

    }
    public function tambahAnak(Request $request){
        DB::beginTransaction();
        $inputData = $this->tambahAnakService->setData($request);
        DB::commit();
        return $inputData;

    }

    public function listOrtu(){
        $listOrtu = $this->userRepository->getAnggota();
        return  view('layout.admin.TambahAnak')->with('listOrtu', $listOrtu);

    }
}
