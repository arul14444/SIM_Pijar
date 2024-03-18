@extends('layout.admin.MasterAdmin')
@section('title','Tambah Arsip')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen</a></li>
        <li class="breadcrumb-item active">Tambah</li>
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
        <input class="form-control" id="inputKode" name="kode" type="text" placeholder="Masukkan kode" />
        <label for="inputKode">Kode</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" id="inputDeskripsi" name="deskripsi" type="text" placeholder="Masukkan deskripsi" />
        <label for="inputDeskripsi">Deskripsi</label>
    </div>
    <div>
        <label for="formFileMultiple" class="form-label">Lampiran</label>
        <input class="form-control" type="file" id="formFileMultiple" name="lampiran[]" multiple>
    </div>
    <div class="mt-4 mb-0">
        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Tambah</button></div>
    </div>
</form>
<script src="{{ asset('resources/js/arsip.js') }}"></script>
@endsection