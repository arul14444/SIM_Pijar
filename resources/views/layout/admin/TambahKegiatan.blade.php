@extends('layout.admin.MasterAdmin')
@section('title','Tambah Kegiatan')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection

@section('content')
<form id="tambahKegiatan" method="POST" action="/tambah/kegiatan" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" id="inputNamaKegiatan" name="nama_kegiatan" type="text" placeholder="Masukkan nama kegiatan" />
        <label for="inputNamaKegiatan">Nama Kegiatan</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="inputDeskripsi" name="deskripsi" type="text" placeholder="Masukkan deskripsi" />
        <label for="inputDeskripsi">Deskripsi</label>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputLokasi" name="lokasi" type="text" placeholder="Masukkan lokasi" />
                <label for="inputLokasi">Lokasi</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputTanggal" name="tanggal" type="date" placeholder="Masukkan tanggal" />
                <label for="inputTanggal">Tanggal</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <select class="form-select" id="sumber_dana" name="sumber_dana" aria-label="Pilih Sumber Dana">
                    <option selected disabled>Pilih Sumber Dana</option>
                    @foreach ($data as $dt)    
                    <option value="{{$dt->uuid}}">{{$dt->sumber}}</option>
                    @endforeach
                </select>
                <label for="inputAbdKanan">Sumber Dana</label>
            </div>
        </div>
    </div>
    <div>
        <label for="formFileMultiple" class="form-label">Lampiran</label>
        <input class="form-control" type="file" id="formFileMultiple" name="lampiran[]" multiple>
    </div>
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Tambah</button></div>
    </div>
</form>
<script src="{{ asset('resources/js/kegiatan.js') }}"></script>
@endsection