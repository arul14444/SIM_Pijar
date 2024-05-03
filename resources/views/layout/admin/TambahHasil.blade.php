@extends('layout.admin.MasterAdmin')
@section('title', 'Tambah Hasil Pemeriksaan')
@section('route')
    <li class="breadcrumb-item"> <a href="{{url('/manajemen/kemampuan-dengar')}}">Manajemen Kemampuan Dengar</a></li></li>
    <li class="breadcrumb-item active"> Tambah Hasil Pemeriksaan</li>
@endsection
@section('content')
    <form id="tambahHasilPemeriksaan" method="POST" action="/tambah/hasil-pemeriksaan-pendengaran" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <div class="form-floating ">
                    <select class="form-select" id="inputNamaAnak" name="uuid_anak">
                        <option selected disabled>Pilih Nama Anak</option>
                        @foreach ($data as $dt)    
                            <option value="{{$dt->uuid}}">{{$dt->nama_lengkap}}</option>
                        @endforeach
                    </select>
                    <label for="inputNamaAnak">Nama Anak</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-floating ">
                    <input class="form-control" id="tgl_periksa" name="tgl_pemeriksaan" type="date" placeholder="Enter your first name" />
                    <label for="tgl_periksa">Tanggal Pemeriksaan</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2 mb-3" style="display: flex; justify-content: center; align-items: center; font-size: 14px;">
                Hasil pemeriksaan pendengaran telinga kiri:
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kiriNilai1" name="kiri_nilai1" type="text" placeholder="Enter your first name" />
                    <label for="kiriNilai1">Nilai 1 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kiriNilai2" name="kiri_nilai2" type="text" placeholder="Enter your first name" />
                    <label for="kiriNilai2">Nilai 2 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kiriNilai3" name="kiri_nilai3" type="text" placeholder="Enter your first name" />
                    <label for="kiriNilai3">Nilai 3 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kiriNilai4" name="kiri_nilai4" type="text" placeholder="Enter your first name" />
                    <label for="kiriNilai4">Nilai 4 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kiriNilai5" name="kiri_nilai5" type="text" placeholder="Enter your first name" />
                        <label for="kiriNilai5">Nilai 5 (Hz)</label>
                    </div>
                </div>
            </div>

        <div class="row mb-3">
            <div class="col-md-2 mb-3" style="display: flex; justify-content: center; align-items: center;font-size: 14px;">
                Hasil pemeriksaan Pendengaran telinga kanan:
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kananNilai1" name="kanan_nilai1" type="text" placeholder="Enter your last name" />
                    <label for="kananNilai1">Nilai 1 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kananNilai2" name="kanan_nilai2" type="text" placeholder="Enter your last name" />
                    <label for="kananNilai2">Nilai 2 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kananNilai3" name="kanan_nilai3" type="text" placeholder="Enter your last name" />
                    <label for="kananNilai3">Nilai 3 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kananNilai4" name="kanan_nilai4" type="text" placeholder="Enter your last name" />
                    <label for="kananNilai4">Nilai 4 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="kananNilai5" name="kanan_nilai5" type="text" placeholder="Enter your last name" />
                    <label for="kananNilai5">Nilai 5 (Hz)</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 mb-3" style="display: flex; justify-content: center; align-items: center;font-size: 14px;">
                Hasil pemeriksaan Pendengaran Binaural:
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="binauralNilai1" name="binaural_nilai1" type="text" placeholder="Enter your first name" />
                    <label for="binauralNilai1">Nilai 1 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="binauralNilai2" name="binaural_nilai2" type="text" placeholder="Enter your first name" />
                    <label for="binauralNilai2">Nilai 2 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="binauralNilai3" name="binaural_nilai3" type="text" placeholder="Enter your first name" />
                    <label for="binauralNilai3">Nilai 3 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="binauralNilai4" name="binaural_nilai4" type="text" placeholder="Enter your first name" />
                    <label for="binauralNilai4">Nilai 4 (Hz)</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="binauralNilai5" name="binaural_nilai5" type="text" placeholder="Enter your first name" />
                    <label for="binauralNilai5">Nilai 5 (Hz)</label>
                </div>
            </div>
        </div>             
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="formFileMultiple" class="form-label">Lampiran<span style="color: red;">*</span></label>
                <input class="form-control" type="file" id="formFileMultiple" name="lampiran[]" multiple>
            </div>
        </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Tambah</button></div>
        </div>
        <div class="d-flex align-items-center justify-content-end mt-3" style="font-size: 14px;">
            <div class="mr-auto"> <span style="color: red;">*</span>File berjenis , pdf ukuran maksimal 2048kb</div>
        </div>
    </form>
    <script src="{{ asset('resources/js/hasilPemeriksaanbyAdmin.js') }}"></script>

@endsection