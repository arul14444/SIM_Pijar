<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ValidateService{
    public function valArsip($request){
        $validator = Validator::make($request->all(), [
            "lampiran.*" => "file|mimes:pdf|max:2048",
            "lampiran" => "required",
            "nama_dokumen" => "required",
        ], [
            'lampiran.required' => 'Lampiran harus diunggah',
            'lampiran.*.mimes' => 'Lampiran harus pdf',
            'lampiran.*.max' => 'Maksimal lampirab diunggah adalah 2 mb',
            'nama_dokumen.required' => 'Nama dokumen harus diisi',
        ]);
        return $validator;
    }
    public function valKegiatan($request){
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'sumber_dana' => 'required',
            'lampiran.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096', 
            'lampiran' => 'required',
        ], [
            'lampiran.required' => 'Setiap lampiran harus diunggah',
            'lampiran.*.image' => 'Setiap lampiran harus berupa gambar',
            'lampiran.*.mimes' => 'Setiap lampiran harus berupa file gambar (jpeg, png, jpg, gif)',
            'lampiran.*.max' => 'Maksimal ukuran setiap lampiran adalah 4 MB',
            'nama_kegiatan.required' => 'Nama kegiatan harus diisi',
            'tanggal.required' => 'Tanggal kegiatan harus diisi',
            'lokasi.required' => 'Lokasi kegiatan harus diisi',
            'sumber_dana.required' => 'Sumber dana kegiatan harus diisi',
        ]);
        
        
        return $validator;
    }
    public function valAset($request){
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'kode' => 'required',
            'uuid_status_aset' => 'required',   
            'lampiran.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'lampiran' => 'required', 
        ], [
            'lampiran.required' => 'Lampiran harus diunggah',
            'lampiran.*.image' => 'Lampiran harus berupa gambar',
            'lampiran.*.max' => 'Maksimal ukuran lampiran adalah 4 MB',
            'lampiran.*.mimes' => 'Lampiran harus berupa file gambar (jpeg, png, jpg, gif)',
            'nama_barang.required' => 'Nama barang harus diisi',
            'kode.required' => 'Kode barang harus diisi',
            'uuid_status_aset.required' => 'Status aset harus diisi',
        ]);
        
        return $validator;
    }
    public function valHasilPemeriksaan($request){
        $validator = Validator::make($request->all(), [
            "uuid_anak" => "required",
            "tgl_pemeriksaan" => "required",
            "kiri_nilai1" => "required",
            "kanan_nilai1" => "required",
            "binaural_nilai1" => "required",
            "lampiran.*" => "required|file|mimes:pdf|max:2048",
            "lampiran" => "required",
            
        ], [
            'lampiran.required' => 'Lampiran harus diunggah',
            'lampiran.*.mimes' => 'Lampiran harus pdf',
            'lampiran.*.max' => 'Maksimal lampiran diunggah adalah 2 mb',
            'uuid_anak.required' => 'Anak harus diisi',
            'kanan_nilai1.required' => 'Nilai kanan harus diisi',
            'kiri_nilai1.required' => 'Nilai kiri harus diisi',
            'binaural_nilai1.required' => 'Nilai binaural harus diisi',
            'tgl_pemeriksaan.required' => 'Tanggal pemeriksaan harus diisi',
        ]);
        return $validator;
    }
    public function valAnggota($request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nomor_telepon.required' => 'Nomor telepon harus diisi',
            'username.required' => 'Username harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'password.required' => 'Password harus diisi',
            'konfirmasi_password.required' => 'Konfirmasi password harus diisi',
            'konfirmasi_password.same' => 'Konfirmasi password tidak sama dengan password'
        ]);
        
        return $validator;

    }
    public  function valAnak($request){
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kemampuan_telinga_kiri' => 'required',
            'kemampuan_telinga_kanan' => 'required',
            'kemampuan_telinga_binaural' => 'required',
            'penyakit_penyerta' => 'required',
            'bpjs' => 'required',
            'uuid_orang_tua' => 'required',
            'uuid_abd_kiri' => 'required',
            'uuid_abd_kanan' => 'required',
        ], [
            'uuid_orang_tua.required' => 'Orang tua harus diisi',
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'nama_panggilan.required' => 'Nama panggilan harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'kemampuan_telinga_kiri.required' => 'Kemampuan telinga kiri harus diisi',
            'kemampuan_telinga_kanan.required' => 'Kemampuan telinga kanan harus diisi',
            'kemampuan_telinga_binaural.required' => 'Kemampuan telinga binaural harus diisi',
            'penyakit_penyerta.required' => 'Penyakit penyerta harus diisi',
            'bpjs.required' => 'BPJS harus diisi',
            'uuid_abd_kiri.required' => 'Abd kiri harus diisi',
            'uuid_abd_kanan.required' => 'Abd kanan harus diisi',
        ]);
        
        return $validator;
    }
    public function valDonatur($request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'uuid_instansi' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nomor_telepon.required' => 'Nomor telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'uuid_instansi.required' => 'Instansi harus diisi',
        ]);
        
        return $validator;
    }
    public function valSurat($request){
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'uuid_jabatan_pemberi' => 'required',
            'uuid_penerima' => 'required',
            'jabatan_penerima' => 'required',
            'keperluan' => 'required',
            'tempat_dibuat' => 'required',
            'tgl_dibuat' => 'required',
        ], [
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'uuid_jabatan_pemberi.required' => 'Yang bertanda tangan harus diisi',
            'uuid_penerima.required' => 'Penerima tugas harus diisi',
            'jabatan_penerima.required' => 'Jabatan penerima harus diisi',
            'keperluan.required' => 'Keperluan harus diisi',
            'tempat_dibuat.required' => 'Tempat dibuat harus diisi',
            'tgl_dibuat.required' => 'Tanggal dibuat harus diisi',
        ]);
        
        return $validator;
    }
}
