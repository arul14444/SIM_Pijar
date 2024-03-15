@extends('layout.admin.MasterAdmin')
@section('title','Tambah Surat')
@section('route')
        <li class="breadcrumb-item active">Tambah Surat</li>

@endsection
@section('content')
<form id="tambahSurat" method="POST" action="/tambah/surat">
        @csrf
        <div style="margin: 0 auto;">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <input class="form-control" id="inputNoSurat" name="nomor_surat" type="text" placeholder="Masukan nomorSurat" />
                        <label for="inputNoSurat">Nomor Surat</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" id="inputPemberiTugas" name="uuid_jabatan_pemberi" aria-label="Pilih Pemberi Tugas">
                            <option selected disabled>Pilih pemberi tugas</option>
                                @foreach ($data['pengurusInti'] as $dt)    
                                    <option value="{{$dt->uuid}}">{{$dt->nama}} ({{$dt->jabatan}})</option>
                                @endforeach
                        </select>
                        <label for="inputNamaOrangTua">Yang bertanda tangan</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="inputPenerimaTugas" name="uuid_penerima" aria-label="Pilih Penerima Tugas">
                            <option selected disabled>Pilih penerima tugas</option>
                                @foreach ($data['pengurus'] as $dt)    
                                    <option value="{{$dt->uuid}}">{{$dt->nama}}</option>
                                @endforeach
                        </select>
                        <label for="inputNamaOrangTua">Penerima Tugas</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputJabatan" name="jabatan_penerima" type="text" placeholder="Masukan jabatan" />
                        <label for="inputJabatan">Jabatan</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputKeperluan" name="keperluan" type="text" placeholder="Masukan Keperluan" />
                <label for="inputKeperluan">Keperluan</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputTempatDibuat" name="tempat_dibuat" type="text" placeholder="Enter your first name" />
                        <label for="inputTempatDibuat">Tempat dibuat</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputTanggalDibuat" name="tgl_dibuat" type="date" placeholder="Enter your last name" />
                        <label for="inputTanggalDibuat">Tanggal dibuat</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Tambah</button></div>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/surat.js') }}"></script>

@endsection
