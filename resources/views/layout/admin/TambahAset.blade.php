@extends('layout.admin.MasterAdmin')
@section('title','Tambah Aset')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen</a></li>
        <li class="breadcrumb-item active">Tambah Aset</li>
    </ol>
@endsection

@section('content')
<form id="tambahAset" method="POST" action="/tambah/aset" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" id="inputNamaBarang" name="nama_barang" type="text" placeholder="Masukkan nama barang" />
        <label for="inputNamaBarang">Nama Barang</label>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control" id="inputKode" name="kode" type="text" placeholder="Masukkan kode" />
                <label for="inputKode">Kode</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-select" id="inputStatusAset" name="uuid_status_aset" aria-label="Pilih Status Aset">
                    <option selected disabled>Pilih Status Aset</option>
                        @foreach ($listStatus as $data)    
                            <option value="{{$data->uuid}}">{{$data->status}}</option>
                        @endforeach
                </select>
                <label for="inputStatusAset">Status Aset</label>
            </div>
        </div>
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
<script src="{{ asset('resources/aset.js') }}"></script>
@endsection