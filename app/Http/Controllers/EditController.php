<?php

namespace App\Http\Controllers;

use App\Repositories\AbdRepository;
use App\Repositories\AnakRepository;
use App\Repositories\ArsipRepository;
use App\Repositories\AsetRepository;
use App\Repositories\DonaturRepository;
use App\Repositories\gangguanRepository;
use App\Repositories\InstansiRepository;
use App\Repositories\JabatanRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\StatusAsetRepository;
use App\Repositories\SumberDanaRepository;
use App\Repositories\SuratRepository;
use App\Repositories\UserRepository;
use App\Services\ValidateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    protected $userRepository,$statusAsetRepository, $abdRepository, $jabatanRepository, $donaturRepository, $sumberDanaRepository,
    $arsipRepository,$kegiatanRepository,$asetRepository, $suratRepository, $anakRepository, $gangguanRepository, $validateService, $instansiRepository;

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
        DonaturRepository $donaturRepository,
        ValidateService $validateService,
        InstansiRepository $instansiRepository
        
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
            $this->donaturRepository = $donaturRepository;
            $this->validateService = $validateService;
            $this->instansiRepository = $instansiRepository;
        }

        // Ambil Data
        public function detailAnak($uuid){
            $data=[
                'listOrtu' => $this->userRepository->getOrangtua()->get(),
                'listAbd' => $this->abdRepository->getAbd()->get(),
                'detail' => $this->anakRepository->findByUuid($uuid),
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
        public function detailDonatur($uuid){
            $data = [
                'detail'=>$this->donaturRepository->findByUuid($uuid),
                'instansi'=>$this->instansiRepository->getInstansi()->get()];
            return  view('layout.admin.EditDonatur')->with('data', $data);
        } 
        public function detailArsip($uuid){
            $data = $this->arsipRepository->findByUuid($uuid);
            return  view('layout.admin.EditArsip')->with('data', $data);
        } 
        public function detailAset($uuid){
            $detail = $this->asetRepository->findByUuid($uuid);
            $status = $this->statusAsetRepository->getStatus();
            $data=[
                'detail'=>$detail,
                'status'=>$status
            ];
            return  view('layout.admin.EditAset')->with('data', $data);
        }
        public function detailKegiatan($uuid){
            $sumber = $this->sumberDanaRepository->getSumber();
            $detail = $this->kegiatanRepository->findByUuid($uuid);
            $data=[
                'sumber'=>$sumber,
                'detail'=>$detail
            ];
            return  view('layout.admin.EditKegiatan')->with('data', $data);
        }
        public function detailSurat($uuid){
            $data = [
                'pengurusInti'=>$this->jabatanRepository->getJabatan()->get(),
                'pengurus'=>$this->userRepository->getAnggota()->get(),
                'detail'=>$this->suratRepository->findByUuid($uuid)
            ];
            return  view('layout.admin.EditSurat')->with('data', $data);
        }
        public function detailHasil($uuid){
            $user=Auth::user()->id;
            $data = [
                'anak'=>$this->anakRepository->getAnakbyIdOrtu($user)->get(),
                'detail'=>$this->gangguanRepository->findByUuid($uuid)
            ];
            return  view('layout.anggota.EditHasilPemeriksaan')->with('data', $data);
        }
        public function detailHasilbyAdmin($uuid){
            $data = [
                'anak'=>$this->anakRepository->getAnak()->get(),
                'detail'=>$this->gangguanRepository->findByUuid($uuid)
            ];
            return  view('layout.admin.EditHasil')->with('data', $data);
        }
        

        // edit
        public function editAnggota(Request $request, $uuid){
            try{
                DB::beginTransaction();
                    $setData =[
                        'nama'=> $request->nama,
                        'nomor_telepon'=> $request->nomor_telepon,
                        'alamat'=>$request->alamat,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->userRepository->updateByUuid($setData,$uuid);
                DB::commit();
                    return redirect('/manajemen/anggota')->with('success', 'Data anggota berhasil diubah');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('anggota/edit/'.$uuid)->with('alert', 'Data anggota gagal diubah: ' . $e->getMessage() );
            }
        }

        public function editPengurus(Request $request, $uuid){
            try{
                DB::beginTransaction();
                    $setData =[
                        'nomor_telepon'=> $request->nomor_telepon,
                        'alamat'=>$request->alamat,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->userRepository->updateByUuid($setData,$uuid);
                DB::commit();
                    return redirect('/manajemen/pengurus')->with('success', 'Data pengurus berhasil diubah');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('pengurus/edit/'.$uuid)->with('alert', 'Data pengurus gagal diubah: ' . $e->getMessage() );
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
                        'bpjs'=> $request->bpjs,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->anakRepository->updateBy($setData,$uuid);
                    $anak=$this->anakRepository->findByUuid($uuid);
                    $gangguan = $this->gangguanRepository->findById_anak($anak->id);
                    $setGangguan=[
                        'kemampuan_kiri'=> $request->kemampuan_telinga_kiri,
                        'kemampuan_kanan'=> $request->kemampuan_telinga_kanan,
                        'kemampuan_binaural'=>$request->kemampuan_telinga_binaural,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->gangguanRepository->updateBy($setGangguan,$gangguan->uuid);
                DB::commit();
                    return redirect('/manajemen/anak')->with('success', 'Data anak berhasil diubah');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('anak/edit/'.$uuid)->with('alert', 'Data anak gagal diubah: ' . $e->getMessage() );
            }
        }

        public function editDonatur(Request $request,$uuid){
            try{
                DB::beginTransaction();
                $instansi=$this->instansiRepository->findByUuid($request->uuid_instansi);
                $setData=[
                        'nama'=> $request->nama,
                        'nomor_telepon'=> $request->nomor_telepon,
                        'alamat'=>$request->alamat,
                        'id_instansi'=>$instansi->id,
                        'user_update' => Auth::user()->nama
                ];
                $this->donaturRepository->updateByUuid($setData,$uuid);
                DB::commit();
                return redirect('/manajemen/donatur')->with('success', 'Data donatur berhasil diubah');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('donatur/edit/'.$uuid)->with('alert', 'Data anak gagal diubah: ' . $e->getMessage() );
            }
        }

        public function editAset(Request $request, $uuid){
            try{
                DB::beginTransaction(); 
                if ($request->hasFile('lampiran')) {
                    $validasi = $this->validateService->valAset($request);
                    if ($validasi->fails()) {
                        $msg = $validasi->errors()->all();
                        return redirect('aset/edit/'.$uuid)->with('alert', 'Data aset gagal diubah: '.$msg[0] );
                    }  
                    $lampiranNames = [];
                    $pathLampiran = [];
                    $lampiranFiles = $request->file('lampiran');
                    foreach ($lampiranFiles as $lampiran) {
                        $lampiranNames[] = $lampiran->getClientOriginalName();
                        $lampiran->move('dokumen/aset', $lampiran->getClientOriginalName());
                        $pathLampiran[] = 'dokumen/aset/' . $lampiran->getClientOriginalName();
                }
                    $lampiran = implode('; ', $lampiranNames);
                    $path = implode('; ', $pathLampiran);
                    $aset = $this->statusAsetRepository->findByUuid($request->uuid_status_aset);
                    $setData = [
                        'nama_barang' => $request->nama_barang,
                        'kode_barang' => $request->kode,
                        'id_status_aset' => $aset->id,
                        'deskripsi_barang' => $request->deskripsi,
                        'nama_foto_barang' => $lampiran,
                        'path_foto_barang' => $path,
                        'user_update' => Auth::user()->nama 
                    ];
                    $this->asetRepository->updateByUuid($setData,$uuid);
                    DB::commit();
                    return redirect('/manajemen/aset')->with('success', 'Data aset berhasil diubah');
                }else{
                    $aset = $this->statusAsetRepository->findByUuid($request->uuid_status_aset);
                    $setData = [
                        'nama_barang' => $request->nama_barang,
                        'kode_barang' => $request->kode,
                        'id_status_aset' => $aset->id,
                        'deskripsi_barang' => $request->deskripsi,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->asetRepository->updateByUuid($setData,$uuid);
                    DB::commit();
                    return redirect('/manajemen/aset')->with('success', 'Data aset berhasil diubah');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('aset/edit/'.$uuid)->with('alert', 'Data aset gagal diubah: ' . $e->getMessage() );
            }
        }

        public function editSurat(Request $request, $uuid){
            try {
                DB::beginTransaction();
                $pemberi = $this->jabatanRepository->findByUuid($request->uuid_jabatan_pemberi);
                $penerima = $this->userRepository->findByUuid($request->uuid_penerima);
                $setData = [
                        'id_jabatan_pemberi' => $pemberi->id,
                        'id_user_penerima'=> $penerima->id,
                        'jabatan_penerima' => $request->jabatan_penerima,
                        'nomor_surat' => $request->nomor_surat,
                        'keperluan' => $request->keperluan,
                        'tempat_dibuat'=> $request->tempat_dibuat,
                        'tgl_dibuat' => $request->tgl_dibuat,
                        'user_update' => Auth::user()->nama
                    ];
                $this->suratRepository->updateByUuid($setData,$uuid);
                DB::commit();
                return redirect('/manajemen/surat')->with('success', 'Data surat berhasil diubah');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('surat/edit/'.$uuid)->with('alert', 'Data surat gagal diubah: ' . $e->getMessage() );
            } 
        }
        public function editKegiatan(Request $request,$uuid){
            try {
                if ($request->hasFile('lampiran')) {
                    $validasi = $this->validateService->valKegiatan($request);
                    if ($validasi->fails()) {
                        $msg = $validasi->errors()->all();
                        return redirect('kegiatan/edit/'.$uuid)->with('alert', 'Data kegiatan gagal ditambahkan: '.$msg[0] );
                    }  
                    DB::beginTransaction();
                    $sumber = $this->sumberDanaRepository->findByUuid($request->sumber_dana);
                    $lampiranNames = [];
                    $pathLampiran = [];
                    
                    if (is_array($request->file('lampiran')) || is_object($request->file('lampiran'))) {
                        $lampiranFiles = $request->file('lampiran');
                        foreach ($lampiranFiles as $lampiran) {
                            $lampiranNames[] = $lampiran->getClientOriginalName();
                            $lampiran->move('dokumen/kegiatan', $lampiran->getClientOriginalName());
                            $pathLampiran[] = 'dokumen/kegiatan/' . $lampiran->getClientOriginalName();
                        }
                    }
                    $lampiran = implode(';', $lampiranNames);
                    $path = implode(';', $pathLampiran);
                    $setData = [
                        'nama_kegiatan' => $request->nama_kegiatan,
                        'deskripsi_kegiatan' => $request->deskripsi,
                        'lokasi' => $request->lokasi,
                        'id_sumber_dana' => $sumber->id,
                        'tgl_kegiatan' => $request->tanggal,
                        'nama_foto_kegiatan' => $lampiran,
                        'path_foto_kegiatan' => $path,
                        'user_update' => Auth::user()->nama 
                    ];
                    $this->kegiatanRepository->updateByUuid($setData,$uuid);
                    DB::commit();
                    return redirect('/manajemen/kegiatan')->with('success', 'Data kegiatan berhasil diubah');
                }else{
                    $sumber = $this->sumberDanaRepository->findByUuid($request->sumber_dana);
                    $setData = [
                        'nama_kegiatan' => $request->nama_kegiatan,
                        'deskripsi_kegiatan' => $request->deskripsi,
                        'lokasi' => $request->lokasi,
                        'id_sumber_dana' => $sumber->id,
                        'tgl_kegiatan' => $request->tanggal,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->kegiatanRepository->updateByUuid($setData,$uuid);
                    DB::commit();
                    return redirect('/manajemen/kegiatan')->with('success', 'Data kegiatan berhasil diubah');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('kegiatan/edit/'.$uuid)->with('alert', 'Data kegiatan gagal diubah: ' . $e->getMessage() );
            }
            
        }
        public function editArsip(Request $request,$uuid){
            try {
                if ($request->hasFile('lampiran')) {
                    $validasi = $this->validateService->valArsip($request);
                    if ($validasi->fails()) {
                        $msg = $validasi->errors()->all();
                        return redirect('arsip/edit/'.$uuid)->with('alert', 'Data arsip gagal diubah: '.$msg[0] );
                    }  
                    DB::beginTransaction(); 
                    $lampiranNames = [];
                    $pathLampiran = [];
                    if (is_array($request->file('lampiran')) || is_object($request->file('lampiran'))) {
                        $lampiranFiles = $request->file('lampiran');
                        foreach ($lampiranFiles as $lampiran) {
                            $lampiranNames[] = $lampiran->getClientOriginalName();
                            $lampiran->move('dokumen/kegiatan', $lampiran->getClientOriginalName());
                            $pathLampiran[] = 'dokumen/kegiatan/' . $lampiran->getClientOriginalName();
                        }
                    }
                    $lampiran = implode(';', $lampiranNames);
                    $path = implode(';', $pathLampiran);
                    $setData = [
                        'nama_dokumen' => $request->nama_dokumen,
                        'deskripsi_dokumen' => $request->deskripsi,
                        'nama_file_dokumen' => $lampiran,
                        'path_file_dokumen' => $path,
                        'user_update' => Auth::user()->nama 
                    ];
                    $this->arsipRepository->updateByUuid($setData,$uuid);
                    DB::commit();
                    return redirect('/manajemen/arsip')->with('success', 'Data kegiatan berhasil diubah');
                }else{
                    $setData = [
                        'nama_dokumen' => $request->nama_dokumen,
                        'deskripsi_dokumen' => $request->deskripsi];
                    $this->arsipRepository->updateByUuid($setData,$uuid);
                
                    DB::commit();
                    return redirect('/manajemen/arsip')->with('success', 'Data arsip berhasil diubah');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect('arsip/edit/'.$uuid)->with('alert', 'Data arsip gagal diubah: ' . $e->getMessage() );
            } 
        }

        public function editHasilPemeriksaan(Request $data, $uuid){
            try{
                if ($data->hasFile('lampiran')) {
                    $anak = $this->anakRepository->findByUuid($data->uuid_anak);
                    $lama= $this->gangguanRepository->findByUuid($uuid);
                    $validasi = $this->validateService->valHasilPemeriksaan($data);
                    if ($validasi->fails()) {
                        $msg = $validasi->errors()->all();
                        return redirect('hasil-pemeriksaan/edit/'.$uuid)->with('alert', 'Data arsip gagal diubah: '.$msg[0] );
                    }  
                    DB::beginTransaction();
                    $lampiranNames = [];
                    $pathLampiran = [];
                    if (is_array($data->file('lampiran')) || is_object($data->file('lampiran'))) {
                        $lampiranFiles = $data->file('lampiran');
                        foreach ($lampiranFiles as $lampiran) {
                            $namaLampiranBaru = $anak->nama_lengkap . '_' . $lampiran->getClientOriginalName();
                            $lampiranNames[] = $namaLampiranBaru;
                            $lampiran->move('dokumen/hasilTest', $namaLampiranBaru);
                            $pathLampiran[] = 'dokumen/hasilTest/' . $namaLampiranBaru;
                        }
                        
                    }
                    $lampiran = implode(';', $lampiranNames);
                    $path = implode(';', $pathLampiran);
    
                    $nilaiTelingaKanan=[
                        $data->kanan_nilai1,
                        $data->kanan_nilai2,
                        $data->kanan_nilai3,
                        $data->kanan_nilai4,
                        $data->kanan_nilai5,
                    ];
                    $nilaiTelingaKiri=[
                        $data->kiri_nilai1,
                        $data->kiri_nilai2,
                        $data->kiri_nilai3,
                        $data->kiri_nilai4,
                        $data->kiri_nilai5,
                    ];
                    $nilaiTelingaBinaural=[
                        $data->binaural_nilai1,
                        $data->binaural_nilai2,
                        $data->binaural_nilai3,
                        $data->binaural_nilai4,
                        $data->binaural_nilai5,
                    ];
    
                    $kemampuanTelingaKanan=collect($nilaiTelingaKanan)->avg();
                    $kemampuanTelingaKanan=$kemampuanTelingaKanan??$lama->kemampuan_kanan;
                    $kemampuanTelingaKiri=collect($nilaiTelingaKiri)->avg(); 
                    $kemampuanTelingaKiri=$kemampuanTelingaKiri??$lama->kemampuan_kiri;
                    $kemampuanBinaural=collect($nilaiTelingaBinaural)->avg();
                    $kemampuanBinaural=$kemampuanBinaural??$lama->kemampuan_binaural;
                    $setData = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
                        'id_anak'=> $anak->id,
                        'path_file_hasil_test'=>$path,
                        'nama_file_hasil_test'=>$lampiran,
                        'tgl_pemeriksaan'=>$data->tgl_pemeriksaan,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->gangguanRepository->updateBy($setData,$uuid);
                    $setUpdate = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
    
                    ]; 
                    $this->anakRepository->updateBy($setUpdate,$data->uuid_anak);
                    DB::commit();
                    return redirect('/manajemen/hasil-pemeriksaan')->with('success', 'Data arsip berhasil diubah');
                }else{
                    $lama= $this->gangguanRepository->findByUuid($uuid);
                    $anak = $this->anakRepository->findByUuid($data->uuid_anak);
                    DB::beginTransaction();
                    $nilaiTelingaKanan=[
                        $data->kanan_nilai1,
                        $data->kanan_nilai2,
                        $data->kanan_nilai3,
                        $data->kanan_nilai4,
                        $data->kanan_nilai5,
                    ];
                    $nilaiTelingaKiri=[
                        $data->kiri_nilai1,
                        $data->kiri_nilai2,
                        $data->kiri_nilai3,
                        $data->kiri_nilai4,
                        $data->kiri_nilai5,
                    ];
                    $nilaiTelingaBinaural=[
                        $data->binaural_nilai1,
                        $data->binaural_nilai2,
                        $data->binaural_nilai3,
                        $data->binaural_nilai4,
                        $data->binaural_nilai5,
                    ];
                    $kemampuanTelingaKanan=collect($nilaiTelingaKanan)->avg();
                    $kemampuanTelingaKanan=$kemampuanTelingaKanan??$lama->kemampuan_kanan;
                    $kemampuanTelingaKiri=collect($nilaiTelingaKiri)->avg(); 
                    $kemampuanTelingaKiri=$kemampuanTelingaKiri??$lama->kemampuan_kiri;
                    $kemampuanBinaural=collect($nilaiTelingaBinaural)->avg();
                    $kemampuanBinaural=$kemampuanBinaural??$lama->kemampuan_binaural;
                    $setData = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
                        'id_anak'=> $anak->id,
                        'tgl_pemeriksaan'=>$data->tgl_pemeriksaan,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->gangguanRepository->updateBy($setData,$uuid);
                    $setUpdate = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
    
                    ]; 
                    $this->anakRepository->updateBy($setUpdate,$data->uuid_anak);
                    DB::commit();
                    return redirect('/manajemen/hasil-pemeriksaan')->with('success', 'Data hasil pemeriksaan berhasil diubah');
                }
               
            } catch (\Exception $e) {
               return redirect('hasil-pemeriksaan/edit/'.$uuid)->with('alert', 'Data hasil pemeriksaan gagal diubah: ' . $e->getMessage() );            }
        }
        public function editHasilPemeriksaanbyAdmin(Request $data, $uuid){
            try{
                if ($data->hasFile('lampiran')) {
                    $anak = $this->anakRepository->findByUuid($data->uuid_anak);
                    $lama= $this->gangguanRepository->findByUuid($uuid);
                    $validasi = $this->validateService->valHasilPemeriksaan($data);
                    if ($validasi->fails()) {
                        $msg = $validasi->errors()->all();
                        return redirect('hasil-pemeriksaan-pendengaran/edit/'.$uuid)->with('alert', 'Data arsip gagal diubah: '.$msg[0] );
                    }  
                    DB::beginTransaction();
                    $lampiranNames = [];
                    $pathLampiran = [];
                    if (is_array($data->file('lampiran')) || is_object($data->file('lampiran'))) {
                        $lampiranFiles = $data->file('lampiran');
                        foreach ($lampiranFiles as $lampiran) {
                            $namaLampiranBaru = $anak->nama_lengkap . '_' . $lampiran->getClientOriginalName();
                            $lampiranNames[] = $namaLampiranBaru;
                            $lampiran->move('dokumen/hasilTest', $namaLampiranBaru);
                            $pathLampiran[] = 'dokumen/hasilTest/' . $namaLampiranBaru;
                        }
                        
                    }
                    $lampiran = implode(';', $lampiranNames);
                    $path = implode(';', $pathLampiran);
    
                    $nilaiTelingaKanan=[
                        $data->kanan_nilai1,
                        $data->kanan_nilai2,
                        $data->kanan_nilai3,
                        $data->kanan_nilai4,
                        $data->kanan_nilai5,
                    ];
                    $nilaiTelingaKiri=[
                        $data->kiri_nilai1,
                        $data->kiri_nilai2,
                        $data->kiri_nilai3,
                        $data->kiri_nilai4,
                        $data->kiri_nilai5,
                    ];
                    $nilaiTelingaBinaural=[
                        $data->binaural_nilai1,
                        $data->binaural_nilai2,
                        $data->binaural_nilai3,
                        $data->binaural_nilai4,
                        $data->binaural_nilai5,
                    ];
    
                    $kemampuanTelingaKanan=collect($nilaiTelingaKanan)->avg();
                    $kemampuanTelingaKanan=$kemampuanTelingaKanan??$lama->kemampuan_kanan;
                    $kemampuanTelingaKiri=collect($nilaiTelingaKiri)->avg(); 
                    $kemampuanTelingaKiri=$kemampuanTelingaKiri??$lama->kemampuan_kiri;
                    $kemampuanBinaural=collect($nilaiTelingaBinaural)->avg();
                    $kemampuanBinaural=$kemampuanBinaural??$lama->kemampuan_binaural;
                    $setData = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
                        'id_anak'=> $anak->id,
                        'path_file_hasil_test'=>$path,
                        'nama_file_hasil_test'=>$lampiran,
                        'tgl_pemeriksaan'=>$data->tgl_pemeriksaan,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->gangguanRepository->updateBy($setData,$uuid);
                    $setUpdate = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
    
                    ]; 
                    $this->anakRepository->updateBy($setUpdate,$data->uuid_anak);
                    DB::commit();
                    return redirect('/manajemen/kemampuan-dengar')->with('success', 'Data arsip berhasil diubah');
                }else{
                    $lama= $this->gangguanRepository->findByUuid($uuid);
                    $anak = $this->anakRepository->findByUuid($data->uuid_anak);
                    DB::beginTransaction();
                    $nilaiTelingaKanan=[
                        $data->kanan_nilai1,
                        $data->kanan_nilai2,
                        $data->kanan_nilai3,
                        $data->kanan_nilai4,
                        $data->kanan_nilai5,
                    ];
                    $nilaiTelingaKiri=[
                        $data->kiri_nilai1,
                        $data->kiri_nilai2,
                        $data->kiri_nilai3,
                        $data->kiri_nilai4,
                        $data->kiri_nilai5,
                    ];
                    $nilaiTelingaBinaural=[
                        $data->binaural_nilai1,
                        $data->binaural_nilai2,
                        $data->binaural_nilai3,
                        $data->binaural_nilai4,
                        $data->binaural_nilai5,
                    ];
                    $kemampuanTelingaKanan=collect($nilaiTelingaKanan)->avg();
                    $kemampuanTelingaKanan=$kemampuanTelingaKanan??$lama->kemampuan_kanan;
                    $kemampuanTelingaKiri=collect($nilaiTelingaKiri)->avg(); 
                    $kemampuanTelingaKiri=$kemampuanTelingaKiri??$lama->kemampuan_kiri;
                    $kemampuanBinaural=collect($nilaiTelingaBinaural)->avg();
                    $kemampuanBinaural=$kemampuanBinaural??$lama->kemampuan_binaural;
                    $setData = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
                        'id_anak'=> $anak->id,
                        'tgl_pemeriksaan'=>$data->tgl_pemeriksaan,
                        'user_update' => Auth::user()->nama
                    ];
                    $this->gangguanRepository->updateBy($setData,$uuid);
                    $setUpdate = [
                        'kemampuan_kiri'=> $kemampuanTelingaKiri,
                        'kemampuan_kanan'=> $kemampuanTelingaKanan,
                        'kemampuan_binaural'=>$kemampuanBinaural,
    
                    ]; 
                    $this->anakRepository->updateBy($setUpdate,$data->uuid_anak);
                    DB::commit();
                    return redirect('/manajemen/kemampuan-dengar')->with('success', 'Data hasil pemeriksaan berhasil diubah');
                }
               
            } catch (\Exception $e) {
               return redirect('hasil-pemeriksaan-pendengaran/edit/'.$uuid)->with('alert', 'Data hasil pemeriksaan gagal diubah: ' . $e->getMessage() );            }
        }
}
