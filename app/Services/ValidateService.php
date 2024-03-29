<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ValidateService{
    public function valArsip($request){
        $validator = Validator::make($request->all(), [
            "lampiran" => "required|file|mimes:pdf|max:2048"
        ], [
            'lampiran.required' => 'berkas harus diunggah',
            'lampiran.mimes' => 'berkas harus pdf',
            'lampiran.max' => 'max berkas diunggah adalah 2 mb'
        ]);
        return $validator;
    }
    public function valKegiatan($request){
        $validator = Validator::make($request->all(), [
            'lampiran.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', 
        ], [
            'lampiran.*.required' => 'Setiap lampiran harus diunggah',
            'lampiran.*.image' => 'Setiap lampiran harus berupa gambar',
            'lampiran.*.mimes' => 'Setiap lampiran harus berupa file gambar (jpeg, png, jpg, gif)',
            'lampiran.*.max' => 'Maksimal ukuran setiap lampiran adalah 4 MB'
        ]);
        
        
        return $validator;
    }
    public function valAset($request){
        $validator = Validator::make($request->all(), [
            'lampiran' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', 
        ], [
            'lampiran.required' => 'lampiran harus diunggah',
            'lampiran.image' => 'lampiran harus berupa gambar',
            'lampiran.max' => 'maksimal ukuran lampiran adalah 4 MB'
        ]);
        
        return $validator;
    }
    public function valHasilPemeriksaan($request){
        $validator = Validator::make($request->all(), [
            "lampiran.*" => "required|file|mimes:pdf|max:2048"
        ], [
            'lampiran.*.required' => 'berkas harus diunggah',
            'lampiran.*.mimes' => 'berkas harus pdf',
            'lampiran.*.max' => 'max berkas diunggah adalah 2 mb'
        ]);
        return $validator;
    }
}
