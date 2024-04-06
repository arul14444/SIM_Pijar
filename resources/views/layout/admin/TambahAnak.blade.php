@extends('layout.admin.MasterAdmin')
@section('title','Tambah Anak')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('manajemen/anak')}}">Manajemen Anak</a></li>
        <li class="breadcrumb-item active">Tambah Anak</li>
    </ol>
@endsection
@section('content')
    <form id="tambahAnak" method="POST" action="/tambah/anak">
        @csrf
        <div style="margin: 0 auto;">
            <div class="row mb-3">
                <div class="col-md-9">
                    <div class="form-floating">
                        <select class="form-select" id="inputNamaOrangTua" name="uuid_orang_tua" aria-label="Pilih Nama Orang Tua">
                            <option selected disabled>Pilih Nama Orang Tua</option>
                                @foreach ($data['listOrtu'] as $dt)    
                                    <option value="{{$dt->uuid}}">{{$dt->nama}}</option>
                                @endforeach
                        </select>
                        <label for="inputNamaOrangTua">Nama Orang Tua</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <select class="form-select" id="inputBpjs" name="bpjs">
                            <option value="ya">Punya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                        <label for="inputGangguanTelingaKanan">Kepemilikan BPJS</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNamaLengkap" name="nama_lengkap" type="text" placeholder="Enter your first name" />
                <label for="inputNamaLengkap">Nama Lengkap</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputNamaPanggilan" name="nama_panggilan" type="text" placeholder="Enter your last name" />
                        <label for="inputNamaPanggilan">Nama Panggilan</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputNomortelepon" name="nomor_telepon" type="text" placeholder="Masukan nomor telepon" />
                        <label for="inputNomorTelepon">Nomor Telepon</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputTempatLahir" name="tempat_lahir" type="text" placeholder="Enter your first name" />
                        <label for="inputTempatLahir">Tempat Lahir</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputTanggalLahir" name="tgl_lahir" type="date" placeholder="Enter your last name" />
                        <label for="inputTanggalLahir">Tanggal Lahir</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="inputAbdKiri" name="uuid_abd_kiri" aria-label="Pilih Jenis ABD Telinga Kiri">
                            <option selected disabled>Pilih Jenis Abd</option>
                            @foreach ($data['listAbd'] as $jenis)    
                            <option value="{{$jenis->uuid}}">{{$jenis->jenis}}</option>
                            @endforeach
                        </select>
                        <label for="inputAbdKiri">Jenis ABD Telinga Kiri</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="inputAbdKanan" name="uuid_abd_kanan" aria-label="Pilih Jenis ABD Telinga Kanan">
                            <option selected disabled>Pilih Jenis Abd</option>
                            @foreach ($data['listAbd'] as $jenis)    
                            <option value="{{$jenis->uuid}}">{{$jenis->jenis}}</option>
                            @endforeach
                        </select>
                        <label for="inputAbdKanan">Jenis ABD Telinga Kanan</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <input class="form-control" id="inputTanggalLahir" name="tgl_pemeriksaan" type="date" placeholder="Enter your last name" />
                        <label for="inputTanggalLahir">Tanggal Pemeriksaan Terakhir</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputGangguanTelingaKiri" name="kemampuan_telinga_kiri" type="text" placeholder="Enter your first name" />
                        <label for="inputGangguanTelingaKiri">Kemampuan Dengar Telinga Kiri (Hz)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input class="form-control" id="inputGangguanTelingaKanan" name="kemampuan_telinga_kanan" type="text" placeholder="Enter your last name" />
                        <label for="inputGangguanTelingaKanan">Kemampuan Dengar Telinga Kanan (Hz)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input class="form-control" id="inputGangguanTelingaBinaural" name="kemampuan_telinga_binaural" type="text" placeholder="Enter your last name" />
                        <label for="inputGangguanTelingaKanan">Kemampuan Dengar Binaural(Hz)</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPenyakitPenyerta" name="penyakit_penyerta" type="text" placeholder="Masukan penyakit penyerta" />
                <label for="inputPenyakitPenyerta">Penyakit Penyerta</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Tambah</button></div>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/js/anak.js') }}"></script>
@endsection