<?php

namespace App\Http\Controllers;

use App\Repositories\AbdRepository;
use App\Repositories\AnakRepository;
use App\Repositories\InstansiRepository;
use App\Repositories\JabatanRepository;
use App\Repositories\StatusAsetRepository;
use App\Repositories\SumberDanaRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use App\Services\TambahAnakService;
use App\Services\TambahAnggotaService;
use App\Services\TambahArsipService;
use App\Services\TambahAsetService;
use App\Services\TambahDonaturService;
use App\Services\TambahKegiatanService;
use App\Services\TambahSuratService;
use App\Services\ValidateService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TambahDataController extends Controller
{
    protected $userRepository, $tambahAnggotaService, $tambahAnakService, $tambahDonaturService,
        $tambahArsipService, $tambahAsetService, $tambahKegiatanService, $statusAsetRepository, $abdRepository,
        $tambahSuratService, $jabatanRepository, $sumberDanaRepository, $anakRepository, $validateService, $instansiRepository;

    public function __construct(
        TambahAnggotaService $tambahAnggotaService,
        UserRepository $userRepository,
        TambahAnakService $tambahAnakService,
        TambahDonaturService $tambahDonaturService,
        TambahAsetService $tambahAsetService,
        StatusAsetRepository $statusAsetRepository,
        AbdRepository $abdRepository,
        TambahSuratService $tambahSuratService,
        JabatanRepository $jabatanRepository,
        TambahKegiatanService $tambahKegiatanService,
        TambahArsipService $tambahArsipService,
        SumberDanaRepository $sumberDanaRepository,
        AnakRepository $anakRepository,
        ValidateService $validateService,
        InstansiRepository $instansiRepository


    ) {
        $this->tambahAnggotaService = $tambahAnggotaService;
        $this->userRepository = $userRepository;
        $this->tambahAnakService = $tambahAnakService;
        $this->tambahDonaturService = $tambahDonaturService;
        $this->tambahAsetService = $tambahAsetService;
        $this->statusAsetRepository = $statusAsetRepository;
        $this->abdRepository = $abdRepository;
        $this->tambahSuratService = $tambahSuratService;
        $this->jabatanRepository = $jabatanRepository;
        $this->tambahKegiatanService = $tambahKegiatanService;
        $this->tambahArsipService = $tambahArsipService;
        $this->sumberDanaRepository = $sumberDanaRepository;
        $this->anakRepository = $anakRepository;
        $this->validateService = $validateService;
        $this->instansiRepository = $instansiRepository;
    }

    // =========================== list Data ===========================
    public function listDataPengurus()
    {
        $data = [
            'listAnggota' => $this->userRepository->getAnggota()->get(),
            'listJabatan' => $this->jabatanRepository->getJabatan()->get(),
        ];
        return view('layout.admin.TambahPengurusInti')->with('data', $data);
    }
    public function listDataTambahAnak()
    {
        $data = [
            'listOrtu' => $this->userRepository->getOrangtua()->get(),
            'listAbd' => $this->abdRepository->getAbd()->get(),
        ];
        return  view('layout.admin.TambahAnak')->with('data', $data);
    }
    public function listStatusAset()
    {
        $listStatus = $this->statusAsetRepository->getStatus();
        return  view('layout.admin.TambahAset')->with('listStatus', $listStatus);
    }
    public function listSumberDana()
    {
        $data = $this->sumberDanaRepository->getSumber();
        return  view('layout.admin.TambahKegiatan')->with('data', $data);
    }
    public function listPengurus()
    {
        $data = [
            'pengurusInti' => $this->userRepository->getPengurus()->get(),
            'pengurus' => $this->userRepository->getAll()->get()
        ];
        return  view('layout.admin.TambahSurat')->with('data', $data);
    }

    public function listDataTambahDonatur()
    {
        $data = [
            'listInstansi' => $this->instansiRepository->getInstansi()->get(),
        ];
        return  view('layout.admin.TambahDonatur')->with('data', $data);
    }

    //=========================== tambah Data =========================== 
    public function tambahPengurus(Request $request)
    {
        try {
            $validasi = $this->validateService->valPengurus($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data pengurus gagal ditambahkan: ' . $msg[0]]);
            }
    
            DB::beginTransaction();
    
            $jabatan = $this->jabatanRepository->findByUuid($request->uuid_jabatan);
            $setData = [
                'id_jabatan' => $jabatan->id,
                'role' => 'admin'
            ];
    
            $this->userRepository->updateByUuid($request->uuid_nama, $setData);
    
            DB::commit();
    
            return response()->json(['success' => true, 'message' => 'Data pengurus berhasil ditambahkan']);
        } catch (\Exception $e) {
     }
    }
    
    

    public function tambahJabatan(Request $request)
    {
        try {
            $validasi = $this->validateService->valJabatan($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data jabatan gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $data = [
                'jabatan' => $request->nama_jabatan,
            ];
            $this->jabatanRepository->create($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data jabatan berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data jabatan: ' . $e->getMessage()]);
        }
    }
    public function tambahAnggota(Request $request)
    {
        try {
            $validasi = $this->validateService->valAnggota($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data anggota gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $this->tambahAnggotaService->setData($request);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data anggota berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data anggota: ' . $e->getMessage()]);
        }
    }
    public function tambahAnakbyAdmin(Request $request)
    {
        try {
            $validasi = $this->validateService->valAnak($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $this->tambahAnakService->setFirstData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data anak berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data anak: ' . $e->getMessage()]);
        }
    }
    public function tambahDonatur(Request $request)
    {
        try {
            $validasi = $this->validateService->valDonatur($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data donatur gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $this->tambahDonaturService->setData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data donatur berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data donatur: ' . $e->getMessage()]);
        }
    }
    public function tambahAset(Request $request)
    {
        try {
            $validasi = $this->validateService->valAset($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data kegiatan gagal ditambahkan: ' . $msg[0]]);
            }

            DB::beginTransaction();
            $this->tambahAsetService->setData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data aset berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data aset gagal ditambahkan' . $e->getMessage()]);
        }
    }
    public function tambahSurat(Request $request)
    {
        try {
            $validasi = $this->validateService->valSurat($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Surat gagal dibuat: ' . $msg[0]]);
            }

            DB::beginTransaction();
            $this->tambahSuratService->setData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Surat berhasil dibuat']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Gagal membuat surat: ' . $e->getMessage()]);
        }
    }
    public function tambahKegiatan(Request $request)
    {
        try {
            $validasi = $this->validateService->valKegiatan($request);

            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data kegiatan gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $this->tambahKegiatanService->setData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data kegiatan berhasil ditambahkan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Data kegiatan gagal ditambahkan: ' . $e->getMessage()]);
        }
    }
    public function tambahArsip(Request $request)
    {
        try {
            $validasi = $this->validateService->valArsip($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data arsip gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $this->tambahArsipService->setData($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data arsip berhasil ditambahkan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Data arsip gagal ditambahkan: ' . $e->getMessage()]);
        }
    }

    public function tambahHasilPemeriksaan(Request $request)
    {
        try {
            $validasi = $this->validateService->valHasilPemeriksaan($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $this->tambahAnakService->setHasilTest($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data hasil pemeriksaan berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data hasil pemeriksaan: ' . $e->getMessage()]);
        }
    }

    public function tambahHasilPemeriksaanbyAdmin(Request $request)
    {
        try {
            $validasi = $this->validateService->valHasilPemeriksaan($request);
            if ($validasi->fails()) {
                $msg = $validasi->errors()->all();
                return response()->json(['success' => false, 'message' => 'Data gagal ditambahkan: ' . $msg[0]]);
            }
            DB::beginTransaction();
            $this->tambahAnakService->setHasilTest($request);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data hasil pemeriksaan berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menambahkan data hasil pemeriksaan: ' . $e->getMessage()]);
        }
    }
    public function listAnakAll()
    {
        $data = $this->anakRepository->getAnak()->get();
        return view('layout.admin.TambahHasil')->with('data', $data);
    }
    public function listAnak()
    {
        $user = Auth::user()->id;
        $data = $this->anakRepository->getAnakbyIdOrtu($user)->get();
        return view('layout.anggota.TambahHasilPemeriksaan')->with('data', $data);
    }
}
