@extends('layout.admin.MasterAdmin')
@section('title','Tambah Anak')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen Anak</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection
@section('content')
    <form method="POST" action="/tambah/anak">
        @csrf
        <div style="margin: 0 auto;">
            <div class="row mb-3">
                <div class="col-md-9">
                    <div class="form-floating">
                        <select class="form-select" id="inputNamaOrangTua" name="uuid_orang_tua" aria-label="Pilih Nama Orang Tua">
                            <option selected disabled>Pilih Nama Orang Tua</option>
                                @foreach ($listOrtu as $data)    
                                    <option value="{{$data->uuid}}">{{$data->nama}}</option>
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
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputNamaLengkap" name="nama_lengkap" type="text" placeholder="Enter your first name" />
                        <label for="inputNamaLengkap">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputNamaPanggilan" name="nama_panggilan" type="text" placeholder="Enter your last name" />
                        <label for="inputNamaPanggilan">Nama Panggilan</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNomorTelpon" name="nomor_telepon" type="text" placeholder="Masukan nomor telepon" />
                <label for="inputNomorTelepon">Nomor Telepon</label>
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
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputGangguanTelingaKiri" name="gangguan_telinga_kiri" type="text" placeholder="Enter your first name" />
                        <label for="inputGangguanTelingaKiri">Gangguan Telinga Kiri (Hz)</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputGangguanTelingaKanan" name="gangguan_telinga_kanan" type="text" placeholder="Enter your last name" />
                        <label for="inputGangguanTelingaKanan">Gangguan Telinga Kanan (Hz)</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPenyakitPenyerta" name="penyakit_penyerta" type="text" placeholder="Masukan penyakit penyerta" />
                <label for="inputPenyakitPenyerta">Penyakit Penyerta</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Register</button></div>
            </div>
        </div>
    </form>
@endsection