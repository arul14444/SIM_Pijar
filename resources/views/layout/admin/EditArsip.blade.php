@extends('layout.admin.MasterAdmin')
@section('title','Edit Arsip')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Manajemen Arsip</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')    
    <form method="POST" action="/arsip/edit/{{$data->uuid}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" id="inputNamaBarang" name="nama_dokumen" type="text" value="{{$data->nama_dokumen}}" />
            <label for="inputNamaBarang">Nama Dokumen</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" id="inputKode" name="kode" type="text" placeholder="Masukkan kode" value="{{$data->kode_dokumen}}">
            <label for="inputKode">Kode</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputDeskripsi" name="deskripsi" type="text" value="{{$data->deskripsi_dokumen}}" />
            <label for="inputDeskripsi">Deskripsi</label>
        </div>
        <div>
            <label for="formFileMultiple" class="form-label">Lampiran<span style="color: red;">*</span></label>
            <input class="form-control" type="file" id="formFileMultiple" name="lampiran[]" multiple>
        </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Simpan</button></div>
        </div>
    </form>
    <div class="d-flex align-items-center justify-content-end mt-3" style="font-size: 14px;">
        <div class="mr-auto"> <span style="color: red;">*</span>File berjenis PDF ukuran maksimal 2048kb</div>
    </div>
    <script src="{{ asset('resources/js/arsip.js') }}"></script>
@endsection