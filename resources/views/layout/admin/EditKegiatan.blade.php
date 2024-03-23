@extends('layout.admin.MasterAdmin')
@section('title','Edit Kegiatan')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/managemen/kegiatan">Managemen Kegiatan</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')
<form method="POST" action="/kegiatan/edit/{{$data['detail']->uuid}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input class="form-control" id="inputNamaKegiatan" name="nama_kegiatan" type="text" value="{{$data['detail']->nama_kegiatan}}" />
        <label for="inputNamaKegiatan">Nama Kegiatan</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="inputDeskripsi" name="deskripsi" type="text" value="{{$data['detail']->deskripsi_kegiatan}}" />
        <label for="inputDeskripsi">Deskripsi</label>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputLokasi" name="lokasi" type="text" value="{{$data['detail']->lokasi}}" />
                <label for="inputLokasi">Lokasi</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputTanggal" name="tanggal" type="date" value="{{$data['detail']->tgl_kegiatan}}" />
                <label for="inputTanggal">Tanggal</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <select class="form-select" id="sumber_dana" name="sumber_dana" aria-label="Pilih Sumber Dana">
                    @foreach ($data['sumber'] as $dt)    
                        <option value="{{$dt->uuid}}" @if($dt->uuid == $data['detail']->sumber) selected @endif>{{$dt->sumber}}</option>
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
        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan perubahan data ini?')">Simpan</button></div>
    </div>
</form>
<script src="{{ asset('resources/js/kegiatan.js') }}"></script>
@endsection