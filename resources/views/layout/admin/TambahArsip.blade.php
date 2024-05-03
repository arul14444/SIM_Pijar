@extends('layout.admin.MasterAdmin')
@section('title','Tambah Arsip')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('manajemen/arsip')}}">Managemen Arsip</a></li>
        <li class="breadcrumb-item active">Tambah Arsip</li>
    </ol>
@endsection

@section('content')
<form id="tambahArsip" method="POST" action="/tambah/arsip" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" id="inputNamaBarang" name="nama_dokumen" type="text" placeholder="Masukkan nama barang" />
        <label for="inputNamaBarang">Nama Dokumen</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="inputDeskripsi" name="deskripsi" type="text" placeholder="Masukkan deskripsi" />
        <label for="inputDeskripsi">Deskripsi</label>
    </div>
    <div>
        <label for="formFileMultiple" class="form-label">Lampiran<span style="color: red;">*</span></label>
        <input class="form-control" type="file" id="formFileMultiple" name="lampiran[]" multiple>
    </div>
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Tambah</button></div>
    </div>
    <div class="d-flex align-items-center justify-content-end mt-3" style="font-size: 14px;">
        <div class="mr-auto"> <span style="color: red;">*</span>File berjenis pdf ukuran maksimal 2048kb</div>
    </div>
</form>
<script src="{{ asset('resources/js/arsip.js') }}"></script>
@endsection